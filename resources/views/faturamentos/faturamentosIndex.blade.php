@extends('template.app')

@section('content')
	<div class="col-md-12 row">
		<h1 class="col-md-6"> Faturamentos </h1>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
  				<ul class="navbar-nav mr-auto">
					<li class="nav nav-item">
						<a href="{{ url('home/faturamentos/analise') }}" class="nav-link">Análises</a>
					</li>
					<li class="nav nav-item">
						<a href="{{ url('home/faturamentos/historico') }}" class="nav-link">Histórico</a>
					</li>
					<li class="nav nav-item col-md-12">
						<form action="{{ url("home/faturamentos/busca") }}" method="POST" class="form-inline">
      						<input class="form-control col-md-8" type="search" placeholder="Buscar..." aria-label="Search" name="criterio">
      						<button class="btn btn-outline-success col-md-4" type="submit">Search</button>
    					</form>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row">
		@foreach($faturamentos as $faturamento)
		<div class="col-md-4">	
			<div class="card" style="width: 18rem;">
				<div class="card-header">
					<h6>Id:  {{ $faturamento->id }}</h6>
   					<p><strong>Nome do Projeto: </strong>{{$faturamento->nome_projeto}}</p>
   			<!-- Faturamentos pendente e botão para faturar -->
   					@if($faturamento->numeroParcelas === $faturamento->parcelasPagas)
						<p><strong>Pagamento COMPLETO <i class="material-icons">money_off</i></strong></p>
   					@endif
   					@if($faturamento->numeroParcelas > $faturamento->parcelasPagas)
   						<p><strong>Pagamento PENDENTE <i class="material-icons">monetization_on</i></strong></p>
						<a href="{{ url("home/faturamentos/$faturamento->projeto_id/pagar") }}" class="btn btn-primary">Faturar</a>
   					@endif
				</div>
  				<div class="card-body">
   					<p><strong>Ultima Fatura: </strong>{{ $faturamento->updated_at }}</p>
   					<p><strong>Valor das Parcelas: </strong>R${{$valorParcelas=$faturamento->valor / $faturamento->numeroParcelas}}</p>
   					<p><strong>Total de Parcelas: </strong>{{ $faturamento->numeroParcelas }}</p>
   					<p><strong>Valor do Projeto: </strong>R${{ $faturamento->valor }}</p>
   					<p><strong>Total Parcelas Pagas: </strong>{{ $faturamento->parcelasPagas}}</p>
   					<p><strong>Total Pago: </strong>R${{$totalPago=$valorParcelas * $faturamento->parcelasPagas }}</p>
   					<p><strong>À Receber: </strong>R${{$aReceber=$faturamento->valor-$totalPago}}</p>
   					<p><strong>Método ultimo Pagamento: </strong>{{ $faturamento->metodoPagamento}}</p>
  				</div>
			</div>
		</div>
		@endforeach
	</div>
<!-- Faturamentos PENDENTES -->
	<div class="row">
		<div class="col-md-9">
			<h3>Faturamentos Pendentes</h3>
		</div>
		@foreach($faturamentos as $faturamento)
			@if($faturamento->numeroParcelas > $faturamento->parcelasPagas)
				<div class="col-md-4">	
					<div class="card" style="width: 18rem;">
						<div class="card-header">
							<i class="material-icons">monetization_on</i>
							<h6>Id:  {{ $faturamento->id }}</h6>
							@foreach($faturamento->projeto as $projeto)
   								<p><strong>Nome do Projeto: </strong>{{$projeto->nome}}</p>
   							@endforeach
						</div>
  						<div class="card-body">
   							<p><strong>Ultima Fatura: </strong>{{ $faturamento->updated_at }}</p>
   							<p><strong>Valor das Parcelas: </strong>R${{$valorParcelas=$faturamento->valor / $faturamento->numeroParcelas}}</p>
   							<p><strong>Total de Parcelas: </strong>{{ $faturamento->numeroParcelas }}</p>
   							<p><strong>Valor do Projeto: </strong>R${{ $faturamento->valor }}</p>
   							<p><strong>Total Parcelas Pagas: </strong>{{ $faturamento->parcelasPagas}}</p>
   							<p><strong>Total Pago: </strong>R${{$totalPago=$valorParcelas * $faturamento->parcelasPagas }}</p>
   							<p><strong>À Receber: </strong>R${{$aReceber=$faturamento->valor-$totalPago}}</p>
   							<p><strong>Método ultimo Pagamento: </strong>{{ $faturamento->metodoPagamento}}</p>
  						</div>
					</div>
				</div>	
			@endif
		@endforeach
	</div>
@endsection