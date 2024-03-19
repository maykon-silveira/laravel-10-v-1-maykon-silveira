<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

   //listagem de clientes
   public function index(Request $request)
   {
    
     //busca a partir do termo de pesquisa
     $termoDePesquisa = $request->input('pesquisa');
     
     //buscar informações do nosso BD
     $cliente = Cliente::where('nome', 'like', '%' . $termoDePesquisa . '%')
     ->orWhere('cpf', 'like', '%' . $termoDePesquisa . '%')
     ->orWhere('email', 'like', '%' . $termoDePesquisa . '%')
     ->orderByDesc('created_at')
     ->paginate(3)
     ->withQueryString();

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
     return redirect()->route('cliente.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
   }


   //visualizar o dados a partir do id do cliente
   public function editar(Cliente $cliente)
   {
      return view('cliente/editar', ['cliente' => $cliente]);
   }

   //alterar os dados do cliente a partir do nosso ID
   public function update(ClienteRequest $request, Cliente $cliente)
   {

     //validar os campos 
     $request->validated();

     //edita as informações no banco de dados 
     $cliente->update([
      'nome' => $request->nome,
      'fone' => $request->fone,
      'email' => $request->email,
      'cpf' => $request->cpf,
      'nascimento' => $request->nascimento,
     ]);
    
     //redirecionamento 
     return redirect()->route('cliente.index')->with('sucesso', 'Cliente atualizado com sucesso!');
      
   }

   public function destroy(Cliente $cliente)
   {
     $cliente->delete();

      //redirecionamento 
      return redirect()->route('cliente.index')->with('sucesso', 'Cliente excluído com sucesso!');
      
   }
}
