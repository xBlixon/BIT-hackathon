<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'user_id',
    ];

    // relationship: event-creator
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relationship: event-attending users
    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // relationship: event-tags
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function fetchByTags(Collection $tags): \Illuminate\Database\Eloquent\Builder
    {
        return self::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('tags.id', $tags->pluck('id'));
        });
    }
}
