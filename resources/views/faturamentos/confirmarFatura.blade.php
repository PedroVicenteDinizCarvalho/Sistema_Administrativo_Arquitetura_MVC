@extends('template.app')

@section('content')
	<form action="{{ url('home/faturamentos/finalizarFaturamento') }}" method="POST">
		{{ csrf_field() }}
		<input type="number" name="id" value="{{$id}}">
		<input type="number" name="cliente_id" value="{{$cliente_id}}">
		<input type="number" name="projeto_id" value="{{$projeto_id}}">
		<input type="text" name="nome_projeto" value="{{$nome_projeto}}">
		<input type="number" name="numeroParcelas" value="{{$numeroParcelas}}">
		<input type="number" name="valor" value="{{$valor}}">
		<input type="number" name="numeroParcelasPagar" value="{{$numeroParcelasPagar}}">
		<input type="number" name="totalFatura" value="{{$totalFatura}}" max="{{$totalFatura}}" min="{{$totalFatura}}">
		<input type="text" name="metodoPagamento" value="{{$metodoPagamento}}">
		<input type="number" name="parcelasPagas" value="{{$parcelasPagas}}">
		<input type="number" value="{{$valorDaParcela}}" max="{{$valorDaParcela}}" min="{{$valorDaParcela}}">
		
		<button type="submit" class="btn btn-primary">Finalizar Faturamento</button>
	</form>
@endsection