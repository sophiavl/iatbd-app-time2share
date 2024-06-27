<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;


class ProfileController extends Controller
{
    function index() {

        $user = Auth::user();

        $userProducts = $user->products ?? [];
        $borrowedProducts = $user->borrowedProducts ?? [];
        $lentProducts = $user->products()->where('available', 0)->get() ?? [];
        $receivedReviews = $user->receivedReviews ?? [];

        $this->calculateRemainingDays($userProducts);
        $this->calculateRemainingDays($borrowedProducts);
        $this->calculateRemainingDays($lentProducts);

        return view('profile', compact('userProducts', 'borrowedProducts', 'lentProducts', 'receivedReviews'));
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

    public function receivedReviews(User $user) {
        $receivedReviews = Review::where('user_to_id', $user->id)->get();
    
        return view('profile', compact('receivedReviews'));
    }

    protected function calculateRemainingDays($products) {

        foreach ($products as $product) {
            $deadline = Carbon::parse($product->deadline)->startOfDay();
            $now = Carbon::now()->startOfDay();
    
            $remaining_days = $deadline->isPast() ? 0 : $now->diffInDays($deadline);
    
            $product->remaining_days = ceil($remaining_days);
        }
    }

}
