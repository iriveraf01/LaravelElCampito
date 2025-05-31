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
        Schema::create('apartamentos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('capacidad');
            $table->json('imagenes')->nullable();
            $table->timestamps();
        });

        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('categoria', 100);
            $table->timestamps();
        });

        Schema::create('apartamento_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartamento_id')->constrained('apartamentos')->onDelete('cascade');
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('apartamento_id')->constrained('apartamentos')->onDelete('cascade');

            // Campos propios
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('personas');
            $table->string('estado', 255)->default('pendiente');
            $table->decimal('total', 10, 2)->default(0);
            $table->boolean('disponibilidad')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartamento_servicio');
        Schema::dropIfExists('reservas');
        Schema::dropIfExists('apartamentos');
        Schema::dropIfExists('servicios');
    }
};
