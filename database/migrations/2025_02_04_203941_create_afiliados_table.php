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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id(); // Columna autoincremental para el ID del afiliado
            $table->bigInteger('cliente_id')->unsigned(); // Clave foránea a la tabla clientes
            $table->bigInteger('servicio_id')->unsigned(); // Clave foránea a la tabla servicios
            $table->string('nro_afiliado')->unique(); // Número de afiliado (único)
            $table->date('fecha_renovacion'); // Fecha de renovación            
            $table->bigInteger('ejecutivo_id')->unsigned(); // Clave foránea a la tabla rolesejecutivos
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->timestamps(); // Columnas created_at y updated_at

            $table->foreign("cliente_id")->references("id")->on("clientes");
            $table->foreign("servicio_id")->references("id")->on("servicios");
            $table->foreign("ejecutivo_id")->references("id")->on("ejecutivos");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');
    }
};
