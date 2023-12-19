@extends('layouts.app')

@section('title')
    Regístrate en DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-6 md:items-center p-5">
        <div class="md:w-6/12">
            <img src="{{ asset('img/register.jpg') }}" class="border rounded-lg border-gray-300 shadow-lg"
                alt="imagen regsitro de usuario">
        </div>

        <div class="md:w-4/12 bg-sky-200 p-6 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uupercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" @error('name') @enderror
                        value="{{ old('name') }}">

                    @error('name')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uupercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" @error('username') @enderror
                        value="{{ old('username') }}" />

                    @error('username')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uupercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu correo electrónico"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" @error('email') border-red-500 @enderror
                        value="{{ old('email') }}" />

                    @error('email')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uupercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" @error('password') @enderror />

                    @error('password')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uupercase text-gray-500 font-bold">Confirmar
                        password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repite tu contraseña" class="border rounded-lg border-fuchsia-300 p-2 w-full" />
                </div>

                <input type="submit" value="Crear cuenta"
                    class="bg-fuchsia-400 hover:bg-fuchsia-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold" />
            </form>

        </div>
    </div>
@endsection
