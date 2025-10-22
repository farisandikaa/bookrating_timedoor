<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books', [BookController::class, 'index']); 
Route::get('/authors/top', [AuthorController::class, 'top'])->name('authors.top');

Route::get('/rating/create', [RatingController::class, 'create'])->name('rating.create');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');


Route::get('/api/authors/{author}/books', [RatingController::class, 'booksByAuthor']);
