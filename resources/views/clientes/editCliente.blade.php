@extends('template.app')

@section('content')
	
	<form action="{{ url('home/clientes/update') }}" method="POST">
		{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $cliente->id }}">
				<div class="form-group col-md-12">
					<label for="nome" class="control-label">Nome:</label>
					<input type="text" name="nome" value="{{ $cliente->nome }}" id="nome" class="form-control" placeholder="nome:">
				</div>
				<div class="form-group col-md-12">
					<label for="tipoCliente" class="control-label">Tipo de Cliente:</label>
					<input type="text" name="tipoCliente" id="tipoCliente" class="form-control" value="{{ $cliente->tipoCliente }}" placeholder="Empresa, Pessoa Física, Outros">
				</div>
				<div class="form-group col-md-12">
					<label for="nomeResponsavel">Responsável:</label>
					<input type="text" name="nomeResponsavel" id="nomeResponsavel" class="form-control" value="{{ $cliente->nomeResponsavel }}" placeholder="Responsável pelo Projeto">
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
					<input type="text" name="documento" id="documento" class="form-controll" value="{{ $cliente->documento }}" placeholder="Digite o documento"><br/>
				</div>
				<div class="form-group col-md-12">
					<label for="dddTelefone">DDD:</label>
					<input type="text" name="dddTelefone" id="dddTelefone" class="form-controll" value="{{ $cliente->dddTelefone }}" placeholder="DDD">
					<label for="foneTelefone">Fone:</label>
					<input type="text" name="foneTelefone" id="foneTelefone" class="form-controll" value="{{ $cliente->foneTelefone }}" placeholder="Ex:. 99999-9999">
				</div>
				<div class="form-group col-md-12">
					<label for="email">E-Mail:</label>
					<input type="text" name="email" id="email" class="form-controll" value="{{ $cliente->email }}" placeholder="Ex:. fulano@hostemail.com">
				</div>
				<button style="float: right" class="btn btn-primary" type="submit">Salvar</button>
	</form>
@endsection