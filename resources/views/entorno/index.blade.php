<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12 bg-amber-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">

            <!-- Sección de Entorno -->
            <div class="mb-10">
                <h2 class="text-2xl font-bold text-center text-yellow-800 mb-8 relative after:content-[''] after:absolute after:w-24 after:h-1 after:bg-yellow-600 after:bottom-[-10px] after:left-1/2 after:transform after:-translate-x-1/2">Nuestro Entorno</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($entorno as $item)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-4 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" x-data="{ current: 0 }">

                            {{-- Galería --}}
                            <div class="relative">
                                <div class="aspect-w-16 aspect-h-9">
                                    <template x-for="(img, index) in {{ json_encode($item->imagenes) }}" :key="index">
                                        <img
                                            :src="'{{ asset('') }}' + img"
                                            x-show="current === index"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-95"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            class="object-cover w-full h-64 rounded-lg transition-all"
                                            :alt="'Imagen de {{ $item->nombre }} ' + (index + 1)">
                                    </template>
                                </div>

                                {{-- Botones --}}
                                <button
                                    @click="current = (current - 1 + {{ count($item->imagenes) }}) % {{ count($item->imagenes) }}"
                                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-white bg-opacity-80 p-2 rounded-full shadow hover:bg-opacity-100 hover:text-yellow-700 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button
                                    @click="current = (current + 1) % {{ count($item->imagenes) }}"
                                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-white bg-opacity-80 p-2 rounded-full shadow hover:bg-opacity-100 hover:text-yellow-700 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                {{-- Indicadores --}}
                                <div class="absolute bottom-2 left-0 right-0 flex justify-center space-x-2">
                                    <template x-for="(img, index) in {{ json_encode($item->imagenes) }}" :key="index">
                                        <button
                                            @click="current = index"
                                            :class="{'bg-yellow-600': current === index, 'bg-gray-300': current !== index}"
                                            class="w-2 h-2 rounded-full transition-all duration-300">
                                        </button>
                                    </template>
                                </div>
                            </div>

                            {{-- Texto --}}
                            <div class="mt-6 px-2">
                                <h3 class="text-xl font-bold text-center text-yellow-800 p-3 font-serif">{{ $item->nombre }}</h3>
                                <p class="text-gray-600 text-base mt-2 leading-relaxed">{{ $item->descripcion }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Mapa --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-6 border border-amber-100">
                <h2 class="text-2xl font-bold text-center text-yellow-800 mb-6 relative after:content-[''] after:absolute after:w-24 after:h-1 after:bg-yellow-600 after:bottom-[-10px] after:left-1/2 after:transform after:-translate-x-1/2">¿Dónde estamos?</h2>
                <div class="aspect-auto rounded-lg overflow-hidden mt-8 shadow-md">
                    <iframe
                        class="w-full h-[450px] border-0 rounded-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1485.3326934808222!2d-6.432373689445487!3d38.434475130335635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11558fb048796b%3A0x71c6c2b1992132b8!2sRestaurante%20El%20Campito%20Zafra!5e1!3m2!1ses!2ses!4v1747157118426!5m2!1ses!2ses"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-700 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-800">Dirección</h3>
                            <p class="text-gray-600 mt-1">Carretera de Badajoz, km 3, 06300 Zafra, Badajoz</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-700 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-800">Contacto</h3>
                            <p class="text-gray-600 mt-1">+34 924 123 456 | info@elcampitozafra.com</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botón de Reserva --}}
            <div class="flex justify-center mt-8">
                <a href="{{ route('apartamentos') }}">
                    <button
                        class="relative group inline-flex items-center px-8 py-2.5 overflow-hidden text-lg font-medium text-yellow-600 border-2 border-yellow-600 rounded-lg hover:text-white group hover:bg-gray-50 shadow-md group">
                        <span class="absolute left-0 block w-full h-0 transition-all bg-yellow-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                        <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                        <span
                            class="relative text-base font-semibold transition-all duration-300 group-hover:-translate-x-3">Reserva ahora
                    </span>
                    </button>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
