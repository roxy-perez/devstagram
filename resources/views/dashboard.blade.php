@extends('layouts.app')
@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/user.svg') }}" alt="user image" />
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:py-10 md:items-start py-10">
                <p class="text-gray-700 text-2xl mb-2">{{ $user->username }}</p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0<span class="font-normal"> Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0<span class="font-normal"> Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0<span class="font-normal"> Post</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-center text-4xl font-bold text-gray-800 my-10">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 justify-start">
                @foreach ($posts as $post)
                    <div>
                        <a>
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->titile }}"
                                class="rounded-2xl ring-2 ring-sky-500">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-4">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-center text-sm font-mono font-bold text-gray-800 uppercase">No hay publicaciones</p>
        @endif
    </section>
@endsection
