<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Coffee', 'slug' => 'coffee', 'description' => 'Kopi racikan pilihan dengan cita rasa premium', 'sort_order' => 1],
            ['name' => 'Non Coffee', 'slug' => 'non-coffee', 'description' => 'Minuman selain kopi yang lezat dan menyegarkan', 'sort_order' => 2],
            ['name' => 'Mocktail', 'slug' => 'mocktail', 'description' => 'Minuman non-alkohol dengan paduan rasa unik', 'sort_order' => 3],
            ['name' => 'Tea', 'slug' => 'tea', 'description' => 'Berbagai pilihan teh premium', 'sort_order' => 4],
            ['name' => 'Paket Kumpul', 'slug' => 'paket-kumpul', 'description' => 'Paket hemat untuk berkumpul bersama', 'sort_order' => 5],
            ['name' => 'Pastry', 'slug' => 'pastry', 'description' => 'Pastry dan makanan ringan segar setiap hari', 'sort_order' => 6],
        ];

        foreach ($categories as $cat) {
            MenuCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
