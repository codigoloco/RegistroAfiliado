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
    public function edit($id)
    {
        $servicio = rolesejecutivos::findOrFail($id); // Obtener el servicio a editar
        return view('conf.editar', compact('servicio')); // Pasar el servicio a la vista
    }
    
    public function eliminarServicio($id)
    {

        try {
            $servicio = rolesejecutivos::findOrFail($id);
            $servicio->delete();
            return response()->json(['message' => 'rolesejecutivos eliminado correctamente']);
        } catch(\Throwable $th){
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el rolesejecutivos: ' . $th->getMessage());
        }
    }
    // Método para procesar la actualización
    public function update(Request $request, $id)
    { try{
        
        $rolesejecutivos = rolesejecutivos::findOrFail($id); // Obtener el servicio a actualizar        
        // Validar los datos del formulario
        
        $request->validate([
            'nombre' => 'required|string|max:255', // Ejemplo de validación            
            'maximoServicios' =>'required|integer|max:255',
            // Agrega más reglas de validación según sea necesario
        ]);
        $status = $request->has('status') ? '1' : '0';
        // Actualizar el servicio
        

        $rolesejecutivos->update([
            'nombre' => $request->nombre,
            'maximoServicios' => $request->maximoServicios,
            'status' => $status, // Usamos el valor convertido
        ]);
        
        // Redireccionar con un mensaje de éxito
        return redirect()->route('config.rolesEjecutivos')->with('success', 'Servicio actualizado correctamente');}
        catch(\Throwable $th){
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el rolesejecutivos: ' . $th->getMessage());
        }
    }
}
