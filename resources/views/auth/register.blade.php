<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('home') }}">
                <x-authentication-card-logo />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name">Nombre</x-label>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email">Email</x-label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password">Contraseña</x-label>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation">Confirmar contraseña</x-label>
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-center sm:justify-end mt-4">
                <a class="underline text-xs text-slate-100 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-red-600 focus:text-red-500 focus:ring-offset-2"
                    href="{{ route('login') }}">
                    ¿Ya estás registrado?
                </a>

                <x-button class="mt-5 sm:mt-0 sm:ms-3 text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                    Registrarse
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
