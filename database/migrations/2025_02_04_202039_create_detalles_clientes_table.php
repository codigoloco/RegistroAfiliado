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
        Schema::create('clientes_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("cliente_id")->unsigned();
            $table->foreign("cliente_id")->references("id")->on("clientes");
            $table->string("cuenta");
            $table->bigInteger("banco_id")->unsigned();
            $table->foreign("banco_id")->references("id")->on("bancos");
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_clientes');
    }
};
