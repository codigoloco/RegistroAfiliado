<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentescos;
use App\Models\Afiliados;
use App\Models\Ejecutivos;
use App\Models\Servicios;
use App\Models\Clientes;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function Laravel\Prompts\error;

class AfiliadosController extends Controller
{

    public function index()
    {
        $Afiliados = Afiliados::select('afiliados.*',
        'servicios.nombre as nombre_servicio',
        'clientes.primer_nombre as primer_nombre',
        'clientes.segundo_nombre as segundo_nombre',
        'clientes.primer_apellido as primer_apellido',
        'clientes.segundo_apellido as segundo_apellido',
        'clientes.cedula as cedula'
        )
        ->join('servicios','afiliados.servicio_id','=','servicios.id')
        ->join('clientes','afiliados.servicio_id','=','clientes.id')

        ->get();
        return view('afiliados.buscarAfiliados', compact('Afiliados'));
    }
    public function afiliados()
    {   $afiliados=Afiliados::all();
        $ejecutivos=Ejecutivos::all();
        $parentescos = Parentescos::all();
        $servicios = Servicios::all();
        return view('afiliados.afiliado', compact("servicios", "parentescos", "ejecutivos"));
    }
    public function storeAFiliados(Request $request)
    {
        try {
            // Obtener todos los datos del formulario en formato JSON
            $formData = $request->all();            

            $afiliado = new afiliados;
            $cliente = Clientes::where('cedula','=', $request->CedulaTitular)->first();

            $fechaActual = Carbon::now();
            $fechaRenovacion = $fechaActual->addYear();
            $fechaRenovacion=$fechaRenovacion->format('Y-m-d');

            $afiliado->cliente_id = $cliente->id;
            $afiliado->servicio_id = $request->tipoServicio;
            $afiliado->nro_afiliado = $request->CedulaTitular;
            $afiliado->fecha_renovacion = $fechaRenovacion;

            $afiliado->ejecutivo_id  = $request->ejecutivo;
            $afiliado->status = 1;

            $afiliado->save();

            // Retornar respuesta con los datos recibidos
            return  redirect()->route('afiliados')->with('Procesado', 'Afiliado creado correctamente.');

        } catch (\Throwable  $th ) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al procesar los datos',
                'error' => $th->getMessage(),
                'data' => $afiliado->all()
            ], 422);
        }
    }
}
