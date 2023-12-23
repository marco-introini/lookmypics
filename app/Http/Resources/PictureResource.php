<?php

namespace App\Http\Resources;

use App\Models\Picture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Picture */
class PictureResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array<string, string|Carbon|int|null>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'album_id' => $this->album_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
