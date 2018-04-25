<?php

namespace App\Http\Controllers;

use APP\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
   public function clientes(){
   		return view('clientes.ClientesIndex');
   }
}
