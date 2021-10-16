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

Route::get('/signup', [UserController::class, 'signup']); 
Route::post('/signup', [UserController::class, 'store']); 
Route::get('/login', [UserController::class, 'login']); 
Route::post('/login', [UserController::class, 'handleLogin']); 

Route::get('/detail/{nft_name}', [NftController::class, 'showDetail']);

                        //{username} --> variable name in the url that you get access to in the corresponding function, in this example showCollection
Route::get('/collection/{username}', [UserController::class, 'showCollection']);

Route::get('/user', [UserController::class, 'index'] ); //Look at the UserController to see what function to call, in this case function index

Route::get('/discover', function () {
    return view('discover');
});

Route::get('/upload', function() {
    return view('upload');
});