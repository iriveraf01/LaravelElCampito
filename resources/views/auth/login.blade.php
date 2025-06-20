<!-- Logo Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-center h-16 mb-0">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset('images/darker_image.png') }}" alt="logo" class="w-36 h-auto">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Manteniendo x-guest-layout como está en el código original -->
<x-guest-layout>
    <!-- Añadiendo clases para mejorar la apariencia visual del contenedor -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
        <!-- Cabecera personalizada -->
        <div class="mb-6 text-center">
            <h2 class="text-xl font-bold text-yellow-800">
                {{ __('Bienvenido a El Campito Zafra') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Inicia sesión para gestionar tus reservas') }}
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <x-text-input id="email" class="pl-10 py-2.5 block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tu.email@ejemplo.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input id="password" class="pl-10 py-2.5 block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-yellow-600 shadow-sm focus:ring-yellow-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                <div class="flex flex-col items-start space-y-2">
                    <a class="text-sm text-yellow-700 hover:text-yellow-800 hover:underline font-medium" href="{{ route('register') }}">
                        {{ __('¿No tiene cuenta?') }}
                    </a>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-800 hover:underline" href="{{ route('password.request') }}">
                            {{ __('¿Olvidó su contraseña?') }}
                        </a>
                    @endif
                </div>

                <!-- Manteniendo x-primary-button pero añadiendo clases para mejorar su apariencia  -->
                <x-primary-button class="ms-3 bg-yellow-700 hover:bg-yellow-800 focus:bg-yellow-800 active:bg-yellow-800 focus:ring-yellow-300 inline-flex items-center px-5 py-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    {{ __('Inicia sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
