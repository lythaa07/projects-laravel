<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerItem;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tampil', [ControllerItem::class,'index']);
Route::get('tampil1', [ItemController::class,'index']);
Route::get('karyawan', [KaryawanController::class,'karyawan']);
Route::get('supplier', [SupplierController::class,'supplier']);