<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
Auth::routes();

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/afiliados', function () {
    return view('afiliados.afiliado');
})->name('afiliados');

Route::get('/regClientes', function () {
    return view('clientes.regClientes');
})->name('regClientes');


Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes', [ClienteController::class, 'index'])->name('index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
