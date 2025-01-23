<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FilterCategoryController;
use App\Http\Controllers\FilterAuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\AllPostsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'home']);

Route::get('/author/{name}', [FilterAuthorController::class, 'authorPost'])
    ->name('author');

Route::get('/category/{slug}', [FilterCategoryController::class, 'categoryPost'])
    ->name('category');

Route::get('/post/{slug}', [DetailController::class, 'detailPost'])
    ->name('post');

Route::get('/search', [SearchController::class, 'searchPost'])
    ->name('search');

Route::get('/allposts', [AllPostsController::class, 'allPosts'])
    ->name('allposts');
