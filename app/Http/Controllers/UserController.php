<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function inicio()
    {
        $usuarios = User::all();
        return view("conf.usuario",compact('usuarios'));
    }
}
