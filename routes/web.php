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

//visualizar dados de acordo com id
Route::get('/editar-cliente/{cliente}', [ClienteController::class, 'editar'])->name('cliente.editar');

//editar informações no banco de dados
Route::put('/update-cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');

