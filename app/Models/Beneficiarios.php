<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    //
    protected $fillable = [        
        'cedula',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'parentesco_id',        
        'nacionalidad',
        'telefono',
    ];
    
}
