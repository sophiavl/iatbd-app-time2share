<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        \Log::info($request->all());

        $credentials= $request->only('username', 'password');

        if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']]) ||
        Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
        return redirect()->route('products.index');
        }

        \Log::info($credentials);

        return back()->withErrors([
            'password' => 'Invalid username or password.',
        ]);

    }
}
