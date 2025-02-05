<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @Property string $nombre
 */
class ejecutivos extends Model
{
    //

    protected $fillable = [
        'nombre',
        'maximoServicios',
        'status'
    ];
}
