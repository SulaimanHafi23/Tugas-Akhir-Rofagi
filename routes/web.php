<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\NodeMCUController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;


Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login-submit', [UserController::class, 'login'])->name('login_submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', [BerandaController::class, 'index'])->name('beranda');

    Route::get('/produk', [ProdukController::class, 'index'])->name('tampil_produk');
    Route::get('/tambah-produk', [ProdukController::class, 'create'])->name('tambah_produk');
    Route::post('/produk-submit', [ProdukController::class, 'store'])->name('store_produk');
    Route::get('/edit-produk/{id}', [ProdukController::class, 'edit'])->name('edit_produk');
    Route::put('/update-produk/{id}', [ProdukController::class, 'update'])->name('update_produk');
    Route::delete('/delete-produk/{id}', [ProdukController::class, 'delete'])->name('delete_produk');

    Route::get('/produksi', [ProduksiController::class, 'index'])->name('tampil_produksi');
    Route::get('/tambah-produksi', [ProduksiController::class, 'create'])->name('tambah_produksi');
    Route::post('/produksi-submit', [ProduksiController::class, 'store'])->name('store_produksi');
    Route::post('/produksi-start', [ProduksiController::class, 'start'])->name('start_produksi');
    Route::post('/produksi-selesai', [ProduksiController::class, 'selesai'])->name('selesai_produksi');
    Route::post('/produksi-reset', [ProduksiController::class, 'reset'])->name('reset_produksi');
    Route::get('/produksi/{tanggal}/detail', [ProduksiController::class, 'detail'])->name('detail_produksi');
    Route::delete('/produksi/{id}/hapus', [ProduksiController::class, 'delete'])->name('delete_produksi');
});