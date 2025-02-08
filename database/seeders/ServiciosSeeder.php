<?php

namespace Database\Seeders;

use App\Models\Servicios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Servicios::factory()->create([
            'nombre' => 'Servicios de Salud',
            'cantidad_maxima_beneficiarios' => 6,
            'status' => 'activo',

        ]);
    }
}
