<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevStagram - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1
                class="text-3xl font-mono font-black ml-2 underline cursor-none">DevStagram</h1>
            <nav class="flex gap-2 items-center">
                <a href="#" class="font-mono font-bold uppercase inline-block hover:text-fuchsia-600 text-fuchsia-400 text-sm relative transition-all duration-500
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
                <a href=" {{ route('register') }}" class="font-mono font-bold uppercase inline-block text-sky-400 hover:text-sky-600 text-sm relative transition-all duration-500
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
</body>

</html>
