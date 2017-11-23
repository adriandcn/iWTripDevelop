@section('provincias')	
 

<div class="form-group-1">
                    {!!Form::label('provincia_1', 'Provincia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <select name="id_provincia" id="id_provincia" class='inputselect chng'>
                        <option value="0"  >Seleccionar</option>
@foreach($provincias as $provincia)
@if($id_provincia==$provincia->id)
<option value="{!!$provincia->id!!}" selected >{!!$provincia->nombre!!}</option>
@else
<option value="{!!$provincia->id!!}"  >{!!$provincia->nombre!!}</option>
@endif
    @endforeach

</select>
                </div>

<div id='canton'>
                    @section('cantones')
                    @show
                    
                </div>

@if($id_canton!='0') 
 <script>
  
  GetDataAjaxCantones("{!!asset('/getCantones')!!}"+"/"+{!!$id_provincia!!}+"/"+{!!$id_canton!!}+"/"+{!!$id_parroquia!!});

</script>
@endif

 <script>
$('#id_provincia').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxCantones("{!!asset('/getCantones')!!}"+"/"+valor+"/0/0");
});
</script>
@endsection