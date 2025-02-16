<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentescos;
use App\Models\Afiliados;
use App\Models\Ejecutivos;
use App\Models\Beneficiarios;
use App\Models\Servicios;
use App\Models\Clientes;
use App\Models\detalles_afiliado;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function Laravel\Prompts\error;

class AfiliadosController extends Controller
{

    public function index()
    {
        $Afiliados = Afiliados::select(
            'afiliados.*',
            'servicios.nombre as nombre_servicio',
            'clientes.primer_nombre as primer_nombre',
            'clientes.segundo_nombre as segundo_nombre',
            'clientes.primer_apellido as primer_apellido',
            'clientes.segundo_apellido as segundo_apellido',
            'clientes.cedula as cedula'
        )
            ->join('servicios', 'afiliados.servicio_id', '=', 'servicios.id')
            ->join('clientes', 'afiliados.servicio_id', '=', 'clientes.id')

            ->get();
        return view('afiliados.buscarAfiliados', compact('Afiliados'));
    }
    public function afiliados()
    {
        $afiliados = Afiliados::all();
        $ejecutivos = Ejecutivos::all();
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
            $cliente = Clientes::where('cedula', '=', $request->CedulaTitular)->first();
            if($cliente){
                $afiliado->cliente_id = $cliente->id;
            }else{
                return  redirect()->route('afiliados')->with('Error', 'Cliente no encontrado');
            }
            $fechaActual = Carbon::now();
            $fechaRenovacion = $fechaActual->addYear();
            $fechaRenovacion = $fechaRenovacion->format('Y-m-d');

            // $afiliado->cliente_id = $cliente->id;
            $afiliado->servicio_id = $request->tipoServicio;
            $afiliado->nro_afiliado = $request->tipoServicio.$request->CedulaTitular;
            $afiliado->fecha_renovacion = $fechaRenovacion;

            $afiliado->ejecutivo_id  = $request->ejecutivo;
            $afiliado->status = 1;

            $afiliado->save();
            $afiliado_id = $afiliado->id;
            $beneficiarios = $request->beneficiarios;
            $beneficiario = Beneficiarios::where('cedula', '=', $request->cedulaBeneficiario)->first();
            if ($beneficiario) {
                array_push($beneficiarioExistentes, $beneficiario->id);
            } else {
                foreach ($beneficiarios as $beneficiario) {
                    $beneficiario = new Beneficiarios;
                    $beneficiario->afiliado_id = $afiliado->id;
                    $beneficiario->cedula = $request->cedulaBeneficiario;
                    $beneficiario->primer_nombre = $request->primer_nombre;
                    $beneficiario->segundo_nombre = $request->segundo_nombre;
                    $beneficiario->primer_apellido = $request->primer_apellido;
                    $beneficiario->segundo_apellido = $request->segundo_apellido;
                    $beneficiario->parentesco_id = $request->parentesco;
                    $beneficiario->status = 1;
                    $beneficiario->nacionalidad = $request->nacionalidad;
                    $beneficiario->save();
                    
                    array_push($beneficiarioExistentes, $beneficiario->id);
                }                
            }
            foreach ($beneficiarioExistentes as $beneficiario) {
                $detalles_afiliado = new detalles_afiliado;
                $detalles_afiliado->afiliado_id = $afiliado_id;
                $detalles_afiliado->beneficiario_id = $beneficiario;
                $detalles_afiliado->save();
            }

            // Retornar respuesta con los datos recibidos
            return  redirect()->route('afiliados')->with('Procesado', 'Afiliado creado correctamente.');
        } catch (\Throwable  $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al procesar los datos',
                'error' => $th->getMessage(),
                'data' => $afiliado->all()
            ], 422);
        }
    }
}
