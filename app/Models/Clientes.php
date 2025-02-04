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
 * @property boolean $status
 * @property boolean $status
 * @
 * 
 * 
 */
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

