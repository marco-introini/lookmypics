<?php

use App\Http\Middleware\ActiveUserMiddleware;
use App\Livewire\DashboardComponent;
use App\Livewire\LoginComponent;
use App\Livewire\RegistrationComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/register', RegistrationComponent::class)
    ->name('registration');
Route::get('/login', LoginComponent::class)
    ->name('login');



Route::middleware(['auth', ActiveUserMiddleware::class])->group(function (): void {
   Route::get('/dashboard', DashboardComponent::class)
    ->name('dashboard');
});
