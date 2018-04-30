@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1> Adicionar Cliente </h1>
	</div>
	<div class="col-md-6 well">
		<form action="{{ url('home/criarCliente') }}" method="POST">
			{{ csrf_field() }}
				<div class="form-group col-md-12">
					<label for="nome" class="control-label">Nome:</label>
					<input type="text" name="nome" id="nome" class="form-control" placeholder="nome:">
				</div>
				<div class="form-group col-md-12">
					<label for="tipoCliente" class="control-label">Tipo de Cliente:</label>
					<input type="text" name="tipoCliente" id="tipoCliente" class="form-control" placeholder="Empresa, Pessoa Física, Outros">
				</div>
				<div class="form-group col-md-12">
					<label for="nomeResponsavel">Responsável:</label>
					<input type="text" name="nomeResponsavel" id="nomeResponsavel" class="form-control" placeholder="Responsável pelo Projeto">
				</div>
				<div class="form-group col-md-12">
					<p style="margin-top: 10px;">Selecione o melhor documento</p>
					<input type="radio" id="tipoDocumento1" name="tipoDocumento" value="CPF">
					<label for="tipoDocumento1">CPF</label>
					<input type="radio" id="tipoDocumento2" name="tipoDocumento" value="RG">
					<label for="tipoDocumento2">RG</label>
					<input type="radio" id="tipoDocumento3" name="tipoDocumento" value="Empresas">
					<label for="tipoDocumento3">Empresas</label>
					<label for="documento">Documento:</label>
					<input type="text" name="documento" id="documento" class="form-controll" placeholder="Digite o documento"><br/>
				</div>
				<div class="form-group col-md-12">
					<label for="dddTelefone">DDD:</label>
					<input type="text" name="dddTelefone" id="dddTelefone" class="form-controll" placeholder="DDD">
					<label for="foneTelefone">Fone:</label>
					<input type="text" name="foneTelefone" id="foneTelefone" class="form-controll" placeholder="Ex:. 99999-9999">
				</div>
				<div class="form-group col-md-12">
					<label for="email">E-Mail:</label>
					<input type="text" name="email" id="email" class="form-controll" placeholder="Ex:. fulano@hostemail.com">
				</div>
				<div class="form-group col-md-12">
					<h4> Projeto </h4>
					<label for="tipo">Tipo de Projeto:</label>
					<input type="text" name="tipo" id="tipo" class="form-controll" placeholder="Site, Software etc...">
				</div>
				<div class="form-group col-md-12">
					<label for="nome">Nome do Projeto:</label>
					<input type="text" name="nome" id="nome" class="form-controll">
				</div>
				<div class="form-group col-md-12">
					<label for="prazoEntrega">Prazo de Entrega:</label>
					<input type="number" name="prazoEntrega" id="prazoEntrega" class="form-controll"><br/>
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega1" value="dias">
					<label for="tipoPrazoEntrega1">Dias</label>
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega2" value="Meses">
					<label for="tipoPrazoEntrega2">Meses</label>
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega3" value="Anos">
					<label for="tipoPrazoEntrega3">Anos</label>
					<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega4" value="Contrato">
					<label for="tipoPrazoEntrega4">Contrato</label><br/>
				</div>
				<div class="form-group col-md-12">
					<label for="valor">Valor: </label>
					<input type="number" name="valor" id="valor" class="form-controll" placeholder="1000">
				</div>
				<div class="form-group col-md-12">
					<label for="metodoPagamento">Método de Pagamento:</label>
					<input type="radio" name="metodoPagamento" id="metodoPagamento1" value="Crédito">
					<label for="metodoPagamento1">Crédito</label>
					<input type="radio" name="metodoPagamento" id="metodoPagamento2" value="Dinheiro">
					<label for="metodoPagamento2">Dinheiro</label>
					<input type="radio" name="metodoPagamento" id="metodoPagamento3" value="Cheque">
					<label for="metodoPagamento3">Cheque</label>
				</div>
				<div class="form-group col-md-12">
					<label for="parcelasPagamento">Parcelas de Pagamento:</label>
					<input type="number" name="parcelasPagamento" id="parcelasPagamento" class="form-control" placeholder="(1 Caso seja à vista)" max="42">
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento1" value="dias">
					<label for="tipoParcelasPagamento1">Dias</label>
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento2" value="Meses">
					<label for="tipoParcelasPagamento2">Meses</label>
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento3" value="Anos">
					<label for="tipoParcelasPagamento3">Anos</label>
					<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento4" value="aVista">
					<label for="tipoParcelasPagamento4">À Vista</label>
				</div>
				<button type="submit" class="btn btn-primary" style="float: right;">Adicionar</button>
		</form>
	</div>
@endsection