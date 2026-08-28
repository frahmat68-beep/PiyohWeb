<?php

namespace App\Services;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Outlet;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MasterDataSyncService
{
    /**
     * Build and dispatch master data payload to PiyohPOS.
     *
     * @return array{success: bool, message: string, counts: array, response?: array|null}
     */
    public function sync(): array
    {
        $outlets = Outlet::all()->map(function ($outlet) {
            return [
                'id'        => (string) $outlet->id,
                'name'      => $outlet->name,
                'slug'      => $outlet->slug,
                'address'   => $outlet->address,
                'phone'     => $outlet->phone,
                'is_active' => (bool) $outlet->is_active,
            ];
        })->values()->toArray();

        $categories = MenuCategory::all()->map(function ($cat) {
            return [
                'id'         => (string) $cat->id,
                'name'       => $cat->name,
                'slug'       => $cat->slug,
                'sort_order' => (int) $cat->sort_order,
            ];
        })->values()->toArray();

        $products = MenuItem::all()->map(function ($item) {
            return [
                'id'          => (string) $item->id,
                'name'        => $item->name,
                'slug'        => $item->slug,
                'category_id' => (string) $item->menu_category_id,
                'description' => $item->description,
                'image_url'   => $item->getImageUrl(),
                'base_price'  => $item->base_price !== null ? (float) $item->base_price : 0,
                'sku'         => 'PIYOH-' . str_pad($item->id, 4, '0', STR_PAD_LEFT),
                'is_active'   => (bool) $item->is_active,
            ];
        })->values()->toArray();

        $prices = [];
        foreach (MenuItem::with('outlets')->get() as $item) {
            foreach ($item->outlets as $outlet) {
                $prices[] = [
                    'id'           => (string) ($item->id * 1000 + $outlet->id),
                    'product_id'   => (string) $item->id,
                    'outlet_id'    => (string) $outlet->id,
                    'price'        => $outlet->pivot->price_override !== null ? (float) $outlet->pivot->price_override : ($item->base_price !== null ? (float) $item->base_price : 0),
                    'is_available' => (bool) ($outlet->pivot->is_available ?? true),
                ];
            }
        }

        $payload = [
            'outlets'    => $outlets,
            'categories' => $categories,
            'products'   => $products,
            'prices'     => $prices,
        ];

        $counts = [
            'outlets'    => count($outlets),
            'categories' => count($categories),
            'products'   => count($products),
            'prices'     => count($prices),
        ];

        $jsonPayload = json_encode($payload);
        $token       = config('services.piyoh_pos.sync_token');
        $secret      = config('services.piyoh_pos.webhook_secret');
        $url         = rtrim(config('services.piyoh_pos.url', 'http://127.0.0.1:8080'), '/') . '/api/v1/sync/master-data';

        $signature   = 'sha256=' . hash_hmac('sha256', $jsonPayload, (string) $secret);

        Log::info('[MasterDataSyncService] Sending master data sync to POS', [
            'url'    => $url,
            'counts' => $counts,
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization'       => 'Bearer ' . $token,
                'X-Hub-Signature-256' => $signature,
                'Accept'              => 'application/json',
                'Content-Type'        => 'application/json',
            ])->withBody($jsonPayload, 'application/json')->timeout(15)->post($url);

            if ($response->successful()) {
                Log::info('[MasterDataSyncService] Sync successful', ['response' => $response->json()]);

                return [
                    'success'  => true,
                    'message'  => "Sync berhasil! {$counts['outlets']} Outlet, {$counts['categories']} Kategori, {$counts['products']} Menu, dan {$counts['prices']} Harga tersinkronisasi ke POS.",
                    'counts'   => $counts,
                    'response' => $response->json(),
                ];
            }

            Log::error('[MasterDataSyncService] Sync failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            return [
                'success'  => false,
                'message'  => "Sync gagal dengan status HTTP {$response->status()}: " . $response->body(),
                'counts'   => $counts,
                'response' => $response->json(),
            ];
        } catch (\Throwable $e) {
            Log::error('[MasterDataSyncService] Sync exception', ['error' => $e->getMessage()]);

            return [
                'success'  => false,
                'message'  => 'Gagal menghubungi server POS: ' . $e->getMessage(),
                'counts'   => $counts,
                'response' => null,
            ];
        }
    }
}
