@section('cantones')	
 

<div class="form-group-1">
                    {!!Form::label('canton_1', 'Canton', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    
                    
                    <!--<select name="id_canton" id="id_canton" class='inputselect chng'> -->
                    <select name="id_canton" id="id_canton" class="input-text chng" style="height: 40px;width: 100%">
                        
                        <option value="0"  >Seleccionar</option>
@foreach($cantones as $canton)
@if($id_canton==$canton->id)
<option value="{!!$canton->id!!}" selected>{!!$canton->nombre!!}</option>
@else
<option value="{!!$canton->id!!}" >{!!$canton->nombre!!}</option>
@endif
    @endforeach

</select>
                </div>

<div id='parroquia'>
                    @section('parroquias')
                    @show
                    
                </div>

@if($id_parroquia!='0') 
 <script>
  
  GetDataAjaxParroquias1("{!!asset('/getParroquias1')!!}"+"/"+{!!$id_canton!!}+"/"+{!!$id_parroquia!!});

</script>
@endif
 

<script>
 $('#id_canton').on('change', function() {
    var valor=this.value;
  
  GetDataAjaxParroquias1("{!!asset('/getParroquias1')!!}"+"/"+valor+"/0");
});
</script>
 @endsection