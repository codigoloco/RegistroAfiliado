<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    //

    protected $fillable = [
        'nombre',
        'cantidad_maxima_beneficiarios',
        'status'
    ];
}
