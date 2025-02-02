<?php

namespace App\Http\Controllers;

use App\Models\parentescos;
use Illuminate\Http\Request;

class ParentescosController extends Controller
{
    public function parentesco()
    {
        $parentescos = parentescos::all();
        return view('conf.parentescos', compact("parentescos"));
    }
    public function storeParentesco(Request $request)
    {
        $configuracion = new parentescos();
        $configuracion->nombre = $request->nombre;
        $configuracion->save();

        return  redirect()->route('config.servicios');
    }
    public function eliminarServicio($id)
    {
        try {
            $servicio = parentescos::findOrFail($id);
            $servicio->delete();
            return response()->json(['message' => 'Servicio eliminado correctamente']);
        } catch(\Throwable $th){
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el servicio: ' . $th->getMessage());
        }
    }
}
