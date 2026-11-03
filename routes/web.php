<?php

use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route lama dinonaktifkan, digantikan redirect ke daftar CV di bawah
// Route::get('/', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Route lama di-comment (tidak dihapus)
// Route::resource('pelanggan', PelangganController::class);

// ===== Portofolio / CV (CRUD tabel Portofolio_1187) =====
Route::redirect('/', '/admin/portofolio');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('portofolio', PortofolioController::class);

    // Route baru dimasukkan ke dalam grup admin
    Route::resource('pelanggan', PelangganController::class);

    Route::resource('user', UserController::class);
});