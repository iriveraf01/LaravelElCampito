<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('apartamento_id')->constrained('apartamentos')->onDelete('cascade');

            // Campos propios
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado', 255)->default('pendiente');
            $table->decimal('total', 10, 2)->default(0);
            $table->boolean('disponibilidad')->default(true);
            $table->integer('personas')->after('fecha_fin');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
