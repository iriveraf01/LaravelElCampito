<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'El Campito') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <!-- Sección superior con logo y redes sociales -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-12 border-b border-gray-700 pb-8">
                    <div class="mb-6 md:mb-0">
                        <img src="{{ asset('images/darker_image.png') }}" alt="logo" class="w-48 h-auto filter brightness-150 contrast-125">
                    </div>

                    <div class="flex flex-col items-center md:items-end">
                        <h3 class="text-lg font-semibold mb-4 text-yellow-400">SÍGUENOS</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.instagram.com/elcampitozafra" target="_blank" aria-label="Instagram"
                               class="bg-gray-800 p-3 rounded-full hover:bg-yellow-600 transition-all duration-300 transform hover:-translate-y-1">
                                <img src="/images/instagram.png" alt="Instagram" class="w-6 h-6">
                            </a>
                            <a href="https://www.facebook.com/elcampitozafra" target="_blank" aria-label="Facebook"
                               class="bg-gray-800 p-3 rounded-full hover:bg-yellow-600 transition-all duration-300 transform hover:-translate-y-1">
                                <img src="/images/facebook.png" alt="Facebook" class="w-6 h-6">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sección principal con 2 columnas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Columna 1: Enlaces -->
                    <div>
                        <h3 class="text-xl font-bold mb-6 text-yellow-400 relative inline-block after:content-[''] after:absolute after:w-12 after:h-1 after:bg-yellow-600 after:-bottom-2 after:left-0">
                            NAVEGACIÓN
                        </h3>
                        <ul class="space-y-4">
                            <li>
                                <a href="{{ route('dashboard') }}" class="flex items-center group">
                                    <span class="w-0 h-0.5 bg-yellow-500 transition-all duration-300 mr-0 group-hover:w-4 group-hover:mr-2"></span>
                                    <span class="transition-all duration-300 group-hover:text-yellow-400">INICIO</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('apartamentos') }}" class="flex items-center group">
                                    <span class="w-0 h-0.5 bg-yellow-500 transition-all duration-300 mr-0 group-hover:w-4 group-hover:mr-2"></span>
                                    <span class="transition-all duration-300 group-hover:text-yellow-400">APARTAMENTOS</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('restaurante') }}" class="flex items-center group">
                                    <span class="w-0 h-0.5 bg-yellow-500 transition-all duration-300 mr-0 group-hover:w-4 group-hover:mr-2"></span>
                                    <span class="transition-all duration-300 group-hover:text-yellow-400">RESTAURANTE</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('instalaciones') }}" class="flex items-center group">
                                    <span class="w-0 h-0.5 bg-yellow-500 transition-all duration-300 mr-0 group-hover:w-4 group-hover:mr-2"></span>
                                    <span class="transition-all duration-300 group-hover:text-yellow-400">INSTALACIONES</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('entorno') }}" class="flex items-center group">
                                    <span class="w-0 h-0.5 bg-yellow-500 transition-all duration-300 mr-0 group-hover:w-4 group-hover:mr-2"></span>
                                    <span class="transition-all duration-300 group-hover:text-yellow-400">ENTORNO</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Columna 2: Contacto -->
                    <div>
                        <h3 class="text-xl font-bold mb-6 text-yellow-400 relative inline-block after:content-[''] after:absolute after:w-12 after:h-1 after:bg-yellow-600 after:-bottom-2 after:left-0">
                            CONTACTO
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="bg-gray-800 p-2 rounded-lg mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <span>+34 637 84 13 80</span>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-gray-800 p-2 rounded-lg mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <span>info@elcampitozafra.com</span>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-gray-800 p-2 rounded-lg mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <span>Carr. Lapa, s/n, Km 1,2, 06300 Zafra, Badajoz</span>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-gray-800 p-2 rounded-lg mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <span>Restaurante cerrado: Lunes</span>
                            </li>
                            <li class="flex items-start">
                                <div class="bg-gray-800 p-2 rounded-lg mr-3 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span>Restaurante: 10:00 – 18:00</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Sección inferior con copyright -->
                <div class="mt-12 pt-8 border-t border-gray-800 text-center">
                    <p class="text-gray-400">©2024 Restaurante EL CAMPITO. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    </body>
</html>
