<select id="state">
	<option>Escolha o Estado...</option>
	@foreach($states as $state)
		<option value="{{$state->id}}">{{$state->name}}</option>
	@endforeach
</select>

<select id="cities" disabled="disabled">
	<option>Selecione o Estado primeiro...</option>
</select>

<script type="text/javascript" src="{{url('assets/all/js/jquery-3.2.0.min.js')}}"></script>

<script type="text/javascript">
	$(function(){

		jQuery("#state").change(function(){
			
			var idState = jQuery(this).val();

			jQuery("#cities").empty();

			jQuery.getJSON("/cities/"+idState, function(data){

				jQuery.each(data, function(key, value){
					jQuery("#cities").append("<option value="+value.id+">"+value.name+"</option>");
				});

			});

			jQuery("#cities").attr("disabled", false);

		});

	});
</script>