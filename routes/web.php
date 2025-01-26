<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GetController;

Auth::routes();

Route::get('/', [GetController::class, 'inicio'])->name('inicio');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

Route::get('/afiliados',  [GetController::class, 'afiliados'])->name('afiliados');

Route::get('/regClientes', [GetController::class, 'regClientes'])->name('regClientes');

Route::get('/clientes',  [ClienteController::class, 'index'])->name('index');

Route::post('/clientes',  [ClienteController::class, 'store'])->name('clientes.store');
