<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        Outlet::updateOrCreate(
            ['slug' => 'galaxy'],
            [
                'name' => 'Piyoh Kopi Galaxy',
                'description' => 'Outlet pertama kami yang menyajikan kopi khas dengan suasana nyaman di kawasan Galaxy Pekanbaru.',
                'address' => 'Jl. Galaxy No. 12, Senapelan',
                'city' => 'Pekanbaru',
                'phone' => '081234567890',
                'whatsapp' => '6281234567890',
                'email' => 'galaxy@piyohkopi.com',
                'google_maps_url' => 'https://maps.google.com',
                'instagram_url' => 'https://instagram.com/piyohkopi.galaxy',
                'opening_hours' => 'Setiap Hari: 08:00 - 23:00 WIB',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        Outlet::updateOrCreate(
            ['slug' => 'bekasi'],
            [
                'name' => 'Piyoh Kopi Bekasi',
                'description' => 'Outlet cabang Bekasi dengan ruang outdoor yang luas cocok untuk nongkrong dan nugas.',
                'address' => 'Jl. Boulevard Raya Blok AA, Bekasi Barat',
                'city' => 'Bekasi',
                'phone' => '081298765432',
                'whatsapp' => '6281298765432',
                'email' => 'bekasi@piyohkopi.com',
                'google_maps_url' => 'https://maps.google.com',
                'instagram_url' => 'https://instagram.com/piyohkopi.bekasi',
                'opening_hours' => 'Setiap Hari: 09:00 - 24:00 WIB',
                'is_active' => true,
                'sort_order' => 2,
            ]
        );
    }
}
