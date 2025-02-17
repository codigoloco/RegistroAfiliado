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
 * @property string $fecha_nacimiento
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
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'nacionalidad',
        'cedula',
        'rif',
        'fecha_nacimiento',
        'telefono',
        'correo',
        'empresa',
        'status',
        'direccion'
    ];
}

