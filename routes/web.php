<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPembayaranController;
use App\Http\Controllers\HomeController;
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
Route::get('/index', [HomeController::class, 'index']);
Route::get('/profile/{id}', [HomeController::class, 'profile']);
Route::get('/profile/edit/{id}', [HomeController::class, 'editProfileSiswa']);
Route::put('/profile/{id}/update', [SiswaController::class, 'updateDataSiswa']);
Route::get('/pembayaran', [HomeController::class, 'pembayaran']);
Route::get('/pembayaran/konfirmasi', [HomeController::class, 'konfirmasiPembayaran'])->name('konfirmasi.pembayaran');
Route::post('/pembayaran/konfirmasi', [HomeController::class, 'storePembayaran']);
Route::get('/riwayat-tagihan/{id}', [HomeController::class, 'riwayatPembayaran']);
Route::get('/riwayat-tagihan/cetak-nota/{id}/generate-pdf', [DetailPembayaranController::class, 'generatePDF']);

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/admin/detail-pembayaran/{id}', [DashboardController::class, 'detailPembayaran']);
Route::put('/admin/detail-pembayaran/{id}/update', [DashboardController::class, 'updatePembayaran']);

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
Route::post('/admin/pembayaran/create', [PembayaranController::class, 'store']);
Route::delete('/admin/pembayaran/{id}/delete', [PembayaranController::class, 'destroy']);
Route::get('/admin/pembayaran/detail/{id}/show', [PembayaranController::class, 'show']);

Route::get('/admin/laporan', [LaporanController::class, 'index']);
Route::get('/admin/laporan/generate-pdf', [LaporanController::class, 'generatePDF'])->name('laporan.pdf.generate');