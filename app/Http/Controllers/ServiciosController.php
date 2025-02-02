<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        return view('conf.servicios', compact("servicios"));
    }
    public function servicios()
    {
        $servicios = Servicio::all();
        return view('conf.servicios', compact("servicios"));
    }

    public function storeServicios(Request $request)
    {
       
        $configuracion = new Servicio();
        $configuracion->nombre = $request->nombre;
        $configuracion->maximoServicios = $request->cantidad;
        $configuracion->save();

        return  redirect()->route('config.servicios');
    }
    public function eliminarServicio($id)
    {
        try {
            $servicio = Servicio::findOrFail($id);
            $servicio->delete();
            return response()->json(['message' => 'Servicio eliminado correctamente']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id); // Obtener el servicio a editar
        return view('conf.editar', compact('servicio')); // Pasar el servicio a la vista
    }

    // Método para procesar la actualización
    public function update(Request $request, $id)
    { try{
        
        $servicio = Servicio::findOrFail($id); // Obtener el servicio a actualizar        
        // Validar los datos del formulario
        
        $request->validate([
            'nombre' => 'required|string|max:255', // Ejemplo de validación            
            'maximoServicios' =>'required|integer|max:255',
            // Agrega más reglas de validación según sea necesario
        ]);
        $status = $request->has('status') ? '1' : '0';
        // Actualizar el servicio
        

        $servicio->update([
            'nombre' => $request->nombre,
            'maximoServicios' => $request->maximoServicios,
            'status' => $status, // Usamos el valor convertido
        ]);
        
        // Redireccionar con un mensaje de éxito
        return redirect()->route('config.servicios')->with('success', 'Servicio actualizado correctamente');}
        catch(\Throwable $th){
            return redirect()->back()
                ->with('error', 'Ocurrió un error al actualizar el servicio: ' . $th->getMessage());
        }
    }
}
