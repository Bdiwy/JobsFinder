<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listingControler;

// All listings
Route::get('/',  [listingControler::class,'index']); // routes

Route::group(['prefix'=>'listings'], function(){

//stores listings

Route::post('/',[listingControler::class,'store']);

// single listings
Route::get('/create',[listingControler::class,'create']);


Route::get('/{listings}',[listingControler::class,'show']); // <-------



Route::get('/{listings}/edit',[listingControler::class,'edit']);


Route::post('/{listing}',[listingControler::class,'fuckIt']);// <-------


Route::put('/{listing}',[listingControler::class,'update']);// <-------


});


