<?php

namespace Database\Seeders;

use App\Models\Bancos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bancos = [
            ['Banco' => 'Banco de Venezuela', 'codigo' => '0102'],
            ['Banco' => 'Banco Mercantil', 'codigo' => '0105'],
            ['Banco' => 'Banco Provincial', 'codigo' => '0108'],
            ['Banco' => 'Banco Banesco', 'codigo' => '0134'],
            ['Banco' => 'Banco Occidental de Descuento (BOD)', 'codigo' => '0116'],
            ['Banco' => 'Banco del Tesoro', 'codigo' => '0163'],
            ['Banco' => 'Banco Nacional de Crédito (BNC)', 'codigo' => '0191'],
            ['Banco' => 'Banco Exterior', 'codigo' => '0115'],
            ['Banco' => 'Banco Caroní', 'codigo' => '0128'],
            ['Banco' => 'Banco Plaza', 'codigo' => '0138'],
            ['Banco' => 'Banco Fondo Común', 'codigo' => '0151'],
            ['Banco' => 'Banco del Caribe', 'codigo' => '0114'],
            ['Banco' => 'Banco Activo', 'codigo' => '0171'],
            ['Banco' => 'Banco Sofitasa', 'codigo' => '0137'],
            ['Banco' => 'Banco Venezolano de Crédito (BVC)', 'codigo' => '0104'],
            ['Banco' => 'Banco Agrícola de Venezuela', 'codigo' => '0166'],
            ['Banco' => 'Bancrecer', 'codigo' => '0156'],
            ['Banco' => 'Banco de la Fuerza Armada Nacional Bolivariana (BANFANB)', 'codigo' => '0172'],
            ['Banco' => 'Banco Bicentenario del Pueblo', 'codigo' => '0175'],
            ['Banco' => 'Banco de Desarrollo del Microempresario (Banco del Pueblo Soberano)', 'codigo' => '0168'],
        ];

        foreach ($bancos as $banco) {
            Bancos::create($banco);
        }
    }
}
