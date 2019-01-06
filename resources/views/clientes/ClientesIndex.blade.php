@extends('template.app') 

@section('content')
  <div class="col-md-12 row">
    <h1 class="col-md-9"> Clientes </h1>

<!-- -------------- Formulário de Busca ---------------- -->
      <div class="col-md-3">
        <form action="{{ url('home/clientes/busca') }}" method="POST">
          {{ csrf_field() }}
          <input name="criterio" type="text" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="material-icons">search</i></button>
          </span>
        </form>
      </div>  
  </div>
<!-- Seleção de criterio por letra -->
  <div class="col-sm-12 row">
    <div class="btn-group btn-group-justified">
      @foreach(range('A', 'Z') as $letra)
        <a href="{{ url('home/clientes/criterio/' . $letra) }}" class="btn btn-primary">
          {{ $letra }}
        </a>
      @endforeach
    </div>
  </div>

<!-- Adicionar Cliente -->
  <div class="col-md-12">
    <button class="btn btn-primary"><a style="color: #fff" href="{{ url('home/clientes/adicionar') }}"> Adicionar Clientes <i class="material-icons">add</i></a></button>
  </div>
  
<!-- Lista Clientes -->
	<div class="row" style="margin-top: 50px;">
		@foreach($clientes as $cliente)
		<div class="col-sm-6" style="margin-top: 5px;">
			 <div class="card">
          <div class="card-header">
            <i class="material-icons">assignment_ind</i>
            <h5 class="card-title">{{ $cliente->nome }}</h5>
          </div>
          <a style="margin-bottom: 5px;" href="{{ url("home/clientes/$cliente->id/deletar") }}" class="btn btn-primary">
            <strong>Deletar</strong>
            <i class="material-icons">delete</i>
          </a>
          <a style="float: right;" href="{{ url("home/clientes/$cliente->id/editar") }}" class="btn btn-primary">
            <strong>Editar</strong>
            <i class="material-icons">edit</i>
          </a>
  				<div class="card-body">
    				<p class="card-text">Dados do Cliente:</p>
    				<h6><strong>Tipo:</strong></h6><h6>{{ $cliente->tipoCliente }}</h6>
    				<h6><strong>Responsável:</strong></h6><h6>{{ $cliente->nomeResponsavel }}</h6>
    				<h6><strong>Documento:</strong></h6><h6>[ {{ $cliente->tipoDocumento}} ]: {{ $cliente->documento }}</h6>
    				<h6><strong>Telefone:</strong></h6><h6>({{ $cliente->dddTelefone }})-{{ $cliente->foneTelefone }}</h6>
    				<h6><strong>Email:</strong></h6><h6>{{ $cliente->email }}</h6>
    				<h6>Cliente Desde:<strong></strong></h6><h6>{{ $cliente->created_at}}</h6>
            <h6><strong>Projetos do Cliente:</strong></h6>
        <!-- Tabela com Projetos e Pendências do Cliente -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Projetos</th>
                  <th scope="col">Pendências</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    @foreach($cliente->projetos as $projeto)
                      {{ $projeto->nome }}<br/>
                    @endforeach
                  </td>
                  <td>
                    @foreach($cliente->faturamentos as $faturamento)
                      @if($faturamento->numeroParcelas === $faturamento->parcelasPagas)
                        <p><strong><i class="material-icons">money_off</i></strong></p>
                      @endif
                      @if($faturamento->numeroParcelas > $faturamento->parcelasPagas)
                        <p><strong><i class="material-icons">monetization_on</i></strong></p>
                      @endif
                    @endforeach
                  </td>
                </tr>
              </tbody>
            </table>
  				</div>
			 </div>
		</div>
		@endforeach  
	</div>
@endsection