<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index() {
        return view('welcome.index');
    }

    public function login(){
        return view('welcome.login');
    }

    public function signup(){
        return view('welcome.signup');
    }

    public function store(Request $request){
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'username' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ], [
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
            'username.required' => 'The username field is required.',
            'email.required' => 'The email field is required.',
            'address.required' => 'The address field is required.',
            'password.required' => 'The password field is required.'
        ]
    );

        dd($request->input());
    }
}
