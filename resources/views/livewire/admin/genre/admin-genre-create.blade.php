<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <div class="flex flex-col gap-y-5 items-center justify-center max-w-lg mx-auto">
        <h2 class="w-full text-xl font-bold px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            Creando nuevo género
        </h2>

        <form wire:submit="createGenre" class="w-full p-5 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <div class="flex flex-col items-center justify-center gap-5">
                <x-label for="icon" class="text-xl">Icono género</x-label>
                <div class="bg-zinc-800 p-6 border border-red-600 rounded-xl shadow-lg shadow-gray-800">
                    @if ($icon && in_array($icon->getClientOriginalExtension(), ['png', 'jpg']))
                        <img src="{{ $icon->temporaryUrl() }}" class="w-28 h-28">
                    @else
                        <svg viewBox="0 0 32 32" xmlns="{{ asset('storage/images/no-image.svg') }}"
                            class="w-28 h-28 fill-red-600">
                            <path
                                d="m30 3.4141-1.4141-1.4141-26.5859 26.5859 1.4141 1.4141 2-2h20.5859a2.0027 2.0027 0 0 0 2-2v-20.5859zm-4 22.5859h-18.5859l7.7929-7.793 2.3788 2.3787a2 2 0 0 0 2.8284 0l1.5858-1.5857 4 3.9973zm0-5.8318-2.5858-2.5859a2 2 0 0 0 -2.8284 0l-1.5858 1.5859-2.377-2.3771 9.377-9.377z" />
                            <path
                                d="m6 22v-3l5-4.9966 1.3733 1.3733 1.4159-1.416-1.375-1.375a2 2 0 0 0 -2.8284 0l-3.5858 3.5859v-10.1716h16v-2h-16a2.002 2.002 0 0 0 -2 2v16z" />
                            <path d="m0 0h32v32h-32z" fill="none" />
                        </svg>
                    @endif
                </div>

                <input type="file" wire:model="icon"
                    class="text-sm file:text-md text-slate-100 p-2 file:mr-5 file:py-1 file:px-3 file:border-[1px] file:font-medium file:bg-red-600 file:text-slate-100 hover:file:cursor-pointer hover:cursor-pointer hover:file:bg-red-700 active:file:bg-red-800 file:rounded-md rounded-md file:shadow-sm file:shadow-zinc-800 file:hover:scale-105 file:transition file:ease-in-out file:duration-150" />

                @error('icon')
                    <p class="mt-2
                    text-sm text-red-500">
                        <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                        {{ $message }}
                    </p>
                @enderror

                @if ($icon)
                    <x-button type="button" wire:click="deleteImage"
                        class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800">
                        <i class="fa-solid fa-trash-can me-2 text-sm"></i>
                        Eliminar imágen
                    </x-button>
                @endif
            </div>

            <div class="mt-10">
                <x-label for="name" class="mb-3 text-lg">Nombre</x-label>
                <x-input class="block w-full" type="text" wire:model="name" id="name"
                    placeholder="Introduzca un nombre..." />
                @error('name')
                    <p class="mt-2 text-sm text-red-500">
                        <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-8 flex justify-between items-center">
                <a href="{{ route('admin.genre') }}">
                    <x-button type="button" class="text-xs bg-gray-600 hover:bg-gray-700 active:bg-gray-800">
                        Cancelar
                    </x-button>
                </a>
                <x-button type="submit" class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800">
                    Guardar
                </x-button>
            </div>
        </form>
    </div>
</div>
