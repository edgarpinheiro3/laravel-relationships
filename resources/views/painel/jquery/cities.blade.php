@extends('painel.templates.template')


@section('content')

<h1>
  <a href="{{url('/states')}}">
  <span class="glyphicon glyphicon-backward" aria-hidden="true"></span>
  </a>
  Cidades do Estado: <b>{{$state->name}}</b>
</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg btn-cadastrar" data-toggle="modal" data-target="#myModal">
  Cadastrar
</button>
<br/>
<br/>

<table class="table table-striped">
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th width="100px">Ações</th>
	</tr>

	@forelse( $cities as $city)
	<tr>
		<td>{{$city->id}}</td>
		<td>{{$city->name}}</td>
		<td>
			<a href="#" onclick='edit("/editar-city/{{$city->id}}")' class="btn">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>
      <a href="#" onclick='deletar("/deletar-city/{{$city->id}}")' class="btn">
        <span class="glyphicon glyphicon-trash"></span>  
      </a>
		</td>
	</tr>
	@empty
	<p>Não exitem Cidades para o <b>Estado de {{$state->name}}</b></p>
	@endforelse
</table>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gestão Cidades</h4>
      </div>
      <div class="modal-body">
      	<div class="errors-msg alert alert-danger" style="display: none;"></div>
		    <div class="success-msg alert alert-success" style="display: none;"></div>
		
        <form class="form" method="POST" action="/cadastrar-city" id="form" attr-send="/cadastrar-city">
        	{{csrf_field()}}
        	<input type="hidden" name="state_id" value="{{$state->id}}">
        	<div class="form-group">
        		<input type="text" name="name" placeholder="Insira o Nome da Cidade" class="form-control">
        	</div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
  var urlAdd = '/cadastrar-city';

</script>

@endsection