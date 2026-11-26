<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DatarController;
use App\Http\Controllers\RuangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', [ProductController::class, 'products']);
Route::get('xproducts', [ProductController::class, 'detailproducts']);
Route::get('notaproducts/{id}/{nama}', [ProductController::class, 'notaproducts']);

Route::get('formkaryawan', [KaryawanController::class, 'formkaryawan']);
Route::post('insertkaryawan', [KaryawanController::class, 'insertkaryawan']);

Route::get('/calculator', [CalculatorController::class, 'calculator']);
Route::post('/calculator/add', [CalculatorController::class, 'add']);
Route::post('/calculator/subtract', [CalculatorController::class, 'subtract']);
Route::post('/calculator/multiply', [CalculatorController::class, 'multiply']);
Route::post('/calculator/divide', [CalculatorController::class, 'divide']);

Route::get('datar', [DatarController::class, 'hitungdatar']);
Route::post('hitung-persegi', [DatarController::class, 'datarhitung']);
Route::post('hitung-lingkaran', [DatarController::class, 'hitungLingkaran']);

Route::get('ruang', [RuangController::class, 'hitungruang']);
Route::post('ruang', [RuangController::class, 'ruanghitung']);


Route::get('pembelian', [PembelianController::class, 'hitungpembelian']);
Route::post('hitung', [PembelianController::class, 'hitung']);

