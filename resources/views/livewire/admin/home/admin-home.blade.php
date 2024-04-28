<div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8 mt-20 text-slate-100">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-12 lg:gap-5">
        <section class="col-span-1 lg:col-span-4">
            <h2 class="text-xl font-bold mb-5 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950 p-4">
                Estadísticas
            </h2>
            <div class="bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950 p-5">
                <!-- Sales stats -->
                <article>
                    <h3 class="underline underline-offset-4 mb-3">Ventas</h3>

                    <div class="flex justify-between items-center">
                        <p>Total ventas:</p>
                        <p class="text-red-100">{{ count($total_orders) }}</p>
                    </div>

                    <div class="ms-5 flex justify-between items-center">
                        <p>Pendientes:</p>
                        <p class="text-red-100">{{ count($pending_orders) }}</p>
                    </div>

                    <div class="ms-5 flex justify-between items-center">
                        <p>Completadas:</p>
                        <p class="text-red-100">{{ count($complete_orders) }}</p>
                    </div>

                    <div class="ms-5 flex justify-between items-center">
                        <p>Canceladas:</p>
                        <p class="text-red-100">{{ count($cancelled_orders) }}</p>
                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <p>Total ingresos:</p>
                        <p class="text-red-100">{{ number_format($total_income, 2, ',', '.') }} €</p>
                    </div>
                </article>

                <div class="my-5 border-b-2 border-zinc-600 rounded-full"></div>

                <!-- Users stats -->
                <article>
                    <h3 class="underline underline-offset-4 mb-3">Usuarios</h3>

                    <div class="flex justify-between items-center">
                        <p>Usuarios clientes:</p>
                        <p class="text-red-100">{{ count($client_users) }}</p>
                    </div>

                    <div class="flex justify-between items-center">
                        <p>Usuarios administradores:</p>
                        <p class="text-red-100">{{ count($admin_users) }}</p>
                    </div>
                </article>

                <div class="my-5 border-b-2 border-zinc-600 rounded-full"></div>

                <!-- Products stats -->
                <article>
                    <h3 class="underline underline-offset-4 mb-3">Productos</h3>

                    <div class="flex justify-between items-center">
                        <p>Productos en stock:</p>
                        <p class="text-red-100">{{ count($stock_products) }}</p>
                    </div>

                    <div class="flex justify-between items-center">
                        <p>Productos agotados:</p>
                        <p class="text-red-100">{{ count($outofstock_products) }}</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="col-span-1 lg:col-span-8">
            <article class="mb-12">
                <h2 class="text-xl font-bold mb-5 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950 p-4">
                    Pedidos recientes
                </h2>

                <div class="relative overflow-x-auto sm:rounded-lg shadow-lg shadow-gray-950">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase bg-red-700">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    ID Pedido
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Fecha pedido
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Total
                                </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($last_orders as $order)
                                <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                                    <td scope="row" class="p-4 font-medium whitespace-nowrap">
                                        #{{ $order->id }}
                                    </td>
                                    <td class="p-4">
                                        @php
                                            switch ($order->status) {
                                                case 'pending':
                                                    $bg_pill = 'bg-yellow-500';
                                                    $pill_content = 'Pendiente';
                                                    $pill_icon = '<i class="fa-regular fa-clock"></i>';
                                                    break;
                                                case 'complete':
                                                    $bg_pill = 'bg-green-700';
                                                    $pill_content = 'Completado';
                                                    $pill_icon = '<i class="fa-solid fa-check"></i>';
                                                    break;
                                                case 'cancelled':
                                                    $bg_pill = 'bg-red-600';
                                                    $pill_content = 'Cancelado';
                                                    $pill_icon = '<i class="fa-solid fa-xmark"></i>';
                                                    break;
                                                default:
                                                    $bg_pill = '';
                                                    $pill_content = '';
                                                    $pill_icon = '';
                                                    break;
                                            }
                                        @endphp

                                        <div
                                            class="text-xs w-10 text-center sm:text-start sm:w-fit py-0.5 px-3 rounded-full {{ $bg_pill }}">
                                            {!! $pill_icon !!}
                                            <span class="hidden sm:inline-block ms-1">
                                                {{ $pill_content }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="hidden sm:table-cell p-4">
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                                    </td>
                                    <td class="p-4">
                                        {{ number_format($order->total_price, 2, ',', '.') }} €
                                    </td>
                                    <td class="p-4">
                                        <a href="{{ route('admin.order.edit', ['order_id' => $order->id]) }}">
                                            <x-button
                                                class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                                <span class="inline-block lg:me-1">
                                                    <i class="fa-regular fa-eye"></i>
                                                </span>
                                                <span class="hidden lg:inline-block">Ver pedido</span>
                                            </x-button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                                    <td class="p-4" colspan="5">
                                        No hay ningún pedido
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </article>

            <article>
                <h2 class="text-xl font-bold mb-5 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950 p-4">
                    Productos nuevos
                </h2>

                <div class="relative overflow-x-auto sm:rounded-lg shadow-lg shadow-gray-950">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs uppercase bg-red-700">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-4 py-3">
                                    Precio
                                </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($last_products as $product)
                                <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                                    <td class="break-words p-4">
                                        <p class="lg:w-80">
                                            {{ $product->name }}
                                        </p>
                                    </td>
                                    <td class="hidden sm:table-cell p-4">
                                        {{ number_format($product->price, 2, ',', '.') }} €
                                    </td>
                                    <td class="py-4 px-2">
                                        <a href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}">
                                            <x-button
                                                class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                                <span class="inline-block lg:me-1">
                                                    <i class="fa-regular fa-eye"></i>
                                                </span>
                                                <span class="hidden lg:inline-block">Ver producto</span>
                                            </x-button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                                    <td class="p-4" colspan="5">
                                        No hay ningún producto
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
    </div>
</div>
