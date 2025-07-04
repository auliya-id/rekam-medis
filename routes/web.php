<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('diagnosis/index', [App\Http\Controllers\DiagnosisController::class, 'index'])->name('diagnosis.index');
Route::get('diagnosis/datatable', [App\Http\Controllers\DiagnosisController::class, 'datatable'])->name('diagnosis.datatable');
Route::resource('diagnosis', App\Http\Controllers\DiagnosisController::class)->except('index');
Route::resource('biostatistik', App\Http\Controllers\BiostatistikController::class);
Route::resource('pasien', App\Http\Controllers\PasienController::class);
Route::resource('riwayat-pasien', App\Http\Controllers\RiwayatPasienController::class);
