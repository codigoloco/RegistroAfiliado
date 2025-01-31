<?php

use App\Http\Controllers\AfiliadosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\GetController;

Auth::routes();

Route::get('/', [GetController::class, 'inicio'])->name('inicio');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

Route::get('/afiliados',  [AfiliadosController::class, 'afiliados'])->name('afiliados');
//registrar afiliados
route::post('/afiliados/create',  [AfiliadosController::class, 'store'])->name('afiliados.store');

Route::get('/afiliados/all',  [AfiliadosController::class, 'index']);

//clientes
Route::get('/regClientes', [GetController::class, 'regClientes'])->name('regClientes');

Route::get('/clientes',  [ClienteController::class, 'index'])->name('index');

Route::post('/clientes',  [ClienteController::class, 'store'])->name('clientes.store');

//configuracion
Route::get('/conf',  [ConfigController::class, 'config'])->name('config');
//Vista de servicios
Route::get('/conf/servicios',  [ConfigController::class, 'servicios'])->name('config.servicios');
//Parentescos
Route::get('/conf/parentesco',  [ConfigController::class, 'parentesco'])->name('config.parentesco');
//CrearParentescos
Route::post('/conf/parentesco/create',  [ConfigController::class, 'storeParentesco'])->name('config.store.parentesco');
// Llamado del controllador para  insertar
route::post('/conf/create',  [ConfigController::class, 'store'])->name('config.store');
//Ejecutivos
Route::get('/conf/ejecutivos',  [ConfigController::class, 'ejecutivos'])->name('config.ejecutivos');
//roles ejecutivos
Route::get('/conf/rolesEjecutivos',  [ConfigController::class, 'rolesEjecutivos'])->name('config.rolesEjecutivos');
//crear ejecutivo
Route::post('/conf/ejecutivos/create',  [ConfigController::class, 'storeParentesco'])->name('config.store.ejecutivos');
//crear Rol
Route::post('/conf/rolesEjecutivos/create',  [ConfigController::class, 'storeParentesco'])->name('config.store.rolesEjecutivos');