<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [BooksController::class, 'index'])->name('books.index');
