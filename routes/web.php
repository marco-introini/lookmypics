<?php

use App\Http\Middleware\ActiveUserMiddleware;
use App\Livewire\DashboardComponent;
use App\Livewire\LoginComponent;
use App\Livewire\PictureComponent;
use App\Livewire\RegistrationComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::get('/register', RegistrationComponent::class)
    ->name('registration');
Route::get('/login', LoginComponent::class)
    ->name('login');
Route::get('/logout', function () {
    auth()->logout();
    Flux::toast('You have been logged out.');
    return redirect()->route('login');
})->name('logout');

Route::middleware(['auth', ActiveUserMiddleware::class])->group(function (): void {
    Route::get('/dashboard', DashboardComponent::class)
        ->name('dashboard');
});

Route::get('p/{uuid}', PictureComponent::class);
