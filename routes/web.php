<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use \App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/post/update', [PostController::class, 'update']);
Route::get('/post/delete', [PostController::class, 'delete']);
Route::get('/post/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/', [MainController::class, 'index'])->name('home.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// временно заменим на однометодные контроллеры  Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::group([], function () {
    Route::get('/posts', IndexController::class)->name('posts.index'); // так типа круче
    Route::post('/posts', StoreController::class)->name('posts.store'); // так типа круче
});


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// временно заменим на однометодные контроллеры  Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
