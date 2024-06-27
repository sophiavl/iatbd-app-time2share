<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowedProductsController;
use App\Http\Controllers\LoanedProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\HTTP\Controllers\MenuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Carbon\Carbon;

Route::controller(WelcomeController::class)->name('welcome.')->group(function (){
    Route::get('/', 'index')->name('index');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginrequest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register'])->name('register.post');


Route::middleware(['auth'])->group(function () {
    
    Route::controller(ProductController::class)->name('products.')->group(function () {
        Route::get('/products', 'index')->name('index');
        Route::get('/products/create', 'create')->name('create');
        Route::post('/products/create', 'store')->name('store');
        Route::get('/products/{id}', 'show')->name('details');
        Route::post('/products/{product}/borrow', 'borrow')->name('borrow');
        Route::get('/products/lent', 'lentProducts')->name('lent');
        Route::get('/products/search', 'search')->name('search');
    });

    Route::get('/products/{product}/return', [ReviewController::class, 'createReviewForm'])->name('products.returnForm');
    Route::post('/products/{product}/return', [ReviewController::class, 'storeReview'])->name('products.storeReview');
    Route::get('/start', [HomeController::class, 'index'])->name('start');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route::post('/toggle-menu', 'MenuController@toggle')->name('toggle-menu');
});

Route::middleware([AdminMiddleware::class])->group(function(){
    Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.delete');
    Route::post('/users/{id}/block', [AdminController::class, 'blockUser'])->name('users.block');
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::post('/users/{id}/block', [AdminController::class, 'blockUser'])->name('users.block');
    Route::post('/users/{id}/unblock', [AdminController::class, 'unblockUser'])->name('users.unblock');
    
});

Auth::routes();





