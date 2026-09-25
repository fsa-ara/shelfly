<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::prefix('auth')
    ->group(function () {
        Route::middleware('guest')
            ->group(function () {
                Route::get('/sign-in', [LoginController::class, 'index'])
                    ->name('login');
                Route::post('/sign-in', [LoginController::class, 'authenticate'])
                    ->name('login.authenticate');
            });
    });
