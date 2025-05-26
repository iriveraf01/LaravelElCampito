<section class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
    <!-- Cabecera de la tarjeta -->
    <div class="bg-gradient-to-r from-gray-700 to-gray-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            {{ __('Actualiza la contraseña') }}
        </h2>
        <p class="mt-1 text-sm text-gray-200">
            {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantener su seguridad.') }}
        </p>
    </div>

    <div class="p-6">
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <!-- Contraseña actual -->
            <div class="space-y-2">
                <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input
                        id="update_password_current_password"
                        name="current_password"
                        type="password"
                        class="pl-10 py-3 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                        autocomplete="current-password"
                        placeholder="Introduce tu contraseña actual"
                    />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-sm" />
            </div>

            <!-- Nueva contraseña -->
            <div class="space-y-2">
                <x-input-label for="update_password_password" :value="__('Nueva contraseña')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <x-text-input
                        id="update_password_password"
                        name="password"
                        type="password"
                        class="pl-10 py-3 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                        autocomplete="new-password"
                        placeholder="Mínimo 8 caracteres"
                    />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-sm" />
                <p class="text-xs text-gray-500">Usa al menos 8 caracteres con letras mayúsculas, minúsculas, números y símbolos para mayor seguridad.</p>
            </div>

            <!-- Confirmar nueva contraseña -->
            <div class="space-y-2">
                <x-input-label for="update_password_password_confirmation" :value="__('Repite la nueva contraseña')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <x-text-input
                        id="update_password_password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="pl-10 py-3 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                        autocomplete="new-password"
                        placeholder="Confirma tu nueva contraseña"
                    />
                </div>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-sm" />
            </div>

            <!-- Botones de acción -->
            <div class="pt-4 border-t border-gray-200 flex items-center gap-4">
                <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-gray-700 hover:bg-gray-800 text-white font-medium rounded-lg transition-colors duration-300 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    {{ __('Guardar') }}
                </button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-green-600 flex items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ __('Guardado.') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
