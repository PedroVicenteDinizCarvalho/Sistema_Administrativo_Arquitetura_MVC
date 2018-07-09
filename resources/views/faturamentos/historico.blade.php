@extends('template.app')

@section('content')
	<h1>Histórico de Faturas</h1>
	<table class="table table-striped table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Cliente</th>
	      <th scope="col">Projeto</th>
	      <th scope="col">Total de Parcelas</th>
	      <th scope="col">Valor Projeto</th>
	      <th scope="col">Parcelas Faturadas</th>
	      <th scope="col">Valor Faturamento</th>
	      <th scope="col">Metodo Pagamento</th>
	      <th scope="col">Data do Faturamento</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($historicos as $historico)
		    <tr>
		      <th scope="row">{{$historico->id}}</th>
		      <td>{{$historico->cliente_id}}</td>
		      <td>{{$historico->nome_projeto}}</td>
		      <td>{{$historico->numeroParcelas}}</td>
		      <td>{{$historico->valor}}</td>
		      <td>{{$historico->parcelasFaturadas}}</td>
		      <td>{{$historico->valorFaturamento}}</td>
		      <td>{{$historico->metodoPagamento}}</td>
		      <td>{{$historico->created_at}}</td>
		    </tr>
	    @endforeach
	  </tbody>
</table>
@endsection