<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdmin = User::factory()->create([
            'username' => 'admin',
            'name' => 'Test Super Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        $superAdmin->super_admin = true;
        $superAdmin->save();

        User::factory()->create([
            'username' => 'demo',
            'name' => 'demo',
            'email' => 'demo@example.com',
            'email_verified_at' => now(),
            'super_admin' => false,
            'password' => Hash::make('password')
        ]);

        User::factory(10)->create();

        Album::factory(3)->create();
    }
}
