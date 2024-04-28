<article class="w-full h-full flex flex-col lg:grid grid-cols-12 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950"
    id="{{ $product->id }}">
    <!-- Product Image -->
    <a href="{{ route('catalog.show', ['product_id' => $product->id]) }}" class="{{ $col_span_img }} flex justify-center">
        <div
            class="w-full group flex justify-center items-center rounded-lg py-4 px-3 hover:bg-red-600 hover:opacity-75 transition ease-in-out duration-150">
            <img class="w-60 md:w-48 lg:w-52 rounded-t-lg group-hover:scale-105 transition ease-in-out duration-150"
                src="{{ asset('storage/images/products/' . $product->image_path) }}"
                onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
        </div>
    </a>

    <!-- Product Details -->
    <div class="{{ $col_span_details }} h-full flex flex-col p-5 gap-5">
        <h3 wire:click="productDetails"
            class="text-lg lg:{{ $title_size }} font-semibold text-slate-100 hover:text-red-600 hover:underline hover:underline-offset-4 hover:cursor-pointer transition ease-in-out duration-150">
            {{ Str::upper($product->name) }}
        </h3>

        <p class="text-xl lg:text-2xl text-slate-100 font-normal">
            {{ number_format($product->price, 2, ',', '.') }} €
        </p>

        <div class="h-full self-end flex items-end">
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
</article>
