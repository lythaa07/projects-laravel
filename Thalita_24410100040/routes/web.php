<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerKaryawan;
use App\Http\Controllers\ControllerSupplier;
use App\Http\Controllers\ControllerKonsumen;
use App\Http\Controllers\ControllerBarang;
use App\Http\Controllers\ControllerPenjualan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [ControllerKaryawan::class, 'index'])->name('karyawan.index');
Route::post('/karyawan/store', [ControllerKaryawan::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/create', [ControllerKaryawan::class, 'create'])->name('karyawan.create');
Route::get('/karyawan/edit/{kode}', [ControllerKaryawan::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/update/{kode}', [ControllerKaryawan::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/delete/{kode}', [ControllerKaryawan::class, 'destroy'])->name('karyawan.destroy');

Route::get('/supplier', [ControllerSupplier::class, 'index'])->name('supplier.index');
Route::post('/supplier/store', [ControllerSupplier::class, 'store'])->name('supplier.store');
Route::get('/supplier/create', [ControllerSupplier::class, 'create'])->name('supplier.create');
Route::get('/supplier/edit/{kode}', [ControllerSupplier::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/update/{kode}', [ControllerSupplier::class, 'update'])->name('supplier.update');
Route::delete('/supplier/delete/{kode}', [ControllerSupplier::class, 'destroy'])->name('supplier.destroy');

Route::get('/konsumen', [ControllerKonsumen::class, 'index'])->name('Konsumen.index');
Route::post('/konsumen/store', [ControllerKonsumen::class, 'store'])->name('Konsumen.store');
Route::get('/konsumen/create', [ControllerKonsumen::class, 'create'])->name('Konsumen.create');
Route::get('/konsumen/edit/{kode}', [ControllerKonsumen::class, 'edit'])->name('Konsumen.edit');
Route::put('/konsumen/update/{kode}', [ControllerKonsumen::class, 'update'])->name('Konsumen.update');
Route::delete('/konsumen/delete/{kode}', [ControllerKonsumen::class, 'destroy'])->name('Konsumen.destroy');

Route::get('/barang', [ControllerBarang::class, 'index'])->name('barang.index');
Route::get('/barang/create', [ControllerBarang::class, 'create'])->name('barang.create');
Route::post('/barang', [ControllerBarang::class, 'store'])->name('barang.store');
Route::get('/barang/{kode}/edit', [ControllerBarang::class, 'edit'])->name('barang.edit');
Route::put('/barang/{kode}', [ControllerBarang::class, 'update'])->name('barang.update');
Route::delete('/barang/{kode}', [ControllerBarang::class, 'destroy'])->name('barang.destroy');

Route::get('/penjualan', [ControllerPenjualan::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/create', [ControllerPenjualan::class, 'create'])->name('penjualan.create');
Route::post('/penjualan/store', [ControllerPenjualan::class, 'store'])->name('penjualan.store');
Route::get('/penjualan/edit/{id}', [ControllerPenjualan::class, 'edit'])->name('penjualan.edit');
Route::put('/penjualan/update/{id}', [ControllerPenjualan::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/delete/{id}', [ControllerPenjualan::class, 'destroy'])->name('penjualan.destroy');
