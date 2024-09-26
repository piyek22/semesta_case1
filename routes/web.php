<?php
use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/obats',[ObatController::class,'loadAllObats']);
Route::get('/add/obat',[ObatController::class,'loadAllObatsForm']);

Route::post('/add/obat',[ObatController::class,'AddObat'])->name('AddObat');
Route::get('/edit/{id}',[ObatController::class,'loadEditForm']);
Route::get('/delete/{id}',[ObatController::class,'deleteUser']);
Route::post('/edit/obat',[ObatController::class,'EditObat'])->name('EditObat');
