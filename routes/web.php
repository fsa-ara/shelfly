<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Pages\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::prefix('/account')
    ->group(function () {
        Route::get('/sign-in', [LoginController::class, 'index'])
            ->middleware('guest')
            ->name('login');
        Route::post('/sign-in', [LoginController::class, 'authenticate']);
        Route::get('/sign-up', [RegisterController::class, 'index'])
            ->middleware('guest')
            ->name('register');
        Route::post('/sign-up', [RegisterController::class, 'create']);
        Route::post('/sign-out', [LogoutController::class, 'deauthenticate'])
            ->name('logout');

        Route::get('/email/verify', [EmailVerificationController::class, 'index'])
            ->middleware('auth')
            ->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'validate'])
            ->middleware(['auth', 'signed'])
            ->name('verification.verify');
        Route::post('/email/verify', [EmailVerificationController::class, 'resend'])
            ->middleware(['auth', 'throttle:3,1'])
            ->name('verification.send');

        Route::get('password/verify', [ForgotPasswordController::class, 'index'])
            ->middleware('guest')
            ->name('password.request');
        Route::post('password/verify', [ForgotPasswordController::class, 'send'])
            ->middleware('guest')
            ->name('password.email');
        Route::get('password/reset/{token}', [ResetPasswordController::class, 'index'])
            ->middleware('guest')
            ->name('password.reset');
        Route::post('password/reset', [ResetPasswordController::class, 'update'])
            ->middleware('guest')
            ->name('password.update');
    });
