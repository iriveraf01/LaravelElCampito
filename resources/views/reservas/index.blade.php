<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="bg-amber-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($reservas->isEmpty())
                <div class="bg-white rounded-xl shadow-md p-10 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">No tienes reservas activas</h3>
                        <p class="text-gray-600 mb-6">¿Te gustaría disfrutar de una estancia en nuestros apartamentos rurales?</p>
                        <a href="{{ route('apartamentos') }}" class="inline-flex items-center px-5 py-3 bg-yellow-700 hover:bg-yellow-800 text-white font-medium rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Reservar ahora
                        </a>
                    </div>
                </div>
            @else
                <!-- Filtros de reservas -->
                <div class="mb-8 flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-yellow-800">Tus Reservas</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-white text-yellow-700 border border-yellow-300 rounded-lg shadow-sm hover:bg-yellow-50 transition-colors duration-300 font-medium text-sm">
                            Todas
                        </button>
                        <button class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-colors duration-300 font-medium text-sm">
                            Próximas
                        </button>
                        <button class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 transition-colors duration-300 font-medium text-sm">
                            Finalizadas
                        </button>
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach ($reservas as $reserva)
                        @php
                            // Aseguramos que las fechas existan para evitar errores
                            $fechaEntrada = $reserva->fecha_inicio;
                            $fechaSalida = $reserva->fecha_fin;
                            $esProxima = $fechaSalida && now()->lt($fechaSalida);

                            // Calcular duración de la estancia
                            $duracion = null;
                            if ($fechaEntrada && $fechaSalida) {
                                $duracion = $fechaEntrada->diffInDays($fechaSalida);
                            }
                        @endphp

                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                            <!-- Cabecera con estado -->
                            <div class="flex justify-between items-center p-4 border-b border-gray-100 bg-gray-50">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Apartamento {{ $reserva->apartamento_id }}</h3>
                                        <p class="text-sm text-gray-500">Reserva #{{ $reserva->id }}</p>
                                    </div>
                                </div>
                                <div>
                                    @if($esProxima)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                            Próxima
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                            <span class="w-2 h-2 bg-gray-500 rounded-full mr-1.5"></span>
                                            Finalizada
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Contenido principal -->
                            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Columna 1: Fechas -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 mb-2">FECHAS DE ESTANCIA</h4>
                                    <div class="flex items-center mb-3">
                                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Entrada</p>
                                            <p class="font-medium">{{ $fechaEntrada ? $fechaEntrada->format('d/m/Y') : 'No disponible' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Salida</p>
                                            <p class="font-medium">{{ $fechaSalida ? $fechaSalida->format('d/m/Y') : 'No disponible' }}</p>
                                        </div>
                                    </div>
                                    @if($duracion)
                                        <div class="mt-3 text-sm text-gray-600">
                                            <span class="font-medium">{{ $duracion }}</span> {{ $duracion == 1 ? 'noche' : 'noches' }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Columna 2: Estado y detalles -->
                                <div>
                                    <h4 class="text-sm font-medium text-gray-500 mb-2">ESTADO DE LA RESERVA</h4>
                                    @if($reserva->estado)
                                        <div class="mb-3">
                                            @if($reserva->estado === 'Confirmada')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    {{ $reserva->estado }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ $reserva->estado }}
                                                </span>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="text-sm text-gray-600">
                                        <p class="mb-1"><span class="font-medium">Personas:</span> {{ $reserva->personas ?? 'No especificado' }}</p>
                                        <p><span class="font-medium">Reservado el:</span> {{ $reserva->created_at ? $reserva->created_at->format('d/m/Y') : 'No disponible' }}</p>
                                    </div>
                                </div>

                                <!-- Columna 3: Acciones -->
                                <div class="flex flex-col justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 mb-2">ACCIONES</h4>
                                        <div class="space-y-2">
                                            @if($esProxima)
                                                <a href="{{ route('apartamentos.show', $reserva->apartamento_id) }}" class="flex items-center text-yellow-700 hover:text-yellow-800 font-medium text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Ver apartamento
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        @if($esProxima)
                                            <form action="{{ route('reservas.cancelar', $reserva->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-red-300 text-red-700 bg-white hover:bg-red-50 rounded-lg transition-colors duration-300 font-medium text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Cancelar reserva
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('reservas.borrar', $reserva->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg transition-colors duration-300 font-medium text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Borrar historial
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón para nueva reserva -->
                <div class="mt-10 text-center">
                    <a href="{{ route('apartamentos') }}" class="inline-flex items-center px-5 py-3 bg-yellow-700 hover:bg-yellow-800 text-white font-medium rounded-lg transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Hacer nueva reserva
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
