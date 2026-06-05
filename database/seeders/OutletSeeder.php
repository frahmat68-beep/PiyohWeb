<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        // Galaxy - Valid public data
        Outlet::updateOrCreate(
            ['slug' => 'galaxy'],
            [
                'name' => 'Piyoh Kopi Galaxy',
                'description' => 'Piyoh Kopi Galaxy adalah coffee shop di area Jaka Setia, Bekasi Selatan, dengan suasana nyaman untuk menikmati kopi, manual brew, pastry, takeaway, dan berkumpul.',
                'address' => 'Jalan Lotus Timur. RSO D No. 31, RT.004/RW.019, Jaka Setia, Bekasi Selatan, Bekasi, West Java 17147, Indonesia',
                'city' => 'Bekasi',
                'phone' => '0812-3999-9731',
                'whatsapp' => '6281239999731',
                'instagram_url' => 'https://instagram.com/piyohkopi',
                'opening_hours' => 'Setiap Hari: 08:00 - 23:30 WIB',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        // Bekasi - Pending validation (no address/contact yet)
        Outlet::updateOrCreate(
            ['slug' => 'bekasi'],
            [
                'name' => 'Piyoh Kopi Bekasi',
                'description' => 'Data outlet sedang menunggu konfirmasi resmi dari pihak Piyoh Kopi.',
                'address' => 'Menunggu konfirmasi alamat resmi',
                'city' => 'Bekasi',
                'phone' => null,
                'whatsapp' => null,
                'instagram_url' => 'https://instagram.com/piyohkopi',
                'opening_hours' => 'Menunggu konfirmasi',
                'is_active' => false,
                'sort_order' => 2,
            ]
        );
    }
}
