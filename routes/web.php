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


Route::get('/Dashboard Admin', [AdminController::class, 'index'])->name('DashboardAdmin');

// Controller Diagnosa
use App\Http\Controllers\DiagnosaController;

Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
// Route::post('/diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store');
Route::post('/hasil-diagnosa', [DiagnosaController::class, 'hasilDiagnosa'])->name('hasil.diagnosa');


// controller penyakit
use App\Http\Controllers\PenyakitController;

Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
    Route::get('/penyakit/create', [PenyakitController::class, 'create'])->name('penyakit.create');
    Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
    Route::get('/penyakit/{id}/edit', [PenyakitController::class, 'edit'])->name('penyakit.edit');
    Route::put('/penyakit/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
    Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');


// Controller Gejala
use App\Http\Controllers\GejalaController;
// Menampilkan daftar Gejala
Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
// Menampilkan formulir tambah gejala
    Route::get('/gejala/create', [GejalaController::class, 'create'])->name('gejala.create');
        // Menyimpan data gejala baru
    Route::post('/gejala', [GejalaController::class, 'store'])->name('gejala.store');
        // Menampilkan detail gejala
    Route::get('/gejala/{gejala}', [GejalaController::class, 'show'])->name('gejala.show');
        // Menampilkan formulir edit gejala
    Route::get('/gejala/{gejala}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
        // Menyimpan perubahan pada gejala
    Route::put('/gejala/{gejala}', [GejalaController::class, 'update'])->name('gejala.update');
        // Menghapus gejala
    Route::delete('/gejala/{gejala}', [GejalaController::class, 'destroy'])->name('gejala.destroy');


// Aturan Controller
use App\Http\Controllers\AturanController;
// Menampilkan daftar Gejala
Route::get('/aturan', [AturanController::class, 'index'])->name('aturan.index');
// Menampilkan formulir tambah aturan
    Route::get('/aturan/create', [AturanController::class, 'create'])->name('aturan.create');
        // Menyimpan data aturan baru
    Route::post('/aturan', [AturanController::class, 'store'])->name('aturan.store');
        // Menampilkan detail aturan
    Route::get('/aturan/{aturan}', [AturanController::class, 'show'])->name('aturan.show');
        // Menampilkan formulir edit aturan
    // Route::get('/aturan/{aturan}/edit', [AturanController::class, 'edit'])->name('aturan.edit');
    //     // Menyimpan perubahan pada aturan
    // Route::put('/aturan/{aturan}', [AturanController::class, 'update'])->name('aturan.update');
        // Menghapus aturan
    Route::delete('/aturan/{aturan}', [AturanController::class, 'destroy'])->name('aturan.destroy');
