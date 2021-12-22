<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                @foreach ($playlist as $data)
                    {{ $data->name }}
                @endforeach
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        @foreach ($playlist as $data)
            <div class="lg:w-2/3 w-full mx-auto flex items-center lg:grid lg:grid-cols-4">
                @foreach ($data->playlistSong as $playlistSong)
                    <div class="p-2">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200">
                            <div class="space-x-2 px-4 pt-2">
                                <a href="#genre" class="px-3 py-0.5 bg-white border border-blue-500 rounded-full text-blue-400 hover:bg-blue-100 hover:text-blue-500 text-xs uppercase font-semibold">
                                    {{ $playlistSong->song->genre->name }}
                                </a>
                            </div>

                            <div class="px-4 py-2 overflow-auto h-40">
                                <p><span class="font-semibold">Title:</span> {{ $playlistSong->song->name }}</p>
                                <p><span class="font-semibold">Artist:</span> {{ $playlistSong->song->artist }}</p>
                                <p><span class="font-semibold">Length:</span> {{ $playlistSong->song->length }}</p>
                            </div>

{{--                            <form action="{{ route('songs') }}/{{ $playlistSong->song->id }}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="w-full flex text-sm uppercase font-semibold">--}}
{{--                                    <button class="w-full bg-blue-600 hover:bg-blue-500 text-white text-center py-1">--}}
{{--                                        <i class="fas fa-plus"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout>
