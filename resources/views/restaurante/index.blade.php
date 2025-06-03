<x-app-layout>
    <x-slot name="header"></x-slot>

    {{-- Hero Section con imagen estática --}}
    <div class="relative">
        <div class="h-[500px] w-full overflow-hidden">
            <img
                id="imagenPrincipal"
                src="{{ asset($restauranteCampito->imagenes[0] ?? '') }}"
                alt="{{ $restauranteCampito->nombre }}"
                class="w-full h-full object-cover transition-opacity duration-300"
            >
            {{--Gradiente oscuro para que se vea mejor el nombre, descripción...--}}
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
        </div>

        <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center px-4">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-lg">{{ $restauranteCampito->nombre }}</h1>
            <p class="text-xl mb-3 max-w-2xl">{{ $restauranteCampito->descripcion }}</p>
            <div class="flex items-center space-x-2 bg-yellow-700/80 px-4 py-2 rounded-full backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-lg font-medium">{{ $restauranteCampito->horario }}</p>
            </div>
        </div>
    </div>

    {{-- Galería de imágenes en miniatura --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10">
        <div class="flex overflow-x-auto space-x-4 pb-4 scrollbar-hide">
            @foreach($restauranteCampito->imagenes as $index => $imagen)
                <img
                    src="{{ asset($imagen) }}"
                    alt="{{ $restauranteCampito->nombre }} - Vista {{ $index }}"
                    class="h-24 w-36 object-cover rounded-lg shadow-md flex-shrink-0 hover:scale-105 transition-transform cursor-pointer"
                    onclick="cambiarImagenEstatica('{{ asset($imagen) }}')"
                >
            @endforeach
        </div>
    </div>

    {{-- Título de la carta --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 mb-12 text-center">
        <a
            href="#seccion-alergenos"
            class="mb-6 inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-lg transition-colors duration-300 shadow-sm"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Ver información de alérgenos
        </a>
        <div>
            <h2 class="text-3xl font-bold text-yellow-800 inline-block relative">
                Nuestra Carta
                <span class="block h-1 bg-yellow-600 w-24 mx-auto mt-2"></span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Descubre nuestra selección de platos tradicionales elaborados con productos locales de la mejor calidad</p>
        </div>
    </div>

    {{-- Contenedor principal de la carta --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        {{-- Recorrido por categorías y estilos --}}
        @foreach($cartasAgrupadas as $categoria => $estilos)
            <div class="mb-16">
                <div class="bg-yellow-50 rounded-xl p-6 shadow-md mb-8">
                    <h3 class="text-2xl font-bold text-yellow-800 text-center">{{ ucfirst($categoria) }}</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($estilos as $estilo => $platos)
                        @if($estilo)
                            <div class="md:col-span-2 mt-4 mb-6">
                                <h4 class="text-xl font-medium text-gray-700 text-center italic bg-amber-50 py-3 rounded-lg">{{ ucfirst($estilo) }}</h4>
                            </div>
                        @endif

                        @foreach($platos as $plato)
                            <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100">
                                <div class="flex flex-col sm:flex-row h-full">
                                    {{-- Imagen --}}
                                    @if($plato->imagen)
                                        <div class="sm:w-1/3 bg-amber-50">
                                            <div class="h-full w-full overflow-hidden">
                                                <img
                                                    src="{{ asset($plato->imagen) }}"
                                                    alt="{{ $plato->nombre_plato }}"
                                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                                                >
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Info --}}
                                    <div class="p-6 sm:w-2/3">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $plato->nombre_plato }}</h3>

                                        @if($plato->descripcion)
                                            <p class="text-gray-700 text-sm mb-4">{{ $plato->descripcion }}</p>
                                        @endif

                                        {{-- Precios --}}
                                        <div class="flex flex-wrap gap-2 mb-3">
                                            @if($plato->precio_racion!=0)
                                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                                    Ración: €{{ number_format($plato->precio_racion, 2) }}
                                                </span>
                                            @endif

                                            @if($plato->precio_media_racion!=0)
                                                <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm font-medium">
                                                    1/2 Ración: €{{ number_format($plato->precio_media_racion, 2) }}
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Alergenos solo si existen --}}
                                        @php
                                            $alergenos = json_decode($plato->alergenos, true);
                                        @endphp

                                        @if(!empty($alergenos) && is_array($alergenos))
                                            <div class="flex flex-wrap gap-2 mt-3">
                                                @foreach($alergenos as $alergeno)
                                                    @php
                                                        $rutaLogo = 'images/alergenos/' . $alergeno . '.png';
                                                    @endphp
                                                    @if(file_exists(public_path($rutaLogo)))
                                                        <div class="tooltip" data-tooltip="{{ ucfirst($alergeno) }}">
                                                            <img
                                                                src="{{ asset($rutaLogo) }}"
                                                                alt="{{ $alergeno }}"
                                                                title="{{ ucfirst($alergeno) }}"
                                                                class="w-8 h-8 object-contain hover:scale-110 transition-transform"
                                                            >
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Sección de alérgenos --}}
    <div id="seccion-alergenos" class="bg-white py-16 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-yellow-800 inline-block relative">
                    Información de Alérgenos
                    <span class="block h-1 bg-yellow-600 w-32 mx-auto mt-2"></span>
                </h2>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/gluten.png') }}" alt="Gluten" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Gluten</h3>
                    <p class="text-xs text-gray-600 mt-1">Trigo, centeno, cebada, avena</p>
                </div>

                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/crustaceos.png') }}" alt="Crustáceos" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Crustáceos</h3>
                    <p class="text-xs text-gray-600 mt-1">Gambas, langostinos, cangrejos</p>
                </div>

                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/huevo.png') }}" alt="Huevos" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Huevos</h3>
                    <p class="text-xs text-gray-600 mt-1">Huevos y derivados</p>
                </div>

                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/pescado.png') }}" alt="Pescado" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Pescado</h3>
                    <p class="text-xs text-gray-600 mt-1">Pescados y derivados</p>
                </div>

                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/cacahuete.png') }}" alt="Cacahuetes" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Cacahuetes</h3>
                    <p class="text-xs text-gray-600 mt-1">Cacahuetes y derivados</p>
                </div>

                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/lacteos.png') }}" alt="Lácteos" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Lácteos</h3>
                    <p class="text-xs text-gray-600 mt-1">Leche y derivados</p>
                </div>

                <div class="bg-yellow-50 rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                    <img src="{{ asset('images/alergenos/sulfitos.png') }}" alt="Sulfitos" class="max-w-[8rem] max-h-[8rem] mx-auto mb-3 object-contain">
                    <h3 class="font-medium text-gray-900">Sulfitos</h3>
                    <p class="text-xs text-gray-600 mt-1">Conservantes</p>
                </div>
            </div>

            <div class="mt-10 text-center">
                <p class="text-sm text-gray-600">
                    Si tiene alguna alergia o intolerancia alimentaria, por favor informe a nuestro personal antes de realizar su pedido.
                </p>
                <a
                    href="#"
                    class="mt-6 inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-colors duration-300"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    Volver arriba
                </a>
            </div>
        </div>
    </div>

    {{-- Sección de información adicional --}}
    <div class="bg-yellow-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-md text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Horario</h3>
                    <p class="text-gray-600">Lunes a Domingo<br>13:00 - 16:00<br>20:00 - 23:30</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Reservas</h3>
                    <p class="text-gray-600">+34 924 123 456<br>reservas@elcampitozafra.com</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-md text-center">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ubicación</h3>
                    <p class="text-gray-600">Carretera de Badajoz, km 3<br>06300 Zafra, Badajoz</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        html {
            scroll-behavior: smooth;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .tooltip {
            position: relative;
        }
        .tooltip:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 10;
        }
    </style>

    <script>
        function cambiarImagenEstatica(imagen) {
            // Cambiar la imagen principal
            const imagenPrincipal = document.getElementById('imagenPrincipal');

            // Aplicar efecto de transición
            imagenPrincipal.classList.add('opacity-50');

            // Pequeña transición
            setTimeout(() => {
                imagenPrincipal.src = imagen;
                imagenPrincipal.classList.remove('opacity-50');
            }, 150);
        }
    </script>
</x-app-layout>
