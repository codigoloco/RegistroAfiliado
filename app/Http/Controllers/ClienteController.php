<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        $cliente = new Clientes();
        $id = Auth::id();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->nacionalidad = "VENEZOLANO";
        $cliente->cedula   = $request->cedula;
        $cliente->rif = $request->rif;
        $cliente->fechaNacimiento = $request->fechaNacimiento;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->empresa = $request->empresa;
        $cliente->status = $request->status;
        $cliente->direccion = $request->direccion;
        $cliente->users_id =$id;
        
        $cliente->save();


        // save($validatedData);
        return redirect()->route('index')->with('success', 'Cliente registrado exitosamente.');
    }
}
