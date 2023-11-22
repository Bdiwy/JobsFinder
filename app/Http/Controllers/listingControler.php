<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\FileUpload;

class listingControler extends Controller
{
    use FileUpload;
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
    
            
            $formFields['user_id'] = auth()->id();
    
            Listing::create([
                'title' => $request->title,
                'company' => $request->company,
                'user_id' => auth()->id(),
                'location' =>$request->location,
                'website' =>$request->website,
                'email' =>$request->email,
                'tags' =>$request->tags,
                'description'=>$request->description,
                'logo' => $this->Fupload($request,'logo','users','public') , ]);
                $logo=Listing::select('logo')->get();
            return view('',['logo'=>$logo])->with('message', 'Listing created successfully!');
        }



        protected function save_photo($photo,$path) {

            $file = $photo;
            $file_ex =$file->getClientOriginalExtension();
            $filename = time().rand(1,99).'.'.$file_ex;
            $file->move(public_path($path),$filename);
            return $filename;
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