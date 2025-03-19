<?php

use App\Http\Controllers\ArticleController;
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

Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{id}', [ArticleController::class, 'show']);
