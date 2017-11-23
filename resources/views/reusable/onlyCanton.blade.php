@section('cantones')	
 

<div class="form-group-1">
                    {!!Form::label('canton_1', 'Canton', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_canton" id="id_canton" class='inputselect chng'>
                        <option value="0"  >Seleccionar</option>
@foreach($cantones as $canton)

<option value="{!!$canton->id!!}" >{!!$canton->nombre!!}</option>

    @endforeach

</select>
                </div>

<div id='descripcionGeografica1'>
                    @section('descripcionGeografica')
                    @show
                    
                </div>

 
 <script>
$('#id_canton').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxDescripcion("{!!asset('/getDescripcionGeografica')!!}"+"/"+valor+"/7");
  GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/7/"+valor+"");
  $('#id_auxiliar').val(valor);
});

///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            var valor=$('#id_canton').val();
            
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/7/"+valor+"");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);
</script>   

 @endsection