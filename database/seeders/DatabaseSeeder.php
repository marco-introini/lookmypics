<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Picture;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'role' => UserRole::USER
        ]);

        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => UserRole::ADMIN
        ]);

        User::factory()->unverified()->create([
            'name' => 'Unverified',
            'email' => 'unverified@example.com',
            'password' => 'password',
            'role' => UserRole::USER
        ]);

        Picture::factory(30)->create();

    }
}
