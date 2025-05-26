<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12 bg-amber-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-16">

            @foreach($instalaciones as $instalacion)
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                    <h3 class="text-2xl font-bold text-center text-yellow-800 mb-4">{{ $instalacion->nombre }}</h3>
                    <div class="w-24 h-1 bg-yellow-600 mx-auto mb-6 rounded"></div>

                    <p class="text-gray-600 text-base mb-6 leading-relaxed text-center">{{ $instalacion->descripcion }}</p>

                    @if(is_array($instalacion->imagenes))
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach($instalacion->imagenes as $index => $imagen)
                                <div class="rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300">
                                    <img
                                        src="{{ asset($imagen) }}"
                                        alt="{{ $instalacion->nombre }} - Imagen {{ $index + 1 }}"
                                        class="w-full h-64 object-cover"
                                    >
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="mt-20 mb-10">
                <div class="text-center mb-12">
                    <h2 id="servicios-disponibles" class="text-3xl font-bold text-yellow-800 inline-block relative">
                        Servicios Disponibles
                        <span class="block h-1 bg-yellow-600 w-24 mx-auto mt-2 rounded"></span>
                    </h2>
                </div>

                <div class="max-w-6xl mx-auto bg-yellow-50/50 p-8 rounded-lg shadow-md">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                        @foreach($servicios as $categoria => $lista)
                            <div>
                                <h3 class="text-xl font-semibold text-yellow-800 mb-4 border-b border-yellow-200 pb-2">
                                    {{ ucfirst($categoria) }}
                                </h3>

                                <ul class="space-y-2">
                                    @foreach($lista as $servicio)
                                        <li class="text-yellow-900 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                            {{ $servicio->nombre }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

                <!-- Características -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16">
                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-md transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mb-4 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-yellow-800 mb-2">Calidad Premium</h4>
                    <p class="text-gray-600">Todas nuestras instalaciones están equipadas con materiales de primera calidad para garantizar su comodidad.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-md transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mb-4 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-yellow-800 mb-2">Disponibilidad</h4>
                    <p class="text-gray-600">Nuestras instalaciones están disponibles durante todo el año con servicio de mantenimiento constante.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow hover:shadow-md transition-all duration-300 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mb-4 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-yellow-800 mb-2">Ambiente Acogedor</h4>
                    <p class="text-gray-600">Diseñadas para que se sienta como en casa, con un ambiente cálido y acogedor en plena naturaleza.</p>
                </div>
            </div>

            <!-- Botón de reserva -->
            <div class="flex justify-center mt-12">
                <a href="{{ route('apartamentos') }}">
                    <button
                        class="relative group inline-flex items-center px-8 py-3 overflow-hidden text-lg font-medium text-yellow-600 border-2 border-yellow-600 rounded-lg hover:text-white group hover:bg-gray-50 shadow-md">
                        <span class="absolute left-0 block w-full h-0 transition-all bg-yellow-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                        <span
                            class="relative text-base font-semibold transition-all duration-300 group-hover:-translate-x-3">
                            Reservar Instalaciones
                        </span>
                    </button>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
