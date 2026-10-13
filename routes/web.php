<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DasboardController;
use illuminate\Support\Facades\Route;


Route::get('/', function () {
   return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('dashboard', [DasboardController::class, 'index'])
      ->name('dashboard');
