<?php

use App\Http\Controllers\AfiliadosController;
use App\Http\Controllers\AuditoriaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\EjecutivosController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\ParentescosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RolesEjecutivosController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio')->middleware('auth');

Route::get('/afiliados',  [AfiliadosController::class, 'afiliados'])->name('afiliados')->middleware('auth');
//AFiliados
//registrar afiliados
route::post('/afiliados/create',  [AfiliadosController::class, 'storeAFiliados'])->name('afiliados.store')->middleware('auth');
//BuscarAfiliados
Route::get('/BuscarAfiliados',  [AfiliadosController::class, 'index'])->name("buscar.afiliados")->middleware('auth');
//Eliminar servicio
Route::delete('/conf/delete/{id}',  [AfiliadosController::class, 'eliminarServicio'])->name('servicios.destroy')->middleware('auth');
//VistaEdicion
Route::get('/servicios/{id}/editar', [AfiliadosController::class, 'edit'])->name('servicios.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/servicios/{id}', [AfiliadosController::class, 'update'])->name('servicios.actualizar')->middleware('auth');

//clientes
//Registro
Route::get('/regClientes', [GetController::class, 'regClientes'])->name('regClientes')->middleware('auth');
//Busqueda o vista 
Route::get('/clientes',  [ClienteController::class, 'index'])->name('buscar.Clientes')->middleware('auth');
//Registrar Clientes
Route::post('/clientes',  [ClienteController::class, 'storeClientes'])->name('clientes.store')->middleware('auth');
//Eliminar servicio
Route::delete('/conf/delete/{id}',  [ClienteController::class, 'eliminarServicio'])->name('servicios.destroy')->middleware('auth');
//VistaEdicion
Route::get('/servicios/{id}/editar', [ClienteController::class, 'edit'])->name('servicios.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/servicios/{id}', [ClienteController::class, 'update'])->name('servicios.actualizar')->middleware('auth');

//configuracion
//Vista Configuraciones
Route::get('/conf',  [ConfigController::class, 'config'])->name('config')->middleware('auth');

//Servicios
//Vista de servicios
Route::get('/conf/servicios',  [ServiciosController::class, 'servicios'])->name('config.servicios')->middleware('auth');
//Crear Servicios
Route::post('/conf/create',  [ServiciosController::class, 'storeServicios'])->name('config.store')->middleware('auth');
//Eliminar servicio
Route::delete('/conf/delete/{id}',  [ServiciosController::class, 'eliminarServicio'])->name('servicios.destroy')->middleware('auth');
//VistaEdicion
Route::get('/servicios/{id}/editar', [ServiciosController::class, 'edit'])->name('servicios.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/servicios/{id}', [ServiciosController::class, 'update'])->name('servicios.actualizar')->middleware('auth');

//Parentescos
//vista Parentescos
Route::get('/conf/parentesco',  [ParentescosController::class, 'parentesco'])->name('config.parentesco')->middleware('auth');
//CrearParentescos
Route::post('/conf/parentesco/create',  [ParentescosController::class, 'storeParentesco'])->name('config.store.parentesco')->middleware('auth');
// Llamado del controllador para  insertar
//Eliminar servicio
Route::delete('/parentesco/delete/{id}',  [ParentescosController::class, 'eliminarServicio'])->name('servicios.destroy')->middleware('auth');
//VistaEdicion
Route::get('/parentesco/{id}/editar', [ParentescosController::class, 'edit'])->name('parentesco.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/parentesco/{id}', [ParentescosController::class, 'update'])->name('parentesco.actualizar')->middleware('auth');

//Ejecutivos
//Ver Ejecutivos
Route::get('/conf/ejecutivos',  [EjecutivosController::class, 'ejecutivos'])->name('config.ejecutivos')->middleware('auth');
//crear ejecutivo
Route::post('/conf/ejecutivos/create',  [EjecutivosController::class, 'storeEjecutivos'])->name('config.store.ejecutivos')->middleware('auth');
//Eliminar servicio
Route::delete('/conf/delete/{id}',  [EjecutivosController::class, 'eliminarServicio'])->name('servicios.destroy')->middleware('auth');
//VistaEdicion
Route::get('/servicios/{id}/editar', [EjecutivosController::class, 'edit'])->name('servicios.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/servicios/{id}', [EjecutivosController::class, 'update'])->name('servicios.actualizar')->middleware('auth');

//Roles
//roles ejecutivos
Route::get('/conf/rolesEjecutivos',  [RolesEjecutivosController::class, 'rolesEjecutivos'])->name('config.rolesEjecutivos')->middleware('auth');
//crear Rol
Route::post('/conf/rolesEjecutivos/create',  [RolesEjecutivosController::class, 'storeRolesEjecutivos'])->name('config.store.rolesEjecutivos')->middleware('auth');
//Eliminar servicio
Route::delete('/rolesEjecutivos/delete/{id}',  [RolesEjecutivosController::class, 'eliminarServicio'])->name('rolesEjecutivos.destroy')->middleware('auth');
//VistaEdicion
Route::get('/rolesEjecutivos/{id}/editar', [RolesEjecutivosController::class, 'edit'])->name('rolesEjecutivos.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/rolesEjecutivos/{id}', [RolesEjecutivosController::class, 'update'])->name('rolesEjecutivos.actualizar')->middleware('auth');



Route::get('/usuarios',  [UserController::class, 'inicio'])->name('usuarios')->middleware('auth');


Route::get('/auditoria',  [AuditoriaController::class, 'inicio'])->name('auditoria')->middleware('auth');