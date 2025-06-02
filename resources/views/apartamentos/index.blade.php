<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-amber-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Título de sección -->
            <div class="text-center mb-10">
                <h2 id="apartamentos" class="text-3xl font-bold text-yellow-800 inline-block relative">
                    Nuestros apartamentos
                    <span class="block h-1 bg-yellow-600 w-32 mx-auto mt-2"></span>
                </h2>
                <p class="text-gray-600 mt-4 max-w-3xl mx-auto">Disfruta de la comodidad y el encanto rural en nuestros apartamentos completamente equipados</p>
            </div>

            <!-- Listado de apartamentos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($apartamentos as $apartamento)
                    <div class="group">
                        <a href="{{ route('apartamentos.show', $apartamento) }}" class="block h-full">
                            <div class="bg-white rounded-xl overflow-hidden shadow-lg group-hover:shadow-xl transition-all duration-300 h-full border border-gray-100 group-hover:border-yellow-200">
                                <!-- Badge de disponibilidad -->
                                <div class="relative">

                                    <!-- Imagen principal con overlay al hover -->
                                    @php
                                        $imagenes = $apartamento->imagenes;
                                        $imagenPrincipal = $imagenes[0] ?? 'images/no-image.png';
                                    @endphp
                                    <div class="relative overflow-hidden">
                                        <img
                                            src="{{ asset($imagenPrincipal) }}"
                                            alt="Imagen de {{ $apartamento->descripcion }}"
                                            class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110"
                                        >
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                                            <span class="text-white font-medium px-4 py-2 rounded-full bg-yellow-700/80 backdrop-blur-sm">Ver detalles</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contenido -->
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-yellow-700 transition-colors">
                                        {{ $apartamento->descripcion }}
                                    </h3>

                                    <!-- Características -->
                                    <div class="flex flex-wrap gap-3 mb-4">
                                        <div class="flex items-center text-gray-600 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            <span>{{ $apartamento->capacidad }} persona{{ $apartamento->capacidad > 1 ? 's' : '' }}</span>
                                        </div>

                                        <div class="flex items-center text-gray-600 text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span>WiFi gratis</span>
                                        </div>
                                    </div>

                                    <!-- Servicios incluidos -->
                                    <div class="border-t border-gray-100 pt-4 mb-4">
                                        <h4 class="text-sm font-medium text-gray-500 mb-2">Servicios incluidos:</h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($apartamento->servicios->where('categoria', 'interior') as $servicio)
                                                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                                                    {{ $servicio->nombre }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Precio y botón -->
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-2xl font-bold text-yellow-700">
                                                €{{ number_format($apartamento->precio, 2) }}
                                            </p>
                                            <p class="text-gray-500 text-sm">por noche</p>
                                        </div>

                                        <button class="bg-yellow-700 hover:bg-yellow-800 text-white text-sm font-medium py-2 px-4 rounded-lg transition duration-300">
                                            Reservar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{--Información antes de hacer su reserva--}}
            <div class="mt-20 mb-10">
                <div class="text-center mb-12">
                    <h2 id="informacion-reserva" class="text-3xl font-bold text-yellow-800 inline-block relative">
                        Información antes de hacer su reserva
                        <span class="block h-1 bg-yellow-600 w-24 mx-auto mt-2"></span>
                    </h2>
                </div>
                <div class="max-w-4xl mx-auto bg-yellow-50/50 p-8 rounded-lg shadow-md">
                    <!-- Sección Descuentos -->
                    <div class="mb-10">
                        <h3 class="text-2xl font-semibold text-yellow-800 mb-4 pb-2 border-b border-yellow-200">
                            Descuentos (A partir de 7 noches):
                        </h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="bg-yellow-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 shrink-0">1</span>
                                <span class="text-yellow-900"><strong>7 noches:</strong> -4€/Dto/Día</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-yellow-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 shrink-0">2</span>
                                <span class="text-yellow-900"><strong>De 8 a 15 noches:</strong> -7€/Dto/Día</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-yellow-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 shrink-0">3</span>
                                <span class="text-yellow-900"><strong>De 16 a 21 noches:</strong> -9€/Dto/Día</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-yellow-600 text-white rounded-full w-6 h-6 flex items-center justify-center mr-3 mt-0.5 shrink-0">4</span>
                                <span class="text-yellow-900"><strong>A partir de 21 noches:</strong> -20%/Dto/Día</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Sección Horario -->
                    <div>
                        <h3 class="text-2xl font-semibold text-yellow-800 mb-4 pb-2 border-b border-yellow-200">
                            Horario de los apartamentos:
                        </h3>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-yellow-600">
                                <h4 class="font-bold text-yellow-700 mb-2">Hora de entrada:</h4>
                                <p class="text-yellow-900">A partir de las 12:00h del mediodía</p>
                            </div>
                            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 border-yellow-600">
                                <h4 class="font-bold text-yellow-700 mb-2">Hora de salida:</h4>
                                <p class="text-yellow-900">Hasta las 12:00h del día siguiente, en caso de salir por la tarde se cobrará la mitad del precio oficial fijado al día.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nota adicional si es necesaria -->
                    <div class="mt-8 p-4 bg-yellow-100/50 rounded-lg border border-yellow-200">
                        <p class="text-yellow-800 italic">* Esta información es orientativa y puede estar sujeta a cambios. Para más detalles, contacte con nosotros.</p>
                    </div>
                </div>
                <div class="mt-20 mb-10">
                    <div class="text-center mb-12">
                        <h2 id="precios" class="text-3xl font-bold text-yellow-800 inline-block relative">
                            Precios de apartamentos turísticos
                            <span class="block h-1 bg-yellow-600 w-24 mx-auto mt-2"></span>
                        </h2>
                    </div>

                    <!-- Versión para desktop (se muestra en md y arriba) -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                            <thead class="bg-yellow-700 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left font-semibold">Descripción Apartamentos</th>
                                <th class="py-3 px-4 text-center font-semibold">Temporada Baja (resto del año)</th>
                                <th class="py-3 px-4 text-center font-semibold">Temporada Media (Semana Santa, Julio y Agosto)</th>
                                <th class="py-3 px-4 text-center font-semibold">Temporada Alta (Feria - 1ª semana de octubre)</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-yellow-200">
                            <!-- Fila 1 -->
                            <tr class="hover:bg-yellow-50">
                                <td class="py-3 px-4 font-medium text-yellow-900">Apartamento de una habitación doble<br> (2 PAX)</td>
                                <td class="py-3 px-4 text-center">60€</td>
                                <td class="py-3 px-4 text-center">60€</td>
                                <td class="py-3 px-4 text-center">75€</td>
                            </tr>
                            <!-- Fila 2 -->
                            <tr class="hover:bg-yellow-50">
                                <td class="py-3 px-4 font-medium text-yellow-900">Apartamento de dos habitaciones dobles<br> (4 PAX)</td>
                                <td class="py-3 px-4 text-center">95€</td>
                                <td class="py-3 px-4 text-center">100€</td>
                                <td class="py-3 px-4 text-center">130€</td>
                            </tr>
                            <!-- Fila 3 -->
                            <tr class="hover:bg-yellow-50">
                                <td class="py-3 px-4 font-medium text-yellow-900">Apartamento tres habitaciones dobles<br> (6 PAX)</td>
                                <td class="py-3 px-4 text-center">130€</td>
                                <td class="py-3 px-4 text-center">140€</td>
                                <td class="py-3 px-4 text-center">160€</td>
                            </tr>
                            <!-- Fila 4 -->
                            <tr class="hover:bg-yellow-50">
                                <td class="py-3 px-4 font-medium text-yellow-900">Cama supletoria</td>
                                <td class="py-3 px-4 text-center">15€</td>
                                <td class="py-3 px-4 text-center">15€</td>
                                <td class="py-3 px-4 text-center">20€</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Versión para móvil (se muestra en sm y abajo) -->
                    <div class="md:hidden space-y-4 text-center">
                        <!-- Tarjeta 1 -->
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            <h3 class="font-medium text-yellow-900 text-lg mb-2">Apartamento de una habitación doble (2 PAX)</h3>
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Baja</p>
                                    <p class="font-medium">60€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Media</p>
                                    <p class="font-medium">60€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Alta</p>
                                    <p class="font-medium">75€</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta 2 -->
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            <h3 class="font-medium text-yellow-900 text-lg mb-2">Apartamento de dos habitaciones dobles (4 PAX)</h3>
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Baja</p>
                                    <p class="font-medium">95€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Media</p>
                                    <p class="font-medium">100€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Alta</p>
                                    <p class="font-medium">130€</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta 3 -->
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            <h3 class="font-medium text-yellow-900 text-lg mb-2">Apartamento tres habitaciones dobles (6 PAX)</h3>
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Baja</p>
                                    <p class="font-medium">130€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Media</p>
                                    <p class="font-medium">140€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Alta</p>
                                    <p class="font-medium">160€</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta 4 -->
                        <div class="bg-white rounded-lg shadow-lg p-4">
                            <h3 class="font-medium text-yellow-900 text-lg mb-2">Cama supletoria</h3>
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Baja</p>
                                    <p class="font-medium">15€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Media</p>
                                    <p class="font-medium">15€</p>
                                </div>
                                <div class="bg-yellow-100 p-2 rounded">
                                    <p class="text-xs font-semibold text-yellow-700">Temporada Alta</p>
                                    <p class="font-medium">20€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sección de ventajas -->
            <div class="mt-20 mb-10">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-yellow-800 inline-block relative">
                        ¿Por qué elegirnos?
                        <span class="block h-1 bg-yellow-600 w-24 mx-auto mt-2"></span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Calidad Premium</h3>
                        <p class="text-gray-600 text-sm">Apartamentos completamente equipados con materiales de primera calidad.</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Ubicación Privilegiada</h3>
                        <p class="text-gray-600 text-sm">En plena naturaleza pero a pocos minutos del centro de Zafra.</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Disponibilidad 24/7</h3>
                        <p class="text-gray-600 text-sm">Servicio de atención al cliente disponible en todo momento.</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Cancelación Flexible</h3>
                        <p class="text-gray-600 text-sm">Política de cancelación gratuita hasta 48h antes de la llegada.</p>
                    </div>
                </div>
            </div>

            <!-- Llamada a la acción -->
            <div class="bg-gradient-to-r from-yellow-700 to-amber-600 rounded-xl p-8 mt-16 text-center text-white">
                <h3 class="text-2xl font-bold mb-4">¿Listo para disfrutar de una experiencia única?</h3>
                <p class="mb-6 max-w-2xl mx-auto">Reserva ahora y aprovecha nuestras ofertas especiales para estancias de más de 3 noches. ¡No esperes más para vivir la experiencia El Campito Zafra!</p>
                <a href="#apartamentos" class="bg-white text-yellow-700 hover:bg-yellow-100 font-bold py-3 px-8 rounded-lg transition duration-300 shadow-lg inline-block">
                    Reservar Ahora
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
