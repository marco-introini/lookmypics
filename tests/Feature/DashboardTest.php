<?php

use App\Livewire\DashboardComponent;
use App\Models\User;
use function Pest\Laravel\get;

test('dashboard page contains Livewire', function (): void {
    $user = User::factory()->create();
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertSeeLivewire(DashboardComponent::class);
});

test('dashboard page is unauthorized for non active users', function (): void {
    $user = User::factory()->unverified()->create();
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertUnauthorized();
});

test('dashboard page is unauthorized for ADMIN users', function (): void {
    $user = User::factory()->admin()->create();
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertUnauthorized();
});

test('dashboard page redirect to login page for not logged user', function (): void {
    $user = User::factory()->unverified()->create();;

    get(route('dashboard'))
        ->assertRedirect(route('login'));
});
