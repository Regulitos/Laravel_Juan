<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCliente;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/clientes', [ControladorCliente::class, 'lista'])->name('clientes.lista');
Route::get('/clientes/{id}', [ControladorCliente::class, 'obtener'])->name('clientes.obtener');
Route::post('/clientes', [ControladorCliente::class,'crear'])->name('clientes.crear');
Route::put('/clientes/{id}', [ControladorCliente::class,'actualizar'])->name('clientes.actualizar');
Route::delete('/clientes/{id}', [ControladorCliente::class,'eliminar'])->name('clientes.eliminar');
