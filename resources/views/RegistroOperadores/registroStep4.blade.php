@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}

<div style='display:none'>
    <img src="{!! asset('img/x.png')!!}" alt='' />
</div>

<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
    <div id="basic-modal-content" class="cls loadModal"></div>

<div class="rowerror">
</div>
    
<?php
$prefix = "";
$operadorName = "";
$usuarioServicio->id = 0;
$usuarioServicio->nombre_servicio = '';
$usuarioServicio->detalle_servicio = '';
$usuarioServicio->detalle_servicio_eng = '';

$usuarioServicio->precio_desde = '';
$usuarioServicio->tags = '';
$usuarioServicio->precio_hasta = '';
$usuarioServicio->precio_anterior = '';
$usuarioServicio->precio_actual = '';
$usuarioServicio->descuento_servico = '';
$usuarioServicio->direccion_servicio = '';
$usuarioServicio->correo_contacto = '';
$usuarioServicio->pagina_web = '';
$usuarioServicio->nombre_comercial = '';
$usuarioServicio->tags = '';
$usuarioServicio->descuento_clientes = '';
$usuarioServicio->tags_servicio = '';
$usuarioServicio->observaciones = '';
$usuarioServicio->telefono = '';
$usuarioServicio->id_provincia = '';
$usuarioServicio->id_canton = '';
$usuarioServicio->id_parroquia = '';
$usuarioServicio->como_llegar1 = '';
$usuarioServicio->como_llegar2 = '';
$usuarioServicio->horario = '';

$usuarioServicio->id_usuario_operador = '';
$usuarioServicio->id_padre = '';

$usuarioServicio->fecha_ingreso = '';
$usuarioServicio->fecha_fin = '';
$usuarioServicio->como_llegar1_1 = '';
$usuarioServicio->como_llegar2_2 = '';
$usuarioServicio->latitud_servicio = -0.1806532;
$usuarioServicio->longitud_servicio = -78.46783820000002;
?>
@foreach ($usuarioServicio as $detalles)
<?php
$usuarioServicio->id = $detalles->id;
$usuarioServicio->nombre_servicio = trim($detalles->nombre_servicio);
$usuarioServicio->detalle_servicio = trim($detalles->detalle_servicio);
$usuarioServicio->detalle_servicio_eng = trim($detalles->detalle_servicio_eng);
$usuarioServicio->precio_desde = trim($detalles->precio_desde);
$usuarioServicio->precio_hasta = trim($detalles->precio_hasta);
$usuarioServicio->precio_anterior = trim($detalles->precio_anterior);
$usuarioServicio->precio_actual = trim($detalles->precio_actual);
$usuarioServicio->descuento_servico = trim($detalles->descuento_servico);
$usuarioServicio->tags = trim($detalles->tags);
$usuarioServicio->direccion_servicio = trim($detalles->direccion_servicio);
$usuarioServicio->correo_contacto = trim($detalles->correo_contacto);
$usuarioServicio->pagina_web = trim($detalles->pagina_web);
$usuarioServicio->nombre_comercial = trim($detalles->nombre_comercial);
$usuarioServicio->tags = trim($detalles->tags);
$usuarioServicio->descuento_clientes = $detalles->descuento_clientes;
$usuarioServicio->tags_servicio = trim($detalles->tags_servicio);
$usuarioServicio->id_provincia = $detalles->id_provincia;
$usuarioServicio->id_canton = $detalles->id_canton;
$usuarioServicio->id_parroquia = $detalles->id_parroquia;
$usuarioServicio->como_llegar1 = $detalles->como_llegar1;
$usuarioServicio->como_llegar2 = $detalles->como_llegar2;
$usuarioServicio->id_usuario_operador = $detalles->id_usuario_operador;
$usuarioServicio->horario = $detalles->horario;


$usuarioServicio->como_llegar1_1 = $detalles->como_llegar1_1;
$usuarioServicio->como_llegar2_2 = $detalles->como_llegar2_2;
$usuarioServicio->fecha_ingreso = $detalles->fecha_ingreso;
$usuarioServicio->fecha_fin = $detalles->fecha_fin;
$usuarioServicio->id_padre = $detalles->id_padre;


$usuarioServicio->observaciones = trim($detalles->observaciones);
$usuarioServicio->telefono = $detalles->telefono;
$usuarioServicio->latitud_servicio = ($detalles->latitud_servicio == '') ? -0.1806532 : $detalles->latitud_servicio;
$usuarioServicio->longitud_servicio = ($detalles->longitud_servicio == '') ? -78.46783820000002 : $detalles->longitud_servicio;

?>
@endforeach

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">

            <?php
            switch (session('tip_oper')) {
                case 1:
                    $prefix = "I'm an ";
                    $operadorName = "Agency";
                    break;
                case 2:
                    $prefix = "I'm an ";
                    $operadorName = "Enterprise";
                    break;
                case 3:
                    $prefix = "I'm just";
                    $operadorName = "Me";
                    break;
            }
            ?>
            <h2 class="head-title">
                {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            En ésta sección se detalla el servicio, se da a conocer la ubicación geográfica de donde se puede contratar el servicio, se pueden agregar fotografías, eventos, promociones e itinerarios. 
        </div>
    </div>
    <div id="space"></div>
    <div id="title-box-header-navigation">

        <h2 class="head-title-navigation">
            <a class="button-step4" onclick="window.location.href = '{!!asset('/operador')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Mi info </strong></a>
            <a class="button-step4" onclick="window.location.href = '{!!asset('/userservice')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Agregar servicio </strong></a>
            <a class="button-step4" onclick="window.location.href = '{!!asset('/detalleServicios')!!}'"> 
                <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Mis servicios </strong></a>
            <a class="button-step4 "> 
                <div style="color:#F26803; display: block;
                     font-size: 0.9em;
                     font-weight: normal;
                     line-height: 31px;
                     text-indent: 31px;"> Detalle {!!$Servicio->nombre_servicio!!}</div></a>
        </h2>
    </div>
    
    <div id="space"></div>

    <div class="wrapper uwa-font-aa">
        
        {!! Form::open(['url' => route('upload-postusuarioservicios'), 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}
        <input type="hidden" value="{!!$usuarioServicio->id!!}" name="id" id="id">
        <input type="hidden" value="{!!$id_catalogo!!}" name="id_catalogo" id="id_catalogo">
        <div id="part-1-form">
            <div id="principal-data">
                <div class="form-group-1">
                    {!!Form::label('nombre_servicio_1', 'Nombre Servicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('nombre_servicio', $usuarioServicio->nombre_servicio, array('class'=>'inputtext chng','placeholder'=>'Nombre del Servicio'))!!}
                </div>
                @if($id_catalogo==9 || $id_catalogo==10)
                    <div class="form-group-1">
                    {!!Form::label('Fecha_inicio', 'Fecha inicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                   
                    {!!Form::text('fecha_ingreso', $usuarioServicio->fecha_ingreso, array('class'=>'datepicker inputtext chng'))!!}
                </div>

                <div class="form-group-1">
                    {!!Form::label('Fecha_fin', 'Fecha fin', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('fecha_fin', $usuarioServicio->fecha_fin, array('class'=>'inputtext chng datepicker'))!!}
                </div>
                @endif

                <div class="form-group-1">
                    {!!Form::label('precio_desde_1', 'Precio Desde', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('precio_desde', $usuarioServicio->precio_desde, array("title"=>"Para realizar una segmentación adecuada de interesados, sería bueno que nos des el rango de precios de tu servicio. El valor es en dólares americanos",'class'=>'inputtext chng','placeholder'=>'Precio Desde'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('precio_hasta_1', 'Precio Hasta', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('precio_hasta', $usuarioServicio->precio_hasta, array('class'=>'inputtext chng','placeholder'=>'Precio Hasta'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('direccion_servicio_1', 'Direccion Servicio', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('direccion_servicio', $usuarioServicio->direccion_servicio, array('class'=>'inputtext chng','placeholder'=>'Direccion del Servicio'))!!}
                </div>
                <div class="form-group-1">
                    {!!Form::label('horarios', 'Horario atención', array('class'=>'control-label','id'=>'iconFormulario-step4'))!!}
                    {!!Form::text('horario', $usuarioServicio->horario, array("title"=>"Horario de atención",'class'=>'inputtext chng','placeholder'=>'Lunes a Viernes de 7AM a 8PM'))!!}
                </div>
                
                <div id='provincias'>
                    @section('provincias')
                    @show
                </div>
                
                <div class="form-group-1">
                    @include('reusable.maps', ['longitud_servicio' => $usuarioServicio->longitud_servicio,'latitud_servicio'=>$usuarioServicio->latitud_servicio])  
                </div>   
                    
                <div id="promocion"><a class="button-step4" title="Si deseas agregar promociones de tu servicio puedes hacerlo aquí y nosotros nos encargaremos de darle la publicidad necesaria." onclick="RenderPartialGeneric('reusable.promocion', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar promocion</a></div>
                <div id="evento"><a class="button-step4" title="Puedes crear varios eventos para tu servicio. Ejemplo si tu servicio es una discoteca puedes agregar Jueves laydies night como evento o si eres un restaurante puedes agregar eventos como inauguraciones, etc." onclick="RenderPartialGeneric('reusable.createNewEvent', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar evento</a></div>
                <div id="evento"><a class="button-step4" title="Esta opción es orientada a servicios turísticos de viajes y transporte. Por ejemplo tu servicio es una agencia de viajes y tienes varios itinerarios Trip Cotopaxi, Trip Amazonía o si eres un transporte podrás especificar la ruta de tu servicio." onclick="RenderPartialGeneric('reusable.createNewItinerario', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar tour o itinerario</a></div>
                
                <div id="promocion"><a onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', 1, {!!$usuarioServicio->id!!}, {!!$usuarioServicio->id!!})" href="#"><img src="{{ asset('img/fotograf.png')}}" style="width:111px"></a> </div>
                <div id="promocion"><a onclick="RenderPartialGeneric('reusable.invitar_amigo')" href="#"><img src="{{ asset('img/amigo-1.png')}}" style="width:111px"></a> </div>
                <!--<div id="evento"><a class="button-step4" title="Prueba Especialidad Booking" onclick="RenderPartialGeneric('reusable.createNewEspecialidad', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar Especialidad</a></div>-->
                <div id="evento"><a class="button-step4" title="Booking" 
                                    onclick="RenderBooking({!!$usuarioServicio->id_usuario_operador!!}, {!!$usuarioServicio->id!!})" href="#"> 
                                    <h1 class="h1-agregar">+</h1> Booking</a></div>
                
                @if($id_catalogo==4 && $usuarioServicio->id_padre==0)
                
                <div id="promocion"><a class="button-step4" title="Si desea crear atracciones dependientes" onclick="RenderPartialPadre('reusable.createNewServicioHijo', 4, {!!$usuarioServicio->id_usuario_operador!!},{!!$usuarioServicio->id!!});" href="#"> <h1 class="h1-agregar">+</h1> Agregar Dependencia</a></div>
                
                @endif
                
                @if($id_catalogo==4 && $usuarioServicio->id_padre!=0)
                
                <div id="promocion"><a class="button-step4" title="Si desea crear atracciones dependientes" onclick="RenderPartialPadre('reusable.createNewServicioHijo', 4, {!!$usuarioServicio->id_usuario_operador!!},{!!$usuarioServicio->id_padre!!});" href="#"> <h1 class="h1-agregar">+</h1> Agregar otra dependencia </a></div>
                
                @endif
               
            </div>
            <div id="secondary-data">
                <div class="form-group-2">
                    {!!Form::label('detalle_servicio_1', 'Detalle Servicio', array("title"=>"Ingresa un detalle corto y preciso, no más de 4 líneas procura usar un todo cortéz para invitar a los turistas. Nosotros nos encargaremos de traducirlo a diferentes idiomas.",'class'=>'control-label-1'))!!}
                    <textarea id="detalle_servicio" name="detalle_servicio" class="ptm chng" placeholder="Detalle Servicio" title="Ingresa un detalle corto y preciso, no más de 4 líneas procura usar un todo cortéz para invitar a los turistas. Nosotros nos encargaremos de traducirlo a diferentes idiomas.">{!!trim($usuarioServicio->detalle_servicio)!!}</textarea>
                    
                    
                </div>
                <div class="form-group-2">
                    {!!Form::label('detalle_servicio_1', 'Detalle Servicio Inglés', array("title"=>"Ingresa un detalle corto y preciso, no más de 4 líneas procura usar un todo cortéz para invitar a los turistas. Nosotros nos encargaremos de traducirlo a diferentes idiomas.",'class'=>'control-label-1'))!!}
                    <textarea id="detalle_servicio_eng" name="detalle_servicio_eng" class="ptm chng" placeholder="Detalle Servicio" title="Ingresa un detalle corto y preciso, no más de 4 líneas procura usar un todo cortéz para invitar a los turistas. Nosotros nos encargaremos de traducirlo a diferentes idiomas.">{!!trim($usuarioServicio->detalle_servicio_eng)!!}</textarea>
                    
                    
                </div>
                
                <div class="form-group-2">
                    {!!Form::label('como_llegar1', 'Como llegar desde', array('class'=>'control-label-2'))!!}
                    {!!Form::text('como_llegar1_1', $usuarioServicio->como_llegar1_1, array("title"=>"Como llegar",'class'=>'form-control-1 chng','placeholder'=>'Quito, GYE, Parque central ,etc'))!!}
                    <textarea style="height: 100px;" id="como_llegar1" name="como_llegar1" class="ptm chng" placeholder="Detalle de como llegar a tu servicio" title="Ingresa un detalle de como llegar a tu local o servicio desde algún lugar conocido.">{!!trim($usuarioServicio->como_llegar1)!!}</textarea>
                </div>
                
                <div class="form-group-2">
                    {!!Form::label('como_llegar2', 'Como llegar Inglés', array('class'=>'control-label-2'))!!}
                    {!!Form::text('como_llegar2_2', $usuarioServicio->como_llegar2_2, array("title"=>"Como llegar",'class'=>'form-control-1 chng','placeholder'=>'Cuenca, Manta, Parque central ,etc'))!!}
                    <textarea style="height: 100px;" id="como_llegar2" name="como_llegar2" class="ptm chng" placeholder="Detalle de como llegar a tu servicio" >{!!trim($usuarioServicio->como_llegar2)!!}</textarea>
                </div>
                
                <div class="form-group-2">
                    {!!Form::label('telefono_1', 'Telefono', array('class'=>'control-label-2'))!!}
                    {!!Form::text('telefono', $usuarioServicio->telefono, array("title"=>"El turista podrá comunicarse directamente contigo si así lo deseas",'class'=>'form-control-1 chng','placeholder'=>'Telefono del Servicio'))!!}
                </div>
                <div class="form-group-2">
                    {!!Form::label('correo_contacto_1', 'Correo del contacto', array('class'=>'control-label-2'))!!}
                    {!!Form::text('correo_contacto', $usuarioServicio->correo_contacto, array("title"=>"Siempre es bueno tener un correo electrónico en el cual puedan pedirte más información sobre tu servicio",'class'=>'form-control-1 chng','placeholder'=>'Correo Contacto'))!!}
                </div>
                <div class="form-group-2">
                    {!!Form::label('pagina_web_1', 'Pagina Web', array('class'=>'control-label-2'))!!}
                    {!!Form::text('pagina_web', $usuarioServicio->pagina_web, array("title"=>"Si tienes una página web servirá mucho para tu credibilidad.",'class'=>'form-control-1 chng','placeholder'=>'URL'))!!}
                </div>
                
                <div class="form-group-2">
                    {!!Form::label('tags', 'Tags', array('class'=>'control-label-2'))!!}
                    {!!Form::text('tags', $usuarioServicio->tags, array("title"=>"Palabras clave o referencias separadas por comas",'class'=>'form-control-1 chng','placeholder'=>'#ruta del sol, #museos'))!!}
                </div>
                <div class="form-group-2"> Mi servicio o establecimiento incluye:
                    <table>
                        <tr>
                            <td>
                                <ul style="list-style: none">
            <?php
                $count_services = count($catalogoServicioEstablecimiento);
                if (($count_services % 2) == 0){
                    $list_number = ($count_services / 2);
                }
                else{
                    $list_number = (int)($count_services / 2);
                }
                $count_list = 0;
            ?>
                                @foreach ($catalogoServicioEstablecimiento as $catalogo)	
                                        <li>
                                            <input class="circulo chng" name="id_servicio_est[]" id="id_servicio_est[]" value="{!!$catalogo->id!!}" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {{($catalogo->estado_servicio_est_us <> NULL)?'checked':''}}/>
                                            {!!$catalogo->nombre_servicio_est!!}
                                        </li>    
                                    
                                <?php
                                    $count_list++;
                                    if($count_list > $list_number){
                                ?>        
                                       </ul>
                                       </td>
                                       <td> 
                                       <ul style="list-style: none">    
                                <?php  
                                    $count_list = 0;
                                    }
                                ?>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                    </table>    
                </div>
            </div>
<!--            
            <div id="secondary-data">
                <div id="promocion"><a class="button-step4" title="Si deseas agregar promociones de tu servicio puedes hacerlo aquí y nosotros nos encargaremos de darle la publicidad necesaria." onclick="RenderPartialGeneric('reusable.promocion', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar promocion</a></div>
                <div id="evento"><a class="button-step4" title="Puedes crear varios eventos para tu servicio. Ejemplo si tu servicio es una discoteca puedes agregar Jueves laydies night como evento o si eres un restaurante puedes agregar eventos como inauguraciones, etc." onclick="RenderPartialGeneric('reusable.createNewEvent', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar evento</a></div>
                <div id="evento"><a class="button-step4" title="Esta opción es orientada a servicios turísticos de viajes y transporte. Por ejemplo tu servicio es una agencia de viajes y tienes varios itinerarios Trip Cotopaxi, Trip Amazonía o si eres un transporte podrás especificar la ruta de tu servicio." onclick="RenderPartialGeneric('reusable.createNewItinerario', {!!$usuarioServicio->id!!})" href="#"> <h1 class="h1-agregar">+</h1> Agregar tour o itinerario</a></div>

                
                <div id="promocion"><a onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', 1, {!!$usuarioServicio->id!!}, {!!$usuarioServicio->id!!})" href="#"><img src="{{ asset('img/fotograf.png')}}" style="width:111px"></a> </div>
                <div id="promocion"><a onclick="RenderPartialGeneric('reusable.invitar_amigo')" href="#"><img src="{{ asset('img/amigo-1.png')}}" style="width:111px"></a> </div>
            </div>
-->
        </div>
        <div id="part-1-form">
            <div class="box-content-button-1">
                <a class="button-1" title="Antes de finalizar recuerda que puedes ingresar fotografías de tu servicio en la parte inferior." onclick="AjaxContainerRetrunMessage('registro_step1', 'optional'); window.location.href = '/IguanaTrip/public/thankyou'" href="#">Guardar y Finalizar</a>
            </div>              
            <div class="box-content-button-1">
                <a class="button-1" title="Vista previa" onclick="window.location.href ='/iwanatrip/tokenDc$rip/{!!$usuarioServicio->id!!}'" href="#">Vista Previa</a>
            </div>              
        </div>
         
        {!! Form::close() !!}

        <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>
        
       <div class="row">
          <div style="width:30%; display: inline-table; margin-right: 2%;margin-bottom: 2%; text-align: center;"> 
       <!-- <link href="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoadCss&cid=3" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoad&cid=3&view=2"></script>-->
        </div>
    </div>
       <div class="row calendarios">

     @if($calendarios != Array())  
       @foreach ($calendarioConNombre as $calendar)
          
   <div style="width:30%; display: inline-table; margin-right: 2%;margin-bottom: 2%; text-align: center;">
       <a href="#" 
          onclick="RenderBookingCalendario({!!$usuarioServicio->id_usuario_operador!!}, {!!$usuarioServicio->id!!},{!!$calendar->id!!})" >
           <h3 style="color:white;font-weight: bold;font-size: 1vw !important;"> {!!$calendar->content!!} </h3>
        
       </a>
       
                    
                @if($calendar->activo==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$calendar->id!!}' checked name ='booking_activo_{!!$calendar->id!!}' class="switch-input" 
                               onchange="AjaxContainerRetrunBurnURLBooking('{!!asset('/estadoBookingPrincipal')!!}/',{!!$calendar->id!!},{!!$calendar->id!!},'booking')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$calendar->id!!}'  name ='booking_activo_{!!$calendar->id!!}' class="switch-input" 
                               onchange="AjaxContainerRetrunBurnURLBooking('{!!asset('/estadoBookingPrincipal')!!}/',{!!$calendar->id!!},{!!$calendar->id!!},'booking')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
                <p> </p>      
        
           
        <link href="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoadCss&cid={!!$calendar->id!!}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoad&cid={!!$calendar->id!!}&view=1"></script>
        
   </div>
        @endforeach
    @endif    
            
        </div>
    
    @if($calendarios != Array())      
    <div class="row reservaciones">
        @foreach ($reservacionesConNombre as $reservas)
          <div>
            <ul>
                <li style="color:white;font-weight: bold;font-size: 1vw !important;"> 
                    El calendario: <em>{!!$reservas->content!!}</em> tiene <em>{!!$reservas->reservas!!}</em> reservas 
                </li>
            </ul>
        </div>
        @endforeach  
   </div>
    @endif   
    


        <div id="renderPartialListaServicios">
            @section('contentPanelServicios')
            @show
        </div>
    </div>
</div>


<input type="hidden" value="0" id="flag_image">

@if($usuarioServicio->id_provincia=='' )
<script>
            $(document).ready(function () {
            GetDataAjaxProvincias("{!!asset('/getProvincias')!!}/0/0/0");
    });</script>
@else
<script>
            $(document).ready(function () {
    GetDataAjaxProvincias("{!!asset('/getProvincias')!!}/{!!$usuarioServicio->id_provincia!!}/{!!$usuarioServicio->id_canton!!}/{!!$usuarioServicio->id_parroquia!!}");
    });</script>
@endif

<script>
    $(document).ready(function () {

                GetDataAjaxSectionEventos("{!!asset('/getlistaServiciosComplete')!!}/{!!$usuarioServicio->id!!}");
               // GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/1/{!!$usuarioServicio->id!!}");
    });
    
    
    
    $("#tinymce").change(function() {
    AjaxContainerRetrunMessage('registro_step1', 'optional')
            });
    $(".chng").change(function() {
    AjaxContainerRetrunMessage('registro_step1', 'optional')
            });
            $(function() {
            var tooltips = $("[title]").tooltip({
            position: {
            my: "left top",
                    at: "right+5 top-5"
            }
            });
            });
        
    
</script>




{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


@stop


@section('scripts')
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}

{!! HTML::script('/js/jsModal/basic.js') !!}

<script>
    $(document).ready(function () {

                
                GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/1/{!!$usuarioServicio->id!!}");
    });
    
     ///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjaxDescription')!!}/1/{!!$usuarioServicio->id!!}");
           $("#flag_image").val('0');

            // TODO - Handle the changed value
        }
    
}, 100);
</script>


<script>
    $('.datepicker').datepicker({dateFormat: 'yy/mm/dd'});
    
    


    </script>
    
 
@stop


