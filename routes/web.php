<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('account')
    ->group(function () {
        Route::get('sign-in', [LoginController::class, 'create'])->name('login');
        Route::post('sign-in', [LoginController::class, 'store'])->name('login.store');
        Route::get('sign-up', [RegisterController::class, 'create'])->name('register');
        Route::post('sign-up', [RegisterController::class, 'store'])->name('register.store');
        Route::post('logout', [LogoutController::class, 'destroy'])->name('logout');
    });
