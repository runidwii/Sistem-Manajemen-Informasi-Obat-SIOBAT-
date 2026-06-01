<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\RelokasiController;
use App\Http\Controllers\ObatsampahController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersediaanObatController;
use App\Http\Controllers\PemantauanPermintaanController;

Route::resource('obat', ObatController::class);
Route::resource('permintaan', PermintaanController::class);
Route::resource('penerimaan', PenerimaanController::class);
Route::resource('relokasi', RelokasiController::class);
Route::resource('obatsampah', ObatsampahController::class);
Route::resource('pemakaian', PemakaianController::class);
Route::resource('persediaan', PersediaanController::class);
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');

Route::get('/persediaanobat', [PersediaanObatController::class, 'index'])
    ->name('persediaanobat.index');
Route::get('/pemantauanpermintaan', [PemantauanPermintaanController::class, 'index'])
    ->name('pemantauanpermintaan.index');

Route::get('/', function () {
    return view('welcome');
});