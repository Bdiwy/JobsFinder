<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\listingControler;
use GuzzleHttp\Middleware;

// All listings
Route::get('/',  [listingControler::class,'index']); // routes

Route::group(['prefix'=>'listings'], function(){                                                 

//stores listings

Route::post('/',[listingControler::class,'store']);

// single listings
Route::get('/create',[listingControler::class,'create'])->middleware('auth');


Route::get('/{listings}',[listingControler::class,'show']); // <-------



Route::get('/{listings}/edit',[listingControler::class,'edit'])->middleware('auth');


Route::post('/{listing}',[listingControler::class,'fuckIt'])->middleware('auth');// <-------


Route::put('/{listing}',[listingControler::class,'update'])->middleware('auth');// <-------


});





//Users routes


Route::get('/register',[UserController::class, 'create'])->middleware('guest');



Route::post('/users',[UserController::class, 'store']);



Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');


Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');




Route::post('/users/auth',[UserController::class, 'access']);