<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
use App\Models\Jenis_pembayaran;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthenticateController::class, 'indexGuest']);
Route::post('/login', [AuthenticateController::class, 'loginGuest']);
Route::post('/logout', [AuthenticateController::class, 'logoutGuest']);
Route::get('/data_siswa', [SiswaController::class, 'dataSiswa']);
Route::get('/data_siswa/edit/{id}', [SiswaController::class, 'editDataSiswa']);
Route::put('/data_siswa/{id}/update', [SiswaController::class, 'updateDataSiswa']);
Route::get('/data_spp/{id}', [SiswaController::class, 'dataSPP']);
// Create
Route::put('/persyaratan/ijazah/{id}/update', [PersyaratanController::class, 'uploadIjazah']);
Route::put('/persyaratan/kartu-keluarga/{id}/update', [PersyaratanController::class, 'uploadKK']);
Route::put('/persyaratan/akte-kelahiran/{id}/update', [PersyaratanController::class, 'uploadAkte']);

// Delete
Route::get('/persyaratan/ijazah/{id}/delete', [PersyaratanController::class, 'deleteIjazah']);
Route::get('/persyaratan/kartu-keluarga/{id}/delete', [PersyaratanController::class, 'deleteKK']);
Route::get('/persyaratan/akte-kelahiran/{id}/delete', [PersyaratanController::class, 'deleteAkte']);

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/admin/login', [AuthenticateController::class, 'indexAdmin'])->name('login.admin');
Route::post('/admin/login', [AuthenticateController::class, 'loginAdmin']);
Route::post('/admin/logout', [AuthenticateController::class, 'logoutAdmin'])->middleware('auth');


Route::get('/admin/tahun-ajaran', [TahunAjaranController::class, 'index']);
Route::post('/admin/tahun-ajaran/create', [TahunAjaranController::class, 'store']);

Route::get('/admin/program-studi', [ProdiController::class, 'index']);
Route::post('/admin/program-studi/create', [ProdiController::class, 'store']);

Route::get('/admin/kelas', [KelasController::class, 'index']);
Route::post('/admin/kelas/create', [KelasController::class, 'store']);

Route::get('/admin/jenis-pembayaran', [JenisPembayaranController::class, 'index']);
Route::post('/admin/jenis-pembayaran', [JenisPembayaranController::class, 'store']);

Route::get('/admin/siswa', [SiswaController::class, 'index']);
Route::post('/admin/siswa/create', [SiswaController::class, 'store']);

Route::get('/admin/pembayaran', [PembayaranController::class, 'index']);
Route::post('/admin/pembayaran', [PembayaranController::class, 'store']);
Route::get('/admin/pembayaran/detail/{id}/show', [PembayaranController::class, 'show']);

Route::get('/admin/laporan', [LaporanController::class, 'index']);
Route::get('/admin/laporan/generate-pdf', [LaporanController::class, 'generatePDF'])->name('laporan.pdf.generate');