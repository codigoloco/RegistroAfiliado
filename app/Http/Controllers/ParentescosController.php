<?php

namespace App\Http\Controllers;

use App\Models\parentescos;
use Illuminate\Http\Request;

class ParentescosController extends Controller
{
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
}
