<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowedProductsController;
use App\Http\Controllers\LoanedProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\HTTP\Controllers\MenuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Carbon\Carbon;

Route::controller(WelcomeController::class)->name('welcome.')->group(function (){
    Route::get('/', 'index')->name('index');
    // Route::get('/login', 'login')->name('login');
    // Route::get('/signup', 'signup')->name('signup');
    // Route::post('/signup', 'store')->name('store');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginrequest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register'])->name('register.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/loaned', [LoanedProductsController::class, 'index'])->name('loaned');
    Route::get('/borrowed', [BorrowedProductsController::class, 'index'])->name('borrowed');
    
    Route::controller(ProductController::class)->name('products.')->group(function () {
        Route::get('/products', 'index')->name('index');
        Route::get('/products/create', 'create')->name('create');
        Route::post('/products/create', 'store')->name('store');
        Route::get('/products/{id}', 'show')->name('details');
    });

    Route::get('/start', [HomeController::class, 'index'])->name('start');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::post('/toggle-menu', 'MenuController@toggle')->name('toggle-menu');
});

Auth::routes();





