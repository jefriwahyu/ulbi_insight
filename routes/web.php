<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/author', function () {
    return view('author');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/search', function () {
    return view('search');
});