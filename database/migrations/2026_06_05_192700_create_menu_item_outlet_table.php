<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_item_outlet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('outlet_id')->constrained()->cascadeOnDelete();
            $table->decimal('price_override', 10, 2)->nullable(); // null = use base_price
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->unique(['menu_item_id', 'outlet_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_item_outlet');
    }
};
