<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdmin = User::factory()->create([
             'name' => 'Test Super Admin',
             'email' => 'test@example.com',
         ]);
        $superAdmin->super_admin = true;
        $superAdmin->save();

        User::factory(10)->create();
    }
}
