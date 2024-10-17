<?php

use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

// Rute default untuk halaman utama
Route::get('/', [ObatController::class, 'loadAllObats']);

// Menampilkan semua obat
Route::get('/obats', [ObatController::class, 'loadAllObats']);

// Menampilkan form untuk menambahkan obat
Route::get('/add/obat', [ObatController::class, 'loadAllObatsForm']);

// Proses penambahan obat baru
Route::post('/add/obat', [ObatController::class, 'AddObat'])->name('AddObat');

// Menampilkan form edit untuk obat tertentu
Route::get('/edit/{id}', [ObatController::class, 'loadEditForm']);

// Proses pengeditan obat
Route::post('/edit/obat', [ObatController::class, 'EditObat'])->name('EditObat');

// Menghapus obat
Route::get('/delete/{id}', [ObatController::class, 'deleteObat'])->name('DeleteObat');
