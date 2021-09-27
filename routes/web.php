<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/collection', function () {
    return view('collection');
});

Route::get('/collection/detail', function () {
    return view('detail');
});