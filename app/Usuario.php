<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
    	'id',
    	'nome',
    	'email',
    	'senha'
    ];

    protected $table = 'usuarios'; 
}
