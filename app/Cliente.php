<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   protected $fillable = [
   		'id',
   		'nome',
   		'tipoCliente',
   		'nomeResponsavel',
   		'tipoDocumento',
   		'documento',
   		'dddTelefone',
         'foneTelefone',
   		'email'
   ];

   protected $table = 'clientes';
//Relação com Projetos
   public function projetos(){
      return $this->hasMany(Projeto::class, 'cliente_id');
   }
//Relação com Faturamentos
   public function faturamentos(){
      return $this->hasMany(Faturamento::class, 'cliente_id');
   }
//Critério de busca por Letra
   public static function clientesLetra($letra)
   {
      return static::where('nome', 'LIKE', $letra . '%')->get();
   }
//Critério de Busca
   public static function busca($criterio)
   {
      return static::where('nome', 'LIKE', '%' . $criterio . '%')->get();
   }
}
