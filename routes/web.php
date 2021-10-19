<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\NftController;


//root directory
Route::get('/', function () {return view('index');});
Route::get('/discover', function () {return view('discover');});

Route::get('/signup', [UserController::class, 'signup']); 
Route::post('/signup', [UserController::class, 'store']); 
Route::get('/login', [UserController::class, 'login']); 
Route::post('/login', [UserController::class, 'handleLogin']); 

Route::get('/logout', function() {
    Auth::logout();
    Session::flush();
    return redirect('login');
});

Route::get('/edit', function () {return view('editProfile');});
Route::post('/edit', [UserController::class, 'edit']); 

//Nft related
Route::get('/detail/{nft_name}', [NftController::class, 'showDetail']);
Route::get('/upload', function() {return view('upload');});

//Collection-related
Route::get('/collection/create', [CollectionController::class, 'create']);
//{username} --> variable name in the url that you get access to in the corresponding function, in this example showCollection
Route::get('/collection/{username}', [CollectionController::class, 'show']);
Route::post('/collection/store', [CollectionController::class, 'store']);

//User related
Route::get('/user', [UserController::class, 'index'] ); //Look at the UserController to see what function to call, in this case function index