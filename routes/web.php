<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index']);
Route::get('/author', [BookController::class, 'author']);
Route::get('/rating', [BookController::class, 'rating']);
Route::get('/data/author', [BookController::class, 'authorData']);
Route::get('/data/book', [BookController::class, 'bookData']);
Route::post('/rating/submit', [BookController::class, 'submit']);