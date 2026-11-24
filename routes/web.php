<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route bebas akses (tanpa login)
Route::redirect('/', '/admin/portofolio');

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

// Route WAJIB login (dilindungi middleware checkislogin)
Route::group(['middleware' => ['checkislogin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('portofolio', PortofolioController::class);
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('user', UserController::class);
    });
});
