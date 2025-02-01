<?php

namespace App\Http\Controllers;

use App\Models\ejecutivos;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\parentescos;
use App\Models\rolesejecutivos;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $servicios = Servicio::all();
        return view('conf.servicios', compact("servicios"));
    }

    public function config()
    {
        return view('conf.config');
    }

    
    
    
    public function rolesEjecutivos()
    {
        $rolesEjecutivos = rolesejecutivos::all();
        return view('conf.rolesEjecutivos', compact("rolesEjecutivos"));
    }

    public function storeRolesEjecutivos(Request $request)
    {
        try {
            $configuracion = new rolesejecutivos();
            $configuracion->nombre = $request->nombre;
            $configuracion->detalle = $request->detalle;

            $configuracion->save();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Ocurrió un error al guardar el rol: ' . $th->getMessage());
        }
        return  redirect()->route('config.rolesEjecutivos')->with('success', 'rol creado correctamente.');
    }
}
