<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PictureApiController;
use Illuminate\Support\Facades\Route;

Route::resource('/pictures', PictureApiController::class)
    ->middleware('auth:sanctum');

Route::post('/login', LoginController::class);
