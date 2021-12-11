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

            {{ dd(Session::get('list')) }}
                    @if (Session::has('song'))
                        <div class="flex justify-center mx-auto">
                            <div class="flex flex-col">
                                <div class="w-full">
                                    <div class="border-b border-gray-200 shadow">
                                        <x-table.table :headers="['Name', 'Genre', 'Artist', 'Duration']">
                                            {{--                                    @foreach (Session::get('song') as $song)--}}
                                            <tr class="whitespace-nowrap">

                                                <x-table.td>{{ Session::get('song')['name'] }}</x-table.td>
                                                <x-table.td>{{ Session::get('song')['genre'] }}</x-table.td>
                                                <x-table.td>{{ Session::get('song')['artist'] }}</x-table.td>
                                                <x-table.td>{{ Session::get('song')['duration'] }}</x-table.td>
                                            </tr>
                                            {{--                                    @endforeach--}}
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
