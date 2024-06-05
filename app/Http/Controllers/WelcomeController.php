<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
        $validatedData = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'username' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'required|string|max:50',
            'city'=> 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['fname'] . ' ' . $validatedData['lname'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->city = $validatedData['city'];
        $user->password = Hash::make($validatedData['password']);
        $user->registration_date = Carbon::now();
        $user->save();

        return redirect()->route('products.index')->with('success', 'User registered successfully!');

    }
}
