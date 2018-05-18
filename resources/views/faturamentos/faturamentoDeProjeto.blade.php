@extends('template.app')

@section('content')
	<div class="col-md-12 row">
		<h1 class="col-md-9"> Faturar Projeto </h1>
	</div>
	<div class="col-md-12">
		<div class="alert alert-danger">
			<h6>Faturar o projeto <strong>{{$projeto->nome}}</strong></h6>
			<a href="{{ url("home/projetos/faturar") }}"></a>
		</div>
	</div>
	<!-- Card com dados do projeto a ser faturado-->
	<div class="card" style="width: 18rem;">
  		<div class="card-header">
			<h6 class="card-title"><strong>Nome: </strong>{{$projeto->nome}}</h6>
			<h6><strong>Tipo: </strong>{{$projeto->tipo}}</h6>
  		</div>
  		<div class="card-body">
    		<form action="{{ url('home/projetos/faturar') }}" method="POST">
			{{ csrf_field() }}
				<input type="hidden" name="projeto_id" value="{{ $projeto->id }}">
				<input type="hidden" name="numeroParcelas" value="{{ $projeto->parcelasPagamento}}">
				<input type="hidden" name="valor" value="{{$projeto->valor}}">
				<div class="form-group col-md-12">
					<label for="parcelasPagas"><h6>Nº de Parcelas:</h6></label>
					<input type="number" name="parcelasPagas" id="parcelasPagas" class="form-group" placeholder="Parcelas para Faturamento" max="{{ $projeto->parcelasPagamento}}" min="1">
				</div>
				<div class="form-group col-md-12">
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
				</div>
				<button type="submit" class="btn btn-primary">Faturar<i class="material-icons">attach_money</i></button>
			</form>
		</div>
 	</div>
@endsection