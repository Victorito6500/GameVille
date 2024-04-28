<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <section>
        <div
            class="flex flex-col gap-y-5 md:gap-0 md:flex-row justify-between items-center px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <div class="flex items-center gap-5">
                <h2 class="text-xl">Géneros registrados</h2>
                <a href="{{ route('admin.genre.create') }}">
                    <x-button
                        class="text-xs outline outline-2 -outline-offset-1 outline-red-600 shadow-none hover:shadow-lg hover:bg-red-600">
                        Nuevo
                        <i class="fa-solid fa-plus ms-2"></i>
                    </x-button>
                </a>
            </div>
            <div class="flex items-center gap-3">
                <label for="search_genre">Buscar:</label>
                <x-input type="text" id="search_genre" wire:model.live="searchGenreFilter" placeholder="Nombre..." />
            </div>
        </div>

        <div class="md:w-2/3 lg:w-8/12 mx-auto relative overflow-x-auto shadow-lg sm:rounded-lg shadow-gray-950 mt-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-red-700">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Nombre
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($genres as $genre)
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td scope="row" class="p-4 font-medium whitespace-nowrap">
                                #{{ $genre->id }}
                            </td>
                            <td class="p-4">
                                {{ $genre->name }}
                            </td>
                            <td class="p-4 flex items-center justify-end gap-x-5">
                                <a href="{{ route('admin.genre.edit', ['genre_id' => $genre->id]) }}">
                                    <x-button class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                        <span class="inline-block lg:me-1">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Ver género</span>
                                    </x-button>
                                </a>

                                <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800"
                                    wire:click="showConfirmModal({{ $genre->id }})" wire:loading.attr="disabled">
                                    <i class="fa-solid fa-trash-can"></i>
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td class="p-4" colspan="6">
                                No existe ningún género
                                @if ($searchGenreFilter != '')
                                    que coincida con "{{ $searchGenreFilter }}"
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- Delete Genre Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmGenreDelete">
        <x-slot name="title">
            {{ __('Eliminar género') }}
            @if ($selected_genre)
                "{{ $selected_genre->name }}"
            @endif
        </x-slot>

        <x-slot name="content">
            {{ __('¿Está seguro que desea eliminar el género? Se borrarán además todos los productos asociados a este género') }}
        </x-slot>

        <x-slot name="footer">
            <x-button class="text-xs bg-zinc-600 hover:bg-zinc-700 active:bg-zinc-800"
                wire:click="$toggle('confirmGenreDelete')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-button>

            <x-button class="ms-3 text-xs bg-red-600 hover:bg-red-700 active:bg-red-800" wire:click="deleteGenre"
                wire:loading.attr="disabled">
                {{ __('Eliminar género') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
