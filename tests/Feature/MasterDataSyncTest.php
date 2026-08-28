<?php

namespace Tests\Feature;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Outlet;
use App\Services\MasterDataSyncService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class MasterDataSyncTest extends TestCase
{
    use RefreshDatabase;

    public function test_master_data_sync_service_builds_and_posts_correct_payload(): void
    {
        $outlet = Outlet::create([
            'name' => 'Piyoh Kopi Galaxy',
            'slug' => 'piyoh-kopi-galaxy',
            'address' => 'Grand Galaxy City, Bekasi',
            'phone' => '08123456789',
            'is_active' => true,
        ]);

        $category = MenuCategory::create([
            'name' => 'Signature Coffee',
            'slug' => 'signature-coffee',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $item = MenuItem::create([
            'menu_category_id' => $category->id,
            'name' => 'Piyoh Aren Latte',
            'slug' => 'piyoh-aren-latte',
            'description' => 'Espresso with fresh milk and organic aren sugar',
            'base_price' => 22000,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // Mock POS Sync Endpoint
        Http::fake([
            '*/api/v1/sync/master-data' => Http::response([
                'status' => 'success',
                'message' => 'Sync completed successfully',
                'summary' => [
                    'outlets' => ['synced' => 1, 'skipped' => 0, 'errors' => []],
                    'categories' => ['synced' => 1, 'skipped' => 0, 'errors' => []],
                    'products' => ['synced' => 1, 'skipped' => 0, 'errors' => []],
                    'prices' => ['synced' => 0, 'skipped' => 0, 'errors' => []],
                ],
            ], 200),
        ]);

        $service = app(MasterDataSyncService::class);
        $result = $service->sync();

        $this->assertTrue($result['success']);
        $this->assertEquals(1, $result['counts']['outlets']);
        $this->assertEquals(1, $result['counts']['categories']);
        $this->assertEquals(1, $result['counts']['products']);

        Http::assertSent(function ($request) {
            $data = json_decode($request->body(), true);

            return isset($data['outlets'], $data['categories'], $data['products'], $data['prices'])
                && count($data['outlets']) === 1
                && count($data['products']) === 1
                && $data['products'][0]['name'] === 'Piyoh Aren Latte'
                && $request->hasHeader('X-Hub-Signature-256');
        });
    }
}
