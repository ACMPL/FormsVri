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
        Schema::create('frhtesis', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_tesis',300);
            $table->string('facultad',200);
            $table->string('escuela_profesional',200);
            $table->string('nivel_tesis',100);
            $table->date('fecha_evaluacion');
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
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frhtesis');
    }
};
