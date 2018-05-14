@extends('template.app')

@section('content')
	<h2>Excluir Cliente</h2>
	<div class="col-md-5">
		<h5>Deseja realmente excluir o cliente?</h5>
		<div style="float: right; margin-bottom: 10px;">
			<a href="{{ url("/home/clientes") }}" class="btn btn-primary">
				<strong>Voltar</strong>
				<i style="position: relative; top: 5px;" class="material-icons">arrow_back</i>
			</a>
			<a href="{{ url("/home/clientes/$cliente->id/destroy") }}" class="btn btn-danger">
				<strong>Excluir</strong>
				<i class="material-icons">delete</i>
			</a>
		</div>
	</div>
		<div class="card col-md-8">
          <div class="card-header">
            <i class="material-icons">assignment_ind</i>
            <h5 class="card-title">{{ $cliente->nome }}</h5>
          </div>
  				<div class="card-body">
    				<p class="card-text">Dados do Cliente:</p>
    				<h6><strong>Tipo:</strong></h6><h6>{{ $cliente->tipoCliente }}</h6>
    				<h6><strong>Responsável:</strong></h6><h6>{{ $cliente->nomeResponsavel }}</h6>
    				<h6><strong>Documento:</strong></h6><h6>[ {{ $cliente->tipoDocumento}} ]: {{ $cliente->documento }}</h6>
    				<h6><strong>Telefone:</strong></h6><h6>({{ $cliente->dddTelefone }})-{{ $cliente->foneTelefone }}</h6>
    				<h6><strong>Email:</strong></h6><h6>{{ $cliente->email }}</h6>
    				<h6>Cliente Desde:<strong></strong></h6><h6>{{ $cliente->created_at}}</h6>
            		@foreach($cliente->projetos as $projeto)
              			<h6><strong>Projetos do Cliente:</strong></h6><h6>{{ $projeto->nome }}</h6>
            		@endforeach
  				</div>
		</div>
@endsection