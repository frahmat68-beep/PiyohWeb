<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class JobApplication extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'career_id',
        'name',
        'email',
        'phone',
        'cover_letter',
        'status',
        'notes',
    ];

    public function registerMediaCollections(): void
    {
        // For CV/Resume upload
        $this->addMediaCollection('resume')->singleFile();
    }

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}
