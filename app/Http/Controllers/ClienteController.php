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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'rif' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'correo' => 'required|string|email|max:255',
            'empresa' => 'required|string|max:255',
            'status' => 'required|boolean',
            'users_id' => 'required|exists:users,id',
        ]);

        save($validatedData);
        return redirect()->route('clientes.index')->with('success', 'Cliente registrado exitosamente.');
    }
}
