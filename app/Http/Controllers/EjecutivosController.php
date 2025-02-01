<?php

namespace App\Http\Controllers;

use App\Models\ejecutivos;
use App\Models\rolesejecutivos;
use Illuminate\Http\Request;

class EjecutivosController extends Controller
{
    public function ejecutivos()
    {
        $rolesEjecutivos = rolesejecutivos::all();
        $ejecutivos = ejecutivos::all();
        return view('conf.ejecutivos', compact("ejecutivos", "rolesEjecutivos"));
    }
    public function storeEjecutivos(Request $request)
    {
        try {
            $configuracion = new ejecutivos();
            $configuracion->nombre = $request->nombre;
            $configuracion->apellido = $request->apellido;
            $configuracion->rolEjecutivo_id  = $request->rolEjecutivo;

            $configuracion->save();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Ocurrió un error al guardar el Ejecutivo: ' . $th->getMessage());
        }
        return  redirect()->route('config.ejecutivos')->with('success', 'Ejecutivo creado correctamente.');
    }
}
