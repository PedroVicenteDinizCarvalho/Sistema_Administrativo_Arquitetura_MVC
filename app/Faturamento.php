<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faturamento extends Model
{
   protected $fillable = [
   	'id',
   	'cliente_id',
   	'projeto_id',
   	'projeto_parcelas',
   	'valor',
   	'parcelasPagas',
   	'metodoPagamento',
   	'pagamentoPendente'
   ];

   protected $table = 'faturamentos';

   public function cliente(){
   	return $this->belongsTo(Cliente::class, 'cliente_id');
   }

   public function projeto(){
   	return $this->belongsTo(Projeto::class, 'projeto_id');
   }
}
