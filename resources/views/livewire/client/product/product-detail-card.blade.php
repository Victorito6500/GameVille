<div
    class="w-full p-5 sm:py-6 sm:px-10 flex flex-col md:flex-row mx-auto gap-3 lg:gap-10 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
    <div class="flex justify-center items-center">
        <img class="w-80" src="{{ asset('storage/images/products/' . $product->image_path) }}" alt="product-image"
            onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
    </div>

    <div class="grow flex flex-col justify-between">
        <h2 class="text-xl md:text-2xl lg:text-3xl my-5">
            {{ Str::upper($product->name) }}
        </h2>
        <div class="text-zinc-200 text-xs flex flex-col gap-4 sm:gap-8">
            @if ($product->genre)
                <div class="flex gap-1">
                    <span class="font-bold">Género:</span>
                    <form action="{{ route('catalog') }}" method="POST">
                        @csrf
                        <button class="underline underline-offset-4 hover:text-red-500" name="genre_id"
                            value="{{ $product->genre_id }}" type="submit">{{ $product->genre->name }}</button>
                    </form>
                </div>
            @endif

            @if ($product->platform)
                <div class="flex gap-1">
                    <span class="font-bold">Plataforma:</span>
                    <form action="{{ route('catalog') }}" method="POST">
                        @csrf
                        <button class="underline underline-offset-4 hover:text-red-500" name="platform_id"
                            value="{{ $product->platform_id }}" type="submit">{{ $product->platform->name }}</button>
                    </form>
                </div>
            @endif

            @if ($product->category)
                <div class="flex gap-1">
                    <span class="font-bold">Categoría:</span>
                    <form action="{{ route('catalog') }}" method="POST">
                        @csrf
                        <button class="underline underline-offset-4 hover:text-red-500" name="category_id"
                            value="{{ $product->category_id }}" type="submit">{{ $product->category->name }}</button>
                    </form>
                </div>
            @endif

            @if ($product->release_date)
                <div class="flex gap-1">
                    <span class="font-bold">Fecha de lanzamiento:</span>
                    <span>{{ $product->release_date }}</span>
                </div>
            @endif

            @if ($product->developers)
                <div class="flex gap-1">
                    <span class="font-bold">Desarrollador:</span>
                    <span>{{ $product->developers }}</span>
                </div>
            @endif
        </div>
        <div class="self-end flex flex-col gap-3 mt-10">
            <span class="self-end text-3xl font-medium">
                {{ $product->price }}€
            </span>

            @if ($product->stock <= 0)
                <x-button class="text-sm bg-slate-500 hover:cursor-default">
                    Sin Stock
                    <i class="fa-solid fa-face-frown ms-3 text-lg"></i>
                </x-button>
            @else
                <x-button wire:click="addToCart" class="text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                    <i class="fa-solid fa-cart-plus me-3"></i>
                    Añadir carrito
                </x-button>
            @endif
        </div>
    </div>
</div>
