@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1> Adicionar Projeto </h1>
	</div>
	<div class="col-md-6 well">
		<form action="{{ url('home/criarProjeto') }}" method="POST">
			{{ csrf_field() }}
			<div class="form-group col-md-12">
				<label for="tipo" class="control-label">Tipo de Projeto:</label>
				<input type="text" name="tipo" id="tipo" class="form-control" placeholder="Site, Software, Consultoria" Required>
				<label for="nome">Nome do Projeto:</label>
				<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do Projeto" Required>
				<label for="prazoEntrega">Prazo de Entrega:</label>
				<input type="number" name="prazoEntrega" id="prazoEntrega" class="form-control" placeholder="1" max="42" Required>
				<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega1" value="dias" Required>
				<label for="tipoPrazoEntrega1">Dias</label>
				<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega2" value="Meses" Required>
				<label for="tipoPrazoEntrega2">Meses</label>
				<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega3" value="Anos" Required>
				<label for="tipoPrazoEntrega3">Anos</label>
				<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega4" value="Contrato" Required>
				<label for="tipoPrazoEntrega4">Contrato</label><br/>
				<label for="valor">Valor R$:</label>
				<input type="number" name="valor" id="valor" class="form-control" placeholder="1000" Required>
				<label for="metodoPagamento">Método de Pagamento:</label>
				<input type="radio" name="metodoPagamento" id="metodoPagamento1" value="Crédito" Required>
				<label for="metodoPagamento1">Crédito</label>
				<input type="radio" name="metodoPagamento" id="metodoPagamento2" value="Dinheiro" Required>
				<label for="metodoPagamento2">Dinheiro</label>
				<input type="radio" name="metodoPagamento" id="metodoPagamento3" value="Cheque" Required>
				<label for="metodoPagamento3">Cheque</label>
				<label for="parcelasPagamento">Parcelas de Pagamento:</label>
				<input type="number" name="parcelasPagamento" id="parcelasPagamento" class="form-control" placeholder="(1 Caso seja à vista)" max="42" Required>
				<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento1" value="dias" Required>
				<label for="tipoParcelasPagamento1">Dias</label>
				<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento2" value="Meses" Required>
				<label for="tipoParcelasPagamento2">Meses</label>
				<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento3" value="Anos" Required>
				<label for="tipoParcelasPagamento3">Anos</label>
				<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento4" value="aVista" Required>
				<label for="tipoParcelasPagamento4">À Vista</label><br/>
				<label for="cliente_id">Id do Cliente:</label>
				<input type="number" name="cliente_id" id="cliente_id" class="form-control" Required>
			</div>
				<button type="submit" class="btn btn-primary">Adicionar Projeto</button>
		</form>
	</div>
@endsection