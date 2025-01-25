<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/afiliados', function () {
    return view('afiliados.afiliado');
})->name('afiliados');

Route::get('/afiliados', function () {
    return view('afiliados.afiliado');
})->name('afiliados');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
