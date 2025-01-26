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
            'name' => fake()->randomElement(['img', 'dsc', 'Image ']).'jpg',
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->admin()->create()->id,
            'description' => fake()->text(),
            'image' => fake()->imageUrl(random_int(600, 2000), random_int(600, 2000)),
            'rating' => random_int(0, 5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
