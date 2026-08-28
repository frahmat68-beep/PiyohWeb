<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get royalty-free default placeholder image URL per category.
     */
    public function getDefaultPlaceholderUrl(): ?string
    {
        return match ($this->slug) {
            'hot-coffee', 'iced-coffee' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=600',
            'non-coffee' => 'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?q=80&w=600',
            'signature-drink' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=600',
            'manual-brew' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=600',
            'artisan-tea', 'iced-tea' => 'https://images.unsplash.com/photo-1576092768241-dec231879fc3?q=80&w=600',
            'blended' => 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?q=80&w=600',
            'baristas-present' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?q=80&w=600',
            'choco-series' => 'https://images.unsplash.com/photo-1542990253-0d0f5be5f0ed?q=80&w=600',
            default => null,
        };
    }
}
