@section('parroquias')	               

<div class="form-group-1">
                    {!!Form::label('parroquia_1', 'Parroquia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <!-- <select name="id_parroquia" id="id_parroquia" class='inputselect chng'> -->
                    <select name="id_parroquia" id="id_parroquia" class="input-text chng" style="height: 40px;width: 100%;">
                        
                        <option value="0"  >Seleccionar</option>
@foreach($parroquias as $parroquia)
@if($id_parroquia==$parroquia->id)
<option value="{!!$parroquia->id!!}" selected >{!!$parroquia->nombre!!}</option>
@else
<option value="{!!$parroquia->id!!}" >{!!$parroquia->nombre!!}</option>
@endif
    @endforeach

</select>
                </div>
<div id='descripcionGeografica1'>
                    @section('descripcionGeografica')
                    @show
                        
                </div>


@if (session('parroquia_admin'))
<script>
$('#id_parroquia').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxDescripcion("{!!asset('/getDescripcionGeografica')!!}"+"/"+valor+"/8");
  //GetDataAjaxImagenesRes("{!!asset('/imagenesAjaxDescription')!!}/8/"+valor+"");
  $('#id_auxiliar').val(valor);
});

///Script para actualizar el container una vez que se hayan subido las imagenes
     /*setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            var valor=$('#id_parroquia').val();
            
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/8/"+valor+"");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);*/
</script>   

@endif

@endsection