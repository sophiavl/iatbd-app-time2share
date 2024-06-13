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

    public function update(Request $request){

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $validated['name'] ?? $user->name,
            'username' => $validated['username'] ?? $user->username,
            'email' => $validated['email'] ?? $user->email,
            'phone' => $validated['phone'] ?? $user->phone,
            'address' => $validated['address'] ?? $user->address,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile updated succesfully');
    }
}
