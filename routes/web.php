<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowedProductsController;
use App\Http\Controllers\LoanedProductsController;
use App\Http\Controllers\ProductsController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/loaned', [LoanedProductsController::class, 'index'])->name('loaned');

Route::get('/borrowed', [BorrowedProductsController::class, 'index'])->name('borrowed');

Route::get('/products', function () {
    return view('products.index');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/start', function (){
    return view('start');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/signup', function() {
    return view('signup');
});

Route::post('/toggle-menu', 'MenuController@toggle')->name('toggle-menu');
