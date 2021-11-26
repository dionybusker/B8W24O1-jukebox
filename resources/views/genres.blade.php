<x-layout>
    <section class="container w-full bg-gray-100 shadow-md">
        <div class="px-10 py-8">
            <div class="flex justify-center mx-auto text-xl font-semibold mb-5">Genres</div>

            <div class="flex justify-center mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
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
    </section>
</x-layout>
