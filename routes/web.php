<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');

});

Route::get('/About', function () {

    return view('About');

});

Route::get('/Gallery', function () {

    return view('Gallery');

});



Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/create', [ArticleController::class, 'create']);
Route::post('articles', [ArticleController::class, 'store']);
Route::get('articles/{id}/edit', [ArticleController::class, 'edit']);
Route::put('articles/{id}', [ArticleController::class, 'update']);
Route::get('articles/{id}/', [ArticleController::class, 'show']);
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');



