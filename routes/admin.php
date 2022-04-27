<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
//Routes

Route::get('/', [HomeController::class, 'index'])->name('admin.home');  

Route::resource('categories', CategoryController::class)->names('admin.categories');