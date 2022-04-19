<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('posts.index');

//vistas
Route::view('donar', 'donar')->name('donar');
Route::view('porque-agenda', 'porque-agenda')->name('porque-agenda');
Route::view('staff', 'staff')->name('staff');

Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
