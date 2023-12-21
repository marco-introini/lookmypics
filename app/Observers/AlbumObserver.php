<?php

namespace App\Observers;

use App\Models\Album;
use Ramsey\Uuid\Uuid;

class AlbumObserver
{
    public function creating(Album $album): void
    {
        $album->uuid = Uuid::uuid4()->toString();
        if (auth()->check()){
            $album->user_id = auth()->id();
        }
    }

}
