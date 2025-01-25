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
        Schema::create('parentescos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
        });
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("clientes_id")->unsigned();
            $table->foreign("clientes_id")->references("id")->on("clientes");
            $table->bigInteger("servicio_id")->unsigned();
            $table->foreign("servicio_id")->references("id")->on("servicios");
            $table->string("nro_afiliado");
            $table->timestamps();
            $table->date("fecha_renovacion");
            $table->bigInteger("users_id")->unsigned();
            $table->foreign("users_id")->references("id")->on("users");
            $table->bigInteger("rolEjecutivo_id")->unsigned();
            $table->foreign("rolEjecutivo_id")->references("id")->on("rolesejecutivos");
            $table->string("status")->default("Activo");
        });
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();  
            $table->boolean("activo")->default(true);
            $table->string("nombre");
            $table->string("apellido");
            $table->string("nacionalidad");
            $table->string("cedula");
            $table->string("rif");
            $table->date("fechaNacimiento");
            $table->string("direccion");
            $table->integer("telefono");
            $table->string("celular");
            $table->bigInteger("parentescos_id")->unsigned();
            $table->foreign("parentescos_id")->references("id")->on("parentescos");
            $table->bigInteger("users_id")->unsigned();
            $table->foreign("users_id")->references("id")->on("users");
            $table->timestamps();
            $table->string("empresa");
            $table->boolean("convenio")->default(false);
            $table->bigInteger("clientes_id")->unsigned();
            $table->foreign("clientes_id")->references("id")->on("clientes");
            $table->bigInteger("afiliados_id")->unsigned();
            $table->foreign("afiliados_id")->references("id")->on("afiliados");
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
        Schema::dropIfExists('afiliados');
        Schema::dropIfExists('parentescos');
    }
};
