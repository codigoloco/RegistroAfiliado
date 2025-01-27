<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
     public function allServicio()
    {
        return self::all();
    }
    protected $fillable = [
        'nombre',
        'maximoServicios'
    ];
}
