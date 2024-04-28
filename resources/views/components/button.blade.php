<button {!! $attributes->merge([
    'type' => 'submit',
    'class' =>
        'flex justify-center items-center px-4 py-2 border border-transparent rounded-md font-semibold text-slate-100 uppercase tracking-widest shadow-lg shadow-zinc-900 hover:scale-105 transition ease-in-out duration-150',
]) !!}>
    {{ $slot }}
</button>
