<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ホーム画面
Route::get('/', [HomeController::class, 'index'])->name('home');

// CRUD操作
Route::resource('article', ArticleController::class);
