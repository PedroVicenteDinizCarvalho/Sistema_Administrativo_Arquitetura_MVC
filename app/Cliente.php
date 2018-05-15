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

   public function projetos(){
      return $this->hasMany(Projeto::class, 'cliente_id');
   }

   public function faturamento(){
      return $this->hasMany(Faturamento::class, 'cliente_id');
   }

   public static function clientesLetra($letra)
   {
      return static::where('nome', 'LIKE', $letra . '%')->get();
   }

   public static function busca($criterio)
   {
      return static::where('nome', 'LIKE', '%' . $criterio . '%')->get();
   }
}
