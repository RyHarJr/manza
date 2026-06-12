<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
  return view('landing');
});

Route::middleware('guest')->group(function () {
  Route::get('login', [AuthController::class, 'showLogin'])->name('login');
  Route::post('login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('kasir', [KasirController::class, 'index'])->name('kasir.index');
  Route::post('kasir', [KasirController::class, 'store'])->name('kasir.store');

  Route::resource('pemasok', PemasokController::class);
  Route::resource('produk', ProdukController::class);
  Route::resource('pelanggan', PelangganController::class);
  Route::resource('karyawan', KaryawanController::class);
  Route::resource('gudang', GudangController::class);
  Route::resource('transaksi', TransaksiController::class);
  Route::resource('detail-transaksi', DetailTransaksiController::class);
});

Route::middleware(['auth', 'superadmin'])->group(function () {
  Route::resource('users', UserController::class)->except(['show']);
});

