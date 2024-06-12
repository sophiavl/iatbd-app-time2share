<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{

    public function index() {
        $products = $this->getProducts();
        return view('products.index', compact('products'));
    }


    protected function getProducts(){
        return Product::all();
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('products.details', ['product' => $product]);
    }

    
    public function create() {
        return view('products.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'category' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deadline' => 'required|date|after_or_equal:today'
        ]);

        $product = new Product();
        $product->fill($validatedData);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->photo = 'images/' . $imageName;
        }

        

        if (Auth::check()) {
            $product->owner_id = Auth::id();
        } 

        $product->save();

        return redirect()->route('products.index')->with('succes', 'Product added succesfully!');
    }

    public function userProducts() {
        $userId = Auth::id();
        $userProducts = Product::where('owner_id', $userId)->get();

        return view('profile', compact('userProducts'));
    }
    
}
