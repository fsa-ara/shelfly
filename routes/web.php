<?php

use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

                Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
                    ->name('password.request');
                Route::post('/forgot-password', [ForgotPasswordController::class, 'send'])
                    ->name('password.email');
                Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])
                    ->name('password.reset');
                Route::post('/reset-password', [ResetPasswordController::class, 'update'])
                    ->name('password.update');
            });

        Route::middleware('auth')
            ->group(function () {
                Route::post('/sign-out', [LogoutController::class, 'deauthenticate'])
                    ->name('logout.deauthenticate');

                Route::middleware('unverified')
                    ->group(function () {
                        Route::get('/email/verify', [EmailVerificationController::class, 'index'])
                            ->name('verification.notice');
                        Route::post('/email/verify', [EmailVerificationController::class, 'send'])
                            ->middleware('throttle:3,1')
                            ->name('verification.send');
                        Route::get('/email/verify/{uuid}/{hash}', [EmailVerificationController::class, 'verify'])
                            ->middleware('signed')
                            ->name('verification.verify');
                    });
            });
    });

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::prefix('account')
            ->group(function () {
                Route::get('/profile', [ProfileController::class, 'index'])
                    ->name('profile');
                Route::post('/profile/informations', [ProfileController::class, 'updateInformations'])
                    ->name('profile.update.informations');
                Route::post('/profile/security', [ProfileController::class, 'updateSecurity'])
                    ->name('profile.update.security');
                Route::post('/profile/delete', [ProfileController::class, 'delete'])
                    ->name('profile.delete');
            });
    });
