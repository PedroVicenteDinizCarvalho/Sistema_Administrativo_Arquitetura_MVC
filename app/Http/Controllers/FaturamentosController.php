<?php

namespace App\Http\Controllers;

use App\Faturamento;
use App\Cliente;
use App\Projeto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class FaturamentosController extends Controller
{
    private $faturamento;

    public function faturamentos()
    {
    	$list_faturamentos=Faturamento::all();
    	return view('faturamentos.faturamentosIndex', [
    		'faturamentos' => $list_faturamentos
    	]);
    }
}
