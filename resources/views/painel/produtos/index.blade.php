@extends('painel.templates.template1')


@section('content')

<h1>Listando Produtos</h1>

<div>
	<a href="{{url("/produto/create")}}" class="btn btn-primary">Novo Produto</a>
</div>

<table class="table table-striped">
	<tr>
		<th>Cod</th>
		<th>Nome</th>
		<th width="150px">Ações</th>
	</tr>
	@forelse ( $produtos as $produto)
	<tr>
		<td>{{$produto->cod}}</td>
		<td>{{$produto->nome}}</td>
		<td>
			<a href="{{url("/produto/$produto->id/edit")}}">Editar | </a>
			<a href="{{url("/produto/$produto->id")}}">Mais</a>
		</td>
	</tr>
	@empty
	<tr>
		<td colspan="3">
			Nenhum Registro Cadastrado!
		</td>
	</tr>
	@endforelse
</table>

{!! $produtos->links() !!}

@endsection