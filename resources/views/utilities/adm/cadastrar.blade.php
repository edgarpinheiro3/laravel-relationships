<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Upload de Arquivos</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>

	<h1>AULA YOUTUBE - Validação de Arrays Laravel 5.2 (Array Validation)</h1>
	<p>https://www.youtube.com/watch?v=55iWmNGKGg8</p>


	@if ( isset($errors) && count($errors) > 0 )
	<div class="alert alert-danger"> 
		@foreach($errors->all() as $error)
		{{$error}}<br/>
		@endforeach
	</div>
	@endif

	<form action="/adm/cadastrar" method="POST">
		{{csrf_field()}}
		<input name="grupo" placeholder="Insira o Nome do Grupo" value="{{old('grupo')}}">
		<hr/>
		<input name="name[0]" placeholder="Insira o Nome" value="{{old('name.0')}}">
		<input name="email[0]" placeholder="Insira o Email" value="{{old('email.0')}}">
		<hr/>
		<input name="name[1]" placeholder="Insira o Nome" value="{{old('name.1')}}">
		<input name="email[1]" placeholder="Insira o Email" value="{{old('email.1')}}">
		<hr/>
		<input name="name[2]" placeholder="Insira o Nome" value="{{old('name.2')}}">
		<input name="email[2]" placeholder="Insira o Email" value="{{old('email.2')}}">
		<hr/>
		<input name="name[3]" placeholder="Insira o Nome" value="{{old('name.3')}}">
		<input name="email[3]" placeholder="Insira o Email" value="{{old('email.3')}}">
		<hr/>
		<input type="submit" name="Enviar" value="Cadastrar">	
	</form>

</body>
</html>