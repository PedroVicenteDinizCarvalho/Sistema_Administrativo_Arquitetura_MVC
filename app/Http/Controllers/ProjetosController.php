<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
   public function projetos()
   {
   	$list_projetos=Projeto::all();
   	return view('projetos.ProjetosIndex', [
   		'projetos' => $list_projetos
   	]);
   }

   public function pagAdicionarProjeto()
   {
   	return view('projetos.adicionarProjeto');
   }

   //public function CriaProjeto(Request $request)
  // {
  // 	Projeto::create($request->all());
  // 	return redirect('/home/projetos')->with('message', "Projeto criado com sucesso!");
  // }

   public function store(Projeto $projeto)
   {
      try {
         $projeto->save();
      } catch (\Exception $e) {
         return "ERRO: " . $e->getMessage();
      }
   }
}
