<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class listingControler extends Controller
{
    // show all data
        public function index(){
            return response(view('listings.index', [
                'heroes' => 'JobsFinder',
                'Listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6) 
            ]))->header('Ahmed-Bdiwy', 'XD');
        }

    //show single listing
        public function show(Listing $listings){
            return view('listings.show', [
                'listings' =>$listings,
            ],);
        }


    //create job post
    public function create(){
        return view("listings.create") ; 

        }



        public function store(Request $request) {
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required', Rule::unique('listings', 'company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required'
            ]);
    
            
            listing::create($formFields); 
            return redirect('/')->with('message','Job created successfully !!');

            }

    }
