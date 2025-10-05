@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link is-active inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white focus:outline-none transition duration-150 ease-in-out'
            : 'nav-link inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-300 hover:text-white focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
