<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // only authenticated users can access this controller
        $this->middleware(['auth']);
    }

    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user,
        ]);
    }
}
