<?php

use App\Models\User;
use function Pest\Laravel\postJson;

test('cannot login with wrong email', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    postJson('api/login', [
        'email' => 'wrong@example.com',
        'password' => $user->password,
    ])->assertStatus(401);
});

test('cannot login with wrong password', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    postJson('api/login', [
        'email' => $user->email,
        'password' => 'wrongPassword',
    ])->assertStatus(401);
});

test('can login with correct data', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    postJson('api/login', [
        'email' => $user->email,
        'password' => 'password',
    ])->assertOk();
});
