<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rolesejecutivos extends Model
{
    //

    protected $fillable = [
        'nombre',
        'detalle',
        'rolEjecutivo_id' ,
        'status'
       
    ];
}
