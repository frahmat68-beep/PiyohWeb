<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MenuItem extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'menu_category_id',
        'name',
        'slug',
        'description',
        'base_price',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    public function outlets(): BelongsToMany
    {
        return $this->belongsToMany(Outlet::class, 'menu_item_outlet')
            ->withPivot(['price_override', 'is_available'])
            ->withTimestamps();
    }

    /**
     * Get item price for a specific outlet, fallback to base_price.
     */
    public function getPriceForOutlet(Outlet|int $outlet): float
    {
        $outletId = $outlet instanceof Outlet ? $outlet->id : $outlet;
        $pivot = $this->outlets()->where('outlet_id', $outletId)->first()?->pivot;
        
        return (float) ($pivot && $pivot->price_override !== null ? $pivot->price_override : $this->base_price);
    }

    /**
     * Check if available at a specific outlet.
     */
    public function isAvailableAtOutlet(Outlet|int $outlet): bool
    {
        $outletId = $outlet instanceof Outlet ? $outlet->id : $outlet;
        $pivot = $this->outlets()->where('outlet_id', $outletId)->first()?->pivot;
        
        return $pivot ? (bool) $pivot->is_available : true; // default true if pivot doesn't exist yet
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
