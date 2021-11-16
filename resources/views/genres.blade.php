<!doctype html>

<title>Jukebox</title>

<body>
    <h1>Jukebox</h1>

    <ul>
        @foreach ($genres as $genre)
            <li>
                {{ $genre->name }}
            </li>
        @endforeach
    </ul>

</body>
