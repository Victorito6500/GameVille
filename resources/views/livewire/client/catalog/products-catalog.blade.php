<section class="max-w-7xl mx-auto py-14 px-6 lg:px-8 mt-20">
    <!-- Selected Filters -->
    <div class="flex items-center flex-wrap gap-5 text-slate-100 mb-10">
        @if (isset($search))
            <p class="">Resultados para: </p>
            <div
                class="flex gap-5 justify-between items-center py-2 px-3 bg-zinc-700 w-fit rounded-xl shadow-lg shadow-gray-950">
                <span>"{{ $search }}"</span>
                <a wire:click="$set('search', null)"
                    class="text-2xl text-red-600 hover:text-red-700 hover:scale-125 active:text-red-800 transition ease-in-out duration-150">
                    <i class="fa-regular fa-circle-xmark"></i>
                </a>
            </div>
        @endif

        @if (!empty($categoryFilter) || !empty($genreFilter) || !empty($platformFilter))
            <p class="">Filtros seleccionadas: </p>
            @foreach ($categoryFilter as $category)
                <div
                    class="flex gap-5 justify-between items-center py-2 px-3 bg-zinc-700 w-fit rounded-xl shadow-lg shadow-gray-950">
                    <span>"{{ $categories->where('id', $category)->first()->name }}"</span>
                    <a wire:click="removeCategoryFilter({{ $category }})"
                        class="text-2xl text-red-600 hover:text-red-700 hover:scale-125 active:text-red-800 transition ease-in-out duration-150">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </a>
                </div>
            @endforeach

            @foreach ($genreFilter as $genre)
                <div
                    class="flex gap-5 justify-between items-center py-2 px-3 bg-zinc-700 w-fit rounded-xl shadow-lg shadow-gray-950">
                    <span>"{{ $genres->where('id', $genre)->first()->name }}"</span>
                    <a wire:click="removeGenreFilter({{ $genre }})"
                        class="text-2xl text-red-600 hover:text-red-700 hover:scale-125 active:text-red-800 transition ease-in-out duration-150">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </a>
                </div>
            @endforeach

            @foreach ($platformFilter as $platform)
                <div
                    class="flex gap-5 justify-between items-center py-2 px-3 bg-zinc-700 w-fit rounded-xl shadow-lg shadow-gray-950">
                    <span>"{{ Str::title($platforms->where('id', $platform)->first()->name) }}"</span>
                    <a wire:click="removePlatformFilter({{ $platform }})"
                        class="text-2xl text-red-600 hover:text-red-700 hover:scale-125 active:text-red-800 transition ease-in-out duration-150">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </a>
                </div>
            @endforeach
        @endif
    </div>

    <div class="grid grid-cols-12 gap-x-6 lg:gap-x-14 gap-y-10 text-slate-100">
        <!-- Filters Menu -->
        <aside class="hidden md:flex md:flex-col md:gap-4 md:col-span-4 lg:col-span-3">
            <div class="flex items-center gap-3 bg-zinc-700 rounded-lg px-5 py-4 shadow-lg shadow-gray-950">
                <i class="text-xl text-red-600 fa-solid fa-filter"></i>
                <h2 class="text-lg">Filtros</h2>
            </div>

            <!-- Clear filters link -->
            <div class="p-5">
                <span class="underline underline-offset-4 text-red-300 hover:text-red-500 hover:cursor-pointer"
                    wire:click="clearFilters">
                    Limpiar filtros
                </span>
            </div>

            <!-- Order By Filter -->
            <div class="flex flex-col items-start bg-zinc-700 p-5 rounded-lg shadow-lg shadow-gray-950">
                <h3 class="mb-2 text-lg">Ordenar por:</h3>
                <select wire:model.live="orderByFilter"
                    class="w-full bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                    <option class="bg-zinc-800" value="1">Nombre (A-Z)</option>
                    <option class="bg-zinc-800" value="2">Nombre (Z-A)</option>
                    <option class="bg-zinc-800" value="3">Precio (más bajo)</option>
                    <option class="bg-zinc-800" value="4">Precio (más alto)</option>
                    <option class="bg-zinc-800" value="5">Fecha (más nuevo)</option>
                    <option class="bg-zinc-800" value="6">Fecha (más antiguo)</option>
                </select>
            </div>

            <!-- Category Filter -->
            <div class="bg-zinc-700 p-5 rounded-lg shadow-lg shadow-gray-950">
                <h3 class="mb-2 text-lg">Categoría</h3>

                @foreach ($categories as $category)
                    <div class="mt-0.5">
                        <x-checkbox wire:model.live="categoryFilter" id="category{{ $category->id }}"
                            value="{{ $category->id }}"></x-checkbox>
                        <x-label for="category{{ $category->id }}" class="inline ms-1 hover:cursor-pointer">
                            {{ $category->name }}
                        </x-label>
                    </div>
                @endforeach
            </div>

            <!-- Genre Filter -->
            <div class="bg-zinc-700 p-5 rounded-lg shadow-lg shadow-gray-950">
                <h3 class="mb-2 text-lg">Género</h3>

                @foreach ($genres as $genre)
                    <div class="mt-0.5">
                        <x-checkbox wire:model.live="genreFilter" id="genre{{ $genre->id }}"
                            value="{{ $genre->id }}"></x-checkbox>
                        <x-label for="genre{{ $genre->id }}" class="inline ms-1 hover:cursor-pointer">
                            {{ $genre->name }}
                        </x-label>
                    </div>
                @endforeach
            </div>

            <!-- Platform Filter -->
            <div class="bg-zinc-700 p-5 rounded-lg shadow-lg shadow-gray-950">
                <h3 class="mb-2 text-lg">Plataforma</h3>

                @foreach ($platforms as $platform)
                    <div class="mt-0.5">
                        <x-checkbox wire:model.live="platformFilter" id="platform{{ $platform->id }}"
                            value="{{ $platform->id }}"></x-checkbox>
                        <x-label for="platform{{ $platform->id }}" class="inline ms-1 hover:cursor-pointer">
                            {{ $platform->name }}
                        </x-label>
                    </div>
                @endforeach
            </div>
        </aside>

        <!-- Responsive Filters Menu Button -->
        <div class="z-30 fixed bottom-5 right-5 md:hidden">
            <button wire:click="showFiltersMenu"
                class="flex items-center justify-center p-4 text-slate-100 bg-red-600 rounded-full shadow-lg shadow-gray-950 hover:bg-red-700 hover:scale-110 active:bg-red-800 transition duration-150 ease-in-out">
                <i class="text-3xl text-slate-100 fa-solid fa-filter"></i>
            </button>
        </div>

        <!-- Responsive Filters Menu -->
        <aside id="responsive-filter-menu"
            class="z-40 fixed left-0 top-0 h-dvh md:hidden flex flex-col gap-5 bg-zinc-700 py-5 px-1 transition-transform duration-100 ease-in-out {{ $responsive_filter_menu ? '' : '-translate-x-full' }}">
            <h2 class="px-4 text-lg">Filtros</h2>

            <button type="button" wire:click="showFiltersMenu"
                class="text-slate-100 bg-transparent hover:bg-red-600 rounded-lg text-sm p-2 absolute top-2.5 end-2.5 inline-flex items-center">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Cerrar menú</span>
            </button>

            <!-- Clear filters link -->
            <span class="px-4 underline underline-offset-4 text-red-300 hover:text-red-500 hover:cursor-pointer"
                wire:click="clearFilters">
                Limpiar filtros
            </span>

            <!-- Num of Products Per Page -->
            <div class="px-4 flex items-center gap-x-2">
                <h3 class="text-md font-light">N.º por pág:</h3>
                <select wire:model.live="numPerPage"
                    class="h-8 flex items-center bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                    <option class="bg-zinc-800" value="10">10</option>
                    <option class="bg-zinc-800" value="14">14</option>
                    <option class="bg-zinc-800" value="20">20</option>
                </select>
            </div>

            <!-- Order By Filter -->
            <div class="px-4">
                <h3 class="mb-1 text-md font-light">Ordenar por:</h3>
                <select wire:model.prevent="orderByFilter"
                    class="h-8 flex items-center bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                    <option class="bg-zinc-800" value="1">Nombre (A-Z)</option>
                    <option class="bg-zinc-800" value="2">Nombre (Z-A)</option>
                    <option class="bg-zinc-800" value="3">Precio (más bajo)</option>
                    <option class="bg-zinc-800" value="4">Precio (más alto)</option>
                    <option class="bg-zinc-800" value="5">Fecha (más nuevo)</option>
                    <option class="bg-zinc-800" value="6">Fecha (más antiguo)</option>
                </select>
            </div>

            <div class="overflow-y-auto ps-4 pe-8 flex flex-col gap-5">
                <!-- Category Filter -->
                <div>
                    <h3 class="mb-2 text-lg">Categoría</h3>

                    @foreach ($categories as $category)
                        <div class="mt-0.5">
                            <x-checkbox wire:model.live="categoryFilter" id="category{{ $category->id }}"
                                value="{{ $category->id }}"></x-checkbox>
                            <x-label for="category{{ $category->id }}" class="inline ms-1 hover:cursor-pointer">
                                {{ $category->name }}
                            </x-label>
                        </div>
                    @endforeach
                </div>

                <!-- Genre Filter -->
                <div>
                    <h3 class="mb-2 text-lg">Género</h3>

                    @foreach ($genres as $genre)
                        <div class="mt-0.5">
                            <x-checkbox wire:model.live="genreFilter" id="genre{{ $genre->id }}"
                                value="{{ $genre->id }}"></x-checkbox>
                            <x-label for="genre{{ $genre->id }}" class="inline ms-1 hover:cursor-pointer">
                                {{ $genre->name }}
                            </x-label>
                        </div>
                    @endforeach
                </div>

                <!-- Platform Filter -->
                <div>
                    <h3 class="mb-2 text-lg">Plataforma</h3>

                    @foreach ($platforms as $platform)
                        <div class="mt-0.5">
                            <x-checkbox wire:model.live="platformFilter" id="platform{{ $platform->id }}"
                                value="{{ $platform->id }}"></x-checkbox>
                            <x-label for="platform{{ $platform->id }}" class="inline ms-1 hover:cursor-pointer">
                                {{ $platform->name }}
                            </x-label>
                        </div>
                    @endforeach
                </div>
            </div>
        </aside>

        <!-- Background when responsive menu is open -->
        <div wire:click="showFiltersMenu"
            class="z-20 fixed left-0 top-0 w-full h-full opacity-80 bg-red-dark hover:cursor-pointer {{ $responsive_filter_menu ? '' : 'hidden' }}">
        </div>

        <!-- Products -->
        <div class="col-span-12 md:col-span-8 lg:col-span-9 flex flex-col gap-4">
            <div class="flex items-center justify-between bg-zinc-700 rounded-lg px-5 py-3 shadow-lg shadow-gray-950">
                <div class="flex items-center gap-x-3">
                    <i class="text-xl text-red-600 fa-solid fa-gamepad"></i>
                    <h2 class="text-lg">Productos</h2>
                </div>

                <!-- Num of Products Per Page -->
                <div class="hidden sm:flex items-center gap-x-2">
                    <h3 class="text-md font-light">N.º por pág:</h3>
                    <select wire:model.live="numPerPage"
                        class="bg-zinc-800 border-0 text-sm rounded-lg shadow-lg shadow-gray-950 focus:bg-red-700 focus:ring-red-700 focus:border-red-700 hover:cursor-pointer hover:bg-red-600">
                        <option class="bg-zinc-800" value="10">10</option>
                        <option class="bg-zinc-800" value="14">14</option>
                        <option class="bg-zinc-800" value="20">20</option>
                    </select>
                </div>
            </div>

            @if ($products->hasPages())
                <div class="livewire-pagination">{{ $products->onEachSide(2)->links() }}</div>
            @endif

            <div class="grid grid-cols-12 gap-4">
                @forelse ($products as $product)
                    <div wire:key={{ $product->id }} class="col-span-12 sm:col-span-6">
                        @livewire(
                            'client.product.product-card',
                            [
                                'product' => $product,
                                'title_size' => 'text-xs',
                                'col_span_img' => 'col-span-5',
                                'col_span_details' => 'col-span-7',
                            ],
                            key($product->id)
                        )
                    </div>
                @empty
                    <div class="col-span-12 bg-zinc-700 rounded-lg p-5 shadow-lg shadow-gray-950">
                        <p class="text-lg">No se han encontrado resultados!</p>
                    </div>
                @endforelse
            </div>

            @if ($products->hasPages())
                <div class="livewire-pagination">{{ $products->onEachSide(2)->links() }}</div>
            @endif
        </div>
    </div>
</section>
