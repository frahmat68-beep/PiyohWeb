<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use App\Models\MenuCategory;
use App\Models\Outlet;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            // Coffee
            ['name' => 'Kopi Susu Piyoh', 'slug' => 'kopi-susu-piyoh', 'category' => 'coffee', 'base_price' => 28000, 'description' => 'Kopi susu signature Piyoh Kopi'],
            ['name' => 'Ice Caramel Machiato', 'slug' => 'ice-caramel-machiato', 'category' => 'coffee', 'base_price' => 33000, 'description' => 'Espresso dengan caramel dan susu premium'],
            ['name' => 'Hazelnut Latte', 'slug' => 'hazelnut-latte', 'category' => 'coffee', 'base_price' => 33000, 'description' => 'Latte dengan aroma hazelnut yang khas'],
            ['name' => 'Vanilla Latte', 'slug' => 'vanilla-latte', 'category' => 'coffee', 'base_price' => 33000, 'description' => 'Latte dengan sentuhan vanilla yang lembut'],
            ['name' => 'Americano', 'slug' => 'americano', 'category' => 'coffee', 'base_price' => 25000, 'description' => 'Espresso murni dengan air panas'],
            ['name' => 'Cappuccino', 'slug' => 'cappuccino', 'category' => 'coffee', 'base_price' => 28000, 'description' => 'Espresso dengan susu dan foam tebal'],
            ['name' => 'Mocha Cappuccino', 'slug' => 'mocha-cappuccino', 'category' => 'coffee', 'base_price' => 33000, 'description' => 'Cappuccino dengan sentuhan cokelat premium'],
            ['name' => 'Cafe Latte', 'slug' => 'cafe-latte', 'category' => 'coffee', 'base_price' => 28000, 'description' => 'Latte klasik dengan susu hangat premium'],

            // Non Coffee
            ['name' => 'Chocolatte', 'slug' => 'chocolatte', 'category' => 'non-coffee', 'base_price' => 28000, 'description' => 'Minuman cokelat hangat yang nikmat'],
            ['name' => 'Taro', 'slug' => 'taro', 'category' => 'non-coffee', 'base_price' => 33000, 'description' => 'Minuman taro dengan rasa creamy'],
            ['name' => 'Red Velvet', 'slug' => 'red-velvet', 'category' => 'non-coffee', 'base_price' => 33000, 'description' => 'Minuman red velvet yang elegan'],
            ['name' => 'Matcha Jasmine', 'slug' => 'matcha-jasmine', 'category' => 'non-coffee', 'base_price' => 33000, 'description' => 'Perpaduan matcha dan jasmine yang segar'],
            ['name' => 'Ice Klepon', 'slug' => 'ice-klepon', 'category' => 'non-coffee', 'base_price' => 33000, 'description' => 'Minuman klepon es yang menyegarkan'],
            ['name' => 'Ice Ruma Regal', 'slug' => 'ice-ruma-regal', 'category' => 'non-coffee', 'base_price' => 33000, 'description' => 'Minuman ice premium dengan rasa istimewa'],

            // Mocktail
            ['name' => 'Choco Herby', 'slug' => 'choco-herby', 'category' => 'mocktail', 'base_price' => 38000, 'description' => 'Perpaduan cokelat dan herbal yang unik'],
            ['name' => 'Strawberry Herb', 'slug' => 'strawberry-herb', 'category' => 'mocktail', 'base_price' => 38000, 'description' => 'Strawberry fresh dengan sentuhan herbal'],
            ['name' => 'Ice Tropical Blend', 'slug' => 'ice-tropical-blend', 'category' => 'mocktail', 'base_price' => 30000, 'description' => 'Campuran buah tropis yang segar'],

            // Tea
            ['name' => 'Ice Lychee Tea', 'slug' => 'ice-lychee-tea', 'category' => 'tea', 'base_price' => 28000, 'description' => 'Teh dengan rasa lychee yang manis'],
            ['name' => 'Ice Lemon Tea', 'slug' => 'ice-lemon-tea', 'category' => 'tea', 'base_price' => 28000, 'description' => 'Teh lemon es yang segar dan asam'],
            ['name' => 'Teh Tarik Khas Aceh', 'slug' => 'teh-tarik-khas-aceh', 'category' => 'tea', 'base_price' => 25000, 'description' => 'Teh tarik tradisional Aceh yang nikmat'],

            // Paket Kumpul
            ['name' => '5 Gelas Es Kopi Susu Piyoh', 'slug' => '5-gelas-es-kopi-susu-piyoh', 'category' => 'paket-kumpul', 'base_price' => 115000, 'description' => 'Paket hemat untuk berkelompok'],
            ['name' => '2 Es Kopi Susu Piyoh 2 Gelas Es Teh Tarik', 'slug' => '2-kopi-2-teh-tarik', 'category' => 'paket-kumpul', 'base_price' => 90000, 'description' => 'Paket hemat kopi dan teh tarik'],
            ['name' => '1 Es Kopi Susu Piyoh 1 Ice Americano', 'slug' => '1-kopi-1-americano', 'category' => 'paket-kumpul', 'base_price' => 43000, 'description' => 'Paket duo untuk dua orang'],

            // Pastry
            ['name' => 'Cheese Cake Danish', 'slug' => 'cheese-cake-danish', 'category' => 'pastry', 'base_price' => 32000, 'description' => 'Danish dengan cheese cake yang lezat'],
            ['name' => 'Cinnamon Roll', 'slug' => 'cinnamon-roll', 'category' => 'pastry', 'base_price' => 32000, 'description' => 'Roti bergulung dengan cinnamon premium'],
            ['name' => 'Reddish Danish', 'slug' => 'reddish-danish', 'category' => 'pastry', 'base_price' => 32000, 'description' => 'Danish dengan filling reddish yang manis'],
            ['name' => 'Smoked Beef Moza', 'slug' => 'smoked-beef-moza', 'category' => 'pastry', 'base_price' => 32000, 'description' => 'Pastry dengan daging sapi dan moza'],
        ];

        $galaxyOutlet = Outlet::where('slug', 'galaxy')->first();

        foreach ($items as $item) {
            $category = MenuCategory::where('slug', $item['category'])->first();

            if ($category) {
                $menuItem = MenuItem::updateOrCreate(
                    ['slug' => $item['slug']],
                    [
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'base_price' => $item['base_price'],
                        'menu_category_id' => $category->id,
                        'is_active' => true,
                    ]
                );

                // Attach to Galaxy outlet only
                if ($galaxyOutlet && !$menuItem->outlets()->where('outlet_id', $galaxyOutlet->id)->exists()) {
                    $menuItem->outlets()->attach($galaxyOutlet->id, ['is_available' => true]);
                }
            }
        }
    }
}
