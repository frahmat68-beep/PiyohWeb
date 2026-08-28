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
            // 1. Hot Coffee (9 items)
            ['name' => 'Americano', 'slug' => 'americano-hot', 'category' => 'hot-coffee', 'base_price' => 27000, 'description' => 'Espresso murni diseduh air panas dengan crema lembut'],
            ['name' => 'Cappuccino', 'slug' => 'cappuccino-hot', 'category' => 'hot-coffee', 'base_price' => 30000, 'description' => 'Espresso dengan steamed milk dan foam tebal'],
            ['name' => 'Cafe Latte', 'slug' => 'cafe-latte-hot', 'category' => 'hot-coffee', 'base_price' => 30000, 'description' => 'Latte klasik dengan susu hangat bertekstur halus'],
            ['name' => 'Magic', 'slug' => 'magic-hot', 'category' => 'hot-coffee', 'base_price' => 35000, 'description' => 'Double ristretto dengan takaran susu hangat pas khas Melbourne'],
            ['name' => 'Dirty Latte', 'slug' => 'dirty-latte', 'category' => 'hot-coffee', 'base_price' => 35000, 'description' => 'Espresso hangat pekat di atas susu dingin kental'],
            ['name' => 'Caramel Latte', 'slug' => 'caramel-latte-hot', 'category' => 'hot-coffee', 'base_price' => 32000, 'description' => 'Latte hangat dengan sentuhan sirup karamel manis harum'],
            ['name' => 'Hazelnut Latte', 'slug' => 'hazelnut-latte-hot', 'category' => 'hot-coffee', 'base_price' => 32000, 'description' => 'Latte hangat berpadu aroma gurih kacang hazelnut'],
            ['name' => 'Vanilla Latte', 'slug' => 'vanilla-latte-hot', 'category' => 'hot-coffee', 'base_price' => 32000, 'description' => 'Latte hangat dengan aroma vanila manis lembut'],
            ['name' => 'Mochaccino', 'slug' => 'mochaccino-hot', 'category' => 'hot-coffee', 'base_price' => 33000, 'description' => 'Paduan kopi espresso, cokelat pekat, dan susu hangat'],

            // 2. Iced Coffee (9 items)
            ['name' => 'Affogato', 'slug' => 'affogato', 'category' => 'iced-coffee', 'base_price' => 28000, 'description' => 'Satu scoop es krim vanila disiram double shot espresso panas'],
            ['name' => 'Iced Black', 'slug' => 'iced-black', 'category' => 'iced-coffee', 'base_price' => 27000, 'description' => 'Kopi hitam espresso dingin segar tanpa gula'],
            ['name' => 'Iced White', 'slug' => 'iced-white', 'category' => 'iced-coffee', 'base_price' => 30000, 'description' => 'Espresso berpadu susu segar dingin yang creamy'],
            ['name' => 'Mochaccino', 'slug' => 'mochaccino-iced', 'category' => 'iced-coffee', 'base_price' => 33000, 'description' => 'Es kopi espresso dengan cokelat premium dan susu segar'],
            ['name' => 'Americano Peach', 'slug' => 'americano-peach', 'category' => 'iced-coffee', 'base_price' => 32000, 'description' => 'Americano dingin dengan ekstrak buah peach alami yang segar'],
            ['name' => 'Caramel Latte', 'slug' => 'caramel-latte-iced', 'category' => 'iced-coffee', 'base_price' => 32000, 'description' => 'Es latte dengan sentuhan sirup karamel manis legit'],
            ['name' => 'Hazelnut Latte', 'slug' => 'hazelnut-latte-iced', 'category' => 'iced-coffee', 'base_price' => 32000, 'description' => 'Es latte beraroma kacang hazelnut yang harum'],
            ['name' => 'Vanilla Latte', 'slug' => 'vanilla-latte-iced', 'category' => 'iced-coffee', 'base_price' => 32000, 'description' => 'Es latte lembut berpadu aroma vanila manis'],
            ['name' => 'Caramel Macchiato', 'slug' => 'caramel-macchiato', 'category' => 'iced-coffee', 'base_price' => 33000, 'description' => 'Es susu vanila berlapis espresso pekat dan saus karamel'],

            // 3. Non Coffee (4 items)
            ['name' => 'Matcha', 'slug' => 'matcha', 'category' => 'non-coffee', 'base_price' => 32000, 'description' => 'Matcha murni dengan susu segar bertekstur lembut'],
            ['name' => 'Taro', 'slug' => 'taro', 'category' => 'non-coffee', 'base_price' => 32000, 'description' => 'Minuman taro ungu manis gurih dengan cita rasa creamy'],
            ['name' => 'Red Velvet', 'slug' => 'red-velvet', 'category' => 'non-coffee', 'base_price' => 32000, 'description' => 'Minuman red velvet lembut beraroma kakao dan vanila'],
            ['name' => 'Strawberry Cheesecake', 'slug' => 'strawberry-cheesecake', 'category' => 'non-coffee', 'base_price' => 32000, 'description' => 'Kombinasi rasa strawberry segar dan gurihnya cheesecake'],

            // 4. Signature Drink (7 items)
            ['name' => 'Kopi Susu Piyoh', 'slug' => 'kopi-susu-piyoh', 'category' => 'signature-drink', 'base_price' => 28000, 'is_featured' => true, 'description' => 'Kopi susu signature Piyoh Kopi dengan gula aren racikan istimewa'],
            ['name' => 'Teh Tarik', 'slug' => 'teh-tarik', 'category' => 'signature-drink', 'base_price' => 25000, 'description' => 'Teh tarik racikan autentik khas nusantara berbusa lembut'],
            ['name' => 'Kelepon', 'slug' => 'kelepon', 'category' => 'signature-drink', 'base_price' => 30000, 'description' => 'Minuman bernuansa kue klepon dengan rasa pandan, kelapa, dan gula aren'],
            ['name' => 'Avellana Shake', 'slug' => 'avellana-shake', 'category' => 'signature-drink', 'base_price' => 35000, 'is_featured' => true, 'description' => 'Shake signature dengan paduan rasa hazelnut dan tekstur creamy'],
            ['name' => 'Kopi Susu Blueberry', 'slug' => 'kopi-susu-blueberry', 'category' => 'signature-drink', 'base_price' => 35000, 'description' => 'Kopi susu signature berpadu kesegaran sari buah blueberry'],
            ['name' => 'Kopi Susu Butterscotch', 'slug' => 'kopi-susu-butterscotch', 'category' => 'signature-drink', 'base_price' => 35000, 'is_featured' => true, 'description' => 'Kopi susu signature dengan sirup butterscotch manis gurih'],
            ['name' => 'Kopi Susu Strawberry', 'slug' => 'kopi-susu-strawberry', 'category' => 'signature-drink', 'base_price' => 35000, 'description' => 'Kopi susu signature dengan paduan rasa manis buah strawberry'],

            // 5. Manual Brew (2 items)
            ['name' => 'Local Beans', 'slug' => 'local-beans', 'category' => 'manual-brew', 'base_price' => 33000, 'description' => 'Seduhan manual V60 menggunakan biji kopi nusantara single origin pilihan'],
            ['name' => 'Import Beans', 'slug' => 'import-beans', 'category' => 'manual-brew', 'base_price' => null, 'description' => 'Seduhan manual V60 biji kopi internasional pilihan (harga variatif, silakan tanya barista)'],

            // 6. Artisan Tea (5 items)
            ['name' => 'Tropical Tea', 'slug' => 'tropical-tea', 'category' => 'artisan-tea', 'base_price' => 27000, 'description' => 'Teh artisan aromatik dengan paduan sari buah-buahan tropis'],
            ['name' => 'Flower Tea', 'slug' => 'flower-tea', 'category' => 'artisan-tea', 'base_price' => 27000, 'description' => 'Teh artisan seduhan kelopak bunga alami beraroma menenangkan'],
            ['name' => 'Chamomile Tea', 'slug' => 'chamomile-tea', 'category' => 'artisan-tea', 'base_price' => 27000, 'description' => 'Teh bunga chamomile bebas kafein untuk sensasi relaksasi'],
            ['name' => 'Earl Grey', 'slug' => 'earl-grey', 'category' => 'artisan-tea', 'base_price' => 27000, 'description' => 'Teh hitam klasik beraroma minyak citrus bergamot yang elegan'],
            ['name' => 'Black Tea', 'slug' => 'black-tea', 'category' => 'artisan-tea', 'base_price' => 27000, 'description' => 'Seduhan daun teh hitam murni berkarakter kuat dan pekat'],

            // 7. Blended (5 items)
            ['name' => 'Tropical Blend', 'slug' => 'tropical-blend', 'category' => 'blended', 'base_price' => 30000, 'description' => 'Minuman blended buah tropis segar bertekstur es lembut'],
            ['name' => 'Frapberry', 'slug' => 'frapberry', 'category' => 'blended', 'base_price' => 35000, 'description' => 'Frappe buah berry manis segar berpadu susu creamy'],
            ['name' => 'Cookies and Cream', 'slug' => 'cookies-and-cream', 'category' => 'blended', 'base_price' => 35000, 'description' => 'Blended biskuit cokelat renyah dengan susu vanila manis'],
            ['name' => 'Hazelnut Frappuccino', 'slug' => 'hazelnut-frappuccino', 'category' => 'blended', 'base_price' => 38000, 'description' => 'Kopi frappe berpadu aroma kacang hazelnut dan es serut halus'],
            ['name' => 'Caramel Frappuccino', 'slug' => 'caramel-frappuccino', 'category' => 'blended', 'base_price' => 38000, 'description' => 'Kopi frappe karamel manis bertekstur es lembut'],

            // 8. Iced Tea (7 items)
            ['name' => 'Earl Grey Milk Tea', 'slug' => 'earl-grey-milk-tea', 'category' => 'iced-tea', 'base_price' => 30000, 'description' => 'Es teh Earl Grey berpadu kelembutan susu segar'],
            ['name' => 'Jasmine Milk Tea', 'slug' => 'jasmine-milk-tea', 'category' => 'iced-tea', 'base_price' => 30000, 'description' => 'Es teh melati harum dengan susu segar manis creamy'],
            ['name' => 'Lychee Tea', 'slug' => 'lychee-tea', 'category' => 'iced-tea', 'base_price' => 27000, 'description' => 'Es teh segar dengan aroma dan sari buah leci manis'],
            ['name' => 'Lemon Tea', 'slug' => 'lemon-tea', 'category' => 'iced-tea', 'base_price' => 27000, 'description' => 'Es teh segar berpadu perasan lemon alami yang asam manis'],
            ['name' => 'Peach Tea', 'slug' => 'peach-tea', 'category' => 'iced-tea', 'base_price' => 27000, 'description' => 'Es teh beraroma buah persik manis menyegarkan'],
            ['name' => 'Jasmine Tea', 'slug' => 'jasmine-tea', 'category' => 'iced-tea', 'base_price' => 27000, 'description' => 'Es teh melati klasik dengan wangi bunga alami'],
            ['name' => 'Sweet Ice Tea', 'slug' => 'sweet-ice-tea', 'category' => 'iced-tea', 'base_price' => 23000, 'description' => 'Es teh manis segar khas kedai kopi'],

            // 9. Barista\'s Present (4 items)
            ['name' => 'Noxy Punch', 'slug' => 'noxy-punch', 'category' => 'baristas-present', 'base_price' => 33000, 'is_featured' => true, 'description' => 'Mocktail signature kreasi barista berpadu aneka buah eksotis segar'],
            ['name' => 'Summer Elixir', 'slug' => 'summer-elixir', 'category' => 'baristas-present', 'base_price' => 30000, 'description' => 'Minuman mocktail dingin menyegarkan dengan perpaduan citrus dan soda'],
            ['name' => 'Autumn Sunset', 'slug' => 'autumn-sunset', 'category' => 'baristas-present', 'base_price' => 30000, 'description' => 'Mocktail bergradasi warna hangat dengan perpaduan rasa buah manis asam'],
            ['name' => 'Winter Punch', 'slug' => 'winter-punch', 'category' => 'baristas-present', 'base_price' => 30000, 'description' => 'Kreasi mocktail segar dengan sentuhan cooling aroma rempah lembut'],

            // 10. Choco Series (6 items)
            ['name' => 'Chocolate', 'slug' => 'chocolate', 'category' => 'choco-series', 'base_price' => 32000, 'description' => 'Cokelat pekat klasik racikan khas Piyoh Kopi'],
            ['name' => 'Choco Blueberry', 'slug' => 'choco-blueberry', 'category' => 'choco-series', 'base_price' => 34000, 'description' => 'Minuman cokelat lezat berpadu aroma buah blueberry manis'],
            ['name' => 'Choco Caramel', 'slug' => 'choco-caramel', 'category' => 'choco-series', 'base_price' => 34000, 'description' => 'Cokelat premium dengan sirup karamel manis legit'],
            ['name' => 'Choco Hazelnut', 'slug' => 'choco-hazelnut', 'category' => 'choco-series', 'base_price' => 34000, 'description' => 'Paduan cokelat pekat dan wangi gurih kacang hazelnut'],
            ['name' => 'Choco Strawberry', 'slug' => 'choco-strawberry', 'category' => 'choco-series', 'base_price' => 34000, 'description' => 'Minuman cokelat berpadu kesegaran buah strawberry manis'],
            ['name' => 'Choco Vanilla', 'slug' => 'choco-vanilla', 'category' => 'choco-series', 'base_price' => 34000, 'description' => 'Cokelat creamy lembut dengan aroma vanila manis'],

            // 11. Additional (4 items)
            ['name' => 'Espresso', 'slug' => 'extra-espresso', 'category' => 'additional', 'base_price' => 10000, 'description' => 'Ekstra 1 shot espresso pekat untuk minuman kopi'],
            ['name' => 'Ice Cream', 'slug' => 'extra-ice-cream', 'category' => 'additional', 'base_price' => 5000, 'description' => 'Ekstra 1 scoop es krim vanila manis'],
            ['name' => 'Creamy Cream', 'slug' => 'extra-creamy-cream', 'category' => 'additional', 'base_price' => 5000, 'description' => 'Ekstra topping creamy foam lembut untuk minuman'],
            ['name' => 'Oatside', 'slug' => 'extra-oatside', 'category' => 'additional', 'base_price' => 10000, 'description' => 'Pilihan pengganti susu sapi menggunakan oat milk Oatside'],
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
                        'is_featured' => $item['is_featured'] ?? false,
                    ]
                );

                // Attach to Galaxy outlet
                if ($galaxyOutlet && !$menuItem->outlets()->where('outlet_id', $galaxyOutlet->id)->exists()) {
                    $menuItem->outlets()->attach($galaxyOutlet->id, [
                        'price_override' => $item['base_price'],
                        'is_available' => true,
                    ]);
                }
            }
        }
    }
}
