@extends('painel.templates.template1')


@section('content')

<h1>Cadastro um Produto</h1>

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

<form method="POST" action="/produto" id="form" class="form">
	{{csrf_field()}}
       <!--
       <div class="form-group">
              <select name="categoria" class="form-control">
              		<option></option>
              		<option value="1">Material de Limpeza</option>
              		<option value="2">Consumo</option>
              </select>
       </div>
   -->
   <div class="form-group">
   	<input type="text" name="nome" placeholder="Nome do Produto" class="form-control">
   </div>
   <div class="form-group">
   	<input type="text" name="cod" placeholder="O Código do Produto" class="form-control">
   </div>
       <!--
       <div class="form-group">
              <input type="radio" name="tipo" value="1">Material 
              <input type="radio" name="tipo" value="2">Patrimônio 
       </div>       
       <div class="form-group">
              <input type="checkbox" name="ativo" value="1">Ativo ?
       </div>
   -->       

   <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
</form>

@endsection