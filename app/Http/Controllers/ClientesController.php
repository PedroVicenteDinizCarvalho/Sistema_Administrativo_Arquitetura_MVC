<?php

namespace App\Http\Controllers;

use App\Projeto;
use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
   private $projetos_controller;

   public function __construct(ProjetosController $projetos_controller)
   {
      $this->projetos_controller = $projetos_controller;
   }

   public function clientes()
   {
   	$list_clientes=Cliente::all();
   	return view('clientes.clientesIndex', [
   		'clientes' => $list_clientes
   	]);
   }

   public function pagAdicionarCliente()
   {
   	return view('clientes.adicionarCliente');
   }

   public function store(Request $request)
   {
   		$cliente = Cliente::create($request->all());
         if ($request->tipo && $request->nome && $request->prazoEntrega && $request->tipoPrazoEntrega && $request->valor && $request->metodoPagamento && $request->parcelasPagamento && $request->tipoParcelasPagamento){
            $projeto = new Projeto();
            $projeto->tipo = $request->tipo;
            $projeto->nome = $request->nome;
            $projeto->prazoEntrega = $request->prazoEntrega;
            $projeto->tipoPrazoEntrega = $request->tipoPrazoEntrega;
            $projeto->valor = $request->valor;
            $projeto->metodoPagamento = $request->metodoPagamento;
            $projeto->parcelasPagamento = $request->parcelasPagamento;
            $projeto->tipoParcelasPagamento = $request->tipoParcelasPagamento;
            $projeto->cliente_id = $cliente->id;
            $this->projetos_controller->store($projeto);
         }
   		return redirect('/home/clientes')->with('message', "Cliente criado com sucesso");
   }
}
