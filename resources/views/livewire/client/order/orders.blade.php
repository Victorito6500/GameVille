<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <h2 class="text-xl p-5 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">Mis pedidos</h2>

    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg shadow-gray-950 mt-9">
        <table class="w-full text-sm text-left">
            <thead class="text-xs uppercase bg-red-700">
                <tr class="hidden md:table-row">
                    <th scope="col" class="px-6 py-3">
                        ID Pedido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha pedido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                        <td scope="row" class="px-4 sm:px-6 py-4 font-medium whitespace-nowrap">
                            #{{ $order->id }}
                        </td>
                        <td class="px-4 sm:px-6 py-4">
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
                        <td class="hidden sm:table-cell px-4 sm:px-6 py-4">
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                        </td>
                        <td class="px-4 sm:px-6 py-4">
                            {{ $order->total_price }} €
                        </td>
                        <td class="px-4 sm:px-6 py-4">
                            <a href="{{ route('profile.order.detail', ['order_id' => $order->id]) }}"
                                class="font-medium hover:border-b hover:border-red-500 hover:text-red-500">
                                <span class="hidden md:inline-block me-1">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                                <span>Ver pedido</span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                        <td class="px-4 sm:px-6 py-4" colspan="5">
                            No tienes ningún pedido
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($orders->hasPages())
        <div class="mt-5 mx-5">{{ $orders->onEachSide(2)->links() }}</div>
    @endif
</div>
