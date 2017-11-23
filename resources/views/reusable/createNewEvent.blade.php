
{!! HTML::style('public/css/calendar/ui-jquery.css') !!}
<div style='display:none'>
                <img src="{!! asset('public/img/x.png')!!}" alt='' />
            </div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('public/img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div class="rowerrorM">
</div>
<div id="testboxForm" class="testboxForm">
    <h1>{!!trans('registro/labels.label2')!!}</h1>
    
    {!! Form::open(['url' => route('postEvento'),  'id'=>'evento-popup']) !!}
       <input type="hidden"  class="id_usuario_servicio" name="id_usuario_servicio">

    <hr>
        <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', trans('registro/labels.label3'), array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('nombre_evento',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Nombre significativo'))!!}
        </div>
    
        <div class="form-group-step2-popup">
            {!!Form::label('Detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea id="descripcion_evento" name="descripcion_evento" class="ptm-popup" placeholder="Cena navideña, concierto, etc."></textarea>
        </div>
    
    <div class="form-group-step2-popup">
            {!!Form::label('fecha_desde', 'Fecha Inicio', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('fecha_desde',NULL, array('class'=>'inputtext-step2-popup datepicker','placeholder'=>'Fecha desde'))!!}
        </div>

    <div class="form-group-step2-popup">
            {!!Form::label('fecha_hasta', 'Fecha Hasta', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('fecha_hasta',NULL, array('class'=>'inputtext-step2-popup datepicker','placeholder'=>'Fecha hasta'))!!}
        </div>

        
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistroWithLoad('evento-popup','simplemodal-wrap')" href="#">Siguiente</a>
            </div>              
        </div>
{!! Form::close() !!}
<script>
  $(function() {
    
      $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
  });
  </script>
</div>

    
