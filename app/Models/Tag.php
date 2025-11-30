<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * @return Collection<Tag>
     */
    public static function fetchFromQueryString(array $tags): Collection
    {
        $q = self::query();
        return $q->whereIn('name', $tags)->get();
    }
}
