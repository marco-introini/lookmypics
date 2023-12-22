<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function ownerUser(): User
    {
        return User::find($this->album->user->id);
    }
    public function getUrl(): string
    {
        // code to generate and return the URL of the picture
    }
    public function isOwnedBy(User $user): bool
    {
        return $this->album->user->id === $user->id;
    }
}
