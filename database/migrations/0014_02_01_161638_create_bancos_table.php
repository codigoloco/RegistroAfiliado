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
    {/// AGREGAR BANCO CLIENTEs... CORREGIR 
        Schema::create('bancos', function (Blueprint $table) {
            $table->id();

            $table->string('Bancos')->nullable();
            $table->integer('Codigo')->nullable();            
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');            
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancos');
    }
};
