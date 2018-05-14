<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Projeto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProjetosController extends Controller
{
   private $projeto;
   public function __construct()
   {
      $this->projeto = new Projeto();
   }

   public function projetos()
   {
   	$list_projetos=Projeto::all();
   	return view('projetos.ProjetosIndex', [
   		'projetos' => $list_projetos
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

   	Projeto::create($request->all());
   	return redirect('/home/projetos')->with('message', "Projeto criado com sucesso!");
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
