<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/create', function () {
    return view('create.index');
});

Route::get('/article', function () {
    return view('article.index');
});
