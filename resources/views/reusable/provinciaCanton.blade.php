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

<div id='canton'>
                    @section('cantones')
                    @show
                    
                </div>


 <script>
$('#id_provincia').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxCantones("{!!asset('/getOnlyCanton')!!}"+"/"+valor);
});
</script>
@endsection