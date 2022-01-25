<x-app-layout>
    <x-slot name="header">
{{--        @include('_header')--}}

        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Songs') }}
            </h2>

            <x-dropdown>
                <x-slot name="trigger">
                    <x-corner-button>
                        {{ isset($currentGenre) ? ucwords($currentGenre->name) : 'Genres' }}
                    </x-corner-button>
                </x-slot>

                <x-dropdown-item href="/">
                    All
                </x-dropdown-item>

                @foreach ($genres as $genre)
                    <x-dropdown-item href="/?genre={{ $genre->name }}">
                        {{ ucwords($genre->name) }}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="lg:w-2/3 w-full mx-auto flex items-center lg:grid lg:grid-cols-4">
            @foreach ($songs as $song)
                <div class="p-2">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200">
                        <div class="space-x-2 px-4 pt-2">
                            <a href="/?genre={{ $song->genre->name }}" class="px-3 py-0.5 bg-white border border-blue-500 rounded-full text-blue-400 hover:bg-blue-100 hover:text-blue-500 text-xs uppercase font-semibold">
                                {{ $song->genre->name }}
                            </a>
                        </div>

                        <div class="px-4 py-2 overflow-auto h-40">
                            <p><span class="font-semibold">Title:</span> {{ $song->name }}</p>
                            <p><span class="font-semibold">Artist:</span> {{ $song->artist }}</p>
                            <p><span class="font-semibold">Length:</span> {{ $song->length }}</p>
                        </div>

                        @if (Request::url() == route('songs') || Request::url() == route('home'))
                            <x-form action="{{ route('songs') }}/{{ $song->id }}">
                                <x-form-submit />
                            </x-form>
                        @elseif (Request::url() == (route('playlists').'/'.request()->route('playlistId').'/addSongs'))
                            <x-form action="{{ route('playlists') }}/{{ request()->route('playlistId') }}/addSongs/{{ $song->id }}">
                                <x-form-submit />
                            </x-form>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>

        <div class="lg:w-2/3 w-full mx-auto items-center">
            <!-- pagination -->
            {{ $songs->links() }}
        </div>
    </div>
</x-app-layout>
