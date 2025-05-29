<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_plato', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_racion', 10, 2)->nullable();
            $table->decimal('precio_media_racion', 10, 2)->nullable();
            $table->string('categoria', 50)->nullable();
            $table->string('imagen')->nullable();
            $table->json('alergenos')->nullable();
            $table->string('estilo_preparacion', 50)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carta');
    }
};
