@extends('template.app')

@section('content')
	<div class="col-md-12">
		<h1> Home </h1>
	</div>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>
      <th scope="col">Projeto Atual</th>
      <th scope="col">Pendências</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clientes as $cliente)
    <tr>
      <th scope="row">{{ $cliente->id }}</th>
      <td>{{ $cliente->nome }}</td>
      <td>
      	@foreach($cliente->projetos as $projeto)
      		ID: {{ $projeto->id }}
          <i class="material-icons" style="padding-right: 30px; position: relative; top: 5px;">local_cafe</i>
      		Nome: {{ $projeto->nome }}<br/>
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
    @endforeach
  </tbody>
</table>
	
@endsection