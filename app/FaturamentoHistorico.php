<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaturamentoHistorico extends Model
{
 protected $fillable = [
   	'id',
      'cliente_id',
      'projeto_id',
      'nome_projeto',
      'numeroParcelas',
      'valor',
      'parcelasFaturadas',
      'valorFaturamento',
      'metodoPagamento'
   ];

   protected $table = 'faturamentos_historico';

   //Relação com Projeto
   	public function projeto(){
   		return $this->hasMany(Projeto::class, 'id');
   	}
//Relação com Cliente
   	public function cliente(){
      	return $this->belongsTo(Cliente::class, 'cliente_id');
   	}    
}
