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
    <h1>{!!trans('registro/labels.label4')!!} </h1>
    
    {!! Form::open(['url' => route('postItinerario'),  'id'=>'itinerario-popup']) !!}
       <input type="hidden"  class="id_usuario_servicio" name="id_usuario_servicio">

    <hr>
        <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', trans('registro/labels.label5'), array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('nombre_itinerario',NULL, array("title"=>"Es el nombre del itinerario o viaje. Por ejemplo, viaje a Cotopaxi, Tour de islas, Ruta Quito-Tulcán",'class'=>'inputtext-step2-popup','placeholder'=>trans('registro/labels.label6')))!!}
        </div>
        <div class="form-group-step2-popup">
            {!!Form::label('Detalle_1', trans('registro/labels.label7'), array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea id="descripcion_itinerario" title="Descripción del viaje en general, despues se detallarán las etapas o rutas del miso. Ejemplo el viaje por las islas es considerado una de las mayores atracciones a nivel mundial por sus flora y faua" name="descripcion_itinerario" class="ptm-popup" placeholder="Detalle Servicio"></textarea>
        </div>

        <div id="renderPartial" title="Esta opción es exclusiva de los servicios turisticos donde se especifica el requerimiento físico necesario para completar el trip. Si en su caso no es relevante puede poner No aplica.">
            @section('dificultades')
            @show
        </div>    
    
    
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistroWithLoad('itinerario-popup','simplemodal-wrap')" href="#">Siguiente</a>
            </div>              
        </div>
{!! Form::close() !!}



</div>

    
<script>
$( document ).ready(function() {
    
    GetDataAjax("/getTipoDificultad");
});
</script>
<script>
  $(function() {
    var tooltips = $( "[title]" ).tooltip({
      position: {
        my: "left top",
        at: "right+5 top-5"
      }
    });
   
  });
  </script>
