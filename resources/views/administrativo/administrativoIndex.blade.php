@extends('template.app')

@section('content')
	<h1>Painel Administrativo</h1>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item">
        			<a class="nav-link" href="{{ url('home/administrativo/situacaoFinanceira') }}">Situação Finaceira<span class="sr-only">(current)</span></a>
      			</li>
      			<div class="nav-item">
        			<a href="{{ url('home/administrativo/notificarClientes') }}" class="nav-link">Notificar Clientes</a>
      			</div>
    		</ul>
  		</div>
	</nav>
@endsection