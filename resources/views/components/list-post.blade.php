<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-center gap-4">
            @foreach ($posts as $post)
                <div class="bg-white shadow-lg rounded-sm p-4 >
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}"
                            class="rounded-none ring-2 ring-sky-500 object-cover">
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
</div>

