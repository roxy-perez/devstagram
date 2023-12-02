@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto flex">
        <div class="md:w-1/2 ">
            <img class="border-2 border-fuchsia-700 rounded-lg" src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}">

            <div class="p-3 flex justify-between">
                <p>0 likes</p>
            </div>
            <div>
                <p>
                    <span class="font-bold">{{ $post->user->username }}</span>
                </p>
                <p>
                    <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </p>
                <p class="mt-5">
                    {{ $post->description }}
                </p>
            </div>

        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow p-5 mb-5 bg-slate-200 border rounded-lg">
                <p class="text-xl font-bold uppercase text-center mb-4 text-gray-500">Comentario</p>
                <form>
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="mb-5">
                        <label for="content" class="mb-2 block text-gray-400 font-bold">Añade un comentario</label>
                        <textarea type="text" id="comment" name="comment" placeholder="Agrega un comentario"
                            class="text-left border rounded-lg border-sky-500 p-2 w-full" @error('comment')  @enderror>
                        </textarea>

                        @error('comment')
                            <span class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="submit" value="Agregar comentario"
                        class="bg-sky-400 hover:bg-fuchsia-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold">
            </div>
        </div>
    </div>
@endsection
