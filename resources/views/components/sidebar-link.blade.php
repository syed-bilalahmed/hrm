@props(['active', 'icon' => null])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-6 py-3 bg-gray-900 border-l-4 border-indigo-500 text-white font-medium transition duration-150 ease-in-out'
            : 'flex items-center px-6 py-3 border-l-4 border-transparent text-gray-300 hover:bg-gray-700 hover:text-white font-medium transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <i class="{{ $icon }} w-5 h-5 mr-3 text-center"></i>
    @endif
    {{ $slot }}
</a>
