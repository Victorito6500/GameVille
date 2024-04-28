<footer class="w-full bg-zinc-700 shadow-lg shadow-gray-950 py-5">
    <!-- Content -->
    <section class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-10">
            <div class="max-w-48 sm:max-w-40 flex flex-col justify-center items-center gap-5">
                <h5 class="font-medium text-lg sm:text-sm text-slate-100 sm:self-start">Redes sociales:</h5>
                <div class="flex sm:justify-center items-center gap-5">
                    <a href="https://es-es.facebook.com/"
                        class="shadow-lg shadow-gray-950 hover:scale-110 transition ease-in-out duration-150">
                        <img src="{{ asset('storage/icons/facebook.png') }}" alt=""
                            onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
                    </a>
                    <a href="https://www.instagram.com/"
                        class="shadow-lg shadow-gray-950 hover:scale-110 transition ease-in-out duration-150">
                        <img src="{{ asset('storage/icons/instagram.png') }}" alt=""
                            onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
                    </a>
                    <a href="https://twitter.com/"
                        class="shadow-lg shadow-gray-950 hover:scale-110 transition ease-in-out duration-150">
                        <img src="{{ asset('storage/icons/twitter.png') }}" alt=""
                            onerror="this.src='{{ asset('storage/images/no-image.svg') }}'">
                    </a>
                </div>
            </div>

            <div class="max-w-32 md:max-w-36 flex flex-col justify-center items-center gap-5">
                <a href="{{ route('home') }}" class="hover:scale-110 transition ease-in-out duration-150">
                    <x-application-mark />
                </a>
            </div>

            <div class="text-center sm:text-end text-slate-100">
                <p class="text-xs mb-1">¿Necesitas ayuda?</p>
                <p class="text-sm">Nuestro equipo está disponible 24/7</p>
                <p class="mt-5 flex justify-center sm:justify-end items-center gap-2">
                    <i class="fa-solid fa-phone"></i>
                    <span class="font-medium text-sm">+34 666 444 333</span>
                </p>
                <p class="mt-2 flex justify-center sm:justify-end items-center gap-2">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="font-medium text-sm">
                        <a href="" class="hover:text-red-600 hover:underline">gameville@gmail.com</a>
                    </span>
                </p>
            </div>
        </div>
    </section>

    <!-- Copyright -->
    <section class="max-w-7xl mx-auto px-6 font-medium text-xs text-slate-100 text-center sm:text-start mt-10">
        &copy; Víctor Jiménez Morales &nbsp;2024
    </section>
</footer>
