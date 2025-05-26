<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {

            // Añadir enlace para volver al sitio
            Filament::registerNavigationItems([
                NavigationItem::make('Volver a la página de inicio')
                    ->url('/') // o cualquier URL
                    ->icon('heroicon-o-home')
                    ->sort(0),
            ]);
        });
    }
}
