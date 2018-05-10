@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h3>Editar Cliente</h3>
	</div>
	<form action="{{ url('home/clientes/update') }}" method="POST">
		{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $cliente->id }}">
				<div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
					<label for="nome" class="control-label"><h6>Nome:</h6></label>
					<input type="text" name="nome" value="{{ $cliente->nome }}" id="nome" class="form-control" placeholder="nome:">
					@if($errors->has('nome'))
						{{ $errors->first('nome') }}
					@endif
				</div>
				<div class="form-group col-md-12">
					<label for="tipoCliente" class="control-label"><h6>Tipo de Cliente:</h6></label>
					<input type="text" name="tipoCliente" id="tipoCliente" class="form-control" value="{{ $cliente->tipoCliente }}" placeholder="Empresa, Pessoa Física, Outros">
				</div>
				<div class="form-group col-md-12">
					<label for="nomeResponsavel"><h6>Responsável:</h6></label>
					<input type="text" name="nomeResponsavel" id="nomeResponsavel" class="form-control" value="{{ $cliente->nomeResponsavel }}" placeholder="Responsável pelo Projeto">
				</div>
				<div class="form-group col-md-12">
					<h6 style="margin-top: 10px;">Selecione o melhor documento</h6>
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
				<div class="form-group col-md-12 {{ $errors->has('documento') ? 'has-error' : ''}}">
					<label for="documento"><h6>Documento:</h6></label>
					<input type="text" name="documento" id="documento" class="form-controll" value="{{ $cliente->documento }}" placeholder="Digite o documento"><br/>
					@if($errors->has('documento'))
						{{ $errors->first('documento') }}
					@endif
				</div>
				<div class="form-group col-md-12 {{ $errors->has('dddTelefone') ? 'has-error' : '' }}">
					<label for="dddTelefone"><h6>DDD:</h6></label>
					<input type="text" name="dddTelefone" id="dddTelefone" class="form-controll" value="{{ $cliente->dddTelefone }}" placeholder="DDD">
					@if($errors->has('dddTelefone'))
						{{ $errors->first('dddTelefone') }}
					@endif
				</div>
				<div class="form-group col-md-12 {{ $errors->has('foneTelefone') ? 'has-error' : '' }}">
					<label for="foneTelefone"><h6>Fone:</h6></label>
					<input type="text" name="foneTelefone" id="foneTelefone" class="form-controll" value="{{ $cliente->foneTelefone }}" placeholder="Ex:. 99999-9999">
					@if($errors->has('foneTelefone'))
						{{ $errors->first('foneTelefone') }}
					@endif
				</div>
				<div class="form-group col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email"><h6>E-Mail:</h6></label>
					<input type="text" name="email" id="email" class="form-controll" value="{{ $cliente->email }}" placeholder="Ex:. fulano@hostemail.com">
					@if($errors->has('email'))
						{{ $errors->first('email') }}
					@endif
				</div>
				<button style="float: right" class="btn btn-primary" type="submit">Salvar</button>
	</form>
@endsection