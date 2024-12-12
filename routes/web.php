<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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

Route::middleware(['user'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::prefix('personal')->name('personal.')->group(function () {
        Route::get('/', function () {
            return view('personal.index');
        })->name('index');

        Route::prefix('articles')->controller(ArticleController::class)->name('articles.')->group(function () {
            Route::get('/', 'personalIndex')->name('index');
        });
    });

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');

        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');

        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('articles')->controller(ArticleController::class)->name('articles.')->group(function () {
        Route::get('/', 'index')->name('index');

        Route::post('/update', 'update')->name('update');
    });
});
