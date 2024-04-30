<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza la información de tu perfil y tu email.') }}
    </x-slot>

    <x-slot name="form" class="bg-red-600">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" class="text-slate-100" value="{{ __('Foto de perfil') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                @if ($this->user->profile_photo_path)
                    <p>
                        <span
                            class="mt-2 text-sm text-red-300 underline underline-offset-4
                            hover:cursor-pointer hover:text-red-500"
                            wire:click="deleteProfilePhoto">
                            Eliminar foto
                        </span>
                    </p>
                @endif

                <x-button class="mt-5 me-2 text-xs bg-red-600 hover:bg-red-700 active:bg-red-800" type="button"
                    x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecciona una nueva foto') }}
                </x-button>



                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required
                autocomplete="username" />
            <x-input-error for="email" class="mt-2" />
        </div>

        @if (Auth::user()->isAdmin != 1)
            <!-- Address -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="address" value="{{ __('Dirección') }}" />
                <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" />
                <x-input-error for="address" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="phone" value="{{ __('Teléfono') }}" />
                <x-input id="phone" type="text" class="mt-1 block w-full" wire:model="state.phone"
                    maxlength="9" />
                <x-input-error for="phone" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button class="text-sm bg-red-600 hover:bg-red-700 active:bg-red-800" wire:loading.attr="disabled"
            wire:target="photo">
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
