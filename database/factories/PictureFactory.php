<?php

namespace Database\Factories;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PictureFactory extends Factory
{
    protected $model = Picture::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->admin()->create()->id,
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(800,800),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
