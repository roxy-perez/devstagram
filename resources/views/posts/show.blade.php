@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto p-5 md:flex">
        <div class="md:w-1/2 ">
            <img class="border-2 border-fuchsia-700 rounded-lg" src="{{ asset('uploads') . '/' . $post->image }}"
                alt="Imagen del post {{ $post->title }}">

            <div class="p-3 flex items-center gap-2">
                @auth
                <livewire:like-post :post="$post" />
                @endauth
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

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar publicación"
                            class="bg-red-400 hover:bg-red-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold mt-4">
                    </form>
                @endif

            @endauth

        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow p-5 mb-5 bg-slate-200 border rounded-lg">

                @auth
                    <p class="text-xl font-bold uppercase text-center mb-4 text-gray-500">Comentario</p>

                    @if (session('success'))
                        <div class="bg-green-400 text-white p-2 rounded-lg text-center mb-5">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="mb-5">
                            <label for="content" class="mb-2 block text-gray-400 font-bold">Añade un comentario</label>
                            <textarea type="text" id="comment" name="comment" placeholder="Agrega un comentario"
                                class="text-left border rounded-lg border-sky-500 p-2 w-full" @error('comment')  @enderror>
                        </textarea>

                            @error('comment')
                                <span
                                    class="bg-red-400 text-white my-2 rounded-lg p-2 text-sm text-center w-full">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" value="Agregar comentario"
                            class="bg-sky-400 hover:bg-fuchsia-600 transition-colors cursor-pointer uppercase w-full p-2 border rounded-lg text-white font-bold">
                    </form>
                @endauth

                <div class="bg-slate-100 shadow mt-3 md-5 max-h-96 rounded-lg">
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comment)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comment->user) }}"
                                    class="font-bold text-fuchsia-500">{{ $comment->user->username }}</a>
                                <p class="text-gray-600 font-semibold">{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-5 text-center text-gray-400">No hay comentarios aún</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
