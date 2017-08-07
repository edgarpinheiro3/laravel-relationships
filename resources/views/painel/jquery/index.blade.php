@extends('painel.templates.template')


@section('content')

<h1>
  Estados Brasileiros
</h1>

<table class="table table-bordered">
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Ações</th>
	</tr>

	@forelse( $states as $state)
	<tr>
		<td>{{$state->id}}</td>
		<td>{{$state->name}}</td>
		<td>
			<a href="state/{{$state->id}}">Cidades</a>
		</td>
	</tr>
	@empty
	<p>Não exitem estados cadastrados</p>
	@endforelse
</table>

@endsection