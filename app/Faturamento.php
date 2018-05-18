<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faturamento extends Model
{
   protected $fillable = [
   	'id',
      'projeto_id',
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
}
