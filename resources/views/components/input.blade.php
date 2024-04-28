@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-zinc-800 text-zinc-900 focus:border-red-600 focus:ring-2 focus:ring-red-600 rounded-md shadow-md',
]) !!}>
