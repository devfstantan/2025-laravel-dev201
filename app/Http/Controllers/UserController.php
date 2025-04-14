<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // $users = User::all();

        // Eager Loading du profile
        $users = User::with('profile')->get();

        return view('users.index',compact("users"));
    }
}
