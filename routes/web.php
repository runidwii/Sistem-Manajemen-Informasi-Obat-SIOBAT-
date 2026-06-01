<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\RelokasiController;
use App\Http\Controllers\ObatSampahController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputController;
use App\Models\Persediaan;

Route::resource('obat', ObatController::class);
Route::resource('permintaan', PermintaanController::class);
Route::resource('penerimaan', PenerimaanController::class);
Route::resource('relokasi', RelokasiController::class);
Route::get('/input', [InputController::class, 'index'])
    ->name('input.index');
Route::resource('obatsampah', ObatSampahController::class);
Route::resource('pemakaian', PemakaianController::class);
Route::resource('persediaan', PersediaanController::class);
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/status-persediaan', function () {
    $persediaan = Persediaan::with('obat')->get();
    return view('statuspersediaan.index', compact('persediaan'));
})->name('statuspersediaan.index');    

Route::get('/', function () {
    return view('welcome');

});
