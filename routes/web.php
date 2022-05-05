<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

//posts
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('noticia/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('buscar', [PostController::class, 'search'])->name('posts.search');

Route::get('{age}/{month}/{day}/{id}', [PostController::class, 'showById'])
        ->where(['age' => '[0-9]+','month' => '[0-9]+','day' => '[0-9]+']);

//category
Route::get('categoria/{category}', [CategoryController::class, 'show'])->name('category.show');

//tag
Route::get('tag/{tag}', [TagController::class, 'show'])->name('tag.show');


//add comment
Route::post('comment/store', [CommentController::class, 'store'])->name('comment.add');

//vistas
Route::view('donar', 'donar')->name('donar');
Route::view('porque-agenda', 'porque-agenda')->name('porque-agenda');

Route::get('mapa-del-sitio', App\Http\Livewire\Mapa::class)->name('mapa');


Route::get('staff', [StaffController::class, 'index'])->name('staff');

Route::get('contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
