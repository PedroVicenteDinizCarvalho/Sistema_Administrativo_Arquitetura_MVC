<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faturamento extends Model
{
   protected $fillable = [
   	'id',
      'projeto_id',
      'cliente_id',
      'numeroParcelas',
      'valor',
      'parcelasPagas',
      'metodoPagamento'
   ];

   protected $table = 'faturamentos';
//Relação com Projeto
   public function projeto(){
   	return $this->hasMany(Projeto::class, 'id');
   }
//Relação com Cliente
   public function cliente(){
      return $this->belongsTo(Cliente::class, 'cliente_id');
   }
}
