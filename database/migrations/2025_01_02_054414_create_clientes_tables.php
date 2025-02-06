<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("cedula")->unique();
            $table->string("rif")->nullable(true);
            $table->string("primer_nombre");
            $table->string("segundo_nombre")->nullable(true);
            $table->string("primer_apellido");
            $table->string("segundo_apellido")->nullable(true);
            $table->string("nacionalidad");            
            $table->date("fecha_nacimiento");
            $table->string("direccion");
            $table->string("telefono");
            $table->string("correo");                                  
            $table->string("empresa");
            $table->enum('status',['activo','inactivo'])->default('activo'); 
            $table->timestamps();            
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
        
    }
};
