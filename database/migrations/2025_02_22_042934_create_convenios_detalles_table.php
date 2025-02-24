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
        Schema::create('convenios_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convenio_id')->constrained();
            $table->foreignId('servicio_id')->constrained();            
            $table->unique(['convenio_id', 'servicio_id']); // Esto evita duplicados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenios_detalles');
    }
};
