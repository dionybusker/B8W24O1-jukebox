<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Queuelist') }}
            </h2>

            @auth
                <x-corner-button>
                    <a href="{{ route('save-list') }}">
                        {{ __('Save as playlist') }}
                    </a>
                </x-corner-button>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <x-table.table :headers="['Name', 'Genre', 'Artist', 'Length', 'Remove from queue']">
                        @if (Session::has('list'))
                            @foreach ($songs as $song)
                                @foreach (Session::get('list') as $listItem)

                                    @if ($listItem == $song['id'])
                                        <tr class="whitespace-nowrap">
                                            <x-table.td>{{ $song->name }}</x-table.td>
                                            <x-table.td>{{ $song->genre->name }}</x-table.td>
                                            <x-table.td>{{ $song->artist }}</x-table.td>
                                            <x-table.td>{{ $song->length }}</x-table.td>
                                            <x-table.td>
                                                <form action="queuelist/delete/{{ $song['id'] }}" method="post">
                                                    @csrf
                                                    <button class="w-1/2 bg-red-600 hover:bg-red-500 rounded rounded-md text-white text-center py-1">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </x-table.td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </x-table.table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
