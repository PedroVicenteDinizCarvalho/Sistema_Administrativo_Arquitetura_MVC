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
}
