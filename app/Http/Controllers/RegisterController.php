<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users,username|min:3|max:20',
            'email' => 'required|unique:users,email|max:60|email',
            'password' => 'required|confirmed',
        ]);
    }
}
