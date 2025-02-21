<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentescos extends Model
{
    use HasFactory;
    
    public function allparentescos()
    {
        return self::all();
    }
}
