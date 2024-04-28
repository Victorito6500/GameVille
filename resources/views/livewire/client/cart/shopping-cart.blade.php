<div class="mt-20">
    <section class="max-w-7xl mx-auto py-14 px-6 lg:px-8 text-slate-100 mt-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-12 lg:gap-y-0 gap-x-14">
            <!-- Cart Content -->
            <div class="col-span-1 lg:col-span-8 flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <h2 class="font-semibold text-xl">Mi carrito</h2>
                    <button wire:click="clearCart"
                        class="underline underline-offset-4 text-red-300 hover:text-red-500 hover:cursor-pointer transition ease-in-out 150ms">
                        Vaciar carrito
                    </button>
                </div>

                @forelse ($cart_content as $product)
                    <div
                        class="flex flex-col md:flex-row items-start md:items-center justify-between bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                        <div class="flex items-center gap-4">
                            <div wire:click="productDetails({{ $product->id }})"
                                class="group
                                flex justify-center items-center rounded-lg py-4 px-3 hover:bg-red-600 hover:opacity-75 hover:cursor-pointer
                                transition ease-in-out duration-150">
                                <img src="{{ asset('storage/images/products/' . $product->attributes->image_path) }}"
                                    class="min-w-20 max-w-20 rounded-t-lg group-hover:scale-105 transition ease-in-out duration-150"
                                    onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
                            </div>

                            <p wire:click="productDetails({{ $product->id }})"
                                class="grow text-md font-medium text-slate-100 hover:text-red-600 hover:underline hover:underline-offset-4 hover:cursor-pointer transition ease-in-out duration-150">
                                {{ Str::upper($product->name) }}
                            </p>
                        </div>
                        <div class="flex items-center gap-4 py-5 md:py-0 px-5">
                            <button wire:click="removeOne({{ $product->id }})"
                                class="w-7 h-7 rounded-lg bg-red-600 hover:bg-red-700 active:bg-red-800 shadow-md shadow-gray-950 transition ease-in-out 150ms">
                                -
                            </button>

                            <span>{{ $product->quantity }}</span>

                            <button wire:click="addOne({{ $product->id }})"
                                class="w-7 h-7 rounded-lg bg-red-600 hover:bg-red-700 active:bg-red-800 shadow-md shadow-gray-950 transition ease-in-out 150ms">
                                +
                            </button>

                            <button wire:click="removeItem({{ $product->id }})"
                                class="text-sm px-3 py-1.5 hover:bg-red-600 active:bg-red-700 rounded-lg hover:shadow-md hover:shadow-gray-950 transition 150ms ease-in-out">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>

                            <p class="w-16 text-end">{{ number_format($product->price, 2, ',', '.') }}€</p>
                        </div>
                    </div>
                @empty
                    <div class="p-5 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                        El carrito está vacío
                    </div>
                @endforelse
            </div>

            <!-- Cart Resume -->
            @if ($cart_content->count() != 0)
                <div class="col-span-1 lg:col-span-4 flex flex-col gap-4">
                    <h2 class="font-semibold text-xl">Resumen pedido</h2>

                    <div class="p-5 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                        <div class="flex items-center justify-between">
                            <p>{{ $cart_total_quantity }} productos:</p>
                            <p>{{ number_format($cart_total, 2, ',', '.') }} €</p>
                        </div>

                        <div class="my-3 border-b-2 border-zinc-600 rounded-full"></div>

                        <div class="flex items-center justify-between">
                            <p>Gastos de envío:</p>
                            <p>{{ number_format($shipping_cost, 2, ',', '.') }} €</p>
                        </div>
                    </div>

                    <div
                        class="p-5 flex items-center justify-between text-xl font-bold bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                        <p>Total compra:</p>
                        <p>{{ number_format($cart_total + $shipping_cost, 2, ',', '.') }} €</p>
                    </div>

                    <a href="{{ route('cart.order') }}" class="w-full">
                        <x-button class="w-full text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                            Continuar con la compra
                        </x-button>
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>
