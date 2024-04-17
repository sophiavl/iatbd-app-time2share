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
}
