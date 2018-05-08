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
      			ID:{{ $projeto->id }} _\|/_
      			Nome:{{ $projeto->nome }}<br/>
      		@endforeach
      	</td>
      <td></td>
    </tr>
  @endforeach
  </tbody>
</table>
	
@endsection