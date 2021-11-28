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

//User related
Route::get('/user', [UserController::class, 'index']); //Look at the UserController to see what function to call, in this case function index
Route::get('user/logout', [UserController::class, 'logout']);
Route::post('user/logout', [UserController::class, 'logout']);
Route::get('/edit', function () {return view('/profile/edit');});
Route::post('/edit', [UserController::class, 'edit']); 

// Wallet related
Route::get('/nft', [NftController::class, 'show']);

//Nft related
Route::get('/nft/detail/{nft_id}', [NftController::class, 'showDetail']);
Route::get('/nft/edit/{nft_id}', [NftController::class, 'edit']);
Route::get('/nft/buy/{nft_id}', [NftController::class, 'buy']);
Route::get('/nft/removeFromCollection/{nft_id}', [NftController::class, 'removeFromCollection']);
Route::get('/nft/addToCollection/{collection_id}/{nft_id}', [NftController::class, 'addNftToCollection']);
Route::get('/nft/remove/{nft_id}', [NftController::class, 'destroy']);
Route::get('/nft/add', [NftController::class, 'create']); // NOG AAN TE MAKEN
Route::post('/nft/store', [NftController::class, 'store']); // NOG AAN TE MAKEN
Route::post('/nft/edit', [NftController::class, 'update']);
Route::post('/nft/detail/addComment', [NftController::class, 'addComment']);
Route::post('/nft/detail/removeComment', [NftController::class, 'removeComment']);
Route::post('/nft/addItemId/{nft_id}/{item_id}/{owner}', [NftController::class, 'addItemId']);

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

//Search related
Route::get('/search', [NftController::class, 'searchResults']);