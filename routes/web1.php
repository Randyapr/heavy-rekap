<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HeavyObjectController;
use App\Http\Controllers\PemasukanBarangController;
use App\Http\Controllers\PengeluaranBahanController;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\DaftarSupplierController;
use App\Http\Controllers\StokBarangController;


// Ganti controller menjadi HeavyObjectController
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);

Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'useradmin'], function () {
      // Route untuk Dashboard
      Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

      // Route untuk Stok Barang
      Route::get('panel/heavyobject/stok-barang', [HeavyObjectController::class, 'stokBarang'])->name('stok.barang');

      // Route untuk Pemasukan Barang
      Route::get('panel/heavyobject/pemasukan-barang', [HeavyObjectController::class, 'pemasukanBarang'])->name('pemasukan.barang');

      Route::resource('pemasukan-barang', PemasukanBarangController::class);
      // Route untuk Pengeluaran Bahan
      Route::get('panel/heavyobject/pengeluaran-barang', [HeavyObjectController::class, 'pengeluaranBarang'])->name('pengeluaran.barang');
      Route::resource('pengeluaran-barang', PengeluaranBahanController::class);
      Route::get('/pengeluaran-barang', [HeavyObjectController::class, 'pengeluaranBarang'])->name('pengeluaran-barang.index');
      Route::get('/heavyobject/pengeluaran-barang/{id}/edit', [HeavyObjectController::class, 'edit'])->name('heavyobject.edit');
      Route::put('/heavyobject/pengeluaran-barang/{id}', [HeavyObjectController::class, 'update'])->name('heavyobject.update');

      // Example of route definition
      Route::resource('pengeluaran-bahan', 'PengeluaranBahanController');
      Route::resource('pengeluaran-bahan', PengeluaranBahanController::class);

      // Route untuk Rekap Total
      Route::get('panel/heavyobject/rekap-total', [HeavyObjectController::class, 'rekapTotal'])->name('rekap.total');
      Route::resource('pemasukan-barang', PemasukanBarangController::class);
      Route::get('/pemasukan-barang', [HeavyObjectController::class, 'pemasukanBarang'])->name('pemasukan-barang.index');
      // Route Edit Pemasukan Barang
      Route::get('/heavyobject/pemasukan-barang/{id}/edit', [HeavyObjectController::class, 'edit'])->name('heavyobject.edit');
      Route::put('/heavyobject/pemasukan-barang/{id}', [HeavyObjectController::class, 'update'])->name('heavyobject.update');


      // daftar barang
      Route::resource('daftar_barang', DaftarBarangController::class);
      Route::get('panel/heavyobject/master-data/daftar-barang', [HeavyObjectController::class, 'daftarBarang'])->name('daftarBarang');
      Route::get('/master-data/daftar-barang/create', [HeavyObjectController::class, 'createBarang'])->name('createBarang');
      Route::post('/master-data/daftar-barang', [HeavyObjectController::class, 'storeBarang'])->name('storeBarang');
      Route::get('/master-data/daftar-barang/{id}/edit', [HeavyObjectController::class, 'editBarang'])->name('editBarang');
      Route::put('/master-data/daftar-barang/{id}', [HeavyObjectController::class, 'updateBarang'])->name('updateBarang');
      Route::delete('/master-data/daftar-barang/{id}', [HeavyObjectController::class, 'destroyBarang'])->name('destroyBarang');

      // daftar supplier

      Route::resource('daftar_suppliers', DaftarSupplierController::class);
      Route::get('panel/heavyobject/master-data/daftar-supplier', [HeavyObjectController::class, 'index'])->name('daftarSupplier');
      Route::get('/master-data/daftar-supplier/create', [HeavyObjectController::class, 'createSupplier'])->name('createSupplier');
      Route::post('/master-data/daftar-supplier', [HeavyObjectController::class, 'storeSupplier'])->name('storeSupplier');
      Route::get('panel/heavyobject/master-data/daftar-supplier/{id}/edit', [DaftarSupplierController::class, 'edit'])->name('daftar_suppliers.edit');
      Route::put('panel/heavyobject/master-data/daftar-supplier/{id}', [DaftarSupplierController::class, 'update'])->name('daftar_suppliers.update');
      Route::delete('panel/heavyobject/master-data/daftar-supplier/{id}', [DaftarSupplierController::class, 'destroy'])->name('daftar_suppliers.destroy');

      //Stok Barang
      Route::resource('stok-barang', StokBarangController::class);
      Route::get('panel/heavyobject/stok-barang', [StokBarangController::class, 'index'])->name('stok.barang.index'); // Menampilkan daftar stok barang
      Route::get('/create', [StokBarangController::class, 'create'])->name('stok.barang.create'); // Form tambah stok barang
      Route::post('/', [StokBarangController::class, 'store'])->name('stok.barang.store'); // Simpan data stok barang
      Route::get('/{id}/edit', [StokBarangController::class, 'edit'])->name('stok.barang.edit'); // Form edit stok barang
      Route::put('/{id}', [StokBarangController::class, 'update'])->name('stok.barang.update'); // Update stok barang
      Route::delete('/{id}', [StokBarangController::class, 'destroy'])->name('stok.barang.destroy'); // Hapus stok barang
  

});
