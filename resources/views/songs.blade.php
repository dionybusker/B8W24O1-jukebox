<x-app-layout>
    <x-slot name="header">
{{--        @include('_header')--}}

        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Songs') }}
            </h2>

            <x-genre-dropdown>
                <x-slot name="trigger">
                    <x-corner-button>
                        {{ isset($currentGenre) ? ucwords($currentGenre->name) : 'Genres' }}
                    </x-corner-button>
                </x-slot>

                <x-genre-dropdown-item href="/">
                    All
                </x-genre-dropdown-item>

                @foreach ($genres as $genre)
                    <x-genre-dropdown-item href="/?genre={{ $genre->name }}">
                        {{ ucwords($genre->name) }}
                    </x-genre-dropdown-item>
                @endforeach
            </x-genre-dropdown>
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

                        <form action="{{ route('songs') }}/{{ $song->id }}" method="post">
                            @csrf
                            <button class="w-full bg-blue-600 hover:bg-blue-500 text-white text-center py-1">
                                <i class="fas fa-plus"></i>
                            </button>
                        </form>
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
