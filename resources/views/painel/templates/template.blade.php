<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>{{$titulo or 'Curso de Laravel 5.2'}}</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script type="text/javascript" src="{{url('assets/all/js/jquery-3.2.0.min.js')}}"></script>

</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<!-- Modal Delete-->
	<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Confirmação Deletar</h4>
				</div>
				
				<div class="modal-body">
					<div class="errors-msg-delete alert alert-danger" style="display: none;"></div>
					<div class="success-msg-delete alert alert-success" style="display: none;"></div>

					<p class="msg-delete">Deletar Informação?</p>
					
					<input type="hidden" class="token" value="{{csrf_token()}}">
					<input type="hidden" id="urlDeletar" value="">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-danger btn-confirm-delete">Deletar</button>
				</div>
				
			</div>
		</div>
	</div>	

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	<script type="text/javascript">
		$(function(){
			jQuery("#form").submit(function(){
				var dadosForm = jQuery(this).serialize();<!-- serialize captura todos os dados formulário -->

				jQuery.ajax({
					url: jQuery(this).attr('attr-send'),
					data: dadosForm,
					method: 'POST'
				}).done(function(data){ <!-- retorno metodo -->
					if ( data == "1" ){
						jQuery(".errors-msg").hide();

						jQuery(".success-msg").html("Sucesso!");
						jQuery(".success-msg").show();

						setTimeout("location.reload();", 3000);
					}else{
						jQuery(".errors-msg").html(data);
						jQuery(".errors-msg").show();
					}
				}).fail(function(){
					alert('Falha ao enviar dados');
				});

				return false; <!-- para o formulario não seja submetido -->
			});


			jQuery(".btn-cadastrar").click(function(){

				jQuery("#form").attr("attr-send", urlAdd);
				jQuery("#form").attr("action", urlAdd);

				jQuery("form").each(function(){

					this.reset();

				});

			});

		});

		function edit(urlEditar){

			jQuery.getJSON(urlEditar, function(data){

				jQuery.each(data, function(key, val){
					jQuery("*[name='"+key+"']").val(val);
				});

				jQuery("#form").attr("attr-send", urlEditar);
				jQuery("#form").attr("action", urlEditar);

			});

			jQuery("#myModal").modal("show");

			return false;
		}

		function deletar(urlDeletar){

			jQuery("#urlDeletar").val(urlDeletar);

			jQuery("#modalDelete").modal();
		}

		jQuery(".btn-confirm-delete").click(function(){

				//pega url de deletar
				var urlDelete = jQuery("#urlDeletar").val();

				//pega o campo de csrf_field
				var csrf = jQuery(".token").val();

				jQuery.ajax({

					url: urlDelete,
					method: 'POST',
					data: {'_token': csrf},

			}).done(function(data){
				if ( data == "1" ){
					jQuery(".errors-msg").hide();

					jQuery(".success-msg-delete").html("Deletado com Sucesso!");
					jQuery(".success-msg-delete").show();

					setTimeout("location.reload();", 1000);
				}else{
					jQuery(".errors-msg-delete").html(data);
					jQuery(".errors-msg-delete").show();
				}
			}).fail(function(){
				alert('Falha ao enviar dados');
			});

		});

	</script>

</body>
</html>