<?php

namespace App\Observers;

use App\Models\Picture;
use Illuminate\Support\Facades\Log;

class PictureObserver
{
    public function deleted(Picture $picture): void
    {
        // TODO: add file removal

        Log::info("Removed picture {{$picture->id}} {{$picture->name}}");
    }
}
