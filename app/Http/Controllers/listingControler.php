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
    
            if($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
    
            $formFields['user_id'] = auth()->id();
    
            Listing::create($formFields);
    
            return redirect('/')->with('message', 'Listing created successfully!');
        }



            public function edit (Listing $listings){

                return view('listings.edit', ['listing'=>$listings]);

            }
            


        public function update(Request $request, Listing $listing) {
            // Make sure logged in user is owner
            if($listing->user_id != auth()->id()) {
                abort(403, 'Unauthorized Action');
            }
            
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required'],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required'
            ]);
    
            if($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }

            $listing->update($formFields);
    
            return back()->with('message', 'Listing updated successfully!');
        }
    

            public function fuckIt(Listing $listing){
                $listing->delete();
                return redirect('/')->with('message', 'Listing is Deleted successfully !!');
                
            }




    }