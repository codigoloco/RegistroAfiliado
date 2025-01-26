<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clientes extends Model
{
    use HasFactory;
      

    public function allClientes()
    {
        return self::all();
    }
    protected $fillable = [
        'nombre',
        'apellido',
        'nacionalidad',
        'cedula',
        'rif',
        'fechaNacimiento',
        'direccion',
        'telefono',
        'correo',
        'empresa',
        'status',
        'users_id',
    ];
}

