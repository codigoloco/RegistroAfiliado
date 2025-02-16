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
        
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id(); // Columna autoincremental para el ID
            
            $table->string('primer_nombre'); // Nombre
            $table->string('segundo_nombre'); // Nombre
            $table->string('primer_apellido'); // Apellido
            $table->string('segundo_apellido'); // Apellido
            $table->string('nacionalidad'); // Nacionalidad
            $table->string('cedula')->unique(); // Cédula (única)            
            $table->date('fechaNacimiento'); // Fecha de nacimiento            
            $table->string('telefono'); // Teléfono (mejor como string para incluir códigos de área)
            $table->string('celular'); // Celular (mejor como string para incluir códigos de área)
            $table->bigInteger('parentesco_id')->references('id')->on('parentescos');;               
            $table->bigInteger('servicio_id')->references('id')->on('servicios'); ;                 
            
            $table->string('empresa'); // Empresa
            
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->enum('convenio',['ACTIVO','INACTIVO'])->default('INACTIVO');

            $table->timestamps(); // Columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');    
    }
};
