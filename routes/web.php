<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//rota index do cliente
Route::get('/index-cliente', [ClienteController::class, 'index'])->name('cliente.index');

//formulario de criação 
Route::get('/criar-cliente', [ClienteController::class, 'criar'])->name('cliente.criar');

//mostra resultado
Route::get('/mostrar-cliente', [ClienteController::class, 'mostrar'])->name('cliente.mostrar');

//salvar no banco de dados 
Route::post('/store-cliente', [ClienteController::class, 'store'])->name('cliente.store');

