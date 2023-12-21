<?php

namespace App\Observers;

use App\Models\Album;

class AlbumObserver
{
    public function creating(Album $album): void
    {
        if (auth()->check()){
            $album->user_id = auth()->id();
        }
    }

    public function updating(Album $album): void
    {
        if (auth()->check()){
            $album->user_id = auth()->id();
        }
    }
}
