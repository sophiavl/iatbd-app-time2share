<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function createReviewForm(Product $product) {
        if ($product->owner_id !== Auth::id()) {
            return redirect()->route('profile.index')->with('error', 'You are not authorized to review this product.');
        }

        return view('products.return', compact('product'));
    }

    public function storeReview(Request $request, Product $product) {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $borrowerId = $product->borrowers()->first()->id;

        $review = new Review([
            'product_id' => $product->id,
            'user_from_id' => Auth::id(),
            'user_to_id' => $borrowerId,
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);
        $review->save();

        $product->available = 1;
        $product->save();

        return redirect()->route('profile.index')->with('success', 'Review added and product marked as returned.');
    }
}
