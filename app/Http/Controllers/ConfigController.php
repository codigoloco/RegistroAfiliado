<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    //
    public function index()
    {
        $servicios = Servicio::all();  
        return view('conf.servicios', compact("servicios"));
    }
    
    public function config() {
        return view('conf.config');
    }

    public function servicios() {
        $servicios = Servicio::all();
        return view('conf.servicios',compact("servicios"));
    }
    
    public function store(Request $request)
    {
        $configuracion=new Servicio();
        $configuracion->nombre = $request->nombre;
        $configuracion->maximoServicios = $request->cantidad;
        $configuracion->save();     
           
        return  redirect()->route('config.servicios');
    }

}
