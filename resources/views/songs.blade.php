<x-layout>
    <section class="container w-full bg-gray-100 shadow-md">
        <div class="px-10 py-8">
            <div class="flex justify-center mx-auto text-xl font-semibold mb-5">Songs</div>

            <div class="flex justify-center mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <x-table.table :headers="['Name', 'Artist', 'Genre', 'Duration', 'Details', 'Add to playlist']">
                                @foreach ($songs as $song)
                                    <tr class="whitespace-nowrap">
                                        <x-table.td>{{ $song->name }}</x-table.td>
                                        <x-table.td>{{ $song->artist }}</x-table.td>
                                        <x-table.td>{{ $song->genre->id }}</x-table.td>
                                        <x-table.td>{{ $song->duration }}</x-table.td>
                                        <x-table.td>
                                            <x-table.td-info></x-table.td-info>
                                        </x-table.td>
                                        <x-table.td>
                                            <x-table.td-add></x-table.td-add>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </x-table.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
