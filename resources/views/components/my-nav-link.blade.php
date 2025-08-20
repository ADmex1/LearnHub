{{-- rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white --}}
{{-- rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white --}}
@props(['href', 'current' => false, 'AriaCurrent' => false])

@php
    // $classes = $current ? 'bg-gray-900 text-white' : ' text-gray-300 hover:bg-gray-700 hover:text-white';
    if ($current) {
        $classes = 'bg-gray-800 text-white';
        $AriaCurrent = 'page';
    } else {
        $classes = 'text-gray-300 hover:bg-gray-800 hover:text-white';
    }
@endphp
<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'rounded-md  px-3 py-2 text-sm font-medium text-white ' . $classes, 'AriaCurrent' => $AriaCurrent]) }}>
    {{ $slot }}
</a>
