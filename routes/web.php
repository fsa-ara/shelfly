<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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
                Route::get('/sign-up', [RegisterController::class, 'index'])
                    ->name('register');
                Route::post('/sign-up', [RegisterController::class, 'store'])
                    ->name('register.store');
            });

        Route::middleware('auth')
            ->group(function () {
                Route::post('/sign-out', [LogoutController::class, 'deauthenticate'])
                    ->name('logout.deauthenticate');
            });
    });
