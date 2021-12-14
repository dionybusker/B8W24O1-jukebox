{{--@props(['genre'])--}}

<table class="w-full">
    <thead class="bg-gray-50">
        @foreach ($headers as $header)
            <th class="px-6 py-2 text-xs uppercase">{{ $header }}</th>
        @endforeach
    </thead>
    <tbody class="bg-white">
        {{ $slot }}
    </tbody>
</table>
