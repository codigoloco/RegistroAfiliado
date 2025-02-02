<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function inicio()
    {
        return view("conf.usuario");
    }
}
