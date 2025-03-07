<?php

namespace Database\Seeders;

use App\Models\parentescos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class parentescosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        parentescos::factory()->create([
            'nombre' => 'Padre',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Madre',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Abuelo/a',
        ]);        
        parentescos::factory()->create([
            'nombre' => 'Tío/a',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Titular',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Hijo/a',
        ]);        
        parentescos::factory()->create([
            'nombre' => 'Hermano/a',
        ]);
        
    }
}
