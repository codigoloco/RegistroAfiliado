<?php

use App\Http\Controllers\AfiliadosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\ParentescosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RolesEjecutivosController;

Auth::routes();

Route::get('/', [GetController::class, 'inicio'])->name('inicio');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

Route::get('/afiliados',  [AfiliadosController::class, 'afiliados'])->name('afiliados');
//AFiliados
//registrar afiliados
route::post('/afiliados/create',  [AfiliadosController::class, 'storeAFiliados'])->name('afiliados.store');
//BuscarAfiliados
Route::get('/BuscarAfiliados',  [AfiliadosController::class, 'index'])->name("buscar.afiliados");

//clientes
//Registro
Route::get('/regClientes', [GetController::class, 'regClientes'])->name('regClientes');
//Busqueda o vista 
Route::get('/clientes',  [ClienteController::class, 'index'])->name('buscar.Clientes');
//Registrar Clientes
Route::post('/clientes',  [ClienteController::class, 'storeClientes'])->name('clientes.store');

//configuracion
//Vista Configuraciones
Route::get('/conf',  [ConfigController::class, 'config'])->name('config');

//Servicios
//Vista de servicios
Route::get('/conf/servicios',  [ServiciosController::class, 'servicios'])->name('config.servicios');
//Crear Servicios
Route::post('/conf/create',  [ServiciosController::class, 'storeServicios'])->name('config.store');
//Eliminar servicio
Route::delete('/conf/delete/{id}',  [ServiciosController::class, 'eliminarServicio'])->name('servicios.destroy');
//VistaEdicion
Route::get('/conf/editar',[ServiciosController::class,'edit'])->name('config.editar');
//TeNTATIVA
Route::get('/servicios/{id}/editar', [ServiciosController::class, 'edit'])->name('servicios.editar');

// Ruta para procesar la actualización del servicio
Route::put('/servicios/{id}', [ServiciosController::class, 'update'])->name('servicios.actualizar');

//Parentescos
//vista Parentescos
Route::get('/conf/parentesco',  [ParentescosController::class, 'parentesco'])->name('config.parentesco');
//CrearParentescos
Route::post('/conf/parentesco/create',  [ParentescosController::class, 'storeParentesco'])->name('config.store.parentesco');
// Llamado del controllador para  insertar


//Ejecutivos
//Ver Ejecutivos
Route::get('/conf/ejecutivos',  [ConfigController::class, 'ejecutivos'])->name('config.ejecutivos');
//crear ejecutivo
Route::post('/conf/ejecutivos/create',  [ConfigController::class, 'storeEjecutivos'])->name('config.store.ejecutivos');

//Roles
//roles ejecutivos
Route::get('/conf/rolesEjecutivos',  [RolesEjecutivosController::class, 'rolesEjecutivos'])->name('config.rolesEjecutivos');
//crear Rol
Route::post('/conf/rolesEjecutivos/create',  [RolesEjecutivosController::class, 'storeRolesEjecutivos'])->name('config.store.rolesEjecutivos');


