<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Projeto;
use App\Faturamento;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProjetosController extends Controller
{
   private $faturamentos_controller;
   private $projeto;
   
   public function __construct(FaturamentosController $faturamentos_controller)
   {
      $this->faturamentos_controller = $faturamentos_controller;
      $this->projeto = new Projeto();
   }

   public function projetos()
   {
   	$list_projetos=Projeto::all();
   	return view('projetos.ProjetosIndex', [
   		'projetos' => $list_projetos
   	]);
   }

   public function busca($criterio)
   {
      $projetos = Projeto::buscaProjeto($request->criterio);
      return view('projetos.ProjetosIndex', [
         'projetos' => $projetos,
         'criterio' => $request->criterio
      ]);
   }

   public function home()
   {
      $list_projetos=Projeto::all();
      return view('home.index', [
         'projetos' => $list_projetos
      ]);
   }

   public function pagAdicionarProjeto()
   {
   	return view('projetos.adicionarProjeto');
   }

   public function CriaProjeto(Request $request)
   {
      $validacao = $this->validacao($request->all());
      if($validacao->fails()){
         return redirect()->back()
            ->withErrors($validacao->errors())
            ->withInput($request->all());
      }
   	$projeto = Projeto::create($request->all());
//Injeção de dependencia faturamentos
      if($request->metodoPagamento){
         $faturamento = new Faturamento();
         $faturamento->cliente_id = $request->cliente_id;
         $faturamento->projeto_id = $projeto->id;
         $faturamento->nome_projeto = $request->nome;
         $faturamento->numeroParcelas = $request->parcelasPagamento;
         $faturamento->valor = $request->valor;
         if($request->entrada){
            $faturamento->parcelasPagas = $request->entrada;
         }else{
             $faturamento->parcelasPagas = 0;
         }
         $faturamento->metodoPagamento = $request->metodoPagamento;
         $this->faturamentos_controller->criarFaturamento($faturamento);
      }
   	return redirect('/home/projetos')->with('message', "Projeto criado com sucesso");
   }

   public function store(Projeto $projeto)
   {
      try {
         $projeto->save();
      } catch (\Exception $e) {
         return "ERRO: " . $e->getMessage();
      }
   }

   public function editarView($id)
   {  
      return view('projetos.editProjeto', [
         'projeto' => $this->getProjeto($id)
      ]);
   }

   public function update(Request $request)
   {
      $validacao = $this->validacao($request->all());
      if($validacao->fails()){
            return redirect()->back()
               ->withErrors($validacao->errors())
               ->withInput($request->all());
      }
      $projeto = $this->getProjeto($request->id);
      $projeto->update($request->all());
      return redirect('home/projetos');
   }

   public function deletarView($id)
   {
      return view('projetos.delete', [
         'projeto' => $this->getProjeto($id)
      ]);
   }

   public function destroy($id)
   {
      $this->getProjeto($id)->delete();
      return redirect(url('home/projetos'));
   }

   public function faturar($id)
   {
      return view('faturamentos.faturamentoDeProjeto', [
         'projeto' => $this->getProjeto($id)
      ]);
   }

   private function validacao($data)
   {
      $regras['tipo'] = 'required';
      $regras['nome'] = 'required|min:4|max:100';
      $regras['prazoEntrega'] = 'required';
      $regras['valor'] = 'required';

      $mensagens = [
         'tipo.required' => 'Campo Tipo Obrigatório',
         'nome.required' => 'Campo Nome obrigatório',
         'nome.min' => 'Nome deve ter no mínimo 4 digitos',
         'nome.max' => 'Nome deve ter no máximo 4 digitos',
         'prazoEntrega.required' =>  'Campo Prazo de Entrega Obrigatório',
         'valor.required' => 'Campo Valor Obrigatório / Use 0 caso seja grátis'
      ];
      return Validator::make($data, $regras, $mensagens);  
   }

   protected function getProjeto($id)
   {
      return $this->projeto->find($id);
   }
}
