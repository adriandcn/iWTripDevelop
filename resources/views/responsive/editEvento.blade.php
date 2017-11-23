@extends('responsive.dashboard')
@section('content')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

{!! HTML::script('js/jquery.js') !!}
<script>
$("#dashboard1").hide();        
$("#dashboard2").hide();    
$("#dashboard3").hide();
$("#dashboard4").hide();
$("#dashboard5").hide();
$("#dashboard6").hide();
$("#dashboard7").hide();
$("#dashboard8").show();
</script>

@foreach ($listEventos as $evento)

<?php

$usuarioServicio=$evento->id;
?>

@if(session('device')!='mobile')
{!! Form::open(['url' => route('postEvento1'), 'method' => 'post', 'role' => 'form', 'class'=>'form-bordered', 'id'=>'UpdateEvento']) !!}
@else
{!! Form::open(['url' => route('postEvento1'), 'method' => 'post', 'role' => 'form', 'class'=>'form-bordered', 'style' => 'padding: 0','id'=>'UpdateEvento']) !!}
@endif


<div class="row">
    
    <div class="col-sm-12 col-md-5" style="margin-bottom: 3%;">
        <div class="col-xs-12 col-md-12 res" style="margin-bottom: 3%;margin-top: 2%;">
                <div class="col-xs-12 col-md-12 res">
                    <h4 class="section-title">Agregar Fotos:</h4>
                    <div class="tab-container full-width style2" style="text-align:center;">
                         <div id="promocion">

                             <a data-toggle="modal" data-target="#foto" href="#"><img src="{{ asset('img/fotograf.png')}}" style="width:111px"></a> 
                         </div>
                        </div>
                </div>
        </div>
        <br>
        <div class="col-xs-12 col-md-12 res" style="margin-bottom: 3%;margin-top: 2%;">
                <div class="col-xs-12 col-md-12">
                    <div class="tab-container full-width style2">
                        <div id="renderPartialImagenes">
                                    @section('contentImagenes')
                                    @show
                        </div>         
                    </div>
                </div>
        </div>
        
    </div>
    
    <div class="col-xs-12 col-md-7" style="margin-bottom: 3%;"> 
        
                <h4>{{trans('front/responsive.formularioevento')}}</h4>
              
                <div class="rowerror" style="color: red;font-weight: bold;margin-bottom: 3%;"></div>
                
                <input type="hidden" name="id_usuario_servicio" value="{{ $evento->id_usuario_servicio }}">
                <input type="hidden" name="id" value="{{ $evento->id }}">
                    
                    <div class="form-group">
                      {!!Form::label('nombre_evento', 'Nombre Evento', array('id'=>'iconFormulario-step2'))!!}
                       <input type="text" name="nombre_evento" id="nombre_evento" class="input-text chng" placeholder='Nombre del evento'
                              value="{!!$evento->nombre_evento!!}" title="Es el nombre del evento. Recuerda ser creativo y diverido al escoger el nombre."
                               style="width: 100%" />
                    </div>
                    <div class="form-group">
                      {!!Form::label('Fecha_inicio', 'Fecha inicio', array('id'=>'iconFormulario-step2'))!!}
                       <input type="text" name="fecha_desde" id="fechainicio" class="input-text datepicker chng" value="{!!$evento->fecha_desde!!}" 
                               style="width: 100%" />
                    </div>
                    <div class="form-group">
                    {!!Form::label('Fecha_fin', 'Fecha fin', array('id'=>'iconFormulario-step2'))!!}
                    <input type="text" name="fecha_hasta" id="fechafin" class="input-text datepicker chng" value="{!!$evento->fecha_hasta!!}" 
                              style="width: 100%"/>
                    </div>
                    <div class="form-group">
                      {!!Form::label('detalle_promocion', 'Descripción evento', array('id'=>'iconFormulario-step2'))!!}
                      <textarea style="height: 100px;resize:none;margin-top: 1%;width: 100%" name="descripcion_evento" class="input-text chng">{!!trim($evento->descripcion_evento)!!}</textarea>
                    </div>
                    <div class="form-group">
                      {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
                      <input type="text" name="tags" class="input-text chng" value="{!!trim($evento->tags)!!}" 
                               placeholder="Tags" style="width: 100%"
                               title="Para mejorar las búsquedas ingresa palabras clave separadas por comas que describan tu servicio. Ejemplo: mar, playa, ceviche, discoteca, etc."/>
                    </div>
                    <div class="form-group">
                        @if(isset($listEventos))
                        <?php //print_r($listEventos); die(); ?>
                        @foreach ($listEventos as $itiner)
                        @if($itiner->longitud_evento!="")
                        @include('reusable.maps1', ['longitud_servicio' => $itiner->longitud_evento,'latitud_servicio'=>$itiner->latitud_evento])  
                        @else
                        @include('reusable.maps1', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                        @endif
                        @endforeach
                        @else
                        @include('reusable.maps1', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                        @endif
                    
                    </div>
                    <div class="form-group">
                    {!!Form::label('permanente', 'Evento Permanente', array('id'=>'iconFormulario-step2'))!!}
                    <div class="text-center"> 
                        <input type="checkbox"  id='permanente' name="permanente" value="{!!$evento->permanente!!}"
                               onchange="UpdatePermanente('{!!asset('/updatePermanenteEvento')!!}/{!!$evento->id!!}/{!!$evento->id_usuario_servicio!!}')">
                        
                    </div>
                    
                   </div>
                    
    </div>
        
            <!-- VISTA PREVIA Y GUARDAR-->
        <br>
        <div class="col-xs-12 col-md-12 res text-center">
            <div class="form-group" style="display: inline-table; margin-left: 4%;">
                 <a class="btn btn-medium style1" onclick="GuardarPromo('UpdateEvento',{!!$servicio->id_catalogo_servicio!!})" href="#">{{trans('front/responsive.finalizarguardar')}}</a>
            </div>
            <div class="form-group" style="display: inline-table; margin-left: 4%;">
                 <a class="btn btn-medium style1" title="Vista previa" onclick="AjaxContainerVistaPreviaEvento({!!$evento->id!!});" href="#">{{trans('front/responsive.vistaprevia')}}</a>
            </div>
        </div>        
    
</div>



@endforeach 
<input type="hidden" value="0" id="flag_image">
{!! Form::close() !!}
               
@section('scripts')
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('js/jsModal/basic.js') !!}
{!! HTML::script('js/calendar/calendar.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
<!--{!! HTML::style('/packages/bootstrap/css/bootstrap.min.css') !!}
{!! HTML::style('/assets/css/style.css') !!}-->
{!! HTML::style('/packages/dropzone/dropzone.css') !!}
<!-- End Dropzone Preview Template -->
{!! HTML::script('/packages/dropzone/dropzone.js') !!}
{!! HTML::script('/assets/js/dropzone-config.js') !!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDor7F0iN5YavbFiLRA7pY7L8-Rgl89GT8&signed_in=true&libraries=places&callback=initMap" async defer></script>

<script>
            $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});</script>

<script>
            $(document).ready(function () {
                GetDataAjaxImagenes2("{!!asset('/imagenesAjax1')!!}/4/{!!$usuarioServicio!!}");
                $("#fechainicio").val(new Date().toISOString().substring(0, 10));
                $("#fechafin").val(new Date().toISOString().substring(0, 10));
                var check = $("#permanente").val();
                if(check == 1){
                    $( "#permanente" ).prop( "checked", true );
                }
                $("#listarevento").attr("href", "{!!asset('/listarEventos1')!!}/{!!$evento->id_usuario_servicio!!}");
            });
            
            ///Script para actualizar el container una vez que se hayan subido las imagenes
            setInterval(function() {
            if ($('#flag_image').val() == 1) {
            // Save the new value
            GetDataAjaxImagenes2("{!!asset('/imagenesAjax1')!!}/4/{!!$usuarioServicio!!}");
                    $("#flag_image").val('0');
                    // TODO - Handle the changed value
            }
            
            }, 100);
            
            $(document).ready(function () {
                var check = $("#permanente").val();
                if(check == 1){
                    $( "#permanente" ).prop( "checked", true );
                }
                
        }); 
        
        
         $(".chng").change(function() {
            //AjaxContainerRetrunMessagePostParametro2('UpdateEvento',{!!$servicio->id_catalogo_servicio!!}); 
         });
</script>



  <!-- Modal FOTOGRAFIA-->
<div class="modal fade" id="foto" tabindex="-1" role="dialog">
    
    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div id="testboxForm" class="foto">
                  <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarfoto')}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="rowerrorM"> </div>
    {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}      
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_catalogo_fotografia" name="id_catalogo_fotografia" value="4">
          <input type="hidden" id="id_usuario_servicio" name="id_usuario_servicio" value="{!!$usuarioServicio!!}">
          <input type="hidden" id="id_auxiliar" name="id_auxiliar" value="{!!$usuarioServicio!!}">
          
          <div class="form-group">
               <div class="dz-message">

                </div>

                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>

                <div class="dropzone-previews" id="dropzonePreview"></div>

                <h4 style="text-align: center;color:#428bca;">Arrastra las imágenes aquí (Formato: jpg, tamaño max: 6Mb)  
                    <span class="glyphicon glyphicon-hand-down"></span></h4>
          </div>
       
      </div>
      {!! Form::close() !!}       
      <div class="modal-footer">
          <button type="button" id="nextbtn" class="btn btn-secondary" data-dismiss="modal">{{trans('front/responsive.finalizar')}}</button>
         <!--<a class="btn btn-secondary" id="nextbtn"  href="#">Finalizar</a> -->
      </div>
            
        </div>  

    </div>
  </div>
</div>
  
  
  <!-- Dropzone Preview Template -->
<div id="preview-template" style="display: none;">

    <div class="dz-preview dz-file-preview">
        <div class="dz-image"><img data-dz-thumbnail=""></div>

        <div class="dz-details">
            <div class="dz-size"><span data-dz-size=""></span></div>
            <div class="dz-filename"><span data-dz-name=""></span></div>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
        <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

        <div class="dz-success-mark">
            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>Check</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                </g>
            </svg>
        </div>

        <div class="dz-error-mark">
            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>error</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                    </g>
                </g>
            </svg>
        </div>

    </div>
</div>  
  
  
  
  
<script>
  $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });
            

$("#nextbtn").click(function() {

    $("#flag_image").val('1');

});



    </script> 
@stop



@stop