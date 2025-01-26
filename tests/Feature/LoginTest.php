<?php

use App\Livewire\LoginComponent;
use App\Models\User;
use function Pest\Laravel\get;

test('login page contains Livewire', function (): void {
    get(route('login'))
        ->assertSeeLivewire(LoginComponent::class);
});

test('a user can login', function (): void {
    $user = User::factory()->create();
    $result = Livewire::test(LoginComponent::class)
        ->set('email', $user->email)
        ->set('password', $user->password)
        ->call('login');
    dump($result);
})->todo();

test('a unverified user cannot login', function (): void {
    $user = User::factory()->create();
    $result = Livewire::test(LoginComponent::class)
        ->set('email', $user->email)
        ->set('password', $user->password)
        ->call('login');
    dump($result);
})->todo();
