<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;

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

Route::get('/post/{slug}', [DetailController::class, 'detailPost'])
    ->name('post');

Route::get('/search', [SearchController::class, 'searchPost'])
    ->name('search');
