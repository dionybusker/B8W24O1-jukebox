<x-app-layout>
    <x-slot name="header">
{{--        @include('_header')--}}

        <div class="flex justify-between">
            <h2 class="inline-block font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Songs') }}
            </h2>

            <div>
                <button class="block lg:inline-block lg:text-center lg:text-white lg:mt-0 lg:ml-3 lg:px-3 lg:py-1 pl-2 py-3 rounded lg:uppercase lg:text-xs lg:font-semibold lg:bg-blue-600 lg:hover:bg-blue-500 lg:hover:text-white hover:bg-gray-200 hover:text-gray-800">
                    <a href="">
                        {{ __('Sort by genre') }}
                    </a>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="lg:w-2/3 w-full mx-auto flex items-center lg:grid lg:grid-cols-4">
            @foreach ($songs as $song)
                <div class="p-2">
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200">
                        <div class="space-x-2 px-4 pt-2">
                            <a href="#genre" class="px-3 py-0.5 bg-white border border-blue-500 rounded-full text-blue-400 hover:bg-blue-100 hover:text-blue-500 text-xs uppercase font-semibold">
                                {{ $song->genre->name }}
                            </a>
                        </div>

                        <div class="px-4 py-2 overflow-auto h-40">
                            <p><span class="font-semibold">Title:</span> {{ $song->name }}</p>
                            <p><span class="font-semibold">Artist:</span> {{ $song->artist }}</p>
                            <p><span class="font-semibold">Length:</span> {{ $song->length }}</p>
                        </div>

                        <form action="{{ route('songs') }}/{{ $song->id }}" method="post">
                            @csrf
                            <div class="w-full flex text-sm uppercase font-semibold">
                                <button class="w-full bg-blue-600 hover:bg-blue-500 text-white text-center py-1">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="lg:w-2/3 w-full mx-auto items-center">
            <!-- pagination -->
            {{ $songs->links() }}
        </div>
    </div>
</x-app-layout>
