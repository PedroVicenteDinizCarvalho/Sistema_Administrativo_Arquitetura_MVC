<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Projeto;
use App\Cliente;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
	function index(){
		return view('home.index');
	}
}
