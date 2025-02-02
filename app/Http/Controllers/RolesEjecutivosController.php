<?php

namespace App\Http\Controllers;

use App\Models\rolesejecutivos;
use Illuminate\Http\Request;

class RolesEjecutivosController extends Controller
{
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
