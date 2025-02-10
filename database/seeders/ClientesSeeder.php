<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        Clientes::factory()->count(30)->create();
    }
} 