<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

// Rute default
Route::get('/', function () {
    return redirect('/obats'); // Mengarahkan ke halaman daftar obat
});

// Rute lainnya
Route::get('/obats', [ObatController::class, 'loadAllObats']);
Route::get('/add/obat', [ObatController::class, 'loadAllObatsForm']);
Route::post('/add/obat', [ObatController::class, 'AddObat'])->name('AddObat');
Route::get('/edit/{id}', [ObatController::class, 'loadEditForm']);
Route::post('/edit/obat', [ObatController::class, 'EditObat'])->name('EditObat');
Route::get('/delete/{id}', [ObatController::class, 'deleteObat'])->name('DeleteObat');
