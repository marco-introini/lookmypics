<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return BelongsTo<Album,Picture>
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function ownerUser(): ?User
    {
        if (isset($this->album->user))
        {
            return User::find($this->album->user->id);
        }
        return null;
    }

    public function getUrl(): string
    {
        return Storage::url($this->image);
    }
    public function isOwnedBy(User $user): bool
    {
        if (isset($this->album->user))
        {
            return $this->album->user->id === $user->id;
        }
        return false;
    }
}
