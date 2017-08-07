<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Upload de Image Laravel</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	</head>
	<body>

		<div class="container">
		
			<h1>Form Upload Image</h1>

			@if ( Session::has('success') )
				<div class="alert alert-success">
					{{Session::get('success')}}
				</div>
			@endif

			@if ( isset($errors) && count($errors) > 0 )
				<div class="alert alert-danger"> 
				@foreach($errors->all() as $error)
					{{$error}}<br/>
				@endforeach
				</div>
			@endif

			<form method="POST" action="/upload-image" enctype="multipart/form-data" class="form">
				{{csrf_field()}}
				<div class="form-group">
				<input type="file" name="file" class="form-control">
				</div>
				<input type="submit" name="enviar" value="Upload" class="btn btn-success">
			</form>

		</div>

	</body>
</html>