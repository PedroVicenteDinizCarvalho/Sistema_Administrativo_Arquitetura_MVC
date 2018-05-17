<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faturamento extends Model
{
   protected $fillable = [
   	'id',
   	'faturaFinalizada',
      'projeto_id',
      'parcelasPagas',
      'metodoUltimoPagamento'
   ];

   protected $table = 'faturamentos';
//Relação com Projeto
   public function projeto(){
   	return $this->hasMany(App\Projeto);
   }
}
