<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class listingControler extends Controller
{
    // show all data
        public function index(){
            return response(view('index', [
                'heroes' => 'JobsFinder',
                'Listings' => Listing::all() 
            ]))->header('Ahmed-Bdiwy', 'XD');
        }

    //show single listing
        public function show(Listing $listings){
            return view('listings', [
                'listings' =>$listings,
            ],);
        }
}
