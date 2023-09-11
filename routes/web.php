<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// All listings
Route::get('/', function () {
    return response(view('index', [
        'heroes' => 'JobsFinder',
        'Listings' => Listing::all() 
    ]))->header('Ahmed-Bdiwy', 'XD');
    
});


// single listings

Route::get('/listings/{listings}', function(Listing $listings){
    return view('listings', [
        'listings' =>$listings
    ],);
});