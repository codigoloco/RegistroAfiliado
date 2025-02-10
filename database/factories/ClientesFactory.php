<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    protected $model = Clientes::class;

    public function definition()
    {
        $nacionalidades = ['V', 'E'];
        $empresas = [
            'Empresas Polar',
            'PDVSA',
            'Banesco',
            'Mercantil',
            'Banco de Venezuela',
            'Movistar Venezuela',
            'Digitel',
            'Cantv',
            'Locatel',
            'Farmatodo',
            'EPA',
            'Central Madeirense',
            'Excelsior Gama',
            'Grupo Zoom',
            'MRW Venezuela',
            'Corporación ABC',
            'Inversiones 123',
            'Grupo DEF',
            'Servicios RST',
            'Empresas XYZ'
        ];
        
        return [
            'primer_nombre' => $this->faker->firstName(),
            'segundo_nombre' => $this->faker->optional(0.7)->firstName(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->optional(0.8)->lastName(),
            'nacionalidad' => $this->faker->randomElement($nacionalidades),
            'cedula' => $this->faker->numberBetween(1000000, 30000000),
            'rif' => $this->faker->optional(0.6)->numerify('V########-#'),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
            'telefono' => $this->faker->numerify('04##-#######'),
            'correo' => $this->faker->unique()->safeEmail(),
            'empresa' => $this->faker->randomElement($empresas),
            'status' => $this->faker->randomElement(['activo', 'inactivo']),
            'direccion' => $this->faker->address()
        ];
    }
} 