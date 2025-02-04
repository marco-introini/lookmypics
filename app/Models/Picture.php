<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    /** @use HasFactory<\Database\Factories\PictureFactory> */
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\Album, $this>
     */
    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }

    public function url(): string
    {
        $url = $this->image;
        if (!stristr($url, 'https')) {
            $url = Storage::disk('media')->temporaryUrl(
                'private/' . $this->image,
                now()->addMinutes(10)
            );
        }

        return $url;
    }
}
