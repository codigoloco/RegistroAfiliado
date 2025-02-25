<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index', compact('clientes'));
    }
    public function getClientes($id = '')
    {
                
        if (!$id) {
            $clientes = Clientes::all();
            return response()->json($clientes);
        } else if($id) {
            $clientes = Clientes::find($id);
            return response()->json($clientes);
        }
        
    }

    public function create(Clientes $clientes)
    {
        $modo = 'crear';

        return view('clientes.regClientes', compact('modo', 'clientes'));
    }

    public function abrirEdicion($id)
    {
        $modo = 'editar';
        $clientes = Clientes::find($id);
        return view('clientes.regClientes', compact('modo', 'clientes'));
    }


    public function storeClientes(Request $request)
    {
        try {
            $cliente = new Clientes();

            $cliente->primer_nombre = $request->primerNombre;
            $cliente->segundo_nombre = $request->segundoNombre;
            $cliente->primer_apellido = $request->primerApellido;
            $cliente->segundo_apellido = $request->segundoApellido;
            $cliente->nacionalidad = $request->Nacionalidad;
            $cliente->cedula   = $request->cedula;
            $cliente->rif = $request->rif;
            $cliente->fecha_nacimiento = $request->fecha_nacimiento;
            $cliente->telefono = $request->telefono;
            $cliente->correo = $request->correo;
            $cliente->empresa = $request->empresa;
            $cliente->status = $request->status;
            $cliente->direccion = $request->direccion;


            $cliente->save();

            // save($validatedData);

        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return redirect()->route('buscar.Clientes')->with('error', 'Cliente ya registrado. ');
            }
        }
        return redirect()->route('buscar.Clientes')->with('success', 'Cliente registrado exitosamente.');
    }

    public function edit($id)
    {
        $cliente = Clientes::find($id);
        return redirect()->route('buscar.Clientes', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);

        $cliente->primer_nombre = $request->primerNombre;
        $cliente->segundo_nombre = $request->segundoNombre;
        $cliente->primer_apellido = $request->primerApellido;
        $cliente->segundo_apellido = $request->segundoApellido;
        $cliente->nacionalidad = $request->Nacionalidad;
        $cliente->cedula = $request->cedula;
        $cliente->rif = $request->rif;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->empresa = $request->empresa;
        $cliente->status = $request->status;
        $cliente->direccion = $request->direccion;

        $cliente->save();

        return redirect()->route('buscar.Clientes')->with('success', 'Cliente actualizado exitosamente.');
    }
}
