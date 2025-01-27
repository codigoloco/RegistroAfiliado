<?php

namespace App\Http\Controllers;

use App\Models\servicios;
use Illuminate\Http\Request;

class GetController extends Controller
{
    //
    public function inicio() {
        return view('inicio');
    }
    public function regClientes() {
        return view('clientes.regClientes');        
    }
    public function afiliados() {
        $servicios=servicios::all();
        return view('afiliados.afiliado', compact('servicios'));
    }

    public function config() {
        return view('configuracion.config');
    }
    
}
