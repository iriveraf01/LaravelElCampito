<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-amber-50 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Galería principal con imagen destacada y miniaturas -->
            <div class="mb-12" x-data="{ activeImage: 0, images: {{ json_encode($apartamento->imagenes) }} }">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Imagen principal -->
                    <div class="md:col-span-2 relative rounded-xl overflow-hidden shadow-xl h-[400px]">
                        <template x-for="(img, index) in images" :key="index">
                            <img
                                :src="'{{ asset('') }}' + img"
                                :alt="'{{ $apartamento->descripcion }} - Imagen ' + (index + 1)"
                                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                                :class="{ 'opacity-100': activeImage === index, 'opacity-0': activeImage !== index }"
                            >
                        </template>

                        <!-- Botones de navegación -->
                        <button
                            @click="activeImage = (activeImage - 1 + images.length) % images.length"
                            class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full backdrop-blur-sm transition-all duration-300"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button
                            @click="activeImage = (activeImage + 1) % images.length"
                            class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full backdrop-blur-sm transition-all duration-300"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Contador de imágenes -->
                        <div class="absolute bottom-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                            <span x-text="activeImage + 1"></span> / <span x-text="images.length"></span>
                        </div>
                    </div>

                    <!-- Miniaturas y detalles -->
                    <div class="space-y-4">
                        <!-- Miniaturas -->
                        <div class="grid grid-cols-3 gap-2 h-48">
                            <template x-for="(img, index) in images.slice(0, 3)" :key="index">
                                <div
                                    @click="activeImage = index"
                                    class="relative rounded-lg overflow-hidden cursor-pointer shadow-md transition-all duration-300 hover:shadow-lg"
                                    :class="{ 'ring-2 ring-yellow-600': activeImage === index }"
                                >
                                    <img
                                        :src="'{{ asset('') }}' + img"
                                        :alt="'{{ $apartamento->descripcion }} - Miniatura ' + (index + 1)"
                                        class="w-full h-full object-cover"
                                    >
                                </div>
                            </template>
                        </div>

                        <!-- Detalles rápidos -->
                        <div class="bg-white rounded-xl p-4 shadow-md">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">Detalles rápidos</h3>
                            <ul class="space-y-2">
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>{{ $apartamento->capacidad }} persona{{ $apartamento->capacidad > 1 ? 's' : '' }}</span>
                                </li>
                                <li class="flex items-center pt-2 mt-2 border-t border-yellow-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                        <a href="{{ route('apartamentos') }}#precios" class="text-yellow-700 hover:text-yellow-800 font-medium">Ver precios por temporada</a>

                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <a href="{{ route('apartamentos') }}#informacion-reserva" class="text-yellow-700 hover:text-yellow-800 font-medium">Información antes de reservar</a>
                                </li>
                                <li class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Check-in: 12:00 - Check-out: 12:00</span>
                                </li>
                            </ul>

                            <!-- Precio destacado -->
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-baseline">
                                    <span class="text-3xl font-bold text-yellow-700">€{{ number_format($apartamento->precio, 2) }}</span>
                                    <span class="text-gray-600 ml-2">/ noche</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contenido principal en dos columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Columna izquierda: Descripción y características -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Descripción -->
                    <div class="bg-white rounded-xl p-6 shadow-md">
                        <h2 class="text-2xl font-bold text-yellow-800 mb-4">Sobre este alojamiento</h2>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Disfrute de una estancia inolvidable en nuestro acogedor apartamento rural, ubicado en el entorno natural de Zafra.
                            Este alojamiento ofrece el equilibrio perfecto entre la tranquilidad del campo y la comodidad de las instalaciones modernas.
                        </p>

                        <!-- Características -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Características</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Cocina equipada</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Baño completo</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>WiFi gratuito</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Aire acondicionado</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>TV</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Terraza privada</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Aparcamiento gratuito</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Ropa de cama y toallas</span>
                            </div>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="bg-white rounded-xl p-6 shadow-md">
                        <h2 class="text-2xl font-bold text-yellow-800 mb-4">Ubicación</h2>
                        <div class="rounded-lg overflow-hidden h-64 mb-4">
                            <iframe
                                class="w-full h-full border-0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1485.3326934808222!2d-6.432373689445487!3d38.434475130335635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11558fb048796b%3A0x71c6c2b1992132b8!2sRestaurante%20El%20Campito%20Zafra!5e1!3m2!1ses!2ses!4v1747157118426!5m2!1ses!2ses"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <p class="text-gray-700">
                            Ubicado a solo 5 minutos en coche del centro histórico de Zafra, nuestro apartamento ofrece fácil acceso a todas las atracciones locales mientras disfruta de la tranquilidad del entorno rural.
                        </p>
                    </div>
                </div>

                <!-- Columna derecha: Formulario de reserva -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-8">
                        <!-- Cabecera del formulario -->
                        <div class="bg-yellow-700 text-white p-4">
                            <h3 class="text-xl font-bold">Reserva tu estancia</h3>
                            <p class="text-yellow-100 text-sm">Selecciona fechas y completa tu reserva</p>
                        </div>

                        <!-- Alertas -->
                        @if($errors->any())
                            <div class="bg-red-100 text-red-700 p-4 border-l-4 border-red-500">
                                <ul class="list-disc pl-4">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="bg-green-100 text-green-700 p-4 border-l-4 border-green-500">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Formulario -->
                        <form action="{{ route('reservas.store') }}" method="POST" class="p-6 space-y-6">
                            @csrf
                            <input type="hidden" name="apartamento_id" value="{{ $apartamento->id }}">

                            <div>
                                <label for="flatpickr-range" class="block text-sm font-medium text-gray-700 mb-2">
                                    Fechas de estancia
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="flatpickr-range"
                                        placeholder="Selecciona fechas de entrada y salida"
                                        required
                                        class="w-full border border-gray-300 rounded-lg pl-10 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                                    >
                                </div>
                                <div id="costo-estancia" class="mt-3 text-lg font-semibold text-yellow-700 hidden">
                                    Costo estimado: €<span id="costo-total">0.00</span>
                                </div>
                            </div>

                            <!-- Inputs ocultos para enviar al backend -->
                            <input type="hidden" name="fecha_inicio" id="fecha_inicio" required>
                            <input type="hidden" name="fecha_fin" id="fecha_fin" required>

                            <div>
                                <label for="personas" class="block text-sm font-medium text-gray-700 mb-2">
                                    Número de personas
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <input
                                        type="number"
                                        name="personas"
                                        id="personas"
                                        min="1"
                                        max="{{ $apartamento->capacidad }}"
                                        required
                                        class="w-full border border-gray-300 rounded-lg pl-10 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                                    >
                                </div>
                                <p class="text-sm text-gray-500 mt-1">Máximo {{ $apartamento->capacidad }} personas</p>
                            </div>

                            <button
                                type="submit"
                                class="w-full bg-yellow-700 text-white font-bold px-4 py-3 rounded-lg hover:bg-yellow-800 transition-colors duration-300 flex items-center justify-center"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Reservar ahora
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let fechasOcupadas = @json($fechasOcupadas);

        window.addEventListener('load', function () {
            flatpickr('#flatpickr-range', {
                mode: 'range',
                dateFormat: 'Y-m-d',
                minDate: "today",
                locale: {
                    rangeSeparator: ' hasta '
                },
                disable: fechasOcupadas,
                onDayCreate: function (dObj, dStr, fp, dayElem) {
                    const fechaStr = dayElem.dateObj.toISOString().split('T')[0];
                    if (fechasOcupadas.includes(fechaStr)) {
                        dayElem.classList.add('bg-red-300', 'text-white', 'rounded-full');
                    }
                },
                onChange: function (selectedDates, dateStr, instance) {
                    if (selectedDates.length === 2) {
                        const inicio = instance.formatDate(selectedDates[0], "Y-m-d");
                        const fin = instance.formatDate(selectedDates[1], "Y-m-d");

                        document.getElementById('fecha_inicio').value = inicio;
                        document.getElementById('fecha_fin').value = fin;

                        // Calcular diferencia en noches
                        const diffMs = selectedDates[1] - selectedDates[0];
                        const diffDays = diffMs / (1000 * 60 * 60 * 24);

                        // Precio por noche (desde blade)
                        const precioPorNoche = {{ $apartamento->precio }};

                        const total = diffDays * precioPorNoche;

                        // Mostrar el costo
                        const costoDiv = document.getElementById('costo-estancia');
                        const costoSpan = document.getElementById('costo-total');
                        costoSpan.textContent = total.toFixed(2);
                        costoDiv.classList.remove('hidden');

                    } else {
                        document.getElementById('fecha_inicio').value = '';
                        document.getElementById('fecha_fin').value = '';

                        // Ocultar costo si no hay rango válido
                        document.getElementById('costo-estancia').classList.add('hidden');
                    }
                }
            });
        });
    </script>
</x-app-layout>
