<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('', Controllers\DashboardController::class)->name('dashboard');

        Route::resource('users', Controllers\UserController::class);
        Route::get('users/search', [Controllers\UserController::class, 'search'])->name('users.search');
    });
});
