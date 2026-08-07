<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ホーム画面
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// CRUD操作
Route::resource('article', ArticleController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');
Route::resource('article', ArticleController::class)
    ->only(['show']);

// ログイン画面
Route::get('login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('login', [LoginController::class, 'auth'])
    ->name('login.auth')
    ->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout');

// ユーザ操作
Route::resource('user', UserController::class)
    ->only(['create', 'store'])
    ->middleware('guest');
