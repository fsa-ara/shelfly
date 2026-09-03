<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('account')
    ->group(function () {
        Route::get('sign-in', [LoginController::class, 'index'])
            ->middleware('guest')
            ->name('auth.login');
        Route::post('sign-in', [LoginController::class, 'authenticate']);
    });
