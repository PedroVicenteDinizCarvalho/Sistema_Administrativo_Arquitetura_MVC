@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1>Projetos</h1>
	</div>
	<div class="row">
		@foreach($projetos as $projeto)
		 <div class="col-sm-3" style="margin-top: 5px;">
	 		<div class="card">
	 			<div class="card-header">
					<i class="material-icons">folder</i>
  					<h5 class="card-title">{{ $projeto->nome }}</h5>
	 			</div>
	 			<a href="{{ url("home/projetos/$projeto->id/editar") }}" class="btn btn-primary">Editar <i class="material-icons">edit</i></a>
  				<div class="card-body">
    				<p class="card-text">Dados do Projeto:</p>
    				<h6><strong>Tipo de Projeto:</strong></h6><h6>{{ $projeto->tipo }}</h6>
    				<h6><strong>Prazo de Entrega:</strong></h6><h6>{{ $projeto->prazoEntrega }} - {{ $projeto->tipoPrazoEntrega }}</h6>
    				<h6><strong>Valor:</strong></h6><h6>R${{ $projeto->valor }}</h6>
    				<h6><strong>Método de Pagamento:</strong></h6><h6>{{ $projeto->metodoPagamento }}</h6>
    				<h6><strong>Parcelas de Pagamento:</strong></h6><h6>{{ $projeto->parcelasPagamento}} - {{ $projeto->tipoParcelasPagamento }}</h6>
    				<h6><strong>Cliente:</strong></h6><h6>{{ $projeto->cliente_id }}</h6>
  				</div>
	 		</div>
		 </div>
		@endforeach
	</div>
@endsection