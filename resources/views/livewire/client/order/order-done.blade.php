<section class="max-w-7xl h-screen mx-auto px-5 py-10 flex flex-col items-center justify-center mt-10">
    <div class="w-40 bg-red-600 rounded-full p-10 shadow-lg shadow-gray-950 animate-bounce">
        <img src="{{ asset('storage/icons/check.png') }}" alt=""
            onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
    </div>
    <div class="text-slate-100 mt-10">
        <h2 class="text-2xl text-center leading-10 font-extrabold">
            {{ Str::upper('¡Pedido realizado correctamente!') }}</h2>
    </div>
    <div class="flex flex-col sm:flex-row justify-center items-center gap-5 mt-10">
        <form action="{{ route('catalog') }}" method="POST">
            @csrf
            <x-button type="submit" class="bg-zinc-600 hover:bg-zinc-700 active:bg-zinc-800">
                Seguir comprando
            </x-button>
        </form>
        <a href="{{ route('profile.orders') }}">
            <x-button class="bg-red-600 hover:bg-red-700 active:bg-red-800">Ver pedidos</x-button>
        </a>
    </div>
</section>
