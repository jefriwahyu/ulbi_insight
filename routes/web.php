<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/author', function () {
    return view('author');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/search}', [SearchController::class, 'searchPost'])
    ->name('search');
