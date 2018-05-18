@extends('template.app')

@section('content')
	<div class="col-md-12 row">
		<h1 class="col-md-9">Projetos</h1>
		 <form class="form-inline col-md-3">
		 	{{ csrf_field() }}
      		<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search" name="criterio">
      		<button class="btn btn-primary" type="submit"><i class="material-icons">search</i></button>
    	</form>
	</div>
	<div class="row">
		@foreach($projetos as $projeto)
		 <div class="col-md-4" style="margin-top: 5px;">
	 		<div class="card">
	 			<div class="card-header">
					<i class="material-icons">folder</i>
  					<h5 class="card-title">{{ $projeto->nome }}</h5>
	 			</div>
	 			<!-- Link para área de edição -->
	 			<a href="{{ url("home/projetos/$projeto->id/editar") }}" class="btn btn-primary">Editar <i class="material-icons">edit</i></a>
	 			<!--Link para Excluir projeto-->
	 			<a style="margin-top: 5px;" href="{{ url("home/projetos/$projeto->id/deletar") }}" class="btn btn-primary">Deletar <i class="material-icons">delete</i></a>
	 			<!--Link Para Faturar Projeto-->
	 			<a style="margin-top: 5px;" href="{{ url("home/projetos/$projeto->id/faturar") }}" class="btn btn-primary">Faturar<i class="material-icons">attach_money</i></a>
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