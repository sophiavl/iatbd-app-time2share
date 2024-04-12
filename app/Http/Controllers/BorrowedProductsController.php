<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowedProductsController extends Controller
{
    function index() {
        return view('borrowed');
    }
}
