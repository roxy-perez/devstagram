@extends('layouts.app')

@section('title')
    Crear una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone" action=" {{ route('images.store') }}" method="POST" enctype="multipart/form-data"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-5 bg-sky-200 rounded-lg shadow-lg mt-10 md:mt-0">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uupercase text-gray-500 font-bold">Título</label>
                    <input type="text" id="title" name="title" placeholder="Título de la publicación"
                        class="border rounded-lg border-fuchsia-300 p-2 w-full"
                    @error('title') @enderror
                        value="{{ old('title') }}">

                    @error('title')
                        <span class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uupercase text-gray-500 font-bold">Descripción</label>
                    <textarea type="text" id="description" name="description" placeholder="Descripción de la publicación"
                        class="text-left border rounded-lg border-fuchsia-300 p-2 w-full" @error('description') @enderror>
                        {{ old('description') }}
                    </textarea>

                    @error('description')
                        <span class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="image" value="{{ old('image') }}">
                    @error('image')
                        <p class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicación"
                    class="bg-fuchsia-400 hover:bg-fuchsia-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold">
            </form>
        </div>

    </div>
@endsection
