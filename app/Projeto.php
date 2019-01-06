<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
  		'id',
  		'tipo',
  		'nome',
  		'prazoEntrega',
  		'tipoPrazoEntrega',
  		'valor',
  		'metodoPagamento',
  		'parcelasPagamento',
  		'tipoParcelasPagamento',
      'cliente_id'
  	];

  	protected $table = 'projetos'; 
//Relação com Cliente
  	public function cliente(){
  		return $this->belongsTo(Cliente::class, 'cliente_id');
  	}
//Relação com Faturamento
    public function faturamento(){
      return $this->hasOne(Faturamento::class, 'id');
    }
//Critério de Busca
    public static function busca($criterio)
    {
      return static::where('nome', 'LIKE', '%' . $criterio . '%')->get();
    }

}
