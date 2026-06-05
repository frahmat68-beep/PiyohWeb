<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        Outlet::updateOrCreate([
            'slug' => 'galaxy'
        ], [
            'name' => 'Piyoh Kopi Galaxy',
            'description' => 'Piyoh Kopi Galaxy adalah coffee shop di area Jaka Setia, Bekasi Selatan, dengan suasana nyaman untuk menikmati kopi, manual brew, pastry, takeaway, dan berkumpul.',
            'address' => 'Jalan Lotus Timur. RSO D No. 31, RT.004/RW.019, Jaka Setia, Bekasi Selatan, Bekasi, West Java 17147, Indonesia',
            'city' => 'Bekasi',
            'phone' => '0812-3999-9731',
            'whatsapp' => '6281239999731',
            'instagram_url' => 'https://instagram.com/piyohkopi',
            'google_maps_url' => 'https://www.waze.com/id/live-map/directions/id/west-java/piyoh-kopi-galaxy?to=place.ChIJrcU7OLCNaS4R12tVPv4zzBk',
            'opening_hours' => 'Setiap Hari: 08:00 - 23:30 WIB',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Outlet::updateOrCreate([
            'slug' => 'bekasi'
        ], [
            'name' => 'Piyoh Kopi Bekasi',
            'description' => 'Outlet Piyoh Kopi kedua berada di area lokasi partner/venue yang terhubung dengan link maps resmi sementara. Detail alamat dan informasi kontak akan diperbarui setelah listing outlet tersedia.',
            'address' => 'Mengikuti titik lokasi pada Google Maps sementara',
            'city' => 'Bekasi',
            'phone' => null,
            'whatsapp' => null,
            'instagram_url' => 'https://instagram.com/piyohkopi',
            'google_maps_url' => 'https://maps.app.goo.gl/qPUTjVxqTq7NeqiJ9',
            'opening_hours' => 'Menunggu konfirmasi',
            'is_active' => true,
            'sort_order' => 2,
        ]);
    }
}
