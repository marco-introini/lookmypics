<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Activity */
class ActivityResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array<string, Carbon|int|string|null>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'log_message' => $this->log_message,
            'model' => $this->model,
            'model_id' => $this->model_id,
            'created_at' => $this->created_at,
        ];
    }
}
