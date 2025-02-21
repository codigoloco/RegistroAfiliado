<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BancosController extends Controller
{
    //
    public function bancos()
    {
        return view('conf.bancos');
    }
}
