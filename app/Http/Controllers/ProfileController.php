<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    function index() {

        $user = Auth::user();

        $userProducts = $user->products ?? [];

        return view('profile', compact('userProducts'));
    }
}
