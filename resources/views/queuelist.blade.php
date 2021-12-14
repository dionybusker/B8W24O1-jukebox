<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Queuelist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">


{{--            {{ dd(Session::get('list')) }}--}}

{{--                        <div class="flex justify-center mx-auto">--}}
{{--                            <div class="flex flex-col">--}}
{{--                                <div class="w-full">--}}
{{--                                    <div class="border-b border-gray-200 shadow">--}}
                                        <x-table.table :headers="['Name', 'Genre', 'Artist', 'Duration', 'Remove from queue']">
                                            @if (Session::has('list'))
                                                @foreach ($songs as $song)
                                                    @foreach (Session::get('list') as $listItem)

                                                        @if ($listItem == $song['id'])
        {{--                                                {{ dd($loop) }}--}}
        {{--                                                @if ($loop->first) @continue @endif--}}
        {{--                                                {{dd($song)}}--}}
                                                            <tr class="whitespace-nowrap">
                {{--                                                {{ dd($song) }}--}}
                                                                <x-table.td>{{ $song->name }}</x-table.td>
                                                                <x-table.td>{{ $song->genre->name }}</x-table.td>
                                                                <x-table.td>{{ $song->artist }}</x-table.td>
                                                                <x-table.td>{{ $song->duration }}</x-table.td>
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
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        Hier wordt de wachtrij weergegeven--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
