<?php

namespace App\Console\Commands;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Outlet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncMasterDataCommand extends Command
{
    protected $signature = 'master-data:sync';
    protected $description = 'Sync outlets, categories, products, and prices from Website to PiyohPOS';

    public function handle(): int
    {
        $this->info('Building master data payload...');

        $outlets = Outlet::all()->map(function ($outlet) {
            return [
                'id' => (string) $outlet->id,
                'name' => $outlet->name,
                'slug' => $outlet->slug,
                'address' => $outlet->address,
                'phone' => $outlet->phone,
                'is_active' => (bool) $outlet->is_active,
            ];
        })->values()->toArray();

        $categories = MenuCategory::all()->map(function ($cat) {
            return [
                'id' => (string) $cat->id,
                'name' => $cat->name,
                'slug' => $cat->slug,
                'sort_order' => (int) $cat->sort_order,
            ];
        })->values()->toArray();

        $products = MenuItem::all()->map(function ($item) {
            return [
                'id' => (string) $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'category_id' => (string) $item->menu_category_id,
                'description' => $item->description,
                'base_price' => $item->base_price !== null ? (float) $item->base_price : 0,
                'sku' => strtoupper(substr(str_replace('-', '', $item->slug), 0, 8)),
                'is_active' => (bool) $item->is_active,
            ];
        })->values()->toArray();

        $prices = [];
        foreach (MenuItem::with('outlets')->get() as $item) {
            foreach ($item->outlets as $outlet) {
                $prices[] = [
                    'id' => (string) ($item->id * 1000 + $outlet->id),
                    'product_id' => (string) $item->id,
                    'outlet_id' => (string) $outlet->id,
                    'price' => $outlet->pivot->price_override !== null ? (float) $outlet->pivot->price_override : ($item->base_price !== null ? (float) $item->base_price : 0),
                    'is_available' => (bool) ($outlet->pivot->is_available ?? true),
                ];
            }
        }

        $payload = [
            'outlets' => $outlets,
            'categories' => $categories,
            'products' => $products,
            'prices' => $prices,
        ];

        $jsonPayload = json_encode($payload);
        $token = config('services.piyoh_pos.sync_token');
        $secret = config('services.piyoh_pos.webhook_secret');
        $url = rtrim(config('services.piyoh_pos.url', 'http://127.0.0.1:8080'), '/') . '/api/v1/sync/master-data';

        $signature = 'sha256=' . hash_hmac('sha256', $jsonPayload, (string) $secret);

        $this->info("Sending payload to {$url}...");
        $this->line("- Outlets: " . count($outlets));
        $this->line("- Categories: " . count($categories));
        $this->line("- Products: " . count($products));
        $this->line("- Prices: " . count($prices));

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'X-Hub-Signature-256' => $signature,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->withBody($jsonPayload, 'application/json')->timeout(30)->post($url);

            if ($response->successful()) {
                $this->info('Master data sync successful!');
                $this->line(json_encode($response->json(), JSON_PRETTY_PRINT));
                return Command::SUCCESS;
            } else {
                $this->error('Sync failed with status ' . $response->status());
                $this->error($response->body());
                return Command::FAILURE;
            }
        } catch (\Throwable $e) {
            $this->error('Sync exception: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
