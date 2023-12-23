<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\Picture;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PictureObserver
{

    public function created(Picture $picture): void
    {
        Activity::create([
            'model' => Picture::class,
            'model_id' => $picture->id,
            'log_message' => "Picture {$picture->name} created",
            'user_id' => auth()->user()->id ?? 'ERROR: Unauthenticated!!!',
        ]);
    }

    public function updated(Picture $picture): void
    {
        Activity::create([
            'model' => Picture::class,
            'model_id' => $picture->id,
            'log_message' => "Picture {$picture->name} updated",
            'user_id' => auth()->user()->id ?? 'ERROR: Unauthenticated!!!',
        ]);
    }

    public function deleted(Picture $picture): void
    {
        // TODO: add file removal
        Storage::delete($picture->image);

        Activity::create([
            'model' => Picture::class,
            'model_id' => $picture->id,
            'log_message' => "Picture {$picture->name} removed and file deleted",
            'user_id' => auth()->user()->id ?? 'ERROR: Unauthenticated!!!',
        ]);
    }
}
