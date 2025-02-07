<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliados extends Model
{
    //

    use HasFactory;



    protected $fillable = [
        'cliente_id',
        'servicio_id',
        'nro_afiliado',
        'fecha_renovacion',
        'ehecutivo_id',
        'status',
        'direccion',
    ];
}

