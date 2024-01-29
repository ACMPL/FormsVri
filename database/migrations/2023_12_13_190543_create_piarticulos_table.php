<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar las migraciones.
     */
    public function up(): void
    {
        Schema::create('piarticulos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_articulo',300);
            $table->string('clasificacion',50);
            $table->integer('cantidad_autores');
            $table->date('fecha_publicacion');
            $table->string('enlace_DOI',255);
            $table->string('enlace_Journal',255);
            $table->string('archivo_pdf')->nullable();
            $table->boolean('completado')->default(false); // Columna para indicar si está completado o no
            $table->foreignId('id_docentes')
                  ->nullable()
                  ->constrained('docentes')
                  ->cascadeOnUpdate('cascade')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }
    /**
     * Revertir las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('piarticulos');
    }
};
