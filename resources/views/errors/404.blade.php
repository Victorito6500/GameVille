<x-guest-layout>
    <main class="login-body h-screen w-full flex flex-col justify-center items-center">
        <img src="{{ asset('storage/icons/ovni2.png') }}" class="mb-1 animation-vertical-shake"
            onerror="this.src='{{ asset('storage/images/no-image.svg') }}'" />
        <div class="flex flex-col justify-center items-center animation-shake">
            <div class="text-9xl font-extrabold text-white tracking-widest">404</div>
            <div class="bg-red-600 px-2 text-sm rounded rotate-12 absolute mt-5">
                Página No Encontrada
            </div>
        </div>

        <a href="{{ route('home') }}">
            <x-button class="mt-5 bg-red-600 hover:bg-red-700 active:bg-red-800">
                <i class="fa-solid fa-house me-4"></i>
                Página principal
                <i class="fa-solid fa-house ms-4"></i>
            </x-button>
        </a>
    </main>
</x-guest-layout>
