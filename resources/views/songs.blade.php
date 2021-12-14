<x-app-layout>
    <x-slot name="header">
{{--        @include('_header')--}}

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                                        <p class="font-semibold">{{ $song->name }}</p>
                                        <p>{{ $song->artist }}</p>
                                        <p>{{ $song->duration }} minutes</p>
                                    </div>

                                    <form action="{{ route('songs') }}/{{ $song->id }}" method="post">
                                        @csrf
                                        <div class="w-full flex text-sm uppercase font-semibold">
    {{--                                         href="/songs/add/{{ $song->id }}" --}}
                                            <button class="w-full bg-blue-600 hover:bg-blue-500 text-white text-center py-1">
                                                <i class="fas fa-plus"></i>
                                            </button>
    {{--                                        <a href="#delete" class="w-1/2 bg-red-600 hover:bg-red-500 text-white text-center py-1">--}}
    {{--                                            <i class="fas fa-trash-alt"></i>--}}
    {{--                                        </a>--}}
                                        </div>
                                    </form>

    {{--                                <div class="w-full flex text-sm uppercase font-semibold">--}}
    {{--                                    <form action="/songs/add/{{ $song->id }}" method="post" class="w-1/2 bg-blue-600 hover:bg-blue-500 text-white text-center py-1">--}}
    {{--                                        <button>--}}
    {{--                                            <i class="fas fa-plus"></i>--}}
    {{--                                        </button>--}}
    {{--                                    </form>--}}

    {{--                                    <form action="#" method="post" class="w-1/2 bg-red-600 hover:bg-red-500 text-white text-center py-1">--}}
    {{--                                        <button>--}}
    {{--                                            <i class="fas fa-trash-alt"></i>--}}
    {{--                                        </button>--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
