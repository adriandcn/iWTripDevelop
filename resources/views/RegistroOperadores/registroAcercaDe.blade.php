@extends('front.masterPageServicios')

@section('step1')

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
            Saludo
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios')!!}'"> 
       <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 1 </strong></a>
               
            </h2>
    </div>
    
    
    
    <div id="space"></div>

    <div class="wrapper uwa-font-aa">
        <div class="form-group-step2">
            
            
            <p>&nbsp;</p><p>&nbsp;</p>
            <p>Reciban ustedes un cordial y atento saludo, &nbsp;as&iacute; como una extensa felicitaci&oacute;n por su exitosa trayectoria en el campo &nbsp;tur&iacute;stico.</p>
<p>Por medio de la presente nos permitimos presentarles los servicios de nuestra p&aacute;gina web:</p>
<p>&nbsp;</p>

<p>Iguana Trip es una nueva p&aacute;gina web especializada en la promoci&oacute;n de servicios tur&iacute;sticos locales de calidad a nivel nacional e internacional. Esta innovadora iniciativa busca revolucionar la manera de hacer turismo tanto para los visitantes cuanto para los proveedores locales de servicios tur&iacute;sticos en base a tres principios generales:</p>


<p style="margin-left:18pt;">&nbsp;I.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Promover el recurso tur&iacute;stico del Ecuador a nivel mundial facilitando la publicaci&oacute;n de, y el acceso a, &nbsp;informaci&oacute;n &uacute;til, veraz y detallada sobre los destinos y servicios tur&iacute;sticos.</p>
<p style="margin-left:18pt;">II.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Conectar a turistas en todo el mundo directamente con los proveedores locales de servicios tur&iacute;sticos en el Ecuador.</p>
<p style="margin-left:18pt;">III.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fomentar un turismo con base local que garantice el desarrollo socio-econ&oacute;mico del Ecuador y la conservaci&oacute;n de su recurso tur&iacute;stico.</p>
<p style="margin-left:18pt;">&nbsp;</p>
<p>En la fase de lanzamiento, Iguana Trip ofrece a los suscriptores de manera gratuita y permanente los siguientes servicios:</p>
<p style="margin-left:21.3pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Promoci&oacute;n internacional de la informaci&oacute;n a trav&eacute;s de nuestra amplia cadena de colaboradores, para proveedores de servicios tur&iacute;sticos;</p>
<p style="margin-left:21.3pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Publicaci&oacute;n de un archivo fotogr&aacute;fico, para proveedores de servicios tur&iacute;sticos;</p>
<p style="margin-left:21.3pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Una interfaz visualmente atractiva y f&aacute;cil de utilizar, para turistas y proveedores de servicios tur&iacute;sticos;</p>
<p style="margin-left:21.3pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Espacio de comentarios y sugerencias, para turistas;</p>
<p style="margin-left:21.3pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acceso al contenido de nuestra p&aacute;gina en varios idiomas, para turistas.</p>
<p style="margin-left:21.3pt;">&nbsp;</p>
<p>En caso de que se encuentren interesados en nuestros servicios, los invitamos muy amablemente a registrarse nuestra p&aacute;gina web y anunciarse a trav&eacute;s de Iguana Trip.</p>
<p>Para mayor informaci&oacute;n sobre las siguientes fases de nuestra iniciativa o ante cualquier inquietud por favor comun&iacute;quense con nosotros a la direcci&oacute;n de correo electr&oacute;nico:</p>
<p>info@iguanatrip.com</p>
<p>Sin otro particular, nos despedimos de ustedes, no sin antes agradecerles por la atenci&oacute;n brindada a esta invitaci&oacute;n.</p>
<p>&nbsp;</p>
<p>Atentamente,</p>
<p>El equipo de IguanaTrip</p>
<p>&nbsp;</p><p>&nbsp;</p>
<div align="center">

                    <a href="eng"><img src="{{ asset('public/img/index-logo.png')}}" width="270" height="258" alt="IguanaTrip" /></a> 
                </div>
        </div>

    </div>

    
                
</div>



@stop