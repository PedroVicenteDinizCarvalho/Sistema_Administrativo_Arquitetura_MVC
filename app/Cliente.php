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
}
