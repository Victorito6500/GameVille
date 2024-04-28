<x-action-section>
    <x-slot name="title">
        {{ __('Eliminar cuenta') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimina tu cuenta permanentemente.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-slate-100">
            {{ __('Una vez su cuenta sea eliminada, todos sus datos serán borrados permanentemente. Antes de eliminarla, asegúrese de guardar la información que desee mantener.') }}
        </div>

        <div class="mt-5">
            <x-button class="text-sm bg-red-600 hover:bg-red-700 active:bg-red-800" wire:click="confirmUserDeletion"
                wire:loading.attr="disabled">
                {{ __('Eliminar cuenta') }}
            </x-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Eliminar cuenta') }}
            </x-slot>

            <x-slot name="content">
                {{ __('¿Está seguro que desea eliminar la cuenta? Una vez su cuenta sea eliminada, todos sus datos serán borrados permanentemente. Antes de eliminarla, asegúrese de guardar la información que desee mantener. Por favor, introduzca su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                        placeholder="{{ __('Contraseña') }}" x-ref="password" wire:model="password"
                        wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-button class="text-sm bg-zinc-600 hover:bg-zinc-700 active:bg-zinc-800"
                    wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-button>

                <x-button class="ms-3 text-sm bg-red-600 hover:bg-red-700 active:bg-red-800" wire:click="deleteUser"
                    wire:loading.attr="disabled">
                    {{ __('Eliminar cuenta') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
