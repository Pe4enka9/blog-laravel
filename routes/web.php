<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::controller(RegisterController::class)->name('register.')->group(function () {
        Route::get('/register', 'show')->name('show');
        Route::post('/register', 'store')->name('store');
    });

    Route::controller(LoginController::class)->name('login.')->group(function () {
        Route::get('/login', 'show')->name('show');
        Route::post('/login', 'store')->name('store');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
