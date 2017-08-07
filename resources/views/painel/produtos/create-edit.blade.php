@extends('painel.templates.template1')


@section('content')

<h1>Único Formulário Cadastrar e Editar</h1>

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

@if ( isset($produto->id))
<form method="POST" action="/produto/{{$produto->id}}" id="form" class="form">
  <input type="hidden" name="_method" value="PUT">
@else
<form method="POST" action="/produto" id="form" class="form">
@endif

	{{csrf_field()}}
   <div class="form-group">
   	<input type="text" name="nome" placeholder="Nome do Produto" class="form-control" value="@if(isset($produto->nome)){{$produto->nome}}@else{{old('nome')}}@endif">
   </div>
   <div class="form-group">
   	<input type="text" name="cod" placeholder="O Código do Produto" class="form-control" value="@if(isset($produto->cod)){{$produto->cod}}@else{{old('cod')}}@endif">
   </div>
   <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
</form>

@endsection