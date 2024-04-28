<section class="max-w-7xl mx-auto py-14 px-6 lg:px-8 text-slate-100 mt-20">

    <form wire:submit="createOrder">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-12 lg:gap-y-0 gap-x-14">
            <div class="col-span-1 lg:col-span-6">
                <div class="flex flex-col gap-10">
                    <div class="flex flex-col gap-4">
                        <!-- User details -->
                        <div class="flex items-center justify-between">
                            <h2 class="font-semibold text-xl">Datos del comprador</h2>
                            <a href="{{ route('cart') }}"
                                class="flex items-center underline underline-offset-4 text-red-300 hover:text-red-500 transition ease-in-out 150ms">
                                Volver al carrito
                            </a>
                        </div>

                        <div class="bg-zinc-700 rounded-lg shadow-lg shadow-gray-950 p-5 flex flex-col gap-8">
                            <div class="grid grid-cols-12 gap-x-5 gap-y-7">
                                <div class="col-span-12 sm:col-span-6">
                                    <x-label for="user_name" class="mb-3 text-lg">Nombre y Apellidos</x-label>
                                    <x-input class="block w-full" type="text" wire:model="user_name"
                                        id="user_name" />
                                    @error('user_name')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <x-label for="user_email" class="mb-3 text-lg">Email</x-label>
                                    <x-input class="block w-full" type="email" wire:model="user_email"
                                        id="user_email" />
                                    @error('user_email')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <x-label for="user_phone" class="mb-3 text-lg">Teléfono</x-label>
                                    <x-input class="block w-52" type="tel" wire:model="user_phone" id="user_phone"
                                        maxlength="9" placeholder="Teléfono de contacto..." />
                                    @error('user_phone')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <x-label for="user_address" class="mb-3 text-lg">Dirección</x-label>
                                    <x-input class="block w-full" type="text" wire:model="user_address"
                                        id="user_address" placeholder="Introduzca una dirección de envío..." />
                                    @error('user_address')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment details -->
                    <div class="flex flex-col gap-4">
                        <div>
                            <h2 class="font-semibold text-xl">Datos de pago</h2>
                        </div>

                        <div class="bg-zinc-700 rounded-lg shadow-lg shadow-gray-950 p-5 flex flex-col gap-8">
                            <div class="grid grid-cols-12 gap-x-5 gap-y-7">
                                <div class="col-span-12">
                                    <x-label for="card_name" class="mb-3 text-lg">
                                        Nombre del titular de la tarjeta
                                    </x-label>
                                    <x-input class="block w-full" type="text" wire:model="card_name"
                                        placeholder="Introduzca el nombre del titular..." />
                                    @error('card_name')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-span-12">
                                    <x-label for="card_number" class="mb-3 text-lg">
                                        Número de la tarjeta
                                    </x-label>
                                    <x-input class="block w-full" type="text" wire:model="card_number" maxlength="16"
                                        placeholder="XXXX XXXX XXXX XXXX" />
                                    @error('card_number')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-span-8 sm:col-span-6">
                                    <x-label for="card_expire_date" class="mb-3 text-lg">
                                        Fecha de caducidad
                                    </x-label>
                                    <div class="flex items-center gap-3">
                                        <select wire:model="card_expire_month"
                                            class="bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                                            <option class="bg-zinc-800" value="">Mes</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option class="bg-zinc-800 tracking-wider" value="{{ $i }}">
                                                    {{ $i < 10 ? '0' . $i : $i }}
                                                </option>
                                            @endfor
                                        </select>
                                        <select wire:model="card_expire_year"
                                            class="bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                                            <option class="bg-zinc-800" value="">Año</option>
                                            @for ($i = date('Y'); $i <= date('Y', strtotime('+5 years')); $i++)
                                                <option class="bg-zinc-800" value="{{ $i }}">
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    @if ($errors->has('card_expire_month') || $errors->has('card_expire_year'))
                                        <p class="mt-3 text-sm text-red-500">*
                                            {{ $errors->first('card_expire_month') ? $errors->first('card_expire_month') : $errors->first('card_expire_year') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-span-4">
                                    <x-label for="card_cvv" class="mb-3 text-lg">
                                        CVV
                                    </x-label>

                                    <x-input class="block w-16 text-center" type="text" wire:model="card_cvv"
                                        placeholder="•••" maxlength="3" />
                                    @error('card_cvv')
                                        <p class="mt-2 text-sm text-red-500">
                                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Resume -->
            <div class="col-span-1 lg:col-span-6 flex flex-col gap-4">
                <h2 class="font-semibold text-xl">Resumen pedido</h2>

                @foreach ($cart_content as $product)
                    <div class="bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between pe-4">
                            <div class="flex items-center gap-4">
                                <div wire:click="productDetails({{ $product->id }})"
                                    class="group flex justify-center items-center rounded-lg py-4 px-3 hover:bg-red-600 hover:opacity-75 hover:cursor-pointer transition ease-in-out duration-150">
                                    <img src="{{ asset('storage/images/products/' . $product->attributes->image_path) }}"
                                        class="min-w-20 max-w-20 rounded-t-lg group-hover:scale-105 transition ease-in-out duration-150"
                                        onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
                                </div>

                                <p wire:click="productDetails({{ $product->id }})"
                                    class="grow text-md font-medium text-slate-100 hover:text-red-600 hover:underline hover:underline-offset-4 hover:cursor-pointer transition ease-in-out duration-150">
                                    {{ Str::upper($product->name) }}
                                </p>
                            </div>
                        </div>
                        <div class="px-4 py-3 flex items-center justify-between">
                            <p>{{ $product->quantity > 1 ? $product->quantity . ' unidades:' : $product->quantity . ' unidad:' }}
                            </p>
                            <p>{{ number_format($product->quantity * $product->price, 2, ',', '.') }} €</p>
                        </div>
                    </div>
                @endforeach

                <div class="p-4 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                    <div class="flex items-center justify-between">
                        <p>Total productos:</p>
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

                <x-button type="submit" class="text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                    Finalizar compra
                </x-button>
            </div>
        </div>
    </form>
</section>
