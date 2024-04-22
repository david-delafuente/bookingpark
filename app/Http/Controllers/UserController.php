<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display user profile
     */
    public function show_profile()
    {
        $user = auth()->user();
        return view('pages/header/user_profile', compact('user'));
    }
    /**
     * Display welcome page with user data when auth is completed
     */
    public function index()
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }
}
