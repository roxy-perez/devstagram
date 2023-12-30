<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required', 'min:3', 'max:20', 'unique:users,username,' . auth()->user()->id, 'not_in:twitter,profile'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id],
            'password' => ['nullable', 'confirmed', 'min:6'],
        ]);
        
        if ($request->image) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->extension();

            $serverMemoImage = Image::make($image);
            $serverMemoImage->fit(1000, 1000);

            $imagePath = public_path('profiles/' . $imageName);
            $serverMemoImage->save($imagePath);
        }

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password); // Nueva línea para actualizar la contraseña
        }
        $user->image = $imageName ?? auth()->user()->image ?? null;
        $user->save();

        return redirect()->route('posts.index', $user->username)->with('success', '¡Perfil actualizado correctamente!');
    }
}
