
<div class="rowerrorM">
</div>
<div id="testboxForm" class="testboxForm">
    <h1>Agregar Servicio </h1>
    <hr>
    {!! Form::open(['url' => route('upload-postusuarioserviciosmini'),  'id'=>'newServicio']) !!}
    <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador">
    <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio">
       <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'Nombre', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('nombre_servicio',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Nombre del servicio'))!!}
       </div>
       <div class="form-group-step2-popup">
            {!!Form::label('detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::textarea('detalle_servicio',NULL, array('class'=>'inputtextarea-step2-popup-1','placeholder'=>'Incluye equipos, incluye almuerzo, no incluye bicicletas, etc'))!!}

       </div>
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" id="btnsubm" onclick="AjaxContainerRegistroWithLoad('newServicio','simplemodal-wrap')" href="#">Siguiente</a>
            </div>              
        </div>

{!! Form::close() !!}
</div>
