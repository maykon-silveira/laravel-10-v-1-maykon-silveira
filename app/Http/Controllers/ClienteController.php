<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

   //listagem de clientes
   public function index()
   {
     //buscar informações do nosso BD
     $cliente = Cliente::orderByDesc('created_at')->get();

     //retorna nosso layout 
     return view('cliente/index', ['cliente' => $cliente]);
   } 

   //formulario de cadastro de clientes
   public function criar()
   {
     return view('cliente/criar');
   }

   //mostrar resultados 
   public function mostrar()
   {
     return view('cliente/mostrar');
   }

   //salvar no banco de dados 
   public function store(ClienteRequest $request)
   {

    //validar os campos 
    $request->validated();

    //salvar no banco de dados
     Cliente::create($request->all());

     //redirecionamento 
     return redirect()->route('cliente.mostrar')->with('sucesso', 'Cliente cadastrado com sucesso!');
   }


   //visualizar o dados a partir do id do cliente
   public function editar(Cliente $cliente)
   {
      return view('cliente/editar', ['cliente' => $cliente]);
   }

   //alterar os dados do cliente a partir do nosso ID
   public function update()
   {
      dd('atualizar');
   }
}
