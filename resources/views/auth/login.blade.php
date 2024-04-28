<x-guest-layout>
    <x-authentication-card>
        <!-- Logo -->
        <x-slot name="logo">
            <a href="{{ route('home') }}">
                <x-authentication-card-logo />
            </a>
        </x-slot>

        <!-- Error messages -->
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email">Email</x-label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password">Contraseña</x-label>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-center sm:justify-end mt-4">
                <a class="mt-4 sm:mt-0 sm:ms-3 underline text-xs text-slate-100 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-red-600 focus:text-red-500 focus:ring-offset-2"
                    href="{{ route('register') }}">
                    ¿No tienes una cuenta?
                </a>

                <x-button class="mt-5 sm:mt-0 sm:ms-3 text-sm bg-red-600 hover:bg-red-700 active:bg-red-800">
                    Iniciar sesión
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
