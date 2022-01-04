<div>
    <button {{ $attributes->merge(['class' => 'block lg:inline-block lg:text-center lg:text-white lg:mt-0 lg:ml-3 lg:px-3 lg:py-1 pl-2 py-3 rounded lg:uppercase lg:text-xs lg:font-semibold lg:bg-blue-600 lg:hover:bg-blue-500 lg:hover:text-white hover:bg-gray-200 hover:text-gray-800']) }}>
        {{ $slot }}
    </button>
</div>
