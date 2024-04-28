<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <section>
        <div
            class="flex flex-col gap-y-5 md:gap-0 md:flex-row justify-between items-center px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <h2 class="text-xl">Todos los pedidos</h2>

            <div class="flex items-center gap-3">
                <label for="search_order">Buscar:</label>
                <x-input type="text" id="search_order" wire:model.live="searchOrderFilter" placeholder="ID pedido..." />
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg shadow-gray-950 mt-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-red-700">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-2 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-4 py-3 hidden md:table-cell">
                            Fecha pedido
                        </th>
                        {{-- hidden lg:table-cell --}}
                        <th scope="col" class="px-2 py-3">
                            Total
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td scope="row" class="p-2 font-medium whitespace-nowrap">
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
                                    class="text-xs text-center sm:text-start w-fit py-0.5 px-2 rounded-full {{ $bg_pill }}">
                                    <span class="inline-block md:hidden lg:inline-block">{!! $pill_icon !!}</span>
                                    <span class="hidden sm:inline-block lg:ms-1">
                                        {{ $pill_content }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-4 hidden md:table-cell">
                                {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                            </td>
                            <td class="p-2">
                                {{ $order->total_price }} €
                            </td>
                            <td class="py-4 ps-4 pe-2 sm:p-4 flex flex-wrap items-center justify-end gap-y-3 gap-x-3">
                                <a href="{{ route('admin.order.edit', ['order_id' => $order->id]) }}">
                                    <x-button class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                        <span class="inline-block lg:me-1">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Ver pedido</span>
                                    </x-button>
                                </a>

                                @if ($order->status == 'pending')
                                    <x-button class="text-xs bg-green-600 hover:bg-green-700 active:bg-green-800"
                                        wire:click="showConfirmModal({{ $order->id }}, 'complete')"
                                        wire:loading.attr="disabled">
                                        <span class="inline-block lg:hidden">
                                            <i class="fa-solid fa-check"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Recibido</span>
                                    </x-button>

                                    <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800"
                                        wire:click="showConfirmModal({{ $order->id }}, 'cancel')"
                                        wire:loading.attr="disabled">
                                        <span class="inline-block lg:hidden">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Cancelar</span>
                                    </x-button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td class="p-4" colspan="6">
                                No existe ningún pedido
                                @if ($searchOrderFilter != '')
                                    que coincida con ID: "{{ $searchOrderFilter }}"
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($orders->hasPages())
            <div class="mt-5 mx-5">{{ $orders->onEachSide(2)->links() }}</div>
        @endif
    </section>


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
</div>
