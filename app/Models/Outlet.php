<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Outlet extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'city',
        'phone',
        'whatsapp',
        'email',
        'google_maps_url',
        'instagram_url',
        'opening_hours',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile();

        $this->addMediaCollection('gallery');
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class);
    }

    public function menuItems(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(MenuItem::class, 'menu_item_outlet')
            ->withPivot(['price_override', 'is_available'])
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Determine if the outlet is currently open based on opening_hours and Jakarta timezone.
     */
    public function isOpenNow(?\Carbon\CarbonInterface $customTime = null): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if (empty($this->opening_hours)) {
            return (bool) $this->is_active;
        }

        $now = $customTime ? $customTime->copy()->setTimezone('Asia/Jakarta') : \Carbon\Carbon::now('Asia/Jakarta');

        // Match time ranges like 08:00 - 23:30 or 08.00 - 23.30
        if (preg_match('/(\d{1,2})[:.](\d{2})\s*(?:-|–|—|to|sampai)\s*(\d{1,2})[:.](\d{2})/i', $this->opening_hours, $matches)) {
            $startHour = (int) $matches[1];
            $startMin  = (int) $matches[2];
            $endHour   = (int) $matches[3];
            $endMin    = (int) $matches[4];

            $currentMinutes = $now->hour * 60 + $now->minute;
            $startMinutes   = $startHour * 60 + $startMin;
            $endMinutes     = $endHour * 60 + $endMin;

            // Standard daytime operating hours (e.g. 08:00 - 23:30)
            if ($endMinutes >= $startMinutes) {
                return $currentMinutes >= $startMinutes && $currentMinutes < $endMinutes;
            }

            // Overnight operating hours (e.g. 18:00 - 02:00)
            return $currentMinutes >= $startMinutes || $currentMinutes < $endMinutes;
        }

        return (bool) $this->is_active;
    }

    /**
     * Get label for current status: 'Buka', 'Tutup', or 'Nonaktif'.
     */
    public function getStatusLabelAttribute(): string
    {
        if (!$this->is_active) {
            return 'Nonaktif';
        }

        return $this->isOpenNow() ? 'Buka' : 'Tutup';
    }

    /**
     * Get outlet image URL with fallback to local or high-res cafe photo.
     */
    public function getImageUrl(): string
    {
        $photo = $this->getFirstMediaUrl('photo');
        if (!empty($photo)) {
            return $photo;
        }

        if (file_exists(public_path("images/outlets/{$this->slug}.png"))) {
            return asset("images/outlets/{$this->slug}.png");
        }

        if (file_exists(public_path("images/outlets/{$this->slug}.jpg"))) {
            return asset("images/outlets/{$this->slug}.jpg");
        }

        return match ($this->slug) {
            'galaxy' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200',
            'jaktim' => 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=1200',
            default => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200',
        };
    }
}
