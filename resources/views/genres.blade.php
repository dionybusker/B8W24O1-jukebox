<x-layout>
    <h1>Jukebox</h1>

    <ul>
        @foreach ($genres as $genre)
            <li>
                {{ $genre->name }}
            </li>
        @endforeach
    </ul>

    <a href="/songs">Go to Songs</a>
</x-layout>
