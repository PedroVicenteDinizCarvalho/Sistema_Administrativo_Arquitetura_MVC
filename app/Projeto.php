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

  	public function cliente(){
  		return $this->belongsTo(Cliente::class, 'cliente_id');
  	}
}
