<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        // Remove previous draft slug if present
        Outlet::where('slug', 'bekasi')->delete();

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
            'slug' => 'jaktim'
        ], [
            'name' => 'Piyoh Jaktim',
            'description' => 'Outlet Piyoh Jaktim berlokasi di dalam venue olahraga Ryu Padel (Pondok Kelapa, Duren Sawit, Jakarta Timur). Menghadirkan suasana slowbar santai untuk pengunjung venue olahraga maupun penikmat kopi sekitar.',
            'address' => 'Jl. Kincan Raya No. 22, RT.1/RW.12, Pondok Kelapa, Kecamatan Duren Sawit, Jakarta Timur, DKI Jakarta 13450',
            'city' => 'Jakarta Timur',
            'phone' => '0812-3999-9731',
            'whatsapp' => '6281239999731',
            'instagram_url' => 'https://instagram.com/piyohkopi',
            'google_maps_url' => 'https://maps.app.goo.gl/qPUTjVxqTq7NeqiJ9',
            'opening_hours' => 'Setiap Hari: 07:00 - 23:00 WIB',
            'is_active' => false,
            'sort_order' => 2,
        ]);
    }
}

