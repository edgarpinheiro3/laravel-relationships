@extends('painel.templates.template1')


@section('content')

<h1>Editar</h1>

<div>
  <a href="{{url("/produto")}}" class="btn btn-primary">Voltar</a>
</div>

@if ( isset($errors) && count($errors) > 0 )
<div class="alert alert-danger"> 
	@foreach($errors->all() as $error)
	{{$error}}<br/>
	@endforeach
</div>
@endif

<form method="POST" action="/produto/{{$produto->id}}" id="form" class="form">
  <input type="hidden" name="_method" value="PUT">
	{{csrf_field()}}
   <div class="form-group">
   	<input type="text" name="nome" placeholder="Nome do Produto" class="form-control" value="{{$produto->nome}}">
   </div>
   <div class="form-group">
   	<input type="text" name="cod" placeholder="O Código do Produto" class="form-control" value="{{$produto->cod}}">
   </div>
   <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
</form>

@endsection