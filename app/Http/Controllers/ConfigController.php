<?php

namespace App\Http\Controllers;

use App\Models\configuracion;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    //
    public function config() {
        return view('conf.config');
    }

    public function index()
    {
        $clientes = configuracion::all();        
        return view('clientes.index', compact('clientes'));
    }
    public function store(Request $request)
    {
        $configuracion=new configuracion();
        $validateData=$request->validate([
            'nombre'=> 'required|string|max:255',
        ]);
        configuracion::create($validateData);
        return  redirect()->route('clientes.index')->with('success','Cliente registrado exitosamente.');
    }

}
