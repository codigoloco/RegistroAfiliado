<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property string $nombre
 * @property string $apellido
 * @property string $nacionalidad
 * @property string $cedula
 * @property string $rif
 * @property string $fechaNacimiento
 * @property mixed $correo
 * @property string $status
 * 
 * @
 * 
 * 
 */
class Clientes extends Model
{
    use HasFactory;
      


    protected $fillable = [
        'nombre',
        'apellido',
        'nacionalidad',
        'cedula',
        'rif',
        'fechaNacimiento',
        'telefono',
        'correo',
        'empresa',
        'status',
        'direccion',        
    ];
}

