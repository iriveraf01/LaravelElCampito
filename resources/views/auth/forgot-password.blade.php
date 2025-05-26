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
                {{ __('Recupera tu contraseña') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Acceso a tu cuenta de El Campito Zafra') }}
            </p>
        </div>

        <div class="mb-4 p-4 bg-amber-50 rounded-lg border border-amber-100 text-sm text-gray-700">
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>
                    {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}
                </span>
            </div>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
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
                    <x-text-input
                        id="email"
                        class="pl-10 py-2.5 block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        placeholder="tu.email@ejemplo.com"
                    />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                <a class="text-sm text-yellow-700 hover:text-yellow-800 hover:underline font-medium" href="{{ route('login') }}">
                    {{ __('Volver a inicio de sesión') }}
                </a>

                <!-- Manteniendo x-primary-button pero añadiendo clases para mejorar su apariencia -->
                <x-primary-button class="ms-3 bg-yellow-700 hover:bg-yellow-800 focus:bg-yellow-800 active:bg-yellow-800 focus:ring-yellow-300 inline-flex items-center px-5 py-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ __('Enviar enlace de recuperación') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
