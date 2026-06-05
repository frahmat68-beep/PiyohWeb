<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'key',
        'type',
        'value',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the decoded value based on type.
     */
    public function getDecodedValueAttribute(): mixed
    {
        return match ($this->type) {
            'json' => json_decode($this->value, true),
            'boolean' => (bool) $this->value,
            default => $this->value,
        };
    }
}
