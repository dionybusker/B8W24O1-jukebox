<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Queuelist') }}
            </h2>

            @auth
                <div>
                    <button class="block lg:inline-block lg:text-center lg:text-white lg:mt-0 lg:ml-3 lg:px-3 lg:py-1 pl-2 py-3 rounded lg:uppercase lg:text-xs lg:font-semibold lg:bg-blue-600 lg:hover:bg-blue-500 lg:hover:text-white hover:bg-gray-200 hover:text-gray-800">
                        <a href="{{ route('save-list') }}">
                            {{ __('Save as playlist') }}
                        </a>
                    </button>
                </div>
            @endauth
        </div>

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
                                        <x-table.table :headers="['Name', 'Genre', 'Artist', 'Length', 'Remove from queue']">
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
