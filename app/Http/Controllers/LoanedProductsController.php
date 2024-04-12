<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanedProductsController extends Controller
{
    function index() {
        return view('loaned');
    }
}
