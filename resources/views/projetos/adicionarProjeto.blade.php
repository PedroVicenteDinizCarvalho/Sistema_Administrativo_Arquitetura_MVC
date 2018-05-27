@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1> Adicionar Projeto </h1>
	</div>
	<div class="col-md-6 well">
		<form action="{{ url('home/criarProjeto') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group col-md-12 {{ $errors->has('tipo') ? 'has-error' : ''}}">
				<label for="tipo" class="control-label"><h6>Tipo de Projeto:</h6></label>
				<input type="text" name="tipo" id="tipo" class="form-control" placeholder="Site, Software, Consultoria, Design Gráfico">
				@if($errors->has('tipo'))
					{{ $errors->first('tipo') }}
				@endif
			</div>
			<div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : ''}}">
				<label for="nome"><h6>Nome do Projeto:</h6></label>
				<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Projeto" value="{{ old('nome') }}">
				@if($errors->has('nome'))
					{{ $errors->first('nome') }}
				@endif
			</div>
			<div class="form-group col-md-12 {{ $errors->has('prazoEntrega') ? 'has-error' : ''}}">
				<label for="prazoEntrega"><h6>Prazo de Entrega:</h6></label>
				<input type="number" name="prazoEntrega" id="prazoEntrega" class="form-control" placeholder="1" max="42">
				@if($errors->has('prazoEntrega'))
					{{ $errors->first('prazoEntrega') }}
				@endif
			</div>
			<div class="form-group col-md-12">
				<p><label for="tipoPrazoEntrega1">
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega1" value="dias" Required>
					<span>Dias</span>
				</label></p>
				<p><label for="tipoPrazoEntrega2">
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega2" value="Meses" Required>
					<span>Meses</span>
				</label></p>
				<p><label for="tipoPrazoEntrega3">
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega3" value="Anos" Required>
					<span>Anos</span>
				</label></p>
				<p><label for="tipoPrazoEntrega4">
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega4" value="Contrato" Required>
					<span>Contrato</span>
				</label></p><br/>
			</div>
			<div class="form-group col-md-12 {{ $errors->has('valor') ? 'has-error' : ''}}">
				<label for="valor"><h6>Valor R$:</h6></label>
				<input type="number" name="valor" id="valor" class="form-control" placeholder="1000" Required>
				@if($errors->has('valor'))
					{{ $errrors->first('valor') }}
				@endif
			</div>	
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
				<div class="form-group col-md-12">
					<label for="parcelasPagamento"><h6>Parcelas de Pagamento:</h6></label>
					<input type="number" name="parcelasPagamento" id="parcelasPagamento" class="form-control" placeholder="(1 Caso seja à vista)" max="42" Required>
				</div>
				<p><label for="tipoParcelasPagamento1">
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento1" value="dias" Required>
					<span>Dias</span>
				</label></p>
				<p><label for="tipoParcelasPagamento2">
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento2" value="Meses" Required>
					<span>Meses</span>
				</label></p>
				<p><label for="tipoParcelasPagamento3">
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento3" value="Anos" Required>
					<span>Anos</span>
				</label></p>
				<p><label for="tipoParcelasPagamento4">
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento4" value="aVista" Required>
					<span>À Vista</span>
				</label></p><br/>
				<label for="entrada"><h6>Entrada N°:</h6></label>
				<input type="number" name="entrada" id="entrada" class="form-control">
				<label for="cliente_id"><h6>Id do Cliente:</h6></label>
				<input type="number" name="cliente_id" id="cliente_id" class="form-control" Required>
			</div>
				<button type="submit" class="btn btn-primary">Adicionar Projeto</button>
		</form>
	</div>
@endsection