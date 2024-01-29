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
        Schema::create('gesis', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_doc',50);
            $table->string('titulo',300);
            $table->string('universidad',200);
            $table->date('fecha_publicacion');
            $table->string('descripcion',300);
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
        Schema::dropIfExists('gesis');
    }
};
