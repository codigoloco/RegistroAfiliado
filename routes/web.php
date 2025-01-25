<?php

use Illuminate\Support\Facades\Route;
// menu principal
Route::get('/', function () {
    return view('welcome');
});

// rutas de afiliados
Route::get('/afiliados', function () {
    return view('welcome');
});