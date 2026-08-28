<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable()->change();
        });

        Schema::table('menu_item_outlet', function (Blueprint $table) {
            $table->decimal('price_override', 10, 2)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->default(0)->nullable(false)->change();
        });

        Schema::table('menu_item_outlet', function (Blueprint $table) {
            $table->decimal('price_override', 10, 2)->default(0)->nullable(false)->change();
        });
    }
};
