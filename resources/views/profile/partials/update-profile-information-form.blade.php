<section class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
    <!-- Cabecera de la tarjeta -->
    <div class="bg-gradient-to-r from-yellow-700 to-amber-600 px-6 py-4">
        <h2 class="text-xl font-bold text-white">
            {{ __('Información de tu perfil') }}
        </h2>
        <p class="mt-1 text-sm text-yellow-100">
            {{ __("Actualiza la información de tu cuenta y gestiona tus datos personales") }}
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="p-6">
        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <!-- Campo de nombre -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Nombre')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-text-input
                        id="name"
                        name="name"
                        type="text"
                        class="pl-10 py-3 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50"
                        :value="old('name', $user->name)"
                        autofocus
                        autocomplete="name"
                        placeholder="Tu nombre completo"
                    />
                </div>
                <x-input-error class="mt-2 text-sm" :messages="$errors->get('name')" />
            </div>

            <!-- Campo de email -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="pl-10 py-3 mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50"
                        :value="old('email', $user->email)"
                        autocomplete="username"
                        placeholder="tu.email@ejemplo.com"
                    />
                </div>
                <x-input-error class="mt-2 text-sm" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                        <p class="text-sm text-yellow-800 flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>
                                {{ __('Tu dirección de email no está verificada.') }}
                                <button form="send-verification" class="underline font-medium text-yellow-700 hover:text-yellow-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    {{ __('Haz clic aquí para reenviar el email de verificación.') }}
                                </button>
                            </span>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de email.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Botones de acción -->
            <div class="pt-4 border-t border-gray-200 flex items-center gap-4">
                <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-yellow-700 hover:bg-yellow-800 text-white font-medium rounded-lg transition-colors duration-300 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Guardar') }}
                </button>

                @if (session('status') === 'profile-updated')
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
