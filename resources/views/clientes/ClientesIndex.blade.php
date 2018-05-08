@extends('template.app')

@section('content')
  <div class="col-md-12">
    <h1> Clientes </h1>    
  </div>
	<button class="btn btn-primary"><a style="color: #fff" href="{{ url('home/clientes/adicionar') }}"> Adicionar Clientes</a></button>

	<div class="row" style="margin-top: 50px;">
		@foreach($clientes as $cliente)
		<div class="col-sm-3" style="margin-top: 5px;">
			 <div class="card">
          <div class="card-header">
            <h6><span class="badge badge-secondary">{{ $cliente->id }}</span></h6>
            <h5 class="card-title">{{ $cliente->nome }}</h5>
          </div>
          <a style="float: right;" href="{{ url("home/clientes/$cliente->id/editar") }}" class="btn btn-primary">Editar</a>
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
		</div>
		@endforeach  
	</div>
@endsection