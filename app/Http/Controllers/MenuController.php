<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function toggle(Request $request)
    {
        $menu = !session('menu');
        session()->put('menu', $menu);
        
        return response()->json(['menu' => $menu]);
    }
}
