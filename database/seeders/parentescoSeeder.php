<?php

namespace Database\Seeders;

use App\Models\parentescos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class parentescoSeeder extends Seeder
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
            'nombre' => 'Abuelo',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Abuela',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Tío',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Titular',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Hijo',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Hija',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Hermano',
        ]);
        parentescos::factory()->create([
            'nombre' => 'Hermana',
        ]);
    }
}
