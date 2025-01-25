<?php

use App\Livewire\Login;
use App\Livewire\Registration;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/register', Registration::class)
    ->name('registration');
Route::get('/login', Login::class)
    ->name('login');

Route::middleware('auth')->group(function () {
   Route::get('/dashboard', )
    ->name('dashboard');
});
