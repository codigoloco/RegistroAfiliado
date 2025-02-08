<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    /** @use HasFactory<\Database\Factories\BeneficiariosFactory> */
    use HasFactory;


    protected $fillable = [

        'nombre',
        'apellido',
        'nacionalidad',
        'cedula',
        'rif',
        'fechaNacimiento',
        'direccion',
        'telefono',
        'celular',
        'parentescos_id',
        'afiliado_id',
        'servicio_id',
        'empresa',
        'status',
        'convenio'
        ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function afiliado()
    {
        return $this->belongsTo(Afiliados::class);
    }

    public function parentesco()
    {
        return $this->belongsTo(Parentescos::class);
    }   

    public function servicio()
    {
        return $this->belongsTo(Servicios::class);
    }
    

}
