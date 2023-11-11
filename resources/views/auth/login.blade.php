@extends('layouts.app')

@section('title')
    Inicia sesión en DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-6 md:items-center p-5">
        <div class="md:w-6/12">
            <img src="{{ asset('img/login.jpg') }}" class="border rounded-lg border-gray-300 shadow-lg"
                alt="imagen login de usuario">
        </div>

        <div class="md:w-4/12 bg-sky-200 p-6 rounded-lg shadow-lg">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                @if (session('error'))
                    <p class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ session('error') }}
                    </p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uupercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu correo electrónico"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full
                        @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">

                    @error('email')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uupercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full
                        @error('password') border-red-500 @enderror">

                    @error('password')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" id="remember" name="remember" class="border rounded-lg border-fuchsia-300">
                    <label for="remember" class="text-sky-500 text-sm font-semibold">Mantener mi sesión abierta</label>
                </div>


                <input type="submit" value="Iniciar sesión"
                    class="bg-fuchsia-400 hover:bg-fuchsia-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold">
            </form>

        </div>
    </div>
@endsection
