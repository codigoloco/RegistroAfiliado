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
        //
        Schema::create('detalles_afiliado', function (Blueprint $table) {
            $table->id(); // Columna autoincremental para el ID del afiliado
            $table->bigInteger('afiliado_id')->unsigned(); // Clave foránea a la tabla afiliados
            $table->bigInteger('beneficiario_id')->unsigned(); // Clave foránea a la tabla bancos
            $table->bigInteger('servicio_id')->unsigned();;
                        
            $table->foreign("afiliado_id")->references("id")->on("afiliados");
            $table->foreign("beneficiario_id")->references("id")->on("beneficiarios");
            $table->foreign("servicio_id")->references("id")->on("servicios");
            
            $table->timestamps(); // Columnas created_at y updated_at

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('afiliados');
    }
};
