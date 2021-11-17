<x-layout>
    <h1>Jukebox - Songs</h1>

    <ul>
        @foreach ($songs as $song)
            <li>
                {{ $song->name }} || <a href="/genres/{{ $song->genre->id }}">{{ $song->genre->name }}</a>
            </li>
        @endforeach
    </ul>

    <a href="/">Go to Genres</a>
</x-layout>
