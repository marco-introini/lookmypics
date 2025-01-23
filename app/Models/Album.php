<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Picture, $this>
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

}
