<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //Si no está autenticado, no puede acceder a la página de inicio, accederá a la página de login
        $this->middleware('auth')->except('index');
    }
    public function __invoke()
    {
        //Obtener a quienes sigo
        $ids = auth()->user()->follows->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(6);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
