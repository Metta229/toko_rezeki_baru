<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Rute Barang
    Route::resource('barang', BarangController::class);
    Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::get('barang/laporan/cetak', [BarangController::class, 'laporan'])->name('barang.laporan');

    // Rute Supplier
    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('supplier/laporan/cetak', [SupplierController::class, 'laporan'])->name('supplier.laporan');
    Route::get('supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('supplier', [SupplierController::class, 'store'])->name('supplier.store');

    // Rute Barang Masuk
    Route::resource('barangmasuk', BarangMasukController::class);
    Route::put('/barangmasuk/{id}', [BarangMasukController::class, 'update'])->name('barangmasuk.update');
    Route::put('/barangmasuk/{id}', [BarangMasukController::class, 'update'])->name('barangmasuk.update');

    Route::delete('barangmasuk/{id}', [BarangMasukController::class, 'delete'])->name('barangmasuk.delete');

    // Rute Barang Keluar
    Route::resource('barangkeluar', BarangKeluarController::class);
    Route::get('barangkeluar/laporan/cetak', [BarangKeluarController::class, 'laporan'])->name('barangkeluar.laporan');

    // Rute Laporan
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
});

// Rute Halaman Awal
Route::get('/', function () {
    return view('welcome');
});

// Rute Login & Logout
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Rute Dashboard
Route::get('/dashboard', function () {
    return view('home');
})->middleware('auth');
