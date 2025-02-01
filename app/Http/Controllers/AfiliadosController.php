<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parentescos;
use App\Models\Afiliados;
use App\Models\servicio;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AfiliadosController extends Controller
{

    public function index()
    {
        $afiliados = afiliados::all();
        return view('afiliados.buscarAfiliados', compact('afiliados'));
    }
    public function afiliados()
    {
        $fechaActual = Carbon::now();
        $fechaRenovacion = $fechaActual->addYear();      
        $fechaRenovacion=$fechaRenovacion->format('Y-m-d');   
        echo $fechaRenovacion;
        $parentescos = parentescos::all();
        $servicios = servicio::all();
        return view('afiliados.afiliado', compact("servicios", "parentescos"));
    }
    public function store(Request $request)
    {
        
        try {
            $fechaActual = Carbon::now();
            $fechaRenovacion = $fechaActual->addYear();      
            $fechaRenovacion=$fechaRenovacion->format('Y-m-d');      
            $afiliado = new afiliados;
            $afiliado->clientes_id = 1;
            $afiliado->servicio_id = $request->tipoServicio;
            $afiliado->nro_afiliado = $request->CedulaTitular;
            $afiliado->fecha_renovacion = $fechaRenovacion;
            $afiliado->users_id  = auth::id();;
            $afiliado->rolEjecutivo_id = 1;
            $afiliado->status = 1;
            $afiliado->save();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', 'Ocurrió un error al guardar el afiliado: ' . $th->getMessage());
        }
        return  redirect()->route('afiliados')->with('success', 'Afiliado creado correctamente.');
    }
}
