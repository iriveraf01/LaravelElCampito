<?php

use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntornoController;
use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RestauranteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/apartamentos/{apartamento}', [ApartamentoController::class, 'show'])->name('apartamentos.show');

    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::delete('/reservas/{id}/cancelar', [ReservaController::class, 'cancelar'])->name('reservas.cancelar');
    Route::delete('/reservas/{id}/borrar', [ReservaController::class, 'borrar'])->name('reservas.borrar');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/apartamentos', [ApartamentoController::class, 'index'])->name('apartamentos');

Route::get('/restaurante', [RestauranteController::class, 'index'])->name('restaurante');

Route::get('/instalaciones', [InstalacionesController::class, 'index'])->name('instalaciones');

Route::get('/entorno', [EntornoController::class, 'index'])->name('entorno');


require __DIR__.'/auth.php';
