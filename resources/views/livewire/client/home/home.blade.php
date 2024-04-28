<div>
    <!-- Header -->
    <x-slot name="header">
        <div class="home-header flex flex-col justify-center items-center gap-10 p-14 mt-20">
            <div class="flex flex-col sm:flex-row justify-center items-center gap-2 max-w-7xl mx-auto">
                <h2
                    class="text-center sm:text-start text-2xl sm:text-5xl lg:text-7xl font-bold text-slate-100 logo-shadow">
                    Los mejores videojuegos, consolas y accesorios</h2>
                <img src="{{ asset('storage/images/logo.png') }}" alt="logo" class="w-36 sm:w-48 lg:w-96 logo-shadow"
                    onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
            </div>
            <form action="{{ route('catalog') }}" method="POST">
                @csrf
                <x-button class="text-sm sm:text-xl lg:text-2xl bg-red-600 hover:bg-red-700 active:bg-red-800">
                    ¡Compra ya!
                </x-button>
            </form>
        </div>
    </x-slot>

    <!-- Categories -->
    <section class="max-w-7xl mx-auto py-10">
        @livewire('client.home.home-categories', [
            'videogames_genres' => $videogames_genres,
            'categories' => $categories,
        ])
    </section>

    <!-- Products -->
    <section class="max-w-7xl mx-auto py-12 px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-11 md:grid-cols-12 gap-28 sm:gap-0">
            <!-- Top Sales -->
            <div class="col-span-1 sm:col-span-5 md:col-span-4 lg:col-span-3 flex flex-col gap-4">
                <!-- Title -->
                <div
                    class="w-full flex justify-between items-center gap-3 bg-zinc-700 rounded-lg px-6 py-3 shadow-lg shadow-gray-950">
                    <img src="{{ asset('storage/icons/fire.png') }}" alt="icon-top-sales"
                        class="w-8 md:w-7 lg:w-6 xl:w-8"
                        onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
                    <h2 class="text-slate-100 text-center text-lg sm:text-md md:text-xl lg:text-lg xl:text-2xl">
                        Top Ventas
                    </h2>
                    <img src="{{ asset('storage/icons/fire.png') }}" alt="icon-top-sales"
                        class="w-8 md:w-7 lg:w-6 xl:w-8"
                        onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
                </div>

                @forelse ($top_sales as $product)
                    @livewire('client.product.product-aside-card', [
                        'product' => $product,
                    ])
                @empty
                    <div class="w-full bg-zinc-700 rounded-lg px-6 py-3 shadow-lg shadow-gray-950">
                        <p class="text-center text-lg text-slate-100">No hay ventas</p>
                    </div>
                @endforelse

                <!-- View More Button -->
                <form action="{{ route('catalog') }}" method="POST">
                    @csrf
                    <x-button class="w-full bg-red-600 hover:bg-red-700 active:bg-red-800">
                        Ver más...
                    </x-button>
                </form>
            </div>

            <div class="hidden sm:block sm:col-span-1"></div>

            <!-- New Releases -->
            <div class="col-span-1 sm:col-span-5 md:col-span-7 lg:col-span-8 flex flex-col gap-4">
                <!-- Title -->
                <div
                    class="w-full flex justify-center items-center gap-3 bg-zinc-700 rounded-lg px-6 py-3 shadow-lg shadow-gray-950">
                    <img src="{{ asset('storage/icons/new.png') }}" alt="icon-top-sales"
                        class="w-8 md:w-7 lg:w-6 xl:w-8"
                        onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
                    <h2 class="w-full text-slate-100 text-md md:text-xl lg:text-lg xl:text-2xl">
                        Novedades
                    </h2>
                </div>

                @foreach ($new_releases as $product)
                    @livewire('client.product.product-card', [
                        'product' => $product,
                    ])
                @endforeach

                <!-- View More Button -->
                <form action="{{ route('catalog') }}" method="POST">
                    @csrf
                    <x-button class="w-full text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                        Ver más...
                    </x-button>
                </form>
            </div>
        </div>
    </section>
</div>
