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

Route::get('/collection/detail', function () {
    return view('detail');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/upload', function() {
    return view('upload');
});