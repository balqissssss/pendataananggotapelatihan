<?php

use App\Http\Controllers\datapelatihancontroller;
use App\Http\Controllers\pelatihancontroller;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[LoginController::class,'loginView']);
Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::resource('pengguna',usercontroller::class)->except('destroy','create','show','update','edit')->middleware('auth');
Route::resource('datapelatihan', datapelatihancontroller::class)->parameters([
    'datapelatihan' => 'datapelatihan',
])->middleware('auth');
Route::resource('pelatihan', pelatihancontroller::class)->middleware('auth');
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Menambahkan route untuk halaman laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
