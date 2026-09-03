<?php

namespace Tests\Unit;

use App\Models\Outlet;
use Carbon\Carbon;
use Tests\TestCase;

class OutletTest extends TestCase
{
    public function test_outlet_is_open_now_evaluates_operating_hours_correctly(): void
    {
        $outlet = new Outlet([
            'name' => 'Piyoh Kopi Galaxy',
            'slug' => 'galaxy',
            'opening_hours' => 'Setiap Hari: 08:00 - 23:30 WIB',
            'is_active' => true,
        ]);

        // Midnight / Early morning (e.g. 00:06 WIB -> Closed)
        $midnight = Carbon::create(2026, 8, 29, 0, 6, 0, 'Asia/Jakarta');
        Carbon::setTestNow($midnight);
        $this->assertFalse($outlet->isOpenNow($midnight));
        $this->assertSame('Tutup', $outlet->status_label);
        Carbon::setTestNow();

        // Morning before open (e.g. 07:45 WIB -> Closed)
        $early = Carbon::create(2026, 8, 29, 7, 45, 0, 'Asia/Jakarta');
        $this->assertFalse($outlet->isOpenNow($early));

        // Exact opening (08:00 WIB -> Open)
        $openExact = Carbon::create(2026, 8, 29, 8, 0, 0, 'Asia/Jakarta');
        $this->assertTrue($outlet->isOpenNow($openExact));

        // Afternoon (14:30 WIB -> Open)
        $afternoon = Carbon::create(2026, 8, 29, 14, 30, 0, 'Asia/Jakarta');
        $this->assertTrue($outlet->isOpenNow($afternoon));

        // Night before closing (23:25 WIB -> Open)
        $nightBeforeClose = Carbon::create(2026, 8, 29, 23, 25, 0, 'Asia/Jakarta');
        $this->assertTrue($outlet->isOpenNow($nightBeforeClose));

        // Night after closing (23:35 WIB -> Closed)
        $nightAfterClose = Carbon::create(2026, 8, 29, 23, 35, 0, 'Asia/Jakarta');
        $this->assertFalse($outlet->isOpenNow($nightAfterClose));
    }

    public function test_inactive_outlet_always_returns_closed(): void
    {
        $outlet = new Outlet([
            'name' => 'Piyoh Inactive',
            'slug' => 'inactive',
            'opening_hours' => 'Setiap Hari: 08:00 - 23:30 WIB',
            'is_active' => false,
        ]);

        $afternoon = Carbon::create(2026, 8, 29, 14, 30, 0, 'Asia/Jakarta');
        $this->assertFalse($outlet->isOpenNow($afternoon));
        $this->assertSame('Nonaktif', $outlet->status_label);
    }

    public function test_outlet_get_image_url_returns_fallback_or_media(): void
    {
        $outlet = new Outlet([
            'name' => 'Piyoh Kopi Galaxy',
            'slug' => 'galaxy',
        ]);

        $url = $outlet->getImageUrl();
        $this->assertNotEmpty($url);
        $this->assertTrue(str_contains($url, 'galaxy') || str_contains($url, 'images.unsplash.com'));
    }
}
