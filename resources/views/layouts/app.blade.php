<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GameVille') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ secure_asset('resources/css/app.css') }}">
    <script src="{{ secure_asset('resources/js/app.js') }}" defer></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col min-h-dvh bg-zinc-900">
        <!-- Navigation Menu -->
        @livewire('navbar.navigation-bar')

        <!-- Success message alert -->
        <div class="relative flex justify-center w-full">
            <div class="fixed z-30 top-32 w-9/12 lg:w-1/2">
                @livewire('alert.success-alert')
                @livewire('alert.danger-alert')
            </div>
        </div>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="shadow-xl">
                {{ $header }}
            </header>
        @endif

        <!-- Page Content -->
        <main class="grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        @if (!Auth::check() || (Auth::check() && !Auth::user()->isAdmin))
            <x-footer></x-footer>
        @endif
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
