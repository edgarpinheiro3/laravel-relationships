<!DOCTYPE html>
<html>
<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<form action="/tinymce" method="POST">
	{!!csrf_field()!!}
	<input type="text" name="title" placeholder="Informe o Titulo">
  	<textarea name="description"></textarea>
  	<input type="submit" name="enviar" value="Enviar">
  </form>
</body>
</html>