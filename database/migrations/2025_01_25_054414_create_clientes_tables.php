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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellido");
            $table->string("nacionalidad");
            $table->string("cedula");
            $table->string("rif");
            $table->date("fechaNacimiento");
            $table->string("direccion");
            $table->string("telefono");
            $table->string("correo");
            $table->bigInteger("users_id")->unsigned();
            $table->foreign("users_id")->references("id")->on("users");
            $table->timestamps();
            $table->string("empresa");
            $table->boolean("status");
        });
        Schema::create('clientes_detalles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("clientes_id")->unsigned();
            $table->foreign("clientes_id")->references("id")->on("clientes");
            $table->integer("cuenta");
            $table->string("banco");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('clientes_detalles');
    }
};
