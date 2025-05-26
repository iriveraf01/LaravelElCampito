<section class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
    <!-- Cabecera de la tarjeta -->
    <div class="bg-gradient-to-r from-red-700 to-red-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            {{ __('Elimina tu cuenta') }}
        </h2>
        <p class="mt-1 text-sm text-red-100">
            {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente.') }}
        </p>
    </div>

    <div class="p-6">
        <div class="p-4 bg-red-50 rounded-lg border border-red-200 mb-6">
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <h3 class="text-lg font-medium text-red-800">¡Atención! Esta acción es irreversible</h3>
                    <p class="mt-2 text-sm text-red-700">
                        Una vez que elimines tu cuenta, todos tus datos personales, historial de reservas y preferencias serán eliminados permanentemente. Esta acción no se puede deshacer.
                    </p>
                </div>
            </div>
        </div>

        <!-- Botón personalizado en lugar de x-danger-button para asegurar que los estilos se apliquen correctamente -->
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-300 shadow-sm"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            {{ __('Eliminar cuenta') }}
        </button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('¿Estás seguro de que quieres eliminar la cuenta?') }}
                    </h2>
                </div>

                <p class="mt-1 text-sm text-gray-600 mb-6">
                    {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Por favor introduce su contraseña para confirmar que desea eliminar su cuenta permanentemente.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Contraseña') }}" class="text-gray-700 font-medium" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="pl-10 py-3 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                            placeholder="{{ __('Introduce tu contraseña para confirmar') }}"
                        />
                    </div>
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm" />
                </div>

                <div class="mt-6 flex justify-end">
                    <!-- Botón personalizado en lugar de x-secondary-button -->
                    <button type="button" x-on:click="$dispatch('close')" class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded-lg mr-3">
                        {{ __('Cancelar') }}
                    </button>

                    <!-- Botón personalizado en lugar de x-danger-button -->
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        {{ __('Eliminar cuenta') }}
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</section>
