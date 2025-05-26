<x-app-layout>
    <x-slot name="header"></x-slot>

    <!-- Hero Section -->
    <div class="relative h-[70vh] bg-cover bg-center" style="background-image: url('{{ asset('images/instalaciones/instalaciones-alojamiento2.jpg') }}')">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg">El Campito Zafra</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl">Disfruta de la auténtica experiencia rural con todas las comodidades</p>
            <a href="{{ route('apartamentos') }}" class="bg-yellow-700 hover:bg-yellow-800 text-white font-bold py-3 px-8 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                Reserva tu estancia
            </a>
        </div>
    </div>

    <!-- Secciones principales -->
    <div class="bg-amber-50 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-24">
            <!-- Apartamentos -->
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative overflow-hidden rounded-2xl shadow-xl group">
                    <img
                        src="{{ asset('images/instalaciones/instalaciones-alojamiento2.jpg') }}"
                        alt="Apartamentos"
                        class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <span class="bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">ALOJAMIENTO</span>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <h2 class="text-4xl font-bold text-yellow-800 mb-6 relative inline-block">
                        Nuestros Apartamentos
                        <span class="block h-1 bg-yellow-600 w-24 mt-2"></span>
                    </h2>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">{{ $instalacion2->descripcion }}</p>
                    <a href="{{ route('apartamentos') }}" class="group relative inline-flex items-center overflow-hidden rounded-lg bg-yellow-700 px-8 py-3 text-white focus:outline-none">
                        <span class="absolute -end-full transition-all group-hover:end-4">
                            <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                        <span class="text-base font-medium transition-all group-hover:me-4">
                            Reserva ahora
                        </span>
                    </a>
                </div>
            </div>

            <!-- Restaurante -->
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 text-center md:text-left">
                    <h2 class="text-4xl font-bold text-yellow-800 mb-6 relative inline-block">
                        Restaurante
                        <span class="block h-1 bg-yellow-600 w-24 mt-2"></span>
                    </h2>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">{{ $restaurante->descripcion }}</p>
                    <a href="{{ route('restaurante') }}" class="group relative inline-flex items-center overflow-hidden rounded-lg bg-yellow-700 px-8 py-3 text-white focus:outline-none">
                        <span class="absolute -end-full transition-all group-hover:end-4">
                            <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                        <span class="text-base font-medium transition-all group-hover:me-4">
                            Ver nuestra carta
                        </span>
                    </a>
                </div>

                <div class="order-1 md:order-2 relative overflow-hidden rounded-2xl shadow-xl group">
                    <img
                        src="{{ asset('images/restaurante/restaurante-dashboard.jfif') }}"
                        alt="Restaurante"
                        class="w-full h-96 object-cover object-top transition-transform duration-700 group-hover:scale-110"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <span class="bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">GASTRONOMÍA</span>
                    </div>
                </div>
            </div>

            <!-- Instalaciones -->
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative overflow-hidden rounded-2xl shadow-xl group">
                    <img
                        src="{{ asset($instalacion3->imagenes[0]) }}"
                        alt="Instalaciones"
                        class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <span class="bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">SERVICIOS</span>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <h2 class="text-4xl font-bold text-yellow-800 mb-6 relative inline-block">
                        Instalaciones
                        <span class="block h-1 bg-yellow-600 w-24 mt-2"></span>
                    </h2>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">{{ $instalacion3->descripcion }}</p>
                    <a href="{{ route('instalaciones') }}" class="group relative inline-flex items-center overflow-hidden rounded-lg bg-yellow-700 px-8 py-3 text-white focus:outline-none">
                        <span class="absolute -end-full transition-all group-hover:end-4">
                            <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                        <span class="text-base font-medium transition-all group-hover:me-4">
                            Ver más
                        </span>
                    </a>
                </div>
            </div>

            <!-- Entorno -->
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 text-center md:text-left">
                    <h2 class="text-4xl font-bold text-yellow-800 mb-6 relative inline-block">
                        Entorno
                        <span class="block h-1 bg-yellow-600 w-24 mt-2"></span>
                    </h2>
                    <p class="text-gray-700 text-lg mb-8 leading-relaxed">{{ $entorno->descripcion }}</p>
                    <a href="{{ route('entorno') }}" class="group relative inline-flex items-center overflow-hidden rounded-lg bg-yellow-700 px-8 py-3 text-white focus:outline-none">
                        <span class="absolute -end-full transition-all group-hover:end-4">
                            <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                        <span class="text-base font-medium transition-all group-hover:me-4">
                            Explorar
                        </span>
                    </a>
                </div>

                <div class="order-1 md:order-2 relative overflow-hidden rounded-2xl shadow-xl group">
                    <img
                        src="{{ asset($entorno->imagenes[0]) }}"
                        alt="Entorno"
                        class="w-full h-96 object-cover transition-transform duration-700 group-hover:scale-110"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-70"></div>
                    <div class="absolute bottom-0 left-0 p-6">
                        <span class="bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">NATURALEZA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de características -->
    <div class="bg-white py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-yellow-800 mb-12 relative after:content-[''] after:absolute after:w-24 after:h-1 after:bg-yellow-600 after:-bottom-4 after:left-1/2 after:transform after:-translate-x-1/2">¿Por qué elegirnos?</h2>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-16">
                <div class="bg-amber-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Calidad Premium</h3>
                    <p class="text-gray-600 text-sm">Instalaciones y servicios de primera calidad para una experiencia inolvidable.</p>
                </div>

                <div class="bg-amber-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Ubicación Privilegiada</h3>
                    <p class="text-gray-600 text-sm">En plena naturaleza pero a pocos minutos del centro histórico de Zafra.</p>
                </div>

                <div class="bg-amber-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Gastronomía Local</h3>
                    <p class="text-gray-600 text-sm">Disfruta de los mejores platos tradicionales extremeños con productos de proximidad.</p>
                </div>

                <div class="bg-amber-50 rounded-xl p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Atención Personalizada</h3>
                    <p class="text-gray-600 text-sm">Servicio atento y personalizado para que tu estancia sea perfecta.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Llamada a la acción -->
    <div class="bg-gradient-to-r from-yellow-700 to-amber-600 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-white mb-6">¿Listo para disfrutar de una experiencia única?</h2>
            <p class="text-yellow-100 text-lg mb-8 max-w-3xl mx-auto">Reserva ahora y disfruta de nuestros servicios.<br> ¡No esperes más para vivir la experiencia El Campito Zafra!</p>
            <a href="{{ route('apartamentos') }}" class="inline-block bg-white text-yellow-700 hover:bg-yellow-50 font-bold py-3 px-8 rounded-lg transition-colors duration-300 shadow-lg">
                Reservar Ahora
            </a>
        </div>
    </div>
</x-app-layout>
