<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Auth;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function index(Request $request) {
        // $products = $this->getFilteredProducts($request);

        // $this->calculateRemainingDays($products);
        // return view('products.index', compact('products'));

        $query = Product::query();

        if($request->filled('category')){
            $query->where('category', $request->input('category'));
        }
        if ($request->filled('price')) {
            $query->where('price', '<=', $request->input('price'));
        }
    
        if ($request->filled('availability')) {
            $availability = $request->input('availability') === 'available' ? 1 : 0;
            $query->where('available', $availability);
        } else {
            $query->where('available', 1);
        }
    
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }
    
        $products = $query->get();
    
        $this->calculateRemainingDays($products);
    
        return view('products.index', compact('products'));
    }

    protected function getFilteredProducts(Request $request){
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('price')) {
            $query->where('price', '<=', $request->input('price'));
        }

        if ($request->filled('availability')) {
            $availability = $request->input('availability') === 'available' ? 1 : 0;
            $query->where('available', $availability);
        } else {
            $query->where('available', 1);
        }

        return $query->get();
    }


    protected function getProducts(){
        return Product::all();
    }
    

    public function show($id){
        $product = Product::findOrFail($id);
        $this->calculateRemainingDays([$product]);
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

    protected function calculateRemainingDays($products) {

        foreach ($products as $product) {
            $deadline = Carbon::parse($product->deadline)->startOfDay();
            $now = Carbon::now()->startOfDay();
    
            $remaining_days = $deadline->isPast() ? 0 : $now->diffInDays($deadline);
    
            $product->remaining_days = $remaining_days;
        }
    }

    public function delete($id){
        $product = Product::find($id);
        if(!$product){
            return back()->with('error', 'Product not found');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function borrow(Product $product) {
        $product->available = 0;
        $product->save();

        Auth::user()->borrowedProducts()->attach($product);    
    
        return redirect()->route('profile.index')->with('success', 'Product borrowed.');
    }

    public function lentProducts() {
        $userId = Auth::id();
        $lentProducts = Product::where('owner_id', $userId)
                        ->where('available', 0)
                        ->get();

        return view('profile', compact('lentProducts'));
    }

    public function search(Request $request){
        $searchTerm = $request->input('search');
        dd($searchTerm);
        $products = Product::where('title', 'like', '%' . $searchTerm . '%')->get();

        return view('products.index', compact('products'));
    }   

     
    
}
