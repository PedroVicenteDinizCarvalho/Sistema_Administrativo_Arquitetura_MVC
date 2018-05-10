@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1> Adicionar Cliente </h1>
	</div>
	<div class="col-md-6 well">
		<form action="{{ url('home/criarCliente') }}" method="POST">
			{{ csrf_field() }}
				<div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
					<label for="nome" class="control-label"><h6>Nome:</h6></label>
					<input type="text" value="{{ old('nome') }}" name="nome" id="nome" class="form-control" placeholder="nome:">
					@if($errors->has('nome'))
						<span class="help-block">
							{{ $errors->first('nome') }}
						</span>
					@endif
				</div>
				<div class="form-group col-md-12">
					<label for="tipoCliente" class="control-label"><h6>Tipo de Cliente:</h6></label>
					<input type="text" name="tipoCliente" id="tipoCliente" class="form-control" placeholder="Empresa, Pessoa Física, Outros">
				</div>
				<div class="form-group col-md-12">
					<label for="nomeResponsavel"><h6>Responsável:</h6></label>
					<input type="text" name="nomeResponsavel" id="nomeResponsavel" class="form-control" placeholder="Responsável pelo Projeto">
				</div>
				<div class="form-group col-md-12">
					<label><h6 style="margin-top: 10px;">Selecione o melhor documento</h6></label>
					<p><label for="tipoDocumento1">
						<input type="radio" id="tipoDocumento1" name="tipoDocumento" value="CPF">
						<span>CPF</span>
					</label></p>
					<p><label for="tipoDocumento2">
						<input type="radio" id="tipoDocumento2" name="tipoDocumento" value="RG">
						<span>RG</span>
					</label></p>
					<p><label for="tipoDocumento3">
						<input type="radio" id="tipoDocumento3" name="tipoDocumento" value="Empresas">
						<span>Empresas</span>
					</label></p>
				</div>
				<div class="form-group col-md-12 {{ $errors->has('documento') ? 'has-error' : '' }}">
					<label for="documento"><h6>Documento:</h6></label>
					<input type="text" name="documento" id="documento" class="form-controll" placeholder="Digite o documento" value="{{ old('documento') }}"><br/>
					@if($errors->has('documento'))
						<span class="help-block">
							{{ $errors->first('documento') }}
						</span>
					@endif
				</div>
				<div class="form-group col-md-4 {{ $errors->has('dddTelefone') ? 'has-error' : '' }}">
					<label for="dddTelefone"><h6>DDD:</h6></label>
					<input type="text" name="dddTelefone" id="dddTelefone" class="form-controll" placeholder="DDD" value="{{ old('dddTelefone') }}">
					@if($errors->has('dddTelefone'))
						<span class="help-block">
							{{ $errors->first('dddTelefone') }}
						</span>
					@endif
				</div>
				<div class="form-group col-md-8 {{ $errors->has('foneTelefone') ? 'has-error' : '' }}">
					<label for="foneTelefone"><h6>Fone:</h6></label>
					<input type="text" name="foneTelefone" id="foneTelefone" class="form-controll" placeholder="Ex:. 99999-9999" value="{{ old('foneTelefone') }}">
					@if($errors->has('foneTelefone'))
						<span class="help-block">
							{{ $errors->first('foneTelefone') }}
						</span>
					@endif
				</div>
				<div class="form-group col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email"><h6>E-Mail:</h6></label>
					<input type="text" name="email" id="email" class="form-controll" placeholder="Ex:. fulano@hostemail.com" value="{{ old('email') }}">
					@if($errors->has('email'))
						{{ $errors->first('email') }}
					@endif
				</div>

				<div class="form-group col-md-12">
					<h4> Projeto </h4>
					<label for="tipo"><h6>Tipo de Projeto:</h6></label>
					<input type="text" name="tipo" id="tipo" class="form-controll" placeholder="Site, Software, Design Gráfico">
				</div>
				<div class="form-group col-md-12 {{ $errors->has('nomeProjeto') ? 'has-error' : '' }}">
					<label for="nomeProjeto"><h6>Nome do Projeto:</h6></label>
					<input type="text" name="nomeProjeto" id="nomeProjeto" class="form-controll" value="{{ old('nomeProjeto') }}">
					@if($errors->has('nomeProjeto'))
						{{ $errors->first('nomeProjeto') }}
					@endif
				</div>
				<div class="form-group col-md-12 {{ $errors->has('prazoEntrega') ? 'has-error' : '' }}">
					<label for="prazoEntrega"><h6>Prazo de Entrega:</h6></label>
					<input type="number" name="prazoEntrega" id="prazoEntrega" class="form-controll" placeholder="1"><br/>
					@if($errors->has('prazoEntrega'))
						{{ $errors->first('prazoEntrega') }}
					@endif
				</div>
				<div class="form-group col-md-12">
					<p><label for="tipoPrazoEntrega1">
						<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega1" value="dias">
						<span>Dias</span>
					</label></p>
					<p><label for="tipoPrazoEntrega2">
						<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega2" value="Meses">
						<span>Meses</span>
					</label></p>
					<p><label for="tipoPrazoEntrega3">
						<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega3" value="Anos">
						<span>Anos</span>
					</label></p>
					<p><label for="tipoPrazoEntrega4">
						<input type="radio" name="tipoPrazoEntrega" id="tipoPrazoEntrega4" value="Contrato">
						<span>Contrato</span>
					</label></p><br/>
				</div>
				<div class="form-group col-md-12 {{ $errors->has('valor') ? 'has-error' : '' }}">
					<label for="valor"><h6>Valor:</h6></label>
					<input type="number" name="valor" id="valor" class="form-controll" placeholder="1000">
					@if($errors->has('valor'))
						{{ $errors->first('valor') }}
					@endif
				</div>
				<div class="form-group col-md-12">
					<label for="metodoPagamento"><h6>Método de Pagamento:</h6></label>
					<p><label for="metodoPagamento1">
						<input type="radio" name="metodoPagamento" id="metodoPagamento1" value="Crédito">
						<span>Crédito</span>
					</label></p>
					<p><label for="metodoPagamento2">
						<input type="radio" name="metodoPagamento" id="metodoPagamento2" value="Dinheiro">
						<span>Dinheiro</span>
					</label></p>
					<p><label for="metodoPagamento3">
						<input type="radio" name="metodoPagamento" id="metodoPagamento3" value="Cheque">
						<span>Cheque</span>
					</label></p>
				</div>
				<div class="form-group col-md-12">
					<label for="parcelasPagamento"><h6>Parcelas de Pagamento:</h6></label>
					<input type="number" name="parcelasPagamento" id="parcelasPagamento" class="form-control" placeholder="(1 Caso seja à vista)" max="42">
						<p><label for="tipoParcelasPagamento1">
							<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento1" value="dias">
							<span>Dias</span>
						</label></p>
						<p><label for="tipoParcelasPagamento2">
							<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento2" value="Meses">
							<span>Meses</span>
						</label></p>
						<p><label for="tipoParcelasPagamento3">
							<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento3" value="Anos">
							<span>Anos</span>
						</label></p>
						<p><label for="tipoParcelasPagamento4">
							<input type="radio" name="tipoParcelasPagamento" id="tipoParcelasPagamento4" value="aVista">
							<span>À Vista</span>
						</label></p>
				</div>
				<button type="submit" class="btn btn-primary" style="float: right;">Adicionar</button>
		</form>
	</div>
@endsection