<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Inertia\Inertia;

Route::get('', Controllers\WelcomeController::class)->name('home');
Route::get('about', Controllers\AboutController::class)->name('about');

// --------------------------------------------------------
require __DIR__ . '/guarded.php';
require __DIR__ . '/auth.php';
