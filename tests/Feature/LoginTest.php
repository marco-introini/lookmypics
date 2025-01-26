<?php

use App\Livewire\LoginComponent;
use App\Models\User;
use function Pest\Laravel\get;

test('login page contains Livewire', function (): void {
    get(route('login'))
        ->assertSeeLivewire(LoginComponent::class);
});

test('a user can login', function (): void {
    $user = User::factory()->create([
        'password' => 'password',
    ]);

    Livewire::test(LoginComponent::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect(\App\Livewire\DashboardComponent::class);
    expect(Auth::check())->toBeTrue();
});

test('a unverified user cannot login', function (): void {
    $user = User::factory()->unverified()->create([
        'password' => 'password',
    ]);

    Livewire::test(LoginComponent::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertNoRedirect();
    expect(Auth::check())->toBeFalse();
});

test('random email cannot login', function (): void {
    Livewire::test(LoginComponent::class)
        ->set('email', 'email@email.com')
        ->set('password', 'password')
        ->call('login')
        ->assertNoRedirect();
    expect(Auth::check())->toBeFalse();
});
