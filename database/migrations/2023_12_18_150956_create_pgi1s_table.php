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
        Schema::create('pgi1s', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',300);
            $table->string('grupo',300);
            $table->string('rol',100);
            $table->integer('participantes');
            $table->date('fecha');
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
        Schema::dropIfExists('pgi1s');
    }
};
