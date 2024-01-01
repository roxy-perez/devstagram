@extends('layouts.app')
@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img class="border rounded-full"
                    src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/user.svg') }}"
                    alt="user image" />
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:py-10 md:items-start py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl mb-2">{{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('profile.index') }}" class="bg-sky-500 hover:bg-fuchsia-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" data-slot="icon" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followers->count() }} <span class="font-normal">@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->follows->count() }} <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }} <span class="font-normal">Post</span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->isfollowing(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit" value="Seguir"
                                    class="bg-sky-600 hover:bg-fuchsia-600 uppercase cursor-pointer w-full px-3 py-1 rounded-lg text-white text-xs font-bold" />
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Dejar de seguir"
                                    class="bg-fuchsia-600 hover:bg-sky-600 uppercase cursor-pointer w-full px-3 py-1 rounded-lg text-white text-xs font-bold" />
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-500 text-white rounded-lg text-center my-6 p-2 w-6/12 mx-auto">
            {{ session('success') }}
        </div>
    @endif
    <section class="container mx-auto mt-10">
        <h2 class="text-center text-4xl font-bold text-gray-800 my-10">Publicaciones</h2>
        <x-list-post :posts="$posts" />
    </section>
@endsection
