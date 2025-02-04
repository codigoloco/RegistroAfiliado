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
        Schema::create('ejecutivos', function (Blueprint $table) {
            $table->id(); // Columna autoincremental para el ID
            $table->string('nombre'); // Nombre del ejecutivo
            $table->string('apellido'); // Apellido del ejecutivo
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');            
            $table->timestamps(); // Columnas created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecutivos');
    }
};
