<?php

namespace App\Providers;

use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $tieneReservasActivas = false;

            if (Auth::check()) {
                $tieneReservasActivas = Reserva::where('usuario_id', Auth::id())
                    ->where('fecha_fin', '>', now())
                    ->exists();
            }

            $view->with('tieneReservasActivas', $tieneReservasActivas);
        });
    }
}
