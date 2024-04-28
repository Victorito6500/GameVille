<div class="fixed w-full z-20">
    <nav x-data="{ open: false }" class="bg-zinc-900 border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Navigation -->
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 max-w-24 flex items-center" :class="{ 'hidden': open, 'block': !open }">
                        <a href="{{ route('home') }}" class="mt-4 hover:scale-110 transition ease-in-out duration-150">
                            <x-application-mark class="block" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 lg:-my-px lg:ms-10 lg:flex">
                        @if (Auth::check() && Auth::user()->getOriginal('isAdmin'))
                            <!-- Home -->
                            <x-nav-link href="{{ route('admin.home') }}" :active="$active_home">
                                Página principal
                            </x-nav-link>

                            <!-- Users -->
                            <x-nav-link href="{{ route('admin.user') }}" :active="$active_users">
                                Usuarios
                            </x-nav-link>

                            <!-- Orders -->
                            <x-nav-link href="{{ route('admin.order') }}" :active="$active_orders">
                                Pedidos
                            </x-nav-link>

                            <!-- Products -->
                            <x-nav-link href="{{ route('admin.product') }}" :active="$active_products">
                                Productos
                            </x-nav-link>

                            @if ($active_products)
                                <x-nav-link href="{{ route('admin.category') }}" :active="$active_categories" class="text-xs">
                                    Categorías
                                </x-nav-link>
                                <x-nav-link href="{{ route('admin.genre') }}" :active="$active_genres" class="text-xs">
                                    Géneros
                                </x-nav-link>
                                <x-nav-link href="{{ route('admin.platform') }}" :active="$active_platforms" class="text-xs">
                                    Plataformas
                                </x-nav-link>
                            @endif
                        @else
                            <!-- Home -->
                            <x-nav-link href="{{ route('home') }}" :active="$active_home">
                                Página principal
                            </x-nav-link>

                            <!-- Catalog -->
                            <x-nav-link :active="$active_catalog">
                                <form action="{{ route('catalog') }}" method="POST" class="h-full w-full">
                                    @csrf
                                    <button type="submit" class="h-full w-full">Catálogo</button>
                                </form>
                            </x-nav-link>
                        @endif
                    </div>
                </div>

                <!-- Search Bar -->
                @if (!Auth::check() || (Auth::check() && !Auth::user()->getOriginal('isAdmin')))
                    <div class="hidden lg:grow lg:flex lg:items-center lg:ms-20">
                        <form method="POST" action="{{ route('catalog') }}" x-data class="grow">
                            @csrf
                            <div class="flex gap-3">
                                <x-input class="block w-full" type="text" name="search" :value="old('search')" />
                                <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800">
                                    Buscar
                                </x-button>
                            </div>
                        </form>
                    </div>
                @endif

                <!-- Shopping cart -->
                @if (Auth::check() && !Auth::user()->getOriginal('isAdmin'))
                    <div class="ms-10 me-5 lg:me-0 grow lg:grow-0 flex items-center justify-end lg:justify-center">
                        <a href="{{ route('cart') }}"
                            class="group relative flex items-center justify-center text-red-600 text-xl p-2.5 rounded-lg hover:bg-red-600 hover:text-slate-100 active:bg-red-800 transition ease-in-out">
                            <i class="fa-solid fa-cart-shopping group-hover:scale-110"></i>
                            <div
                                class="text-slate-100 text-xs flex items-center justify-center w-4 h-4 absolute -right-1 -top-1 rounded-full bg-zinc-600 px-1 group-hover:scale-110">
                                {{ $cart_total_quantity }}
                            </div>
                        </a>
                    </div>
                @endif

                <!-- Profile Settings -->
                <div class="hidden lg:flex lg:items-center">
                    <div class="ms-10 relative">
                        <!-- Dropdown Menu -->
                        <x-dropdown align="right" width="48">
                            @if (Auth::check())
                                <!-- Profile Button -->
                                <x-slot name="trigger">
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full hover:scale-110 transition ease-in-out">
                                        <img class="h-12 w-12 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>
                                </x-slot>

                                <!-- Profile Links -->
                                <x-slot name="content">
                                    <div class="block px-4 py-3 text-xs text-slate-300 rounded-t-md">
                                        Gestionar perfil
                                    </div>

                                    <!-- Profile Management -->
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        Perfil
                                    </x-dropdown-link>

                                    <div class="border-t border-zinc-500"></div>

                                    <!-- My orders -->
                                    @if (!Auth::user()->getOriginal('isAdmin'))
                                        <x-dropdown-link href="{{ route('profile.orders') }}">
                                            Mis pedidos
                                        </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-zinc-500"></div>

                                    <!-- Log Out -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link class="hover rounded-b-md" href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                            Cerrar sesión
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            @else
                                <!-- Authentication Button -->
                                <x-slot name="trigger">
                                    <button
                                        class="flex text-xl border-2 border-red-600 rounded-full p-2 text-red-600 hover:text-slate-100 hover:bg-red-600 active:bg-red-800 active:border-red-800 transition">
                                        <i class="fa-solid fa-user"></i>
                                    </button>
                                </x-slot>

                                <!-- Authentication Links -->
                                <x-slot name="content">
                                    <!-- Log In -->
                                    <x-dropdown-link href="{{ route('login') }}" class="rounded-t-md">
                                        Iniciar sesión
                                    </x-dropdown-link>

                                    <div class="border-t border-zinc-500"></div>

                                    <!-- Register -->
                                    <x-dropdown-link href="{{ route('register') }}" class="rounded-b-md">
                                        Registrarse
                                    </x-dropdown-link>
                                </x-slot>
                            @endif
                        </x-dropdown>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center lg:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-red-600 hover:text-slate-100 hover:bg-red-600 transition duration-150 ease-in-out">
                        <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="lg:hidden">
            <!-- Responsive Navigation Links -->
            <div class="pt-2 pb-3 space-y-1">
                @if (Auth::check() && Auth::user()->getOriginal('isAdmin'))
                    <!-- Home -->
                    <x-responsive-nav-link href="{{ route('admin.home') }}" :active="$active_home">
                        Página principal
                    </x-responsive-nav-link>

                    <!-- Users -->
                    <x-responsive-nav-link href="{{ route('admin.user') }}" :active="$active_users">
                        Usuarios
                    </x-responsive-nav-link>

                    <!-- Orders -->
                    <x-responsive-nav-link href="{{ route('admin.order') }}" :active="$active_orders">
                        Pedidos
                    </x-responsive-nav-link>

                    <!-- Products -->
                    <x-responsive-nav-link href="{{ route('admin.product') }}" :active="$active_products">
                        Productos
                    </x-responsive-nav-link>

                    @if ($active_products)
                        <x-responsive-nav-link href="{{ route('admin.category') }}" :active="$active_categories"
                            class="text-xs ps-5">
                            Categorías
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.genre') }}" :active="$active_genres"
                            class="text-xs ps-5">
                            Géneros
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.platform') }}" :active="$active_platforms"
                            class="text-xs ps-5">
                            Plataformas
                        </x-responsive-nav-link>
                    @endif
                @else
                    <!-- Home -->
                    <x-responsive-nav-link href="{{ route('home') }}" :active="$active_home">
                        Página principal
                    </x-responsive-nav-link>

                    <!-- Catalog -->
                    <x-responsive-nav-link :active="$active_catalog">
                        <form action="{{ route('catalog') }}" method="POST" class="h-full w-full">
                            @csrf
                            <button type="submit" class="h-full w-full text-start">Catálogo</button>
                        </form>
                    </x-responsive-nav-link>
                @endif
            </div>

            <!-- Responsive Profile Settings -->
            <div class="py-4 border-t border-slate-100">
                @if (Auth::check())
                    <!-- Profile Details -->
                    <div class="flex items-center px-4">
                        <div class="shrink-0 me-3">
                            <img class="h-14 w-14 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>

                        <div>
                            <div class="font-medium text-base text-red-500">{{ Auth::user()->name }}</div>
                            <div class="font-normal text-sm text-slate-100">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <!-- Profile Links -->
                    <div class="mt-3 space-y-1">
                        <!-- Profile Management -->
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            Perfil
                        </x-responsive-nav-link>

                        <!-- My orders -->
                        @if (!Auth::user()->getOriginal('isAdmin'))
                            <x-responsive-nav-link href="{{ route('profile.orders') }}" :active="request()->routeIs('profile.orders')">
                                Mis pedidos
                            </x-responsive-nav-link>
                        @endif

                        <!-- Log Out -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                Cerrar sesión
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @else
                    <!-- Authentication Links -->
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-5 px-4">
                        <!-- Log In -->
                        <a href="{{ route('login') }}">
                            <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800">
                                Iniciar sesión
                            </x-button>
                        </a>

                        <!-- Register -->
                        <a href="{{ route('register') }}">
                            <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800">
                                Registrarse
                            </x-button>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Responsive Search Bar -->
            @if (!Auth::check() || (Auth::check() && !Auth::user()->getOriginal('isAdmin')))
                <div class="py-4 px-3 border-t border-slate-100">
                    <form method="POST" action="{{ route('catalog') }}" x-data>
                        @csrf
                        <div class="flex justify-center items-center gap-3">
                            <x-input class="block w-full" type="text" name="search" :value="old('search')" />
                            <x-button class="text-xs bg-red-600 hover:bg-red-700 active:bg-red-800">
                                Buscar
                            </x-button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </nav>
</div>
