<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PelangganAuthController;
use App\Http\Controllers\JenisPaketController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\JenisBarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [JenisPaketController::class, 'index'])->name('dashboard');
Route::post('/', [JenisPaketController::class, 'store']);

Route::get('/jenis-paket/{id_jenis_paket}', [PaketController::class, 'index'])->name('daftar-paket');
Route::get('/paket/{id_paket}', [PaketController::class, 'show'])->name('deskripsi-paket');
Route::get('/pesanan/{id_paket}', [PaketController::class, 'pesanan'])->name('deskripsi-paket');

Route::resource('/admin/paket/', PaketController::class);

Route::resource('/admin/barang/', BarangController::class);
Route::resource('/jenis_barang/', JenisBarangController::class);

Route::get('/auth/google', [PelangganAuthController::class, 'redirectToProvider']);
Route::get('/auth/google/callback', [PelangganAuthController::class, 'handleProvideCallback']);

// Route::get('/', [PelangganAuthController::class, 'index'])
//     ->name('pelanggan.home')
//     ->middleware('auth:web');
// Route::get('/login', [PelangganAuthController::class, 'login'])
//     ->name('pelanggan.login');
// Route::post('/login', [PelangganAuthController::class, 'handleLogin'])
//     ->name('pelanggan.handleLogin');
// Route::get('/logout', [PelangganAuthController::class, 'index'])
//     ->name('pelanggan.logout');

// Route::get('/admin', [AdminAuthController::class, 'index'])
//     ->name('admin.login')
//     ->middleware('guest');
// Route::post('/admin', [AdminAuthController::class, 'authenticate']);
// Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
// Route::get('admin/', [AdminAuthController::class, 'index'])
//     ->name('admin.home')
//     ->middleware('auth:admin');
// Route::get('admin/login', [AdminAuthController::class, 'login'])
//     ->name('admin.login');
// Route::post('admin/login', [AdminAuthController::class, 'handleLogin'])
//     ->name('admin.handleLogin');
// Route::get('admin/logout', [AdminAuthController::class, 'index'])
//     ->name('admin.logout');