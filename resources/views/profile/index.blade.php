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
