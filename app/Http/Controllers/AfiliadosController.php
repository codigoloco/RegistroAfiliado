<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentescos;
use App\Models\Afiliados;
use App\Models\Ejecutivos;
use App\Models\Servicios;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function Laravel\Prompts\error;

class AfiliadosController extends Controller
{

    public function index()
    {
        $Afiliados = Afiliados::all();
        return view('afiliados.buscarAfiliados', compact('Afiliados'));
    }
    public function afiliados()
    {        
        $ejecutivos=Ejecutivos::all();
        $parentescos = Parentescos::all();
        $servicios = Servicios::all();
        return view('afiliados.afiliado', compact("servicios", "parentescos", "ejecutivos"));
    }
    public function storeAFiliados(Request $request)
    {
        
        try {
            
            $fechaActual = Carbon::now();
            $fechaRenovacion = $fechaActual->addYear();      
            $fechaRenovacion=$fechaRenovacion->format('Y-m-d');      
            $afiliado = new afiliados;            
            $afiliado->clientes_id = 1;
            $afiliado->servicio_id = $request->tipoServicio;
            $afiliado->nro_afiliado = $request->tipoServicioC .'-'. $request->edulaTitular;
            $afiliado->fecha_renovacion = $fechaRenovacion;
            $afiliado->users_id  = auth::id();;
            $afiliado->ejecutivos_id  = $request->ejecutivo;
            $afiliado->status = 1;
            
            $afiliado->save();
        } catch (\Throwable  $th ) {
            if($th->getCode() ==23000){
                return redirect()->back()
                ->with('error', 'Ocurrió un error al guardar el afiliado: Ya existe un registro similar en el sistema  Verifique la cedula del titular');
            }
            
        }
        return  redirect()->route('afiliados')->with('success', 'Afiliado creado correctamente.');
    }
}
