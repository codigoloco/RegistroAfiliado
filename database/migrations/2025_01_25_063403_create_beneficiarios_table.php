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
            $table->boolean("Activo")->default(true);
            $table->timestamps();
        });
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id(); // Columna autoincremental para el ID del afiliado
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); // Clave foránea a la tabla clientes
            $table->foreignId('servicio_id')->constrained('servicios')->onDelete('cascade'); // Clave foránea a la tabla servicios
            $table->string('nro_afiliado')->unique(); // Número de afiliado (único)
            $table->date('fecha_renovacion'); // Fecha de renovación
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Clave foránea a la tabla users
            $table->foreignId('ejecutivos_id')->constrained('ejecutivos')->onDelete('cascade'); // Clave foránea a la tabla rolesejecutivos
            $table->boolean('status')->default(true); // Estado del afiliado (booleano)
            $table->timestamps(); // Columnas created_at y updated_at
        });
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id(); // Columna autoincremental para el ID
            $table->boolean('activo')->default(true); // Estado activo/inactivo (booleano)
            $table->string('nombre'); // Nombre
            $table->string('apellido'); // Apellido
            $table->string('nacionalidad'); // Nacionalidad
            $table->string('cedula')->unique(); // Cédula (única)
            $table->string('rif')->unique(); // RIF (único)
            $table->date('fechaNacimiento'); // Fecha de nacimiento
            $table->string('direccion'); // Dirección
            $table->string('telefono'); // Teléfono (mejor como string para incluir códigos de área)
            $table->string('celular'); // Celular (mejor como string para incluir códigos de área)
            $table->foreignId('parentescos_id')->constrained('parentescos')->onDelete('cascade'); // Clave foránea a la tabla parentescos
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Clave foránea a la tabla users
            $table->timestamps(); // Columnas created_at y updated_at
            $table->string('empresa'); // Empresa
            $table->boolean('convenio')->default(false); // Convenio (booleano)
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); // Clave foránea a la tabla clientes
            $table->foreignId('afiliados_id')->constrained('afiliados')->onDelete('cascade'); // Clave foránea a la tabla afiliados
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
