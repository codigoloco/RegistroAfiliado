<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
    //
    public function regClientes() {
        return view('clientes.regClientes');        
    }
    public function afiliados() {
        return view('afiliados.afiliado');
    }
    public function inicio() {
        return view('inicio');
    }
    
}
