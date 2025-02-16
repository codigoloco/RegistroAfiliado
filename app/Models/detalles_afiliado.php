<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalles_afiliado extends Model
{
    protected $table = 'detalles_afiliado';
    protected $fillable = ['afiliado_id', 'beneficiario_id'];
}
