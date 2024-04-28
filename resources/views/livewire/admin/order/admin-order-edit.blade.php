<section class="max-w-7xl mx-auto py-14 px-6 lg:px-8 text-slate-100 mt-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-12 lg:gap-y-0 gap-x-14">
        <!-- Order Content -->
        <div class="col-span-1 lg:col-span-12 flex items-center justify-start lg:mb-5">
            <a href="{{ route('admin.order') }}"
                class="underline underline-offset-4 text-red-300 hover:text-red-500 hover:cursor-pointer">
                Volver
            </a>
        </div>

        <div class="col-span-1 lg:col-span-8 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl">Productos del pedido</h2>
            </div>

            @foreach ($order_details as $product)
                <div
                    class="flex flex-col md:flex-row items-start md:items-center justify-between bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                    <div class="flex items-center gap-4">
                        <div wire:click=""
                            class="group
                            flex justify-center items-center rounded-lg py-4 px-3 hover:bg-red-600 hover:opacity-75 hover:cursor-pointer
                            transition ease-in-out duration-150">
                            <img src="{{ asset('storage/images/products/' . $product->image_path) }}"
                                class="min-w-20 max-w-20 rounded-t-lg group-hover:scale-105 transition ease-in-out duration-150"
                                onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
                        </div>

                        <p wire:click=""
                            class="grow pe-4 text-md font-medium text-slate-100 hover:text-red-600 hover:underline hover:underline-offset-4 hover:cursor-pointer transition ease-in-out duration-150">
                            {{ Str::upper($product->name) }}
                        </p>
                    </div>
                    <div class="flex items-center gap-4 py-5 md:py-0 px-5">
                        <span>x{{ $product->quantity }}</span>

                        <p class="w-16 text-end">{{ number_format($product->price, 2, ',', '.') }}€</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Order Resume -->
        <div class="col-span-1 lg:col-span-4 flex flex-col gap-4">
            <h2 class="font-semibold text-xl">
                Resumen pedido
                <span class="italic text-red-100">#{{ $order->id }}</span>
            </h2>

            <div class="p-5 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                <div class="flex flex-col items-start justify-center gap-1">
                    <p>Nombre:</p>
                    <p class="text-red-100">{{ $order->user_name }}</p>
                </div>

                <div class="my-3 border-b-2 border-zinc-600 rounded-full"></div>

                <div class="flex flex-col items-start justify-center gap-1">
                    <p>Email:</p>
                    <p class="text-red-100">{{ $order->user_email }}</p>
                </div>

                <div class="my-3 border-b-2 border-zinc-600 rounded-full"></div>

                <div class="flex flex-col items-start justify-center gap-1">
                    <p>Teléfono de contacto:</p>
                    <p class="text-red-100">{{ $order->user_phone }}</p>
                </div>

                <div class="my-3 border-b-2 border-zinc-600 rounded-full"></div>

                <div class="flex flex-col items-start justify-center gap-1">
                    <p>Dirección de envío:</p>
                    <p class="text-red-100">{{ $order->user_address }}</p>
                </div>
            </div>

            <div class="p-5 bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                <div class="flex items-center justify-between">
                    <p>{{ count($order_details) }} productos:</p>
                    <p class="text-red-100">{{ number_format($order->total_price - $shipping_cost, 2, ',', '.') }} €
                    </p>
                </div>

                <div class="my-3 border-b-2 border-zinc-600 rounded-full"></div>

                <div class="flex items-center justify-between">
                    <p>Gastos de envío:</p>
                    <p class="text-red-100">{{ number_format($shipping_cost, 2, ',', '.') }} €</p>
                </div>
            </div>

            <div
                class="p-5 flex items-center justify-between text-xl font-bold bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                <p>Total compra:</p>
                <p class="text-red-100">{{ number_format($order->total_price, 2, ',', '.') }} €</p>
            </div>

            <div
                class="p-5 flex items-center justify-between text-lg font-bold bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                <p>Estado:</p>
                @php
                    switch ($order->status) {
                        case 'pending':
                            $bg_pill = 'bg-yellow-500';
                            $pill_content = 'Pendiente';
                            break;
                        case 'complete':
                            $bg_pill = 'bg-green-700';
                            $pill_content = 'Completado';
                            break;
                        case 'cancelled':
                            $bg_pill = 'bg-red-600';
                            $pill_content = 'Cancelado';
                            break;
                        default:
                            $bg_pill = '';
                            $pill_content = '';
                            break;
                    }
                @endphp
                <p class="py-0.5 px-4 rounded-full {{ $bg_pill }}">
                    {{ $pill_content }}
                </p>
            </div>

            @if ($order->status == 'pending')
                <div
                    class="p-5 flex items-center justify-between gap-3 text-lg font-bold bg-zinc-700 rounded-lg shadow-lg shadow-gray-950">
                    <x-button wire:click="showConfirmModal('cancel')"
                        class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800 shadow-md">
                        Cancelar
                    </x-button>
                    <x-button wire:click="showConfirmModal('complete')"
                        class="text-xs bg-green-600 hover:bg-green-700 active:bg-green-800 shadow-md">
                        Pedido recibido
                    </x-button>
                </div>
            @endif
        </div>
    </div>

    <!-- Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmOrderStatus">
        <x-slot name="title">
            @if ($status_action == 'cancel')
                {{ __('Cancelar pedido') }}
            @elseif ($status_action = 'complete')
                {{ __('Completar pedido') }}
            @endif
        </x-slot>

        <x-slot name="content">
            @if ($status_action == 'cancel')
                {{ __('¿Está seguro que desea cancelar el pedido? El pedido será devuelto a nuestros almacenes.') }}
            @elseif ($status_action = 'complete')
                {{ __('¿Está seguro que desea completar el pedido? Confirme antes de que el usuario recibió su pedido antes de confirmarlo.') }}
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-button class="text-xs bg-zinc-600 hover:bg-zinc-700 active:bg-zinc-800"
                wire:click="$toggle('confirmOrderStatus')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-button>

            @if ($status_action == 'cancel')
                <x-button class="ms-3 text-xs bg-red-600 hover:bg-red-700 active:bg-red-800" wire:click="cancelOrder"
                    wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-button>
            @elseif ($status_action = 'complete')
                <x-button class="ms-3 text-xs bg-green-600 hover:bg-green-700 active:bg-green-800"
                    wire:click="completeOrder" wire:loading.attr="disabled">
                    {{ __('Confirmar') }}
                </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>
</section>
