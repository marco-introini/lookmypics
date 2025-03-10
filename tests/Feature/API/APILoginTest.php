<?php

use App\Models\User;

use function Pest\Laravel\postJson;

test('cannot login with wrong email', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    postJson(route('api.login'), [
        'email' => 'wrong@example.com',
        'password' => $user->password,
    ])->assertStatus(401);
});

test('cannot login with wrong password', function (): void {
    $user = User::factory()->create([
        'password' => bcrypt('password'),
    ]);

    postJson(route('api.login'), [
        'email' => $user->email,
        'password' => 'wrongPassword',
    ])->assertStatus(401);
});

test('can login with correct data', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    postJson(route('api.login'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertOk();
});
