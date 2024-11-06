<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Http\Controllers\AuthController::class, 'index']);
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'index']);

Route::middleware('jwt.auth')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
});
