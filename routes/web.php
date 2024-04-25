<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowedProductsController;
use App\Http\Controllers\LoanedProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;



Route::get('/loaned', [LoanedProductsController::class, 'index'])->name('loaned');

Route::get('/borrowed', [BorrowedProductsController::class, 'index'])->name('borrowed');

Route::controller(ProductController::class)->name('products.')->group(function () {
    Route::get('/products', 'index')->name('index');
    Route::get('/products/create', 'create')->name('create');
    Route::post('/products/create', 'store')->name('store');
    Route::get('/products/{id}', 'show')->name('details');
});

Route::controller(WelcomeController::class)->name('welcome.')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/login', 'login')->name('login');
    Route::get('/signup', 'signup')->name('signup');
});

Route::get('/start', [HomeController::class, 'index'])->name('start');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/toggle-menu', 'MenuController@toggle')->name('toggle-menu');
