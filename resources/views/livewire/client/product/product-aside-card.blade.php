<div class="w-full {{ $height }} flex flex-col bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
    <!-- Product Image -->
    <a href="{{ route('catalog.show', ['product_id' => $product->id]) }}">
        <div
            class="group flex justify-center items-center rounded-lg py-4 px-3 hover:bg-red-600 hover:opacity-75 transition ease-in-out duration-150">
            <img class="w-60 lg:w-52 rounded-t-lg group-hover:scale-105 transition ease-in-out duration-150"
                src="{{ asset('storage/images/products/' . $product->image_path) }}"
                onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
        </div>
    </a>

    <!-- Product Details -->
    <div class="h-full p-5 flex flex-col gap-5">
        <h5 wire:click="productDetails"
            class="text-lg font-bold text-slate-100 hover:text-red-600 hover:underline hover:underline-offset-4 hover:cursor-pointer transition ease-in-out duration-150">
            {{ Str::upper($product->name) }}
        </h5>

        <p class="text-xl font-normal text-slate-100 mb-auto">
            {{ number_format($product->price, 2, ',', '.') }} €
        </p>

        @if ($product->stock <= 0)
            <x-button class="text-sm bg-slate-500 hover:cursor-default">
                Sin Stock
                <i class="fa-solid fa-face-frown ms-3 text-lg"></i>
            </x-button>
        @else
            <x-button wire:click="addToCart" class="text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                <i class="fa-solid fa-cart-plus me-3"></i>
                Añadir
            </x-button>
        @endif
    </div>
</div>
