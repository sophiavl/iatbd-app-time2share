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

Route::get('/start', function (){
    return view('start');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/signup', function() {
    return view('signup');
});

Route::post('/toggle-menu', 'MenuController@toggle')->name('toggle-menu');
