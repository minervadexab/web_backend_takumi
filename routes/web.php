<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\WebDashboardController;

// Rute halaman login
Route::get('/', function () {
    return view('pages.auth.login');
})->name('loginform');

// Rute proses login
Route::post('/login', [AuthController::class, 'proseslogin'])->name('proses');
Route::get('/login', function () {
    return view('auth.login');
})->name('loginform');

// Rute dashboard, hanya dapat diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [WebDashboardController::class, 'index'])->name('dashboard');
    // Rute logout
    Route::post('/logout', [WebDashboardController::class, 'logout'])->name('logout');
});
