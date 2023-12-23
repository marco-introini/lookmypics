<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'uuid' => 'string',
        'settings' => 'array',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('user', function (Builder $query) {
            if (auth()->check()) {
                $query->where('user_id', '=',auth()->user()->id ?? null);
            }
        });
    }

    /**
     * @return BelongsTo<User,Album>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<Picture>
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class, 'album_id');
    }

}
