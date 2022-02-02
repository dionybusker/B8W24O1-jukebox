<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playlists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <x-table.table :headers="['Name', 'Total songs', 'Delete playlist']">
                        @foreach ($playlists as $playlist)
                            <tr class="whitespace-nowrap">
                                <x-table.td>
                                    <a href="playlists/{{ $playlist['id'] }}">
                                        {{ $playlist->name }}
                                    </a>
                                </x-table.td>
                                <x-table.td>
                                    @foreach ($count as $c)
                                        @if ($playlist->id == $c->playlist_id)
                                            {{ $c->total }}
                                        @endif
                                    @endforeach
                                </x-table.td>
                                <x-table.td>
                                    <form action="playlists/delete/{{ $playlist['id'] }}" method="post">
                                        @csrf
                                        <button class="w-1/2 bg-red-600 hover:bg-red-500 rounded rounded-md text-white text-center py-1">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
