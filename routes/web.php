<?php

use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('account')
    ->group(function () {
        Route::get('sign-in', [LoginController::class, 'create'])
            ->name('login');
        Route::post('sign-in', [LoginController::class, 'store'])
            ->name('login.store');
        Route::get('sign-up', [RegisterController::class, 'create'])
            ->name('register');
        Route::post('sign-up', [RegisterController::class, 'store'])
            ->name('register.store');
        Route::post('logout', [LogoutController::class, 'destroy'])
            ->name('logout');

        Route::get('email/verify', [EmailVerifyController::class, 'create'])
            ->middleware(['auth'])
            ->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'handle'])
            ->middleware(['auth', 'signed'])
            ->name('verification.verify');
        Route::post('/email/verify/notification', [EmailVerifyController::class, 'store'])
            ->middleware(['auth', 'throttle:5,1'])
            ->name('verification.send');
    });
