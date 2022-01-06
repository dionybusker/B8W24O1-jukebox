@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false" class="relative">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-blue-600 mt-2 rounded-xl z-50 overflow-auto max-h-64" style="display: none">
        {{ $slot }}
    </div>
</div>
