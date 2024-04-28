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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/2372df6e61.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-zinc-900">
    <div class="font-sans text-white antialiased min-h-dvh">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
