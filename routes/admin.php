<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CommentController;

//Routes

Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');  

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->names('admin.posts');

Route::resource('ads', AdController::class)->names('admin.ads');

Route::resource('staff', StaffController::class)->only(['index', 'create', 'store', 'destroy'])->names('admin.staff');

Route::resource('comments', CommentController::class)->only(['index', 'destroy'])->names('admin.comments');

//uploader
Route::post('/upload', [PostController::class, 'upload'])->middleware('can:admin.posts.upload');