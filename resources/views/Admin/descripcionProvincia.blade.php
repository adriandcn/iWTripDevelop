@section('descripcionGeografica')	

        
        
@foreach ($descripcion as $operadorData)
<?php
$descripcion_esp = $operadorData->descripcion_esp;
$descripcion_eng = $operadorData->descripcion_eng;
$descripcion_adicional_esp = $operadorData->descripcion_adicional_esp;
$descripcion_adicional_eng = $operadorData->descripcion_adicional_eng;
$capital_provincia = $operadorData->capital_provincia;
$id = $operadorData->id;
?>
@endforeach     




<div class="wrapper uwa-font-aa">
    <div id="part-1-form">
        <div id="principal-data" >
            <div class="form-group-step2">
                <input type="hidden" value="{!!Session::get('user_id')!!}" name="id_usuario" id="id_usuario">
                {!!Form::label('detalle_servicio_1', 'Descripción Español', array("title"=>"Descripcion básica no mas de 10 lineas",'class'=>'control-label-1'))!!}
                <textarea id="descripcion_esp" name="descripcion_esp" class="ptm chng" placeholder="Descripcion básica no más de 10 líneas" title="Descripción.">{!!trim($descripcion_esp)!!}</textarea>

            </div>
            
            <div class="form-group-step2">
                {!!Form::label('descripcion_adicional', 'Descripción Adicional Español', array("title"=>"Descripcion Adicional como llegar, comida típica etc",'class'=>'control-label-1'))!!}
                <textarea id="descripcion_adicional_esp" name="descripcion_adicional_esp" class="ptm chng" placeholder="Descripcion adicional como llegar, comida típica aqui si se escribir mas detalle" title="Descripción.">{!!trim($descripcion_adicional_esp)!!}</textarea>

            </div>
            
            <div class="form-group-step2">
                {!!Form::label('detalle_servicio_1', 'Descripción Inglés', array("title"=>"Descripcion básica no más de 10 líneas en ingés",'class'=>'control-label-1'))!!}
                <textarea id="descripcion_eng" name="descripcion_eng" class="ptm chng" placeholder="Descripcion" title="Descripción.">{!!trim($descripcion_eng)!!}</textarea>
            </div>
            <div class="form-group-step2">
                {!!Form::label('descripcion_adicional', 'Descripción Adicional Inglés', array("title"=>"Descripcion Adicional como llegar, comida típica etc",'class'=>'control-label-1'))!!}
                <textarea id="descripcion_adicional_eng" name="descripcion_adicional_eng" class="ptm chng" placeholder="Descripcion adicional como llegar, comida típica aqui si se escribir mas detalle" title="Descripción.">{!!trim($descripcion_adicional_eng)!!}</textarea>

            </div>
            <div class="form-group-1">
                    {!!Form::label('capital', 'Capital de la Provincia', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('capital_provincia', $capital_provincia, array("title"=>"Capital de la provincia",'class'=>'inputtext chng','placeholder'=>'Capital de la provincia'))!!}
                </div>
            <div class="form-group-step2">
                <div class="box-content-button-step2">
                    <a class="button" onclick="AjaxContainerRegistroWithMessage('postGeoLoc','wrapper','Se ha guardado con éxito')" href="#">Guardar</a>
                </div>
            </div>    
        </div>
        <div id="secondary-data">
            <div id="promocion" style="margin-left: 145px">
                
                <a onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', {!!$typeGeo!!},0, {!!$id!!})" href="#"><img src="{{ asset('public/img/fotograf.png')}}" style="width:111px"></a>
            </div>
        </div>
    </div>
</div>
  <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>
    
<input type="hidden" value="0" id="flag_image">



    {!! HTML::script('public/js/jsModal/jquery.simplemodal.js') !!}
    {!! HTML::script('public/js/jsModal/basic.js') !!}
    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
            
    
    


@endsection

