<div class="max-w-7xl mx-auto py-14 sm:px-6 lg:px-8 text-slate-100 mt-20">
    <section>
        <div
            class="flex flex-col gap-y-5 md:gap-0 md:flex-row justify-between items-center px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <div class="flex items-center gap-5">
                <h2 class="text-xl">Usuarios clientes</h2>
                <a href="{{ route('admin.user.create', ['is_admin' => 0]) }}">
                    <x-button
                        class="text-xs outline outline-2 -outline-offset-1 outline-red-600 shadow-none hover:shadow-lg hover:bg-red-600">
                        Nuevo
                        <i class="fa-solid fa-plus ms-2"></i>
                    </x-button>
                </a>
            </div>
            <div class="flex items-center gap-3">
                <label for="search_client">Buscar:</label>
                <x-input type="text" id="search_client" wire:model.live="searchClientFilter"
                    placeholder="Nombre o email..." />
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg shadow-gray-950 mt-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-red-700">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-4 py-3 hidden sm:table-cell">
                            Nombre
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                            Dirección
                        </th>
                        <th scope="col" class="px-4 py-3 hidden lg:table-cell">
                            Teléfono
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($client_users as $user)
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td scope="row" class="p-4 font-medium whitespace-nowrap">
                                #{{ $user->id }}
                            </td>
                            <td class="hidden sm:table-cell p-4">
                                {{ $user->name }}
                            </td>
                            <td class="break-words p-4">
                                <p class="w-36 sm:w-fit">
                                    {{ $user->email }}
                                </p>
                            </td>
                            <td class="hidden lg:table-cell p-4">
                                {{ $user->address }}
                            </td>
                            <td class="hidden lg:table-cell p-4">
                                {{ $user->phone }}
                            </td>
                            <td class="p-4 flex items-center justify-end gap-x-5">
                                <a href="{{ route('admin.user.edit', ['user_id' => $user->id]) }}">
                                    <x-button class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                        <span class="inline-block lg:me-1">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Ver usuario</span>
                                    </x-button>
                                </a>

                                <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800"
                                    wire:click="showConfirmModal({{ $user->id }})" wire:loading.attr="disabled">
                                    <i class="fa-solid fa-trash-can"></i>
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td class="p-4" colspan="6">
                                No existe ningún usuario cliente
                                @if ($searchClientFilter != '')
                                    que coincida con "{{ $searchClientFilter }}"
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($client_users->hasPages())
            <div class="mt-5 mx-5">{{ $client_users->onEachSide(2)->links() }}</div>
        @endif
    </section>

    <section class="mt-20">
        <div
            class="flex flex-col gap-y-5 md:gap-0 md:flex-row justify-between items-center px-5 py-3 bg-zinc-700 sm:rounded-lg shadow-lg shadow-gray-950">
            <div class="flex items-center gap-5">
                <h2 class="text-xl">Usuarios adminsitradores</h2>
                <a href="{{ route('admin.user.create', ['is_admin' => 1]) }}">
                    <x-button
                        class="text-xs outline outline-2 -outline-offset-1 outline-red-600 shadow-none hover:shadow-lg hover:bg-red-600">
                        Nuevo
                        <i class="fa-solid fa-plus ms-2"></i>
                    </x-button>
                </a>
            </div>
            <div class="flex items-center gap-3">
                <label for="search_admin">Buscar:</label>
                <x-input type="text" id="search_admin" wire:model.live="searchAdminFilter"
                    placeholder="Nombre o email..." />
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg shadow-gray-950 mt-5">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-red-700">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-4 py-3 hidden sm:table-cell">
                            Nombre
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Email
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admin_users as $user)
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td scope="row" class="p-4 font-medium whitespace-nowrap">
                                #{{ $user->id }}
                            </td>
                            <td class="hidden sm:table-cell p-4">
                                {{ $user->name }}
                            </td>
                            <td class="break-words p-4">
                                <p class="w-36 sm:w-fit">
                                    {{ $user->email }}
                                </p>
                            </td>
                            <td class="p-4 flex items-center justify-end gap-x-5">
                                <a href="{{ route('admin.user.edit', ['user_id' => $user->id]) }}">
                                    <x-button class="text-xs bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800">
                                        <span class="inline-block lg:me-1">
                                            <i class="fa-regular fa-eye"></i>
                                        </span>
                                        <span class="hidden lg:inline-block">Ver usuario</span>
                                    </x-button>
                                </a>

                                <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800"
                                    wire:click="showConfirmModal({{ $user->id }})" wire:loading.attr="disabled">
                                    <i class="fa-solid fa-trash-can"></i>
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr class="odd:bg-zinc-600 even:bg-zinc-700">
                            <td class="p-4" colspan="4">
                                No existe ningún usuario administrador
                                @if ($searchAdminFilter != '')
                                    que coincida con "{{ $searchAdminFilter }}"
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($admin_users->hasPages())
            <div class="mt-5 mx-5">{{ $admin_users->onEachSide(2)->links() }}</div>
        @endif
    </section>

    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmUserDelete">
        <x-slot name="title">
            {{ __('Eliminar cuenta con email') }}
            @if ($selected_user)
                "{{ $selected_user->email }}"
            @endif
        </x-slot>

        <x-slot name="content">
            {{ __('¿Está seguro que desea eliminar la cuenta?') }}
        </x-slot>

        <x-slot name="footer">
            <x-button class="text-xs bg-zinc-600 hover:bg-zinc-700 active:bg-zinc-800"
                wire:click="$toggle('confirmUserDelete')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-button>

            <x-button class="ms-3 text-xs bg-red-600 hover:bg-red-700 active:bg-red-800" wire:click="deleteUser"
                wire:loading.attr="disabled">
                {{ __('Eliminar cuenta') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
