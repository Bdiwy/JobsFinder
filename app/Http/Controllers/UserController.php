<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

public function create(){
    return view('listings.register');
}


public function login(){

    return view('listings.login');


}



public function store(Request $request){

    $formFields = $request->validate([
        'name'=>['required','min:3'],
        'email'=>['required','email',Rule::unique('users','email')],
        'password'=>'required |confirmed|min:6',
    ]);
    //hash
    $formFields['password']=bcrypt($formFields['password']);


    $user= User::create($formFields);
    auth()->login($user);
    
    return redirect('/')->with('message','user created and logged in successfully !!'); 

}


public function logout(Request $request){
    auth()->logout();

    $request->session()->invalidate();
    $request->session()->regenerate();
    return redirect('/')->with('message','user logged out successfully!!');

}

public function access (Request $request) {
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    if(auth()->attempt($formFields)) {
        $request->session()->regenerate();

        return redirect('/')->with('message', 'You are now logged in!');
    }

    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
}



}
