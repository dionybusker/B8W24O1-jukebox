<x-app-layout>
    <x-slot name="header">
        {{--        @include('_header')--}}

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Genres') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center mx-auto">
                        <div class="border-b border-gray-200 shadow">
                            <x-table.table :headers="['ID', 'Name', 'Find songs']">
                                @foreach ($genres as $genre)
                                    <tr class="whitespace-nowrap">
                                        <x-table.td>{{ $genre->id }}</x-table.td>
                                        <x-table.td>{{ $genre->name }}</x-table.td>
                                        <x-table.td>
                                            <x-table.td-search></x-table.td-search>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </x-table.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
