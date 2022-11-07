<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Auth\SocialiteController;
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

Route::get('/galeri', function () {
    return view('pelanggan.galeri');
})->name('galeri');

Route::get('/tentang-kami', function () {
    return view('pelanggan.tentang-kami');
})->name('tentang-kami');

Route::get('/jenis-paket/{id_jenis_paket}', [PaketController::class, 'index'])->name('daftar-paket');
Route::get('/paket/{id_paket}', [PaketController::class, 'show'])->name('deskripsi-paket');
Route::get('/pesanan/{id_paket}', [PaketController::class, 'pesanan'])->name('deskripsi-paket');

Route::resource('/admin/paket/', PaketController::class);

Route::resource('/admin/barang/', BarangController::class);
Route::resource('/jenis_barang/', JenisBarangController::class);


/**
 * socialite auth
 */

// Route::get('/auth/google', [PelangganAuthController::class, 'redirectToProvider']);
// Route::get('/auth/google/callback', [PelangganAuthController::class, 'handleProvideCallback']);

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::get('admin/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('admin/login', [AdminAuthController::class, 'authenticate']);
Route::post('admin/logout', [AdminAuthController::class, 'logout']);

Route::get('admin/register', [AdminAuthController::class, 'register'])->middleware('guest');
Route::post('admin/register', [AdminAuthController::class, 'post_register']);

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->middleware('auth:admin');

require __DIR__.'/auth.php';