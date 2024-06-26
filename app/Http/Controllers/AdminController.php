<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){

        $users = User::all();
    
        return view('admin.users', compact('users'));
    }

    public function blockUser($id){
        $user = User::findOrFail($id);

        $user->is_blocked = true;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User has been blocked succesfully.');
    }

    public function unblockUser($id){
        $user = User::findOrFail($id);
        $user->is_blocked = false;
        $user->save();

        return redirect()->route('users.index')->with('succes', 'User has been unblocked succesfully');
    }
}
