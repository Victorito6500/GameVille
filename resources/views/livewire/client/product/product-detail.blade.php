<section class="max-w-7xl mx-auto py-14 px-6 lg:px-8 text-slate-100 mt-20">
    @if (!$product)
        <div class="p-5 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">El producto no existe</div>
    @else
        <!-- Product Detail Card -->
        @livewire('client.product.product-detail-card', ['product' => $product])

        <!-- Product Description -->
        @if ($product->description)
            <div class="mt-10 bg-zinc-700 rounded-lg p-10 shadow-lg shadow-gray-950">
                <h3 class="text-lg underline underline-offset-4 mb-10">
                    {{ Str::upper($product->name) }}
                </h3>
                @foreach (explode("\n", $product->description) as $p)
                    <p class="text-sm font-light mt-5">
                        {{ $p }}
                    </p>
                @endforeach
            </div>
        @endif

        <!-- Related Products -->
        @if (sizeof($related_products) != 0)
            <div class="mt-10 grid grid-cols-12 gap-4">
                <div class="col-span-12 grid grid-cols-12 gap-4">
                    <h3
                        class="col-span-12 lg:{{ $col_span }} bg-zinc-700 rounded-lg text-2xl p-3 shadow-lg shadow-gray-950">
                        Productos relacionados
                    </h3>
                </div>

                <!-- Related Products Cards -->
                @foreach ($related_products as $product)
                    <div class="col-span-12 lg:col-span-4">
                        @livewire('client.product.product-aside-card', [
                            'product' => $product,
                            'height' => 'h-full',
                        ])
                    </div>
                @endforeach

                <!-- View More Button -->
                <form action="{{ route('catalog') }}" method="POST" class="{{ $col_span }}">
                    @csrf
                    <input type="hidden" name="genre_id" value="{{ $selected_genre }}">
                    <input type="hidden" name="platform_id" value="{{ $selected_platform }}">
                    <input type="hidden" name="category_id" value="{{ $selected_category }}">

                    <x-button type="submit"
                        class="{{ $col_span }} w-full bg-red-600 hover:bg-red-700 active:bg-red-800">
                        Ver más...
                    </x-button>
                </form>
            </div>
        @endif
    @endif
</section>
