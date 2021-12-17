<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Genres') }}
            </h2>

            <div>
                <button class="block lg:inline-block lg:text-center lg:text-white lg:mt-0 lg:ml-3 lg:px-3 lg:py-1 pl-2 py-3 rounded lg:uppercase lg:text-xs lg:font-semibold lg:bg-blue-600 lg:hover:bg-blue-500 lg:hover:text-white hover:bg-gray-200 hover:text-gray-800">
                    <a href="">
                        {{ __('Find genre') }}
                    </a>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
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
</x-app-layout>
