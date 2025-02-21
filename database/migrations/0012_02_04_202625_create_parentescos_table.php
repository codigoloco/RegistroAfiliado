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
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');            // Clave foránea a la tabla users
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parentescos');
    }
};
