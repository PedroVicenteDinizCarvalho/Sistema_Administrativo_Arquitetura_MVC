<?php

namespace App\Http\Controllers;

use App\Projeto;
use App\Cliente;
use App\Faturamento;
use App\FaturamentoHistorico;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
   private $projetos_controller;
   private $faturamentos_controller;
   private $faturamentosHistoricos_controller;
   private $cliente;

   public function __construct(ProjetosController $projetos_controller, FaturamentosController $faturamentos_controller,
      FaturamentosHistoricosController $faturamentosHistoricos_controller){
      $this->faturamentosHistoricos_controller = $faturamentosHistoricos_controller;
      $this->faturamentos_controller = $faturamentos_controller;
      $this->projetos_controller = $projetos_controller;
      $this->cliente = new Cliente();
   }

   public function clientes(){
      $list_clientes=Cliente::all();
      return view('clientes.clientesIndex', [
         'clientes' => $list_clientes
      ]);
   }

   public function clientesCriterio($letra){
      $list_clientes=Cliente::clientesLetra($letra);
      return view('clientes.clientesIndex', [
         'clientes' => $list_clientes,
         'criterio' => $letra
      ]);
   } 

   public function busca(Request $request){
      $clientes = Cliente::busca($request->criterio);
      return view('clientes.clientesIndex', [
         'clientes' => $clientes,
         'criterio' => $request->criterio
      ]);
   }

   public function home(){
      $list_clientes=Cliente::all();
      return view('home.index', [
         'clientes' => $list_clientes
      ]);
   }

   public function pagAdicionarCliente(){
   	return view('clientes.adicionarCliente');
   }

   public function store(Request $request){
      $validacao = $this->validacao($request->all());
      if($validacao->fails()){
         return redirect()->back()
         ->withErrors($validacao->errors())
            ->withInput($request->all());
      }
   	$cliente = Cliente::create($request->all());
//////Injeção de dependencia projetos////////////////////////////////////////////
      if($request->tipo && $request->nome && $request->prazoEntrega && $request->tipoPrazoEntrega && $request->valor && $request->metodoPagamento && $request->parcelasPagamento && $request->tipoParcelasPagamento){
         $projeto = new Projeto();
         $projeto->tipo = $request->tipo;
         $projeto->nome = $request->nomeProjeto;
         $projeto->prazoEntrega = $request->prazoEntrega;
         $projeto->tipoPrazoEntrega = $request->tipoPrazoEntrega;
         $projeto->valor = $request->valor;
         $projeto->metodoPagamento = $request->metodoPagamento;
         $projeto->parcelasPagamento = $request->parcelasPagamento;
         $projeto->tipoParcelasPagamento = $request->tipoParcelasPagamento;
         $projeto->cliente_id = $cliente->id;
         $this->projetos_controller->store($projeto);
/////////Injeção de dependencia faturamentos//////////////////////////////
         $faturamento = new Faturamento();
         $faturamento->cliente_id = $cliente->id;
         $faturamento->projeto_id = $projeto->id;
         $faturamento->nome_projeto = $request->nomeProjeto;
         $faturamento->numeroParcelas = $request->parcelasPagamento;
         $faturamento->valor = $request->valor;
         if($request->entrada){
            $faturamento->parcelasPagas = $request->entrada;
////////////Injeção de dependencia com Histórico de Faturamento//////////////
            $historicoFaturamento = new FaturamentoHistorico();
            $historicoFaturamento->cliente_id = $request->cliente_id;
            $historicoFaturamento->projeto_id = $projeto->id;
            $historicoFaturamento->nome_projeto = $request->nome;
            $historicoFaturamento->numeroParcelas = $request->parcelasPagamento;
            $historicoFaturamento->valor = $request->valor;
            $historicoFaturamento->parcelasFaturadas = $request->entrada;
            $historicoFaturamento->valorFaturamento = $request->valor / $request->parcelasPagamento * $request->entrada;
            $historicoFaturamento->metodoPagamento = $request->metodoPagamento;
////////////Leva os dados para o controller de Histórico de Faturamentos
            $this->faturamentosHistoricos_controller->criarFaturamentoHistorico($historicoFaturamento);
         }else{
            $faturamento->parcelasPagas = 0; 
         }
         $faturamento->metodoPagamento = $request->metodoPagamento;
         $this->faturamentos_controller->criarFaturamento($faturamento);
      }
   	return redirect('/home/clientes')->with('message', "Cliente criado com sucesso");
   }

   public function editarView($id)
   {
      return view('clientes.editCliente', [
         'cliente' => $this->getCliente($id)
      ]);
   }

   protected function getCliente($id)
   {
      return $this->cliente->find($id);
   }

   public function update(Request $request)
   {
      $validacao = $this->validacao($request->all());
      if($validacao->fails()){
         return redirect()->back()
            ->withErrors($validacao->errors())
            ->withInput($request->all());
      }

      $cliente = $this->getCliente($request->id);
      $cliente->update($request->all());
      return redirect('home/clientes');
   }

   public function deletarView($id)
   {
      return view('clientes.delete', [
         'cliente' => $this->getCliente($id)
      ]);
   }

   public function destroy($id)
   {
      $this->getCliente($id)->delete();
      return redirect(url('home/clientes'))->with('sucess', 'Excluido');
   }

   private function validacao($data)
   {
      if(array_key_exists('tipo', $data )){
         if($data['tipo']){
            $regras['nomeProjeto'] = 'required|min:4|max:100';
            $regras['prazoEntrega'] = 'required';
            $regras['valor'] = 'required';
         }
      }

      $regras['nome'] = 'required|min:4|max:100';
      $regras['documento'] = 'required|min:10|max:14';
      $regras['dddTelefone'] = 'required|min:2';
      $regras['foneTelefone'] = 'required';
      $regras['email'] = 'required';

      $mensagens = [
         'nome.required' => 'Campo Nome é Obrigatório',
         'nome.min' => 'Campo Nome deve ter no minimo 4 caracteres',
         'nome.max' => 'Campo Nome deve ter no máximo 100 caracteres',
         'documento.required' => 'Documento do reponsável pelo projeto obrigatório',
         'documento.min' => 'Documento deve ter no minimo 10 caracteres',
         'documento.max' => 'Documento deve ter no máximo 13 caracteres',
         'dddTelefone.required' => 'Campo DDD obrigatório',
         'dddTelefone.min' => 'DDD deve ter no minimo 2 caracteres',
         'foneTelefone.required' => 'Telefone para contato obrigatório',
         'email.required' => 'Email para contato obrigatório',
         'nomeProjeto.required' => 'Nome do Projeto Obrigatório',
         'nomeProjeto.min' => 'Nome do Projeto deve conter no minimo 4 caracteres',
         'nomeProjeto.max' => 'Nome do Projeto deve conter no máximo 100 caracteres',
         'prazoEntrega.required' => 'Prazo de Entrega deve ser informado',
         'valor.required' => 'Valor deve ser informado / Use 0 caso seja grátis'
      ];
      return Validator::make($data, $regras, $mensagens);
   }
}
