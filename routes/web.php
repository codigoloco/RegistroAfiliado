<?php

use App\Http\Controllers\AfiliadosController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\BancosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ConveniosController;
use App\Http\Controllers\EjecutivosController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\ParentescosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportesController;
use App\Models\Bancos;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio')->middleware('auth');

//AFiliados
Route::get('/afiliados',  [AfiliadosController::class, 'afiliados'])->name('afiliados')->middleware('auth');
//registrar afiliados
route::post('/afiliados/create',  [AfiliadosController::class, 'storeAFiliados'])->name('afiliados.store')->middleware('auth');
//BuscarAfiliados
Route::get('/BuscarAfiliados',  [AfiliadosController::class, 'index'])->name("buscar.afiliados")->middleware('auth');
//Eliminar servicio
Route::delete('/AFiliados/delete/{id}',  [AfiliadosController::class, 'eliminarServicio'])->name('afiliados.destroy')->middleware('auth');
//VistaEdicion
Route::get('/AFiliados/{id}/editar', [AfiliadosController::class, 'edit'])->name('afiliados.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/AFiliados/{id}', [AfiliadosController::class, 'update'])->name('afiliados.actualizar')->middleware('auth');

//clientes
//Registro
Route::get('/regClientes', [ClienteController::class, 'create'])->name('regClientes')->middleware('auth');

//Busqueda o vista
Route::get('/clientes',  [ClienteController::class, 'index'])->name('buscar.Clientes')->middleware('auth');
// clientesjson
Route::get('/clientes/get',  [ClienteController::class, 'getClientes'])->middleware('auth');
//Registrar Clientes
Route::post('/clientes',  [ClienteController::class, 'storeClientes'])->name('clientes.store')->middleware('auth');
//Eliminar servicio
Route::delete('/clientes/delete/{id}',  [ClienteController::class, 'eliminarServicio'])->name('clientes.destroy')->middleware('auth');
//VistaEdicion
Route::get('/clientes/{id}/editar', [ClienteController::class, 'abrirEdicion'])->name('clientes.update')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.actualizar')->middleware('auth');
//obtenerDataCliente
route::get('/clientes/get/{id}',  [ClienteController::class, 'getClientes'])->middleware('auth');

//configuracion
//Vista Configuraciones
Route::get('/conf',  [ConfigController::class, 'config'])->name('config')->middleware('auth');

//Servicios
//Vista de servicios
Route::get('/conf/servicios',  [ServiciosController::class, 'servicios'])->name('config.servicios')->middleware('auth');
//Crear Servicios
Route::post('/conf/create',  [ServiciosController::class, 'storeServicios'])->name('config.store')->middleware('auth');
//Eliminar servicio
Route::delete('/servicios/delete/{id}',  [ServiciosController::class, 'eliminarServicio'])->name('servicios.destroy')->middleware('auth');
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
Route::delete('/parentesco/delete/{id}',  [ParentescosController::class, 'eliminarServicio'])->name('Parentescos.destroy')->middleware('auth');
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
Route::delete('/ejecutivos/delete/{id}',  [EjecutivosController::class, 'eliminarServicio'])->name('Ejecutivos.destroy')->middleware('auth');
//VistaEdicion
Route::get('/ejecutivos/{id}/editar', [EjecutivosController::class, 'edit'])->name('Ejecutivos.editar')->middleware('auth');
// Ruta para procesar la actualización del servicio
Route::put('/ejecutivos/{id}', [EjecutivosController::class, 'update'])->name('Ejecutivos.actualizar')->middleware('auth');

//Bancos
Route::get('/conf/Bancos',  [BancosController::class, 'bancos'])->name('config.Bancos')->middleware('auth');

//Convenios
//INICIO
route::get('/convenios',  [ConveniosController::class, 'inicio'])->name('convenios.inicio')->middleware('auth');
Route::post('/convenios/create',  [ConveniosController::class, 'storeConvenios'])->name('convenios.store')->middleware('auth');
    








Route::get('/usuarios',  [UserController::class, 'inicio'])->name('usuarios')->middleware('auth');


Route::get('/auditoria',  [AuditoriaController::class, 'inicio'])->name('auditoria')->middleware('auth');

Route::get('/reportes',  [ReportesController::class, 'inicio'])->name('reportes')->middleware('auth');



Route::post('/excel/importar',  [ExcelController::class, 'cargaMasiva'])->middleware('auth');

Route::get('/afiliados/exportar', [GetController::class, 'importarExcel'])->name('importarExcel');