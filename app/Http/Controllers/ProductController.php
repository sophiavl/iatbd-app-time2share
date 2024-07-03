<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index(Request $request) {

        $products = collect();

        if ($request->filled('search')){
            $products = $this->searchProducts($request);
        }
        else if ($request->filled('category')) {
            $products = $this->getFilteredProducts($request);
        }
        else {
            $products = Product::all();
        }

        $this->calculateRemainingDays($products);

        return view('products.index', compact('products'));
    }

    protected function getFilteredProducts(Request $request){

        $categoryMapping = [
            'Electronics' => 'electronics',
            'Toys and DIY' => 'tools-diy',
            'Sports and recreation' => 'sports-recreation',
            'Kitchen Appliances' => 'kitchen-appliances',
            'Garden and Outdoor' => 'garden-outdoor',
            'Toys and Games' => 'toys-games',
            'Furniture and Household Items' => 'furniture-household-items',
            'Clothing and Accessories' => 'clothing-accessories',
            'Musical Instruments' => 'musical-instruments',
        ];

        $query = Product::query();

        if ($request->filled('category')) {
            $userFriendlyCategory = $request->input('category');
            if (isset($categoryMapping[$userFriendlyCategory])) {
                $databaseCategory = $categoryMapping[$userFriendlyCategory];
                $query->where('category', $databaseCategory);
            } else {
                // Als de categorie niet in de mapping staat, gebruik dan de gebruikersinvoer direct
                $query->where('category', $userFriendlyCategory);
            }
        }
        
        return $query->get();
    }

    protected function searchProducts(Request $request){

        $query = Product::query();

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        return $query->get();

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
            'deadline' => 'required|date_format:d-m-Y|after_or_equal:today'
        ]);

        $deadline = Carbon::createFromFormat('d-m-Y', $validatedData['deadline'])->format('Y-m-d');

        $product = new Product();
        $product->fill($validatedData);
        $product->deadline = $deadline;

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
    
            $product->remaining_days = ceil($remaining_days);
        }
    }

    protected function calculateRemainingDaysForProduct($product) {
        $deadline = Carbon::parse($product->deadline)->startOfDay();
        $now = Carbon::now()->startOfDay();
    
        $remaining_days = $deadline->isPast() ? 0 : $now->diffInDays($deadline);
    
        $product->remaining_days = ceil($remaining_days);
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
        
        $this->calculateRemainingDaysForProduct($product);
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
        $products = Product::where('title', 'like', '%' . $searchTerm . '%')->get();

        return view('products.index', compact('products'));
    }   

     
    
}
