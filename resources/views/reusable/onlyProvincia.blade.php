@section('provincias')	
 

<div class="form-group-1">
                    {!!Form::label('provincia_1', 'Provincia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_provincia" id="id_provincia" class='inputselect chng'>
                        <option value="0"  >Seleccionar</option>
@foreach($provincias as $provincia)
<option value="{!!$provincia->id!!}"  >{!!$provincia->nombre!!}</option>
    @endforeach

</select>
                </div>

<div id='descripcionGeografica1'>
                    @section('descripcionGeografica')
                    @show
                    
                </div>

 <script>
$('#id_provincia').on('change', function() {
    var valor=this.value;
  
GetDataAjaxDescripcion("{!!asset('/getDescripcionGeografica')!!}"+"/"+valor+"/6");
GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/6/"+valor+"");
  $('#id_auxiliar').val(valor);
});

  ///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            var valor=$('#id_provincia').val();
            
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/6/"+valor+"");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);
</script>   







@endsection