<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerItem;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\KatalogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tampil', [ControllerItem::class,'index']);
Route::get('tampil1', [ItemController::class,'index']);
Route::get('karyawan', [KaryawanController::class,'karyawan']);
Route::get('supplier', [SupplierController::class,'supplier']);
Route::get('penjualan', [PenjualanController::class,'penjualan']);
Route::get('katalog', [KatalogController::class,'katalog']);     