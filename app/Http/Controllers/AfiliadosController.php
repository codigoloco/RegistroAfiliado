<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parentescos;
use App\Models\Afiliados;
use App\Models\servicio;

class AfiliadosController extends Controller
{
    public function index()
    {
        $servicios = servicio::all();
        return response()->json($servicios);
    }
    public function afiliados()
    {
        $parentescos = parentescos::all();
        $servicios = servicio::all();
        return view('afiliados.afiliado', compact("servicios", "parentescos"));
    }
    public function store(Request $request)
    {

        return $request->all();
    }
}
