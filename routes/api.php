<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ViewsBookController;
use App\Http\Controllers\Api\CreateBookController;
use App\Http\Controllers\Api\UpdateBookController;
use App\Http\Controllers\Api\DeleteBookController;
use App\Http\Controllers\Api\SearchBookController;

Route::get('/books', [ViewsBookController::class, 'index']);
Route::post('/books', [CreateBookController::class, 'store']);
Route::put('/books/{id}', [UpdateBookController::class, 'update']);
Route::delete('/books/{id}', [DeleteBookController::class, 'destroy']);
Route::get('/books/search', [SearchBookController::class, 'search']);

Route::get('/test', function () {
    return response()->json(['message' => 'API OK']);
});
