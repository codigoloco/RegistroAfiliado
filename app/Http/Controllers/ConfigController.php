<?php

namespace App\Http\Controllers;

use App\Models\ejecutivos;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\parentescos;
use App\Models\rolesejecutivos;

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

}
