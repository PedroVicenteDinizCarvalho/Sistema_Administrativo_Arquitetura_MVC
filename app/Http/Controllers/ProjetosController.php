<?php

namespace App\Http\Controllers;

use APP\Projeto;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
   public function projetos()
   {
   	return view('projetos.ProjetosIndex');
   }
}
