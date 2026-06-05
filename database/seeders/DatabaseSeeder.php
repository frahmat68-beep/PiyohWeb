<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            OutletSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            MenuCategorySeeder::class,
            MenuItemSeeder::class,
        ]);
    }
}
