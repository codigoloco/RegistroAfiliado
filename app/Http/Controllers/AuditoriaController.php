<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    // 
    function inicio(){
        return view('conf.auditoria');
    }
}
