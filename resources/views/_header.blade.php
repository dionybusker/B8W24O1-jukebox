<header>
    <div class="container w-full px-10 py-8 text-center">
        <h1 class="text-4xl font-semibold">Silencify</h1>

        <p class="my-5">The best jukebox you have ever seen.</p>

        <p class="mb-5 text-sm italic">It's true.</p>

        <div class="space-y-2 mt-4">
            <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

                <div x-data="{ show: false }" class="text-left" @click.away="show = false">
                    <button @click="show = !show" class="bg-gray-100 rounded-lg border lg:text-center text-left py-1 px-4 lg:w-32 w-full font-semibold">
                        Genres
                        <i class="fas fa-angle-down"></i>
                    </button>

                    <div x-show="show" class="py-2 absolute bg-gray-100 w-full rounded-lg z-50" style="display: none">
                        @foreach ($genres as $genre)
                        {{-- href="/genres/{{ $genre->id }}" --}}
                            <a href="#" class="block text-left px-4 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">{{ $genre->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
