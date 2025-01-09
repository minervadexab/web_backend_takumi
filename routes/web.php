<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\WebDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login');
});

route::post('/login', [AuthController::class, 'proseslogin'])->name('proses');
route::get('/login', function () {
        return view('auth.login');
    })->name('loginform');

    Route::get('dashboard', [WebDashboardController::class, 'index'])->name('dashboard');
    // Route::get('/logout', [WebPerusahaanController::class, 'logout'])->name('logout');
