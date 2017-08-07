@extends('painel.templates.template')


@section('content')

<h1>Cadastrar Via Ajax</h1>

<div class="errors-msg alert alert-danger" style="display: none;"></div>
<div class="success-msg alert alert-success" style="display: none;"></div>

<form method="POST" action="/cadastro-jquery" id="form" class="form">
	{{csrf_field()}}
       <div class="form-group">
              <input type="text" name="name" placeholder="Nome" class="form-control">
       </div>
       <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
       </div>

       <div class="preloader" style="display: none;">Enviando dados...</div>

       
       <input type="submit" name="enviar" value="Enviar Dados" class="btn btn-success">
</form>

<script type="text/javascript">
     $(function(){
           jQuery("#form").submit(function(){
                 var dadosForm = jQuery(this).serialize(); //serialize captura todos os dados formulário

                 jQuery.ajax({
                       url: 'cadastro-jquery',
                       data: dadosForm,
                       method: 'POST',
                       beforeSend: preloader()
                }).done(function(data){ //retorno metodo
                       if ( data == "1" ){
                             jQuery(".errors-msg").hide();
                             
                             jQuery(".success-msg").html("Cadastro realizado com Sucesso!");
                             jQuery(".success-msg").show();

                             setTimeout("location.reload();", 3000);
                      }else{
                             jQuery(".errors-msg").html(data);
                             jQuery(".errors-msg").show();
                      }
               }).fail(function(){
                  alert('Falha ao enviar dados');
               }).always(function(){
                  endPreloader();
               });

               function preloader()
               {
                  jQuery(".preloader").show();
               }

               function endPreloader()
               {
                  jQuery(".preloader").hide();
               }               

               return false;
        });
    });
</script>

@endsection