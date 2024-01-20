<?php

use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

/** profile route */

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])
    ->name('profile.update');