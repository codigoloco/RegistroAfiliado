<?php

namespace App\Http\Controllers;

use App\Models\Convenios;
use Illuminate\Http\Request;

class ConveniosController extends Controller
{
    //
    function inicio()
    {   $convenios= Convenios::all();
        return view('conf.convenio',compact('convenios'));        
    }
    function storeConvenios(Request $request)
    {
        $configuracion = new Convenios();
        $configuracion->nombre = $request->Nombre;
        $configuracion->rif = $request->RIF;
        $configuracion->descripcion = $request->descripcion;
        $configuracion->save();
        

        return  redirect()->route('convenios.inicio');
    }
}
