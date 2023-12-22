<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Album;
use Illuminate\Support\Facades\Log;
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

    public function created(Album $album): void
    {
        Activity::create([
            'model' => Album::class,
            'model_id' => $album->id,
            'log_message' => "Album {$album->name} created",
            'user_id' => auth()->user()->id
        ]);
    }

    public function updated(Album $album): void
    {
        Activity::create([
            'model' => Album::class,
            'model_id' => $album->id,
            'log_message' => "Album {$album->name} updated",
            'user_id' => auth()->user()->id
        ]);
    }

}
