<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <div class="flex flex-col gap-y-5 items-center justify-center max-w-lg mx-auto">
        <h2 class="w-full text-xl font-bold px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            Creando nuevo usuario
        </h2>

        <form wire:submit="createUser" class="w-full p-5 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <div>
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

            <div class="mt-8">
                <x-label for="email" class="mb-3 text-lg">Email</x-label>
                <x-input class="block w-full" type="email" wire:model="email" id="email"
                    placeholder="Introduzca un email..." />
                @error('email')
                    <p class="mt-2 text-sm text-red-500">
                        <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-8">
                <x-label for="password" class="mb-3 text-lg">Contraseña</x-label>
                <x-input class="block w-full" type="password" wire:model="password" id="password"
                    placeholder="Introduzca una nueva contraseña..." />
                @error('password')
                    <p class="mt-2 text-sm text-red-500">
                        <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            @if (!$is_admin)
                <div class="mt-8">
                    <x-label for="address" class="mb-3 text-lg">Dirección</x-label>
                    <x-input class="block w-full" type="text" wire:model="address" id="address"
                        placeholder="Introduzca una dirección..." />
                    @error('address')
                        <p class="mt-2 text-sm text-red-500">
                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mt-8">
                    <x-label for="phone" class="mb-3 text-lg">Teléfono</x-label>
                    <x-input class="block w-full" type="text" wire:model="phone" id="phone" maxlength="9"
                        placeholder="Introduzca un número de teléfono..." />
                    @error('phone')
                        <p class="mt-2 text-sm text-red-500">
                            <i class="fa-solid fa-triangle-exclamation text-md me-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            @endif

            <div class="mt-8 flex justify-between items-center">
                <a href="{{ route('admin.user') }}">
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
