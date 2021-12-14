<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Queuelist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hier wordt de wachtrij weergegeven

{{--            {{ dd(Session::get('list')) }}--}}
                    @if (Session::has('list'))
                        <div class="flex justify-center mx-auto">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <div class="border-b border-gray-200 shadow">
                                        <x-table.table :headers="['Name', 'Genre', 'Artist', 'Duration', 'Remove from queue']">
                                            @foreach (Session::get('list') as $song)
                                                @if ($loop->first) @continue @endif
{{--                                                {{dd($song)}}--}}
                                                    <tr class="whitespace-nowrap">
        {{--                                                {{ dd($song) }}--}}
                                                        <x-table.td>{{ $song['name'] }}</x-table.td>
                                                        <x-table.td>{{ $song['genre_id'] }}</x-table.td>
                                                        <x-table.td>{{ $song['artist'] }}</x-table.td>
                                                        <x-table.td>{{ $song['duration'] }}</x-table.td>
                                                        <x-table.td>
                                                            <form action="{{ route('queuelist') }}/{{ $song['song_id'] }}" method="post">
                                                                @csrf
                                                                <button class="w-1/2 bg-red-600 hover:bg-red-500 rounded roundedn-md text-white text-center py-1">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
