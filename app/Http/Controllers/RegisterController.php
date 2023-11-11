<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Modification: add username to request
        $request->request->add(['username' => Str::slug($request->username)]);

        // validation
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users,username|min:3|max:20',
            'email' => 'required|unique:users,email|max:60|email',
            'password' => 'required|confirmed|min:6',
        ]);

        // store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
        ]);

        // sign in user
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index');
    }
}
