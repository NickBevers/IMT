<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\NftController;
use App\Http\Controllers\AppController;


//root directory
// Route::get('/', function () {return view('index');});
// Route::get('/discover', function () {return view('discover');});
Route::get('/', [AppController::class, 'index']); //add check if user is logged in
Route::get('/discover', [AppController::class, 'discover']);

Route::get('/signup', [UserController::class, 'signup']); 
Route::post('/signup', [UserController::class, 'store']); 
Route::get('/login', [UserController::class, 'login']); 
Route::post('/login', [UserController::class, 'handleLogin']); 

// Route::get('/logout', function() {
//     Auth::logout();
//     Session::flush();
//     return redirect('login');
// });

Route::get('/logout', [UserController::class, 'logout']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/edit', function () {return view('editProfile');});
Route::post('/edit', [UserController::class, 'edit']); 

// Wallet related
Route::get('/wallet', [NftController::class, 'show']);

//Nft related
Route::get('/nft/detail/{nft_id}', [NftController::class, 'showDetail']);
Route::get('/nft/edit/{nft_id}', [NftController::class, 'edit']);
Route::get('/nft/buy/{nft_id}', [NftController::class, 'buy']);
Route::get('/nft/update/{nft_id}', [NftController::class, 'removeFromCollection']);
Route::get('/nft/addToCollection/{collection_id}/{nft_id}', [NftController::class, 'addNftToCollection']);
Route::get('/nft/remove/{nft_id}', [NftController::class, 'destroy']);
Route::get('/upload', function() {return view('upload');});
Route::post('/nft/edit', [NftController::class, 'update']);


//Collection related
Route::get('/collection/create', [CollectionController::class, 'create']);
//{username} --> variable name in the url that you get access to in the corresponding function, in this example showCollection
Route::get('/collection/{username}', [CollectionController::class, 'show']);
Route::get('/collection/detail/{collection_id}', [CollectionController::class, 'showDetail']);
Route::get('/collection/add/{collection_id}', [CollectionController::class, 'addNft']);
Route::get('/collection/edit/{collection_id}', [CollectionController::class, 'edit']);
Route::get('/collection/remove/{collection_id}', [CollectionController::class, 'destroy']);
Route::get('/collection/create', [CollectionController::class, 'create']);
Route::post('/collection/edit', [CollectionController::class, 'update']);
Route::post('/collection/store', [CollectionController::class, 'store']);

//User related
Route::get('/user', [UserController::class, 'index']); //Look at the UserController to see what function to call, in this case function index

//Search related
Route::get('/search', [NftController::class, 'searchResults']);