<?php

namespace App\Http\Controllers;

use App\Models\servicios;
use Illuminate\Http\Request;

class GetController extends Controller
{
    //
    public function index() {
        $servicios=servicios::all();
        return view('afiliados.afiliado', compact("servicios"));
    }
    public function regClientes() {
        return view('clientes.regClientes');        
    }
    public function afiliados() {
        
        return view('afiliados.afiliado' );
    }

    // public function config() {
    //     return view('configuracion.config');
    // }
    
}
