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
            $configuracion->status = 1;
            

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
            $ejecutivos = ejecutivos::findOrFail($id);
            $ejecutivos->delete();
            return response()->json(['message' => 'ejecutivo eliminado correctamente']);
        } catch(\Throwable $th){
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el ejecutivo: ' . $th->getMessage());
        }
    }
    // Método para procesar la actualización
}
