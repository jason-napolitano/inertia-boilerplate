<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('', Controllers\DashboardController::class)->name('dashboard');
        Route::resource('users', Controllers\UserController::class);
        Route::post('users/photo/{user}', [Controllers\UserController::class, 'uploadPhoto'])->name('users.photo');
    });
});
