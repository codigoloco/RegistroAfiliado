<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ServiciosSeeder;
use Database\Seeders\ParentescosSeeder;
use phpDocumentor\Reflection\Types\Void_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'test@example.com',
            'password'=>'123456'
        ])->create([
            'name' => 'Administrador',
            'email' => 'enderbl1996@gmail.com',
            'password'=>'123456'
        ]);
        
        $this->call([
            ServiciosSeeder::class,
            ParentescosSeeder::class,
        ]);
        
    }
}

