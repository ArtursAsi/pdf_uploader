<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function edit()
    {
        $user = auth()->user();
        return view('edit', compact('user'));
    }
}
