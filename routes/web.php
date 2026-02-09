<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneAuthController;

// Authentication Routes
Route::get('/', [PhoneAuthController::class, 'login'])->name('login');
Route::post('/login', [PhoneAuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [PhoneAuthController::class, 'logout'])->name('logout');

// Dashboard (Protected)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
