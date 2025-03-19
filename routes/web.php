<?php

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
