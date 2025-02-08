<?php

namespace Database\Seeders;

use App\Models\Parentescos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentescosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Parentescos::factory()->create([
            'nombre' => 'HIJO',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'PADRE',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'MADRE',
        ]); 
        Parentescos::factory()->create([
            'nombre' => 'ABUELO',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'ABUELA',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'HERMANO',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'HERMANA',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'TIO',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'TIA',
        ]);
        Parentescos::factory()->create([
            'nombre' => 'TTULAR',
        ]);

        


        
        
    }
}
