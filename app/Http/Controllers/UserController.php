<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    function RegistrarUsuario()
    {
        $usuarios = User::all();
        return view('conf.usuario', compact('usuarios'));
    }
    function CrearRegistro()
    {

        return view('conf.registrar_usuario');
    }

    public function register(Request $request)
    {

        try {
            $user = $this->create($request->all());
            if ($user) {
                return redirect()->route('usuarios')->with('success', 'Usuario registrado correctamente');
            } else {
                return redirect()->back()->with('error', 'No se pudo registrar el usuario. Inténtalo de nuevo.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al registrar el usuario: ' . $e->getMessage());
        }
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
