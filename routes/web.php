<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listingControler;



Route::group(['prefix'=>'listings'], function(){

    
// All listings
Route::get('/',  [listingControler::class,'index']); // routes



// single listings
Route::get('/listings/create',[listingControler::class,'create']);


//stores listings

Route::post('/listings',[listingControler::class,'store']);



Route::get('/listings/{listings}',[listingControler::class,'show']);


});


