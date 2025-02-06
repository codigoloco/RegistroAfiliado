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
        Schema::create('auditoria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');  
                      
            $table->string("detalle");
            $table->string("acciones");
            
            $table->bigInteger('ejecutivo_id')->unsigned();
            $table->foreign("ejecutivo_id")->references("id")->on("ejecutivos");

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria');
    }
};
