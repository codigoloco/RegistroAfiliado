<?php

namespace App\Http\Controllers;

use App\Models\ejecutivos;
use Illuminate\Http\Request;

class EjecutivosController extends Controller
{
    public function ejecutivos()
    {
        
        $ejecutivos = ejecutivos::all();
        return view('conf.ejecutivos', compact("ejecutivos"));
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
    
    
    public function eliminarServicio($id)
    {

        try {
            $servicio = ejecutivos::findOrFail($id);
            $servicio->delete();
            return response()->json(['message' => 'rolesejecutivos eliminado correctamente']);
        } catch(\Throwable $th){
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el rolesejecutivos: ' . $th->getMessage());
        }
    }
    // Método para procesar la actualización
}
