@extends('template.app')

@section('content')
	{{ var_dump($dadosFaturamento) }}
	{{ var_dump($valorDaParcela) }}
	{{ var_dump($totalFatura) }}
	<form action="{{ url('home/faturamentos/finalizarFaturamento') }}" method="POST">
		{{ csrf_field() }}
		<input type="number" name="id" value="{{$id}}">
		<input type="number" name="projeto_id" value="{{$projeto_id}}">
		<input type="number" name="cliente_id" value="{{$cliente_id}}">
		
		<input type="number" name="parcelasPagas" value="{{$parcelasPagas}}">
		<input type="text" name="metodoPagamento" value="{{$metodoPagamento}}">
		<input type="number" value="{{$numeroParcelasPagar}}">
		<input type="number" value="{{$valorDaParcela}}" max="{{$valorDaParcela}}" min="{{$valorDaParcela}}">
		<input type="number" value="{{$totalFatura}}" max="{{$totalFatura}}" min="{{$totalFatura}}">
		<button type="submit" class="btn btn-primary">Finalizar Faturamento</button>
	</form>
@endsection