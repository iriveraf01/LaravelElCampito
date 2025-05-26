<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 pt-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-105">
                        <img src="{{ asset('images/darker_image.png') }}" alt="logo" class="w-36 h-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-700 hover:text-yellow-700 transition-colors duration-300 text-base font-medium border-b-2 border-transparent hover:border-yellow-600 ">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    <x-nav-link :href="route('apartamentos')" :active="request()->routeIs('apartamentos')" class="text-gray-700 hover:text-yellow-700 transition-colors duration-300 text-base font-medium border-b-2 border-transparent hover:border-yellow-600 ">
                        {{ __('Apartamentos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('restaurante')" :active="request()->routeIs('restaurante')" class="text-gray-700 hover:text-yellow-700 transition-colors duration-300 text-base font-medium border-b-2 border-transparent hover:border-yellow-600 ">
                        {{ __('Restaurante') }}
                    </x-nav-link>
                    <x-nav-link :href="route('instalaciones')" :active="request()->routeIs('instalaciones')" class="text-gray-700 hover:text-yellow-700 transition-colors duration-300 text-base font-medium border-b-2 border-transparent hover:border-yellow-600 ">
                        {{ __('Instalaciones') }}
                    </x-nav-link>
                    <x-nav-link :href="route('entorno')" :active="request()->routeIs('entorno')" class="text-gray-700 hover:text-yellow-700 transition-colors duration-300 text-base font-medium border-b-2 border-transparent hover:border-yellow-600">
                        {{ __('Entorno') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm leading-4 font-medium rounded-lg text-gray-700 bg-gray-50 hover:bg-yellow-50 hover:text-yellow-700 focus:outline-none transition ease-in-out duration-150 shadow-sm relative">
                                <div>{{ Auth::user()->name }}</div>

                                @if($tieneReservasActivas)
                                    <span title="Tienes reservas activas" class="absolute -right-2 -top-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-pulse">
                                        !
                                    </span>
                                @endif

                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 text-sm text-gray-500 border-b border-gray-100">
                                <div class="font-medium text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="text-xs">{{ Auth::user()->email }}</div>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (Auth::user()->rol === 'admin')
                                <x-dropdown-link :href="url('/admin')" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Panel de administración
                                </x-dropdown-link>
                            @endif

                            <!-- Enlace de reservas normal o destacado según condición -->
                            <x-dropdown-link :href="route('reservas.index')" class="flex items-center {{ $tieneReservasActivas ? 'bg-yellow-50 text-yellow-700 font-medium' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 {{ $tieneReservasActivas ? 'text-yellow-600' : 'text-gray-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ __('Ver mis reservas') }}
                                @if($tieneReservasActivas)
                                    <span class="ml-2 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">!</span>
                                @endif
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center text-red-600 hover:text-red-800 hover:bg-red-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    @if (Route::has('login'))
                        <nav class="flex items-center gap-4">
                            <a href="{{ route('login') }}">
                                <button class="rounded-lg border border-gray-300 py-2.5 px-5 text-center text-sm font-medium transition-all shadow-sm hover:shadow-md text-gray-700 hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:ring-2 focus:ring-yellow-200 focus:outline-none" type="button">
                                    Iniciar sesión
                                </button>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">
                                    <button class="rounded-lg bg-yellow-600 py-2.5 px-5 text-center text-sm font-medium text-white transition-all shadow-sm hover:shadow-md hover:bg-yellow-700 focus:ring-2 focus:ring-yellow-200 focus:outline-none" type="button">
                                        Registrarse
                                    </button>
                                </a>
                            @endif
                        </nav>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-yellow-700 hover:bg-yellow-50 focus:outline-none focus:bg-yellow-50 focus:text-yellow-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('apartamentos')" :active="request()->routeIs('apartamentos')">
                {{ __('Apartamentos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('restaurante')" :active="request()->routeIs('restaurante')">
                {{ __('Restaurante') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('instalaciones')" :active="request()->routeIs('instalaciones')">
                {{ __('Instalaciones') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('entorno')" :active="request()->routeIs('entorno')">
                {{ __('Entorno') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4 relative">
                    <div class="font-medium text-base text-gray-800 flex items-center">
                        {{ Auth::user()->name }}
                        @if($tieneReservasActivas)
                            <span title="Tienes reservas activas" class="ml-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center animate-pulse">
                                !
                            </span>
                        @endif
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    @if (Auth::user()->rol === 'admin')
                        <x-responsive-nav-link :href="url('/admin')">
                            {{ __('Panel de administración') }}
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link :href="route('reservas.index')">
                        {{ __('Ver mis reservas') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                @if (Route::has('login'))
                    <div class="px-4 space-y-1">
                        <x-responsive-nav-link :href="route('login')">
                            {{ __('Log in') }}
                        </x-responsive-nav-link>
                        @if (Route::has('register'))
                            <x-responsive-nav-link :href="route('register')">
                                {{ __('Register') }}
                            </x-responsive-nav-link>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</nav>
