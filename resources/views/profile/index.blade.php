@extends('layouts.app')

@section('title')
    Perfil: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uupercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" @error('username') @enderror
                        value="{{ auth()->user()->username }}" />
                    @error('username')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uupercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu correo electrónico"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" @error('email') border-red-500 @enderror
                        value="{{ auth()->user()->email }}" />

                    @error('email')
                        <span
                            class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uupercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Nueva contraseña"
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

                <div class="mb-5">
                    <label for="image" class="mb-2 block uupercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input type="file" id="image" name="image"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full" value="" accept=".jpg, .jpeg, .png" />
                </div>

                <input type="submit" value="Guardar cambios"
                    class="bg-sky-400 hover:bg-sky-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold" />
            </form>
        </div>
    </div>
@endsection
