<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
    <title>DevStagram - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-3xl font-mono font-black ml-2 underline cursor-pointer">DevStagram</a>

            @auth
                <nav class="flex gap-2 items-center" aria-label="">
                    <a class="flex items-center gap-2 bg-white border-2 rounded-full text-fuchsia-600 text-sm uppercase font-bold cursor-pointer px-2 py-1 hover:bg-fuchsia-600 hover:text-white transition-all duration-500"
                        href="{{ route('posts.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Crear
                    </a>


                    <a class="text-sm font-mono font-bold text-gray-500 mx-2" href="{{ route('posts.index', auth()->user()->username) }}">| Hola, <span
                            class="font-mono font-bold  inline-block hover:text-fuchsia-600 text-fuchsia-400 text-sm">{{ auth()->user()->username }} |</span>
                    </a>

                    <a href="">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="font-mono font-bold uppercase inline-block hover:text-sky-600 text-sky-400 text-sm relative transition-all duration-500
                                before:content-['']
                                before:absolute
                                before:-bottom-2
                                before:left-0
                                before:w-0
                                before:h-1
                                before:transition-all
                                before:duration-500
                                before:bg-sky-400
                                before:rounded-full
                                hover:before:w-full
                                hover:before:opacity-100">
                                Cerrar sesión</button>
                        </form>
                    </a>

                </nav>

            @endauth

            @guest
                <nav class="flex gap-2 items-center" aria-label="">
                    <a href="{{ route('login') }}"
                        class="font-mono font-bold uppercase inline-block hover:text-fuchsia-600 text-fuchsia-400 text-sm relative transition-all duration-500
                    before:content-['']
                    before:absolute
                    before:-bottom-2
                    before:left-0
                    before:w-0
                    before:h-1
                    before:transition-all
                    before:duration-500
                    before:bg-fuchsia-400
                    before:rounded-full
                    hover:before:w-full
                    hover:before:opacity-100">Login</a>
                    <a href=" {{ route('register') }}"
                        class="font-mono font-bold uppercase inline-block text-sky-400 hover:text-sky-600 text-sm relative transition-all duration-500
                    before:content-['']
                    before:absolute
                    before:-bottom-2
                    before:left-0
                    before:w-0
                    before:h-1
                    before:transition-all
                    before:duration-500
                    before:bg-sky-400
                    before:rounded-full
                    hover:before:w-full
                    hover:before:opacity-100">Crear cuenta</a>
                </nav>

            @endguest



        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="text-3xl font-black text-center mb-10">@yield('title')</h2>
        @yield('content')
    </main>

    <footer class="mt-10 p-5 uppercase bg-white border-t">
        <p class="text-center font-bold text-gray-500 text-sm">DevStagram - &copy; Todos los derechos reservados -
            {{ now()->year }}</p>
    </footer>

    @livewireScripts
</body>

</html>
