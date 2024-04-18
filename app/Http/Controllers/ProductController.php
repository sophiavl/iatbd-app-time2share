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
            1 => ['title' => 'Tweepersoons tent', 'category' => 'Buiten', 'description' => 'Deze ruime en comfortabele twee-persoons tent is ideaal voor een weekendje kamperen in de natuur. Eenvoudig op te zetten en voorzien van handige opbergvakken voor al je spullen. Geniet van een gezellige en avontuurlijke overnachting onder de sterrenhemel!'],
            2 => ['title' => 'Elektrische gitaar', 'category' => 'Hobby', 'description' => 'Deze zwarte Squier elektrische gitaar is een uitstekende keuze voor zowel beginners als gevorderde gitaristen. Met zijn strakke zwarte afwerking en klassieke ontwerp is deze gitaar niet alleen stijlvol, maar ook veelzijdig en betrouwbaar.'],
            3 => ['title' => 'Campingstoel', 'category' => 'Buiten', 'description' => 'Deze zwarte campingstoel is de perfecte metgezel voor je outdoor avonturen. Met zijn handige opklapbare ontwerp en ingebouwde bekerhouder biedt deze stoel comfort en gemak, waar je ook gaat.'],
            4 => ['title' => 'Sloep', 'category' => 'Recreatie', 'description' => 'Deze rode sloep is de perfecte metgezel voor je wateravonturen. Met zijn stijlvolle ontwerp en uitstekende prestaties biedt deze sloep een onvergetelijke ervaring op het water.']
        ];
    }

    public function show($id){
        $products = $this->getProducts();
        $product = $products[$id];
        return view('products.details')->with('product', $product);
    }
}
