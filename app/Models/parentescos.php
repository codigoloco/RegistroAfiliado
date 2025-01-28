<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class parentescos extends Model
{
    public function allparentescos()
    {
        return self::all();
    }
    protected $fillable = [
        'nombre'        
    ];
}
