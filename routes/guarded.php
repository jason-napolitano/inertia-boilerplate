<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        // dashboard ----------------------------------------------------
        Route::get('', Controllers\Dashboard\DashboardController::class)->name('dashboard');

        // users --------------------------------------------------------
        Route::resource('users', Controllers\Dashboard\UserController::class);

        // user image ---------------------------------------------------
        Route::post('users/photo/{user}', [Controllers\Dashboard\UserController::class, 'uploadPhoto'])
            ->name('users.photo');

        Route::delete('users/photo/{user}', [Controllers\Dashboard\UserController::class, 'deletePhoto'])
            ->name('users.photo.delete');
    });
});
