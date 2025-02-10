<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Afiliados;
use App\Models\Clientes;
use App\Models\Beneficiarios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $afiliaciones = Afiliados::all();
        $clientes = Clientes::all();        

        return view('inicio', compact('afiliaciones', 'clientes'));
    }
}
