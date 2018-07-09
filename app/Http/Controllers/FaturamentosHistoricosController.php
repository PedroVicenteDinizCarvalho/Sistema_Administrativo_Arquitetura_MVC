<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faturamento;
use App\Cliente;
use App\Projeto;
use App\FaturamentoHistorico;

use Illuminate\Support\Facades\Validator;

class FaturamentosHistoricosController extends Controller
{
	private $faturamentoHistorico;

	public function __construct()
    {
        $this->faturamentoHistorico = new FaturamentoHistorico();
    }

   	public function criarFaturamentoHistorico(FaturamentoHistorico $faturamentoHistorico)
    {
        try{
            $faturamentoHistorico->save();
        }catch(\Exception $e){ 
            return "ERRO: " . $e->getMessage();
        }
    }

    public function historico()
    {
    	$list_historico_faturas=FaturamentoHistorico::all();
    	return view('faturamentos.historico', [
    		'historicos' => $list_historico_faturas->all() 
    	]);
    }
}
