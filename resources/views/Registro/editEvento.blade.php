@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('public/css/calendar/ui-jquery.css') !!}
<div style='display:none'>
    <img src="{!! asset('public/img/x.png')!!}" alt='' />
</div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('public/img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
    </style>
    <div id="basic-modal-content" class="cls loadModal"></div>
<div class="rowerror">
</div>
@foreach ($listEventos as $evento)

<?php

$usuarioServicio=$evento->id;
?>
<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">
            
           <?php
                  $prefix="";
        $operadorName="";

          switch (session('tip_oper')) {
    case 1:
        $prefix="Soy un ";
        $operadorName="Negocio";
        break;
    case 2:
        $prefix="Soy una ";
        $operadorName="Agencia";
        break;
    case 3:
        $prefix="Soy solo";
        $operadorName="Yo";
        break;
    
}
?>
           
            <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
                      IguanaTrip te da la opción de crear eventos dentro de tu servicio. Si eres un hotel por ejemplo y quieres realizar una fiesta puedes agregarla a esta opción nosotros nos encargaremos de que tu información sea leída por el segmento adecuado.
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $evento->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'"> 
   
       <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Regresar </strong></a>
               
       
               
            </h2>
    </div>
    <div id="space"></div>


    {!! Form::open(['url' => route('postEvento'), 'method' => 'post', 'role' => 'form', 'id'=>'UpdateEvento']) !!}
    

    <input type="hidden" name="id_usuario_servicio" value="{{ $evento->id_usuario_servicio }}">
    <input type="hidden" name="id" value="{{ $evento->id }}">

    <div class="wrapper uwa-font-aa" title="Carga las imágenes que consideres describen a tu evento.">
        <div id="part-1-form">
            <div id="principal-data" >

                <div class="form-group-step2">

                </div>

                <div class="form-group-step2">
                    {!!Form::label('nombre_evento', 'Nombre Evento', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('nombre_evento', trim($evento->nombre_evento), array("title"=>"Es el nombre del evento. Recuerda ser creativo y diverido al escoger el nombre.",'class'=>'inputtext-step2','placeholder'=>'Nombre del evento'))!!}
                </div>

                <div class="form-group-step2">
                    {!!Form::label('Fecha_inicio', 'Fecha inicio', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('fecha_desde', $evento->fecha_desde, array('class'=>'datepicker inputtext-step2'))!!}
                </div>

                <div class="form-group-step2">
                    {!!Form::label('Fecha_fin', 'Fecha fin', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('fecha_hasta', $evento->fecha_hasta, array('class'=>'inputtext-step2 datepicker'))!!}
                </div>

                <div class="form-group-step2">
                    {!!Form::label('detalle_promocion', 'Descripción evento', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::textarea('descripcion_evento', trim($evento->descripcion_evento), array('class'=>'inputtext-step2'))!!}

                </div>
                <div class="form-group-step2">
                    {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('tags', trim($evento->tags), array("title"=>"Para mejorar las búsquedas ingresa palabras clave separadas por comas que describan tu servicio. Ejemplo: mar, playa, ceviche, discoteca, etc.",'class'=>'inputtext-step2','placeholder'=>'Tags'))!!}
                </div>

             <div class="form-group-step2-popup">

                        @if(isset($listEventos))
                        @foreach ($listEventos as $itiner)
                        @if($itiner->longitud_evento!="")
                        @include('reusable.maps', ['longitud_servicio' => $itiner->longitud_evento,'latitud_servicio'=>$itiner->latitud_evento])  
                        @else
                        @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                        @endif
                        @endforeach
                        @else
                        @include('reusable.maps', ['longitud_servicio' => '-78.46783820000002','latitud_servicio'=>'-0.1806532'])   
                        @endif
                </div>

                <div class="form-group-step2">

                </div>
                <div id="form-group-step2-popup">
                    <div class="box-content-button-1">
                        <a class="button-1" onclick="AjaxContainerRetrunMessagePostParametro('UpdateEvento',{!!$servicio->id_catalogo_servicio!!})" href="#">Finalizar y regresar</a>
                    </div>
                </div>
            </div>
            <div id="secondary-data">
                <div id="promocion" style="margin-left: 145px">
                    
                    <a onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', 4, {!!$evento->id_usuario_servicio!!}, {!!$evento->id!!})" href="#"><img src="{{ asset('public/img/fotograf.png')}}" style="width:111px"></a>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>
    
<input type="hidden" value="0" id="flag_image">

  @endforeach 
</div>

  
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
  {!!HTML::script('public/js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
{!! HTML::script('public/js/jquery.js') !!}
  @stop
@section('scripts')
{!! HTML::script('public/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('public/js/jsModal/basic.js') !!}

<script>
    $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
    </script>
    
    <script>
    $(document).ready(function () {

                
                GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/4/{!!$usuarioServicio!!}");
    });
    
     ///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/4/{!!$usuarioServicio!!}");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);
</script>
  
@stop
