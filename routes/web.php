<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Inertia\Inertia;

    Route::get('', Controllers\WelcomeController::class)->name('home');

// --------------------------------------------------------
require __DIR__ . '/guarded.php';
require __DIR__ . '/auth.php';
