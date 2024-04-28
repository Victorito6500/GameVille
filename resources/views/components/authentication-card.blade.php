<div class="login-body min-h-screen bg-zinc-900 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="max-w-60 hover:scale-110 transition ease-in-out duration-150">
        {{ $logo }}
    </div>

    <div class="w-full bg-zinc-700 sm:max-w-lg mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
