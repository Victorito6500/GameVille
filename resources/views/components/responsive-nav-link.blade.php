@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-red-600 text-start text-sm font-semibold text-red-600 bg-red-50 hover:text-red-700 hover:border-red-700 hover:bg-red-100 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-sm font-normal text-slate-100 hover:text-red-700 hover:border-red-700 hover:bg-red-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
