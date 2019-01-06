@extends('template.app')

@section('content')
	<h1>Painel Administrativo</h1>
	<nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link" href="{{ url('home/administrativo/listaEmail') }}">Lista de Email</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="{{ url('home/administrativo/notificarClientes') }}">Notificar Clientes</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="{{ url('home/administrativo/ClientesAniversariantes') }}">Aniversariantes</a>            
  </nav>
@endsection