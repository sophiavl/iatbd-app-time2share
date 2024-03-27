<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('products.index');
});

Route::get('/products/product', function () {
    return view('products.product');
});

Route::get('/signin', function (){
    return view('signin');
});