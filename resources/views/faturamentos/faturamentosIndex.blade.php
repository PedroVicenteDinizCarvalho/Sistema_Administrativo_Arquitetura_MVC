@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1> Faturamentos </h1>
	</div>
	@foreach($faturamentos as $faturamento)
	<div class="card" style="width: 18rem;">
		<div class="card-header">
			<i class="material-icons">attach_money</i>
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
	@endforeach
@endsection