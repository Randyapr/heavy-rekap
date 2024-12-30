<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanBarangController;
use App\Http\Controllers\PengeluaranBahanController;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\DaftarSupplierController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\LokasiGudangController;
use App\Http\Controllers\KategoriBarangController;
use Illuminate\Support\Facades\Route;

// Route untuk belum login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'auth_login'])->name('auth.login');
});

// Route jika hanya jika user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk semua penggunaa (admin sama user)
    Route::middleware(['admin-user'])->group(function () {
        // Pemasukan Batang
        Route::get('/pemasukan-barang', [PemasukanBarangController::class, 'index'])->name('pemasukan-barang.index');
        Route::get('/pemasukan-barang/create', [PemasukanBarangController::class, 'create'])->name('pemasukan-barang.create');
        Route::post('/pemasukan-barang', [PemasukanBarangController::class, 'store'])->name('pemasukan-barang.store');
        
        // Pengeluaran Barang - Read & Create only weh
        Route::get('/pengeluaran-barang', [PengeluaranBahanController::class, 'index'])->name('pengeluaran-barang.index');
        Route::get('/pengeluaran-barang/create', [PengeluaranBahanController::class, 'create'])->name('pengeluaran-barang.create');
        Route::post('/pengeluaran-barang', [PengeluaranBahanController::class, 'store'])->name('pengeluaran-barang.store');
        
        // Daftar Barang - Read saja Khusussonn user
        Route::get('/daftar-barang', [DaftarBarangController::class, 'index'])->name('daftar-barang.index');
        Route::get('/daftar-barang/create', [DaftarBarangController::class, 'create'])->name('daftar-barang.create');
        Route::post('/daftar-barang', [DaftarBarangController::class, 'store'])->name('daftar-barang.store');

        // Daftar Supplier - Read & Create
        Route::get('/daftar-supplier', [DaftarSupplierController::class, 'index'])->name('daftar-supplier.index');
        Route::get('/daftar-supplier/create', [DaftarSupplierController::class, 'create'])->name('daftar-supplier.create');
        Route::post('/daftar-supplier', [DaftarSupplierController::class, 'store'])->name('daftar-supplier.store');
        Route::get('/daftar-supplier/{id}/edit', [DaftarSupplierController::class, 'edit'])->name('daftar-supplier.edit');
        Route::put('/daftar-supplier/{id}', [DaftarSupplierController::class, 'update'])->name('daftar-supplier.update');
        Route::delete('/daftar-supplier/{id}', [DaftarSupplierController::class, 'destroy'])->name('daftar-supplier.destroy');

        // Stok Barang - Read doang Wabil Khusus User
        Route::get('/stok-barang', [StokBarangController::class, 'index'])->name('stok-barang.index');
        Route::get('/stok-barang/create', [StokBarangController::class, 'create'])->name('stok-barang.create');
        Route::post('/stok-barang', [StokBarangController::class, 'store'])->name('stok-barang.store');

        // Lokasi Gudang
        Route::get('/lokasi-gudang', [LokasiGudangController::class, 'index'])->name('lokasi-gudang.index');
        Route::get('/lokasi-gudang/create', [LokasiGudangController::class, 'create'])->name('lokasi-gudang.create');
        Route::post('/lokasi-gudang', [LokasiGudangController::class, 'store'])->name('lokasi-gudang.store');
        
        // Kategori Barang
        Route::get('/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori-barang.index');
        Route::get('/kategori-barang/create', [KategoriBarangController::class, 'create'])->name('kategori-barang.create');
        Route::post('/kategori-barang', [KategoriBarangController::class, 'store'])->name('kategori-barang.store');
    });

    // Route Wabil khususs admin
    Route::middleware(['admin'])->group(function () {
        // Pemasukan Batang - Update & Delete
        Route::get('/pemasukan-barang/{id}/edit', [PemasukanBarangController::class, 'edit'])->name('pemasukan-barang.edit');
        Route::put('/pemasukan-barang/{id}', [PemasukanBarangController::class, 'update'])->name('pemasukan-barang.update');
        Route::delete('/pemasukan-barang/{id}', [PemasukanBarangController::class, 'destroy'])->name('pemasukan-barang.destroy');
        
        // Pengeluaran Barang - Update & Delete admin 
        Route::get('/pengeluaran-barang/{id}/edit', [PengeluaranBahanController::class, 'edit'])->name('pengeluaran-barang.edit');
        Route::put('/pengeluaran-barang/{id}', [PengeluaranBahanController::class, 'update'])->name('pengeluaran-barang.update');
        Route::delete('/pengeluaran-barang/{id}', [PengeluaranBahanController::class, 'destroy'])->name('pengeluaran-barang.destroy');
        
        // Daftar Barang - Update & Delete
        Route::get('/daftar-barang/{id}/edit', [DaftarBarangController::class, 'edit'])->name('daftar-barang.edit');
        Route::put('/daftar-barang/{id}', [DaftarBarangController::class, 'update'])->name('daftar-barang.update');
        Route::delete('/daftar-barang/{id}', [DaftarBarangController::class, 'destroy'])->name('daftar-barang.destroy');

        // Daftar Supplier - Update & Delete
        Route::get('/daftar-supplier/{id}/edit', [DaftarSupplierController::class, 'edit'])->name('daftar-supplier.edit');
        Route::put('/daftar-supplier/{id}', [DaftarSupplierController::class, 'update'])->name('daftar-supplier.update');
        Route::delete('/daftar-supplier/{id}', [DaftarSupplierController::class, 'destroy'])->name('daftar-supplier.destroy');

        // Stok Barang - Update & Delete
        Route::get('/stok-barang/{id}/edit', [StokBarangController::class, 'edit'])->name('stok-barang.edit');
        Route::put('/stok-barang/{id}', [StokBarangController::class, 'update'])->name('stok-barang.update');
        Route::delete('/stok-barang/{id}', [StokBarangController::class, 'destroy'])->name('stok-barang.destroy');

        // Lokasi Gudang
        Route::get('/lokasi-gudang/{id}/edit', [LokasiGudangController::class, 'edit'])->name('lokasi-gudang.edit');
        Route::put('/lokasi-gudang/{id}', [LokasiGudangController::class, 'update'])->name('lokasi-gudang.update');
        Route::delete('/lokasi-gudang/{id}', [LokasiGudangController::class, 'destroy'])->name('lokasi-gudang.destroy');
        
        // Kategori Barang
        Route::get('/kategori-barang/{id}/edit', [KategoriBarangController::class, 'edit'])->name('kategori-barang.edit');
        Route::put('/kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('kategori-barang.update');
        Route::delete('/kategori-barang/{id}', [KategoriBarangController::class, 'destroy'])->name('kategori-barang.destroy');
    });
});

