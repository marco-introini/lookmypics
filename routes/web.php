<?php

use App\Livewire\Registration;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/register', Registration::class)
    ->name('registration');


