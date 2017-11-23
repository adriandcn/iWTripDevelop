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
$("#dashboard6").show();
$("#dashboard7").hide();
$("#dashboard8").hide();
</script>


<?php //print_r($listPromociones);die(); ?>
            @foreach ($listPromociones as $promo)

<?php $usuarioServicio=$promo->id; ?>

@if(session('device')!='mobile')
{!! Form::open(['url' => route('postPromocion1'), 'method' => 'post', 'role' => 'form', 'class'=>'form-bordered','id'=>'Updatepromocion']) !!}
@else
{!! Form::open(['url' => route('postPromocion1'), 'method' => 'post', 'role' => 'form', 'class'=>'form-bordered','style' => 'padding: 0','id'=>'Updatepromocion']) !!}
@endif
            


<div class="row">
    
    <div class="col-sm-12 col-md-5" style="margin-bottom: 3%;">
        <div class="col-xs-12 col-md-12 res" style="margin-bottom: 3%;margin-top: 2%;">
                <div class="col-xs-12 col-md-12 res">
                    <h4 class="section-title">Agregar Fotos:</h4>
                    <div class="tab-container full-width style2" style="text-align:center;">
                         <div id="promocion">

                             <a data-toggle="modal" data-target="#foto1" href="#" ><img src="{{ asset('img/fotograf.png')}}" style="width:111px"></a> 
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
        
                <h4>{{trans('front/responsive.formulariopromo')}}</h4>
              
                <div class="rowerror" style="color: red;font-weight: bold;margin-bottom: 3%;"></div>
                
                    <input type="hidden" name="id_usuario_servicio" value="{{ $promo->id_usuario_servicio }}">
                    <input type="hidden" name="id" value="{{ $promo->id }}">
                    
                 
                    
                    <div class="form-group res">
                        {!!Form::label('nombre_promocion', 'Nombre Promocion', array('id'=>'iconFormulario-step2'))!!}
                        <input type="text" name="nombre_promocion" id="nombre" class="input-text chng" value="{!!$promo->nombre_promocion!!}" 
                               placeholder="Jueves 2x1, Descuento del 10%, etc" style="width: 100%"
                               title="Es el nombre de la promoción. Recuerda ser creativo y diverido al escoger el nombre."/>
                    </div>
                    <div class="form-group">
                      {!!Form::label('Fecha_inicio', 'Fecha Inicio', array('id'=>'iconFormulario-step2'))!!}
                       <input type="text" name="fecha_desde" id="fechainicio" class="input-text datepicker chng" value="{!!$promo->fecha_desde!!}" 
                               style="width: 100%" />
                        
                    </div>
                    <div class="form-group">
                        {!!Form::label('Fecha_fin', 'Fecha Hasta', array('id'=>'iconFormulario-step2'))!!}
                       <input type="text" name="fecha_hasta" id="fechafin" class="input-text datepicker chng" value="{!!$promo->fecha_desde!!}" 
                              style="width: 100%" title="IguanaTrip se encargará automáticamente de desactivar la promoción una vez que llegue la fecha de fin."/>
                    </div>
                    <div class="form-group">
                      {!!Form::label('precio_normal', 'Precio Normal', array('id'=>'iconFormulario-step2'))!!}
                      <input type="text" name="precio_normal" class="input-text chng" value="{!!$promo->precio_normal!!}" 
                               placeholder="Precio Normal" style="width: 100%"/>
                    </div>
                    <div class="form-group">
                      {!!Form::label('descuento', 'Descuento', array('id'=>'iconFormulario-step2'))!!}
                      <input type="text" name="descuento" class="input-text chng" value="{!!$promo->descuento!!}" 
                               placeholder="Descuento" style="width: 100%"
                               title="El descuento puedes ingresarlo como porcentaje o en dólares americanos."/>
                    </div>
                    <div class="form-group">
                      {!!Form::label('codigo_promocion', 'Codigo ', array('id'=>'iconFormulario-step2'))!!}
                      <input type="text" name="codigo_promocion" class="input-text chng" value="{!!$promo->codigo_promocion!!}" 
                               placeholder="Codigo" style="width: 100%"
                               title="Si deseas mantener un track de cuantas personas han usado esta promoción puedes ingresar un código para que lo uses a tu conveniencia."/>
                    </div>
                    <div class="form-group">
                    {!!Form::label('detalle_promocion', 'Detalle Promocion', array('id'=>'iconFormulario-step2'))!!}
                    <textarea style="height: 100px;resize:none;margin-top: 1%;width: 100%" name="descripcion_promocion" class="input-text chng">{!!trim($promo->descripcion_promocion)!!}</textarea>
                    </div>
                    <div class="form-group">
                    {!!Form::label('observaciones_promocion', 'Observaciones', array('id'=>'iconFormulario-step2'))!!}
                    <textarea style="height: 100px;resize:none;margin-top: 1%;width: 100%" name="observaciones_promocion" class="input-text chng" placeholder="Hasta agotar stock, si se aceptan mascotas ,etc">{!!trim($promo->observaciones_promocion)!!}</textarea>
                    </div>
                    <div class="form-group">
                    {!!Form::label('tags', 'Tags', array('id'=>'iconFormulario-step2'))!!}
                    <input type="text" name="tags" class="input-text chng" value="{!!$promo->tags!!}" 
                               placeholder="#tagejemplo, #comida, #galapagos" style="width: 100%"
                               title="Para mejorar las búsquedas ingresa palabras clave separadas por comas que describan tu servicio. Ejemplo: mar, playa, ceviche, discoteca, etc."/>
                    </div>
                    <div class="form-group">
                    {!!Form::label('permanente', 'Promocion Permanente', array('id'=>'iconFormulario-step2'))!!}
                    <div class="text-center"> 
                        <input type="checkbox"  id='permanente' name="permanente" value="{!!$promo->permanente!!}"
                               onchange="UpdatePermanente('{!!asset('/updatePermanentePromo')!!}/{!!$promo->id!!}/{!!$promo->id_usuario_servicio!!}')">
                        
                    </div>
                    
                   </div>
                    
    </div>
    
    
            <!-- VISTA PREVIA Y GUARDAR-->
        <br>
        <div class="col-xs-12 col-md-12 res text-center">
            <div class="form-group" style="display: inline-table; margin-left: 4%;">
                 <a class="btn btn-medium style1" onclick="GuardarPromo('Updatepromocion',{!!$servicio->id_catalogo_servicio!!},'guardar')" href="#">{{trans('front/responsive.finalizarguardar')}}</a>
                 
            </div>
            <div class="form-group" style="display: inline-table; margin-left: 4%;">
                 <a class="btn btn-medium style1" title="Vista previa" onclick="AjaxContainerVistaPreviaPromocion({!!$promo->id!!});" href="#">{{trans('front/responsive.vistaprevia')}}</a>
            </div>
        </div>
</div>



                @endforeach 

{!! Form::close() !!}
 <input type="hidden" value="0" id="flag_image">              
 
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




<script>
    
         $(".chng").change(function() {
            //AjaxContainerRetrunMessagePostParametro1('Updatepromocion',{!!$servicio->id_catalogo_servicio!!}); 
         });
            
            $(document).ready(function () {
                GetDataAjaxImagenes2("{!!asset('/imagenesAjax1')!!}/2/{!!$usuarioServicio!!}");
                $("#fechainicio").val(new Date().toISOString().substring(0, 10));
                $("#fechafin").val(new Date().toISOString().substring(0, 10));
                var check = $("#permanente").val();
                if(check == 1){
                    $( "#permanente" ).prop( "checked", true );
                }
                $("#listarpromo").attr("href", "{!!asset('/listarPromociones1')!!}/{!!$promo->id_usuario_servicio!!}");
            });
            
            ///Script para actualizar el container una vez que se hayan subido las imagenes
            setInterval(function() {
            if ($('#flag_image').val() == 1) {
            // Save the new value
            GetDataAjaxImagenes2("{!!asset('/imagenesAjax1')!!}/2/{!!$usuarioServicio!!}");
                    $("#flag_image").val('0');
                    // TODO - Handle the changed value
            }
            
            }, 100);
            
      

</script>
<script>
  $(function() {
      $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
  });
</script>  


    @if(session('device')!='mobile')
    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
                {$Duration: 1800, $Opacity: 2}
            ];
            var jssor_1_options = {
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1360);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });</script>

    <style>

        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background:url ("{!!asset("img/internas/b05.png")!!}") no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background:url("{!!asset("img/internas/a12.png")!!}") no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>
    
    @else
   <?php $header = "/img/portada_face_iwanatrip_04.jpg";?> 
  <script>

jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
   $(".res").css('padding','0');
   
});

</script>


    @endif

    
      <!-- Modal FOTOGRAFIA-->
<div class="modal fade" id="foto1" tabindex="-1" role="dialog">
    
    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div id="testboxForm" class="foto">
                  <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarfoto')}}</h3>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}"> 
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
          <div class="rowerrorM"> </div>
    {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}      
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_catalogo_fotografia" name="id_catalogo_fotografia" value="2">
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
            
$(document).ready(function(){
          //$("#real-dropzone").dropzone();
});    

$("#nextbtn").click(function() {
  $("#flag_image").val('1');
});



    </script>  


    
@stop



@stop