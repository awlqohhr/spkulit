<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('user/dashboard');
})->name('dashboard.user');

Route::get('/Diagnosa', [HomeController::class, 'index'])->name('diagnosa');


Route::get('/Dashboard Admin', [AdminController::class, 'index'])->name('DashboardAdmin');
Route::get('/Penyakit', [AdminController::class, 'penyakit'])->name('penyakit');

// Penyakit
use App\Http\Controllers\PenyakitController;

Route::get('/penyakit', [PenyakitController::class, 'create'])->name('penyakit.create');
Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
Route::get('/penyakit/{id}/edit', [PenyakitController::class, 'edit'])->name('penyakit.edit');
Route::put('/penyakit/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');

Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.delete');


