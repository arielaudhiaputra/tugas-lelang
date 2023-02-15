<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\BarangController;

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

Route::get('/', [MasyarakatController::class, 'index']);
Route::post('masyarakat/create', [MasyarakatController::class, 'create'])->name('create');
Route::get('masyarakat/delete/{id}', [MasyarakatController::class, 'delete'])->name('masyarakat.delete');
Route::post('masyarakat/update/{id}', [MasyarakatController::class, 'update'])->name('masyarakat.update');

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');

