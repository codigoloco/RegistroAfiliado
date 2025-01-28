<?php

namespace App\Http\Controllers;

use App\Models\parentescos;
use App\Models\Afiliados;
use App\Models\servicio;
use Illuminate\Http\Request;

use function Laravel\Prompts\form;

class GetController extends Controller
{
    //

    public function regClientes()
    {
        return view('clientes.regClientes');
    }



    // public function config() {
    //     return view('configuracion.config');
    // }

}
