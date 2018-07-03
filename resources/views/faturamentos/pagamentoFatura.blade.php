@extends('template.app') 

@section('content')
	<div class="col-md-12">
		<h1>Pagar Fatura</h1>
		<div class="alert alert-primary" role="alert">
  			<h6>Faturamento do Projeto: {{$faturamento->nome_projeto}}</h6>
  			<a href="{{ url('home/faturamentos') }}" class="btn btn-primary">Cancelar<i class="material-icons">cancel</i></a>
		</div>
	</div>
	<div class="row">
		<form class="col-md-8" action="{{ url('home/faturamentos/confirmarPagamento') }}" method="POST">
			{{ csrf_field() }}
			<input type="hidden" value="{{ $faturamento->id }}" name="id">
			<input type="hidden" value="{{ $faturamento->cliente_id }}" name="cliente_id">
			<input type="hidden" value="{{ $faturamento->projeto_id }}" name="projeto_id">
			<input type="hidden" value="{{ $faturamento->nome_projeto }}" name="nome_projeto">
			<input type="hidden" value="{{ $faturamento->numeroParcelas }}" name="numeroParcelas">
			<input type="hidden" value="{{ $faturamento->valor }}" name="valor"> 
			<input type="hidden" value="{{ $faturamento->parcelasPagas }}" name="parcelasPagas">
			<label class="col-md-9" for="numeroParcelasPagar">
				<input type="number" name="numeroParcelasPagar" id="numeroParcelasPagar" class="form-control" placeholder="Número de Parcelas para faturamento"> 
			</label>
			<label for="metodoPagamento"><h6>Método de Pagamento:</h6></label>
				<p><label for="metodoPagamento1">
					<input type="radio" name="metodoPagamento" id="metodoPagamento1" value="Crédito" Required>
					<span>Crédito</span>
				</label></p>
				<p><label for="metodoPagamento2">
					<input type="radio" name="metodoPagamento" id="metodoPagamento2" value="Dinheiro" Required>
					<span>Dinheiro</span>
				</label></p>
				<p><label for="metodoPagamento3">
					<input type="radio" name="metodoPagamento" id="metodoPagamento3" value="Cheque" Required>
					<span>Cheque</span>
				</label></p>
			<button type="submit" class="btn btn-primary">Faturar</button>
		</form>
		<div class="col-md-4">	
			<div class="card" style="width: 18rem;">
				<div class="card-header">
					<h6>Id:  {{ $faturamento->id }}</h6>
   					<p><strong>Nome do Projeto: </strong>{{$faturamento->nome_projeto}}</p>
   					@if($faturamento->numeroParcelas === $faturamento->parcelasPagas)
						<p><strong>Pagamento COMPLETO <i class="material-icons">money_off</i></strong></p>
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
	</div>
@endsection