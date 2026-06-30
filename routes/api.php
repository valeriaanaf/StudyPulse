<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoint REST API Manajemen Tugas Kuliah [cite: 30]
Route::get('/tugas', [TugasController::class, 'index']);            // Endpoint Route API untuk menampilkan semua tugas
Route::post('/tugas', [TugasController::class, 'store']);           // Endpoint Route API untuk membuat tugas baru
Route::put('/tugas/{id}', [TugasController::class, 'update']);      // Endpoint Route API untuk ubah status tugas
Route::delete('/tugas/{id}', [TugasController::class, 'destroy']);  // Endpoint Route API untuk menghapus tugas