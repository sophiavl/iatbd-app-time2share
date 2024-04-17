<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index() {
        $products = $this->getProducts();
        return view('products.index', compact('products'));
    }

    protected function getProducts(){
        return [
            1 => ['title' => 'Tweepersoons tent', 'category' => 'Buiten'],
            2 => ['title' => 'Elektrische gitaar', 'category' => 'Hobby'],
            3 => ['title' => 'Campingstoel', 'category' => 'Buiten'],
            4 => ['title' => 'Sloep', 'category' => 'Recreatie']
        ];
    }

    public function show($id){
        $products = $this->getProducts();
        $product = $products[$id];
        return view('products.details')->with('product', $product);
    }
}
