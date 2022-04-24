<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//posts
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('noticia/{post}', [PostController::class, 'show'])->name('posts.show');

//vistas
Route::view('donar', 'donar')->name('donar');
Route::view('porque-agenda', 'porque-agenda')->name('porque-agenda');
Route::view('staff', 'staff')->name('staff');

Route::get('mapa-del-sitio', App\Http\Livewire\Mapa::class)->name('mapa');

Route::get('contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
