<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hot Coffee',
                'slug' => 'hot-coffee',
                'description' => 'Kopi panas racikan barista dengan biji kopi pilihan',
                'sort_order' => 1,
            ],
            [
                'name' => 'Iced Coffee',
                'slug' => 'iced-coffee',
                'description' => 'Kopi dingin menyegarkan dengan paduan rasa istimewa',
                'sort_order' => 2,
            ],
            [
                'name' => 'Non Coffee',
                'slug' => 'non-coffee',
                'description' => 'Pilihan minuman creamy dan segar tanpa kopi',
                'sort_order' => 3,
            ],
            [
                'name' => 'Signature Drink',
                'slug' => 'signature-drink',
                'description' => 'Racikan khas dan minuman andalan kreasi Piyoh Kopi',
                'sort_order' => 4,
            ],
            [
                'name' => 'Manual Brew',
                'slug' => 'manual-brew',
                'description' => 'Seduhan manual biji kopi nusantara dan mancanegara pilihan',
                'sort_order' => 5,
            ],
            [
                'name' => 'Artisan Tea',
                'slug' => 'artisan-tea',
                'description' => 'Seduhan daun teh artisan berkualitas dengan aroma menenangkan',
                'sort_order' => 6,
            ],
            [
                'name' => 'Blended',
                'slug' => 'blended',
                'description' => 'Minuman blended frappe segar dengan tekstur lembut',
                'sort_order' => 7,
            ],
            [
                'name' => 'Iced Tea',
                'slug' => 'iced-tea',
                'description' => 'Pilihan es teh segar dengan berbagai varian rasa buah dan susu',
                'sort_order' => 8,
            ],
            [
                'name' => "Barista's Present",
                'slug' => 'baristas-present',
                'description' => 'Kreasi mocktail dan racikan eksklusif dari barista Piyoh Kopi',
                'sort_order' => 9,
            ],
            [
                'name' => 'Choco Series',
                'slug' => 'choco-series',
                'description' => 'Pilihan minuman cokelat premium dengan paduan aneka rasa',
                'sort_order' => 10,
            ],
            [
                'name' => 'Additional',
                'slug' => 'additional',
                'description' => 'Pilihan ekstra espresso, es krim, creamy cream, dan plant-based milk',
                'sort_order' => 11,
            ],
        ];

        foreach ($categories as $cat) {
            MenuCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
