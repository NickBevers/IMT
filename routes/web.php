<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NftController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/collection/detail/{nft_name}', [NftController::class, 'showDetail']);

Route::get('/user', [UserController::class, 'index'] );

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/upload', function() {
    return view('upload');
});