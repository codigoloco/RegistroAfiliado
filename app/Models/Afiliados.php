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
    public function Servicios()
    {
        return $this->belongsTo(Servicios::class);
    }

    public function ejecutivo()
    {
        return $this->belongsTo(Ejecutivos::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function beneficiarios()
    {
        return $this->hasMany(Beneficiarios::class);
    }

    public function parentescos()
    {
        return $this->belongsTo(Parentescos::class);
    }

}

