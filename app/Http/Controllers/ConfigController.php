<?php

namespace App\Http\Controllers;

use App\Models\ejecutivos;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\parentescos;
use App\Models\roles_ejecutivos;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $servicios = Servicio::all();
        return view('conf.servicios', compact("servicios"));
    }

    public function config()
    {
        return view('conf.config');
    }

    public function servicios()
    {
        $servicios = Servicio::all();
        return view('conf.servicios', compact("servicios"));
    }

    public function store(Request $request)
    {
        $configuracion = new Servicio();
        $configuracion->nombre = $request->nombre;
        $configuracion->maximoServicios = $request->cantidad;
        $configuracion->save();

        return  redirect()->route('config.servicios');
    }
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
    public function ejecutivos()
    {
        $ejecutivos = ejecutivos::all();
        return view('conf.ejecutivos', compact("ejecutivos"));
    }
    public function rolesEjecutivos()
    {
        $rolesEjecutivos = roles_ejecutivos::all();
        return view('conf.ejecutivos', compact("rolesEjecutivos"));
    }

}
