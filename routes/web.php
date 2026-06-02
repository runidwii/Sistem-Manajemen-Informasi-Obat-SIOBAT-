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
use App\Http\Controllers\InputController;
use App\Http\Controllers\StatuspersediaanController;
use App\Models\Persediaan;

Route::resource('obat', ObatController::class);
Route::resource('permintaan', PermintaanController::class);
Route::resource('penerimaan', PenerimaanController::class);
Route::resource('relokasi', RelokasiController::class);

Route::get('/obatsampah', [ObatsampahController::class, 'index'])
    ->name('obatsampah.index');
Route::get('/obatsampah/rusak', [ObatsampahController::class, 'rusak'])
    ->name('obatrusak.index');
Route::get('/obatsampah/rusak/create', [ObatsampahController::class, 'rusakCreate'])
    ->name('obatrusak.create');
Route::get('/obatsampah/kadaluwarsa', [ObatsampahController::class, 'kadaluwarsa'])
    ->name('obatkadaluwarsa.index');
Route::get('/obatsampah/kadaluwarsa/create', [ObatsampahController::class, 'kadaluwarsaCreate'])
    ->name('obatkadaluwarsa.create');

Route::resource('pemakaian', PemakaianController::class);
Route::resource('persediaan', PersediaanController::class);
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/persediaanobat', [PersediaanObatController::class, 'index'])
    ->name('persediaanobat.index');
Route::get('/pemantauanpermintaan', [PemantauanPermintaanController::class, 'index'])
    ->name('pemantauanpermintaan.index');

Route::get('/input', [InputController::class, 'index'])
    ->name('input.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/status-persediaan', [StatuspersediaanController::class, 'index'])
    ->name('statuspersediaan.index');

Route::get('/status-persediaan/create', [StatuspersediaanController::class, 'create'])
    ->name('statuspersediaan.create');

Route::post('/status-persediaan', [StatuspersediaanController::class, 'store'])
    ->name('statuspersediaan.store');

Route::get('/', function () {
    return view('welcome');

});
