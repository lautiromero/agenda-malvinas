<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdController;

//Routes

Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');  

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::resource('ads', AdController::class)->names('admin.ads');

//uploader
Route::post('/upload', [PostController::class, 'upload'])->middleware('can:admin.posts.upload');