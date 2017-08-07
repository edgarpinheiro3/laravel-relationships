@extends('painel.templates.template1')


@section('content')

<h1>Metodo Show - Exibir os dados do Produto - depois detroy</h1>

<div>
  <a href="{{url("/produto")}}" class="btn btn-primary">Voltar</a>
</div>

<div>
   <h2>{{$produto->cod}}</h2><br/>
   <b>{{$produto->nome}}</b><br/>
</div>

<form method="POST" action="/produto/{{$produto->id}}" id="form" class="form">
  <input type="hidden" name="_method" value="DELETE">
	{{csrf_field()}}
   <input type="submit" name="enviar" value="Deletar" class="btn btn-danger">
</form>

@endsection