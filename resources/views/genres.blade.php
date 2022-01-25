<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Genres') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="w-full mx-auto flex items-center lg:grid lg:grid-cols-6">
                        @foreach ($genres as $genre)
                            <div class="p-2">
                                <div class="space-x-2 px-4 pt-2">
                                    <a href="/?genre={{ $genre->name }}" class="px-3 py-0.5 bg-white border border-blue-500 rounded-full text-blue-400 hover:bg-blue-100 hover:text-blue-500 text-xs uppercase font-semibold">
                                        {{ $genre->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- pagination -->
            {{ $genres->links() }}
        </div>
    </div>
</x-app-layout>
