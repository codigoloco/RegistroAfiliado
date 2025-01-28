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
        Schema::create('rolesEjecutivos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("detalle");
            $table->boolean("Activo")->default(true);
            $table->timestamps();
        });
        Schema::create('ejecutivos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellido");
            $table->bigInteger("rolEjecutivo_id")->unsigned();
            $table->foreign("rolEjecutivo_id")->references("id")->on("rolesejecutivos");
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('rolesEjecutivos');
        Schema::dropIfExists('ejecutivos');
    }
};
