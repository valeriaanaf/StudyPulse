<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
// Import juga controller utama/dashboard milikmu di sini jika ada

// Rute untuk Pengguna yang BELUM Login (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Rute untuk Pengguna yang SUDAH Login (Protected)
Route::middleware('auth')->group(function () {
    
    // MASUKKAN/PINDAHKAN rute utama 
    Route::get('/', function () {
        return view('index');
    });

    // Rute Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});