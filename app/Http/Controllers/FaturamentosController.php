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

    public function __construct()
    {
        $this->faturamento = new Faturamento();
    }

    public function criarFaturamento(Faturamento $faturamento)
    {
        try{
            $faturamento->save();
        }catch(\Exception $e){ 
            return "ERRO: " . $e->getMessage();
        }

    }

    public function faturamentos()
    {
    	$list_faturamentos=Faturamento::all();
    	return view('faturamentos.faturamentosIndex', [
    		'faturamentos' => $list_faturamentos->all()
    	]);	
    }

    public function faturaProjeto(Request $request)
    {
    	$faturamento=Faturamento::create($request->all());
    	return redirect('/home/faturamentos');
    }

    public function faturarOutraParcela($projeto_id)
    {
        return view('faturamentos/pagamentoFatura', [
            'faturamento' => $this->getFaturamento($projeto_id)
        ]);
    }

    public function confirmarPagamento(Request $request)
    {
        $id = $request->id;
        $cliente_id = $request->cliente_id;
        $projeto_id = $request->projeto_id;
        $nome_projeto = $request->nome_projeto;
        $numeroParcelas = $request->numeroParcelas;
        $valor = $request->valor;
        $parcelasPagas = $request->parcelasPagas + $request->numeroParcelasPagar;
        $metodoPagamento = $request->metodoPagamento;
        $numeroParcelasPagar = $request->numeroParcelasPagar;
        $valorDaParcela = $request->valor / $request->numeroParcelas;
        $totalFatura = $valorDaParcela * $request->numeroParcelasPagar;
        return view('faturamentos/confirmarFatura', [
            'dadosFaturamento' => ($request->all()),
            'id' => $id,
            'cliente_id' => $cliente_id,
            'projeto_id' => $projeto_id,
            'nome_projeto' => $nome_projeto,
            'numeroParcelas' => $numeroParcelas,
            'valor' => $valor,
            'parcelasPagas' => $parcelasPagas,
            'numeroParcelasPagar' => $numeroParcelasPagar,
            'metodoPagamento' => $metodoPagamento,
            'valorDaParcela' => $valorDaParcela,
            'totalFatura' => $totalFatura
        ]);
    }

    public function finalizarFaturamento(Request $request)
    {
        $faturamento = $this->getFaturamentoId($request->id);
        $faturamento->update($request->all());
        return redirect('home/faturamentos');
    }

    private function getFaturamentoId($id)
    {
        return $this->faturamento->find($id);
    }

    private function getFaturamento($projeto_id)
    {
        return $this->faturamento->find($projeto_id); 
    }
}
