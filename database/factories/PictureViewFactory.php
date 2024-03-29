<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\PictureView;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PictureViewFactory extends Factory
{
    protected $model = PictureView::class;

    public function definition(): array
    {
        return [
            'picture_id' => Picture::inRandomOrder()->first() ?? Picture::factory()->create(),
            'ip_address' => $this->faker->ipv4(),
            'browser_info' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
