<?php

namespace App\Http\Controllers;

use APP\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
   public function index()
   {
   	return view('home.index');
   }
}
