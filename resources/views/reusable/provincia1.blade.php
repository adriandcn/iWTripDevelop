@section('provincias')	
 

<div class="form-group-1">
    {!!Form::label('provincia_1', 'Provincia', array('id'=>'iconFormulario-step4'))!!}
    
                    
                    <select name="id_provincia" id="id_provincia" class="input-text chng" style="height: 40px;width: 100%;">
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
  
  GetDataAjaxCantones1("{!!asset('/getCantones1')!!}"+"/"+{!!$id_provincia!!}+"/"+{!!$id_canton!!}+"/"+{!!$id_parroquia!!});

</script>
@endif

 <script>
$('#id_provincia').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxCantones1("{!!asset('/getCantones1')!!}"+"/"+valor+"/0/0");
});
</script>
@endsection