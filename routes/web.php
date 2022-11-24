<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\PelangganAuthController;
use App\Http\Controllers\JenisPaketController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\PesananSistemController;
use App\Http\Controllers\PesananWAController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\KeuanganController;


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
Route::get('/pesanan/{id_paket}', [PaketController::class, 'pesanan'])->name('pesanan')->middleware('auth:pelanggan');
Route::post('/pesanan', [PesananSistemController::class, 'store'])->name('pesanan.store')->middleware('auth:pelanggan');
Route::get('/checkout/{id_pesanan}', [PesananController::class, 'checkout']);

Route::get('/admin/pesanan-sistem', [PesananSistemController::class, 'tampil'])->middleware('auth:admin');
Route::post('/admin/pesanan-sistem/validasi', [PesananSistemController::class, 'validasi_pesanan'])->middleware('auth:admin');
Route::post('/admin/pesanan-sistem/tolak', [PesananSistemController::class, 'tolak_pesanan'])->middleware('auth:admin');
Route::get('/admin/pesanan-sistem/detail/{id_pesanan}', [PesananSistemController::class, 'detail'])->middleware('auth:admin');

Route::get('/admin/pesanan-wa', [PesananWAController::class, 'index'])->middleware('auth:admin');
Route::get('/admin/pesanan-wa/tambah', [PesananWAController::class, 'tambah'])->middleware('auth:admin');
Route::post('/admin/pesanan-wa/tambah', [PesananWAController::class, 'store'])->middleware('auth:admin');

Route::post('/admin/pembayaran', [PembayaranController::class, 'store'])->middleware('auth:admin');

Route::get('/admin/transaksi-sistem', [TransaksiController::class, 'tampil_transaksi_sistem'])->middleware('auth:admin');
Route::get('/admin/transaksi-wa', [TransaksiController::class, 'tampil_transaksi_wa'])->middleware('auth:admin');
Route::get('/admin/transaksi-keluar', [TransaksiController::class, 'tampil_transaksi_keluar'])->middleware('auth:admin');
Route::post('/admin/transaksi-keluar', [TransaksiController::class, 'tambah_transaksi_keluar'])->middleware('auth:admin');

Route::get('/admin/hutang-sistem', [HutangController::class, 'tampil_hutang_sistem'])->middleware('auth:admin');
Route::get('/admin/hutang-wa', [HutangController::class, 'tampil_hutang_wa'])->middleware('auth:admin');

Route::get('/admin/keuangan', [KeuanganController::class, 'index'])->middleware('auth:admin');

Route::get('/admin/jenis-paket/', [JenisPaketController::class, 'tampil'])->middleware('auth:admin');
Route::get('/admin/jenis-paket/tambah', [JenisPaketController::class, 'tambah'])->middleware('auth:admin');
Route::post('/admin/jenis-paket/tambah', [JenisPaketController::class, 'store'])->middleware('auth:admin');

Route::get('/admin/paket/', [PaketController::class, 'paket'])->name('admin.paket')->middleware('auth:admin');
Route::get('/admin/paket/tambah', [PaketController::class, 'tambah'])->name('admin.paket-tambah')->middleware('auth:admin');
Route::post('/admin/paket/tambah', [PaketController::class, 'store'])->name('admin.paket-tambah-store')->middleware('auth:admin');
Route::delete('/admin/paket/hapus/{id_paket}', [PaketController::class, 'destroy'])->name('admin.paket-hapus')->middleware('auth:admin');
Route::get('/admin/paket/edit/{id_paket}', [PaketController::class, 'edit'])->name('admin.paket-edit')->middleware('auth:admin');
Route::post('/admin/paket/edit/{id_paket}', [PaketController::class, 'update'])->name('admin.paket-edit-store')->middleware('auth:admin');
Route::resource('/admin/tes/', PaketController::class);

Route::get('/admin/jenis-barang/', [JenisBarangController::class, 'index'])->middleware('auth:admin');
Route::get('/admin/jenis-barang/tambah', [JenisBarangController::class, 'tambah'])->middleware('auth:admin');
Route::post('/admin/jenis-barang/tambah', [JenisBarangController::class, 'store'])->middleware('auth:admin');

Route::get('/admin/barang/', [BarangController::class, 'index'])->middleware('auth:admin');
Route::get('/admin/barang/tambah', [BarangController::class, 'tambah'])->middleware('auth:admin');
Route::post('/admin/barang/tambah', [BarangController::class, 'store'])->middleware('auth:admin');
Route::get('/admin/barang/edit/{id_barang}', [BarangController::class, 'edit'])->name('admin.barang-edit')->middleware('auth:admin');
Route::post('/admin/barang/edit/{id_barang}', [BarangController::class, 'update'])->name('admin.barang-edit-store')->middleware('auth:admin');

Route::resource('/jenis_barang/', JenisBarangController::class);


/**
 * socialite auth
 */

// Route::get('/auth/google', [PelangganAuthController::class, 'redirectToProvider']);
// Route::get('/auth/google/callback', [PelangganAuthController::class, 'handleProvideCallback']);

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('admin/login', [AdminAuthController::class, 'authenticate'])->name('admin.login-store');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');

require __DIR__.'/auth.php';