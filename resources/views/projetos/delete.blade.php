@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1>Excluir Projeto</h1>
		<div class="alert alert-danger" role="alert">
  			Deseja mesmo Excluir o Projeto?
  			<a style="float: right; margin-bottom: 10px;" href="{{ url("/home/projetos") }}" class="btn btn-primary">Voltar <i class="material-icons">arrow_back</i> </a>
			<a style="float: right; margin-bottom: 10px; margin-right: 5px;" href="{{ url("/home/projetos/$projeto->id/destroy") }}" class="btn btn-danger">Excluir <i class="material-icons">delete</i> </a>
		</div>
	</div>
		<div class="col-md-12">		
			<div class="card col-md-6" style="float: right;">
	 			<div class="card-header">
					<i class="material-icons">folder</i>
  					<h5 class="card-title">{{ $projeto->nome }}</h5>
	 			</div>
	 			<a href="{{ url("home/projetos/$projeto->id/editar") }}" class="btn btn-primary">Editar <i class="material-icons">edit</i></a>
	 			<a style="margin-top: 5px;" href="{{ url("home/projetos/$projeto->id/deletar") }}" class="btn btn-primary">Deletar <i class="material-icons">delete</i></a>
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
@endsection