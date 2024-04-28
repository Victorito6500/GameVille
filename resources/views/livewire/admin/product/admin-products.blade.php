<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <section>
        <div
            class="flex flex-col gap-y-5 md:gap-0 md:flex-row justify-between items-center px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <div class="flex items-center gap-5">
                <h2 class="text-xl">Productos registrados</h2>
                <a href="{{ route('admin.product.create') }}">
                    <x-button
                        class="text-xs outline outline-2 -outline-offset-1 outline-red-600 shadow-none hover:shadow-lg hover:bg-red-600">
                        Nuevo
                        <i class="fa-solid fa-plus ms-2"></i>
                    </x-button>
                </a>
            </div>
            <div class="flex items-center gap-3">
                <div>
                    <label for="search_product">Buscar:</label>
                    <x-input type="text" id="search_product" wire:model.live="searchProductFilter"
                        placeholder="Nombre..." />
                </div>
            </div>
        </div>

        <div
            class="mt-5 flex flex-col gap-5 md:flex-row items-center px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <select wire:model.live="categoryFilter" id="category_filter"
                class="bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                <option class="bg-zinc-800" value="">Categoría...</option>
                @foreach ($categories as $category)
                    <option class="bg-zinc-800" value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <select wire:model.live="genreFilter" id="genre_filter"
                class="bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                <option class="bg-zinc-800" value="">Género...</option>
                @foreach ($genres as $genre)
                    <option class="bg-zinc-800" value="{{ $genre->id }}">
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            <select wire:model.live="platformFilter" id="platform_filter"
                class="bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                <option class="bg-zinc-800" value="">Plataforma...</option>
                @foreach ($platforms as $platform)
                    <option class="bg-zinc-800" value="{{ $platform->id }}">
                        {{ $platform->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg shadow-gray-950 mt-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-red-700">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                            Categoría
                        </th>
                        <th scope="col" class="px-4 py-3 hidden md:table-cell">
                            Precio
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Stock
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td scope="row" class="p-4 font-medium whitespace-nowrap">
                                #{{ $product->id }}
                            </td>
                            <td class="break-words p-4">
                                <p class="md:w-72">
                                    {{ $product->name }}
                                </p>
                            </td>
                            <td class="p-4 hidden lg:table-cell">
                                {{ $product->category->name }}
                            </td>
                            <td class="p-4 hidden md:table-cell">
                                {{ number_format($product->price, 2, ',', '.') }} €
                            </td>
                            <td class="p-4">
                                {{ $product->stock }}
                            </td>
                            <td class="p-4 flex flex-wrap items-center justify-end gap-y-3 gap-x-5">
                                <a href="{{ route('admin.product.edit', ['product_id' => $product->id]) }}">
                                    <x-button class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                        <span class="inline-block lg:me-1">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Ver producto</span>
                                    </x-button>
                                </a>

                                <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800"
                                    wire:click="showConfirmModal({{ $product->id }})" wire:loading.attr="disabled">
                                    <i class="fa-solid fa-trash-can"></i>
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td class="p-4" colspan="6">
                                No existe ningún producto
                                @if ($searchProductFilter != '')
                                    que coincida con "{{ $searchProductFilter }}"
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="mt-5 mx-5">{{ $products->onEachSide(2)->links() }}</div>
        @endif
    </section>

    <!-- Delete Product Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmProductDelete">
        <x-slot name="title">
            {{ __('Eliminar producto') }}
            @if ($selected_product)
                "{{ $selected_product->name }}"
            @endif
        </x-slot>

        <x-slot name="content">
            {{ __('¿Está seguro que desea eliminar el producto? Se borrará el producto además de todos los pedidos realizados.') }}
        </x-slot>

        <x-slot name="footer">
            <x-button class="text-xs bg-zinc-600 hover:bg-zinc-700 active:bg-zinc-800"
                wire:click="$toggle('confirmProductDelete')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-button>

            <x-button class="ms-3 text-xs bg-red-600 hover:bg-red-700 active:bg-red-800" wire:click="deleteProduct"
                wire:loading.attr="disabled">
                {{ __('Eliminar producto') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
