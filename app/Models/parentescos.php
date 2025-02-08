<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parentescos extends Model
{
    /** @use HasFactory<\Database\Factories\BeneficiariosFactory> */
    use HasFactory;
    
    public function allparentescos()
    {
        return self::all();
    }
    protected $fillable = [
        'nombre'        
    ];
}
