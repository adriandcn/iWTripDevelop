@extends('front.masterPageServicios')
@section('step1')

{!! HTML::style('public/css/jquery-labelauty.css') !!} 

<div class="rowerror">

</div>


<?php
$prefix='';
$operadorName='';
$servicio_1 = '';
$servicio_2 = '';
$servicio_3 = '';
$servicio_4 = '';
$servicio_5 = '';
$servicio_6 = '';
$servicio_7 = '';
$servicio_8 = '';
$servicio_9 = '';
$servicio_10 = '';
$servicio_11 = '';
?>
@foreach ($listServicios as $servicio)
<?php
switch ($servicio->id_catalogo_servicio) {
    case 1:
        $servicio_1 = 'checked';
        break;
    case 2:
        $servicio_2 = 'checked';
        break;
    case 3:
        $servicio_3 = 'checked';
        break;
    case 4:
        $servicio_4 = 'checked';
        break;
    case 5:
        $servicio_5 = 'checked';
        break;
    case 6:
        $servicio_6 = 'checked';
        break;
    case 7:
        $servicio_7 = 'checked';
        break;
    case 8:
        $servicio_8 = 'checked';
        break;
     case 9:
        $servicio_9 = 'checked';
        break;
    case 10:
        $servicio_10 = 'checked';
        break;
    case 11:
        $servicio_11 = 'checked';
        break;
}
?>
@endforeach     

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
           El Paso 3, despliega una lista de los principales servicios turisticos a nivel nacional. Usted podrá escoger uno o más servicios dependiendo de su actividad turistica. Ejemplo, un hotel podría brindar también servicio de restaurante por lo que sería conveniente tratarlos en forma independiente para mayor impacto en las búsquedas.
        </div>
    </div>
    
    <div id="space"></div>
    <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
               <a class="button-step4" onclick="window.location.href = '{!!asset('/operador')!!}'"> 
               <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Mi info</strong></a>
                             <a class="button-step4 "> 
                   <div style="color:#F26803; display: block;
    font-size: 0.9em;
    font-weight: normal;
    line-height: 31px;
    text-indent: 31px;"> Agregar servicios </div></a>
               
               <a class="button-step4 "> 
                   <div style="color:#999; display: block;
    font-size: 0.9em;
    font-weight: normal;
    line-height: 31px;
    text-indent: 31px;"> Mis servicios </div></a>
    
    <a class="button-step4 "> 
                   <div style="color:#999; display: block;
    font-size: 0.9em;
    font-weight: normal;
    line-height: 31px;
    text-indent: 31px;"> Detalle</div></a>
    
    

            </h2>
    </div>
    
    
    <div id="space"></div>


    {!! Form::open(['url' => route('upload-postServicioOperador'),  'id'=>'registro_stepoperador']) !!}
    <div class="wrapper uwa-font-aa">


        <input type="hidden" value="{!!$data['id_usuario_op']!!}" name="id_usuario_op" id="id_usuario_op">
        <div id="overlay">
            <div id="screen"></div>
            
            
            <div id="dialog-star1" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/registro1.jpg')!!}" alt="lugares de comida" /></i></div>
                <div class="body-dialog">
                    <p>Lugares de  <span>COMIDA</span>. Dentro de esta clasificación se encuentran restaurantes, comida rápida, kioskos, agachaditos, cualquier tipo de local cuya actividad principal sea la alimentación.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star2" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/registro2.jpg')!!}" alt="Hospedaje" /></i></div>
                <div class="body-dialog">
                    <p>Lugares de  <span>HOSPEDAJE</span>. Dentro de esta clasificación se encuentran hoteles, hostels, home stays, hostales, villas , cualquier tipo de local cuya actividad principal sea la de hospedaje y descanso.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star3" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/registro3.jpg')!!}" alt="Agencia de viajes" /></i></div>
                <div class="body-dialog">
                    <p>Servicio de  <span>Viajes</span>.Dentro de esta clasificación se encuentran agencias de viajes, guías independientes, servicios de viajes planificados, cuya finalidad sea la de organizar viajes planeados donde se incluya por ejemplo transporte y seguro para el cliente.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            
            <div id="dialog-star4" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/registro4.jpg')!!}" alt="Centros turísticos" /></i></div>
                <div class="body-dialog">
                    <p>Para <span>visitar </span>.Dentro de esta clasificación se encuentran museos, parques nacionales, cascadas, caminatas, cualquier lugar que se considere bueno para visitar, pasear y fotografiar.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star5" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/registro5.jpg')!!}" alt="Centros turísticos" /></i></div>
                <div class="body-dialog">
                    <p>Lugares para <span>diversión nocturna </span>.Dentro de esta clasificación se encuentran bares, casinos, discotecas, cobachas, cualquier lugar que se considere bueno farrear o pasar una simplemente diversión adulta.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
             <div id="dialog-star6" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/registro6.jpg')!!}" alt="Centros turísticos" /></i></div>
                <div class="body-dialog">
                    <p>Reuniones  <span>sociales </span>.Dentro de esta clasificación se encuentran parrilladas, paseos en bicileta, caídas, cualquier tipo de actividad donde se quiera invitar al público en general a unirse sean nacionales o extranjeros.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-star7" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/transporte-1.png')!!}" alt="Transporte" /></i></div>
                <div class="body-dialog">
                    <p>Transporte  <span>general </span>.Dentro de esta clasificación se encuentran buses, taxis, lanchas, camionetas que se dediquen a la actividad del transporte público o privado.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            
            <div id="dialog-star8" class="dialog">
                <div class="label-dialog"><i ><img src="{!! asset('public/images/register/inspirational.jpg')!!}" alt="Inspiración" /></i></div>
                <div class="body-dialog">
                    <p>Inspiración  <span>general </span>.Inspiración, nuevas experiencias.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-anchor" class="dialog modal">
                <div class="label-dialog"><i class="icon-anchor"></i></div>
                <div class="body-dialog">
                    <p>The Anchor dialog is <span>modal</span>. You must click on the check mark to acknowledge and clear it.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-beaker" class="dialog">
                <div class="label-dialog"><i class="icon-beaker"></i></div>
                <div class="body-dialog">
                    <p>The Beaker dialog is <span>modeless</span>. You can click on the check mark or anywhere outside of the dialog's body to clear it.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
            
            <div id="dialog-bug" class="dialog modal">
                <div class="label-dialog"><i class="icon-bug"></i></div>
                <div class="body-dialog">
                    <p>The Bug dialog is <span>modal</span>. You must click on the check mark to acknowledge and clear it.</p>
                </div>
                <div class="ok-dialog"><i class="icon-ok-sign"></i></div>
            </div>
        </div>

        <div class="testboxFormulario">
            <div class="datagrid">
                <table>
                    <thead><tr><th>Tipo</th><th>Descripcion</th><th>Seleccion</th></tr></thead>
                    <tbody><tr>
                            <td> 
                                    <div id="star1" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro1.jpg')!!}" alt="" />
                                </div></td>
                            <td>
                                <div id="star1" class="dialog-open">
                                    
                                <h2 class='titletable'>
                                    Alimentación y bebidas
                                </h2>
                                      
                                
                                Restaurante, pizzeria, kioscos de comida, comida rápida, etc
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio1" id="checkbox-1" value="1" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio"{!!$servicio_1!!}/></td>
                        </tr>
                        <tr class="alt">  <td> 
                                <div id="star2" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro2.jpg')!!}" alt="" />
                                </div>
                                </td>
                            <td>
                                <div id="star2" class="dialog-open">
                                <h2 class='titletable'>
                                    Alojamiento
                                </h2>
                                
                                Hotel, hostal, home state, coachsurfing, etc
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio2" id="checkbox-2" value="2" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_2!!}/></td>
                        </tr>
                        <tr>  <td> 
                            <div id="star3" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro3.jpg')!!}" alt="" />
                                </div>
                                
                            
                            </td>
                            <td>
                                <div id="star3" class="dialog-open">
                                <h2 class='titletable'>
                                    Organización de viajes
                                </h2>
                                
                                Agencia de viajes, guía independiente, exploración, etc
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio3" id="checkbox-3" value="3" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_3!!}/></td>
                        </tr>
                        <tr class="alt"><td> 
                                <div id="star4" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro4.jpg')!!}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div id="star4" class="dialog-open">
                                <h2 class='titletable'>
                                    Centros turísticos y actividades culturales
                                </h2>
                                    
                                Museos ,parques nacionales, zoologicos, etc
                                </div>
                            </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio4" id="checkbox-4" value="4" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_4!!}/></td>
                        </tr>
                       
                        <tr><td> 
                                
                                <div id="star5" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro5.jpg')!!}" alt="" />
                                </div>
                            </td>
                            <td>
                                <div id="star5" class="dialog-open">
                                <h2 class='titletable'>
                                    Diversión nocturna
                                </h2>
                                Discoteca, bar, casino, etc
                                </div>
                                
                            </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio5" id="checkbox-5" value="5" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_5!!}/></td>
                        </tr>

                        <tr class="alt"><td>
                                <div id="star7" class="dialog-open">
                                    <img src="{!! asset('public/images/register/transporte-1.png')!!}" alt="" />
                                </div>
                                
                            <td>
                                <div id="star7" class="dialog-open">
                                <h2 class='titletable'>
                                    Transporte
                                </h2>
                                Buses, taxis, barcos, etc.
                                </div>
                                
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio7" id="checkbox-7" value="7" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_7!!}/></td>
                        </tr>
                        <tr class="alt"><td>
                                <div id="star6" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro6.jpg')!!}" alt="" />
                                </div>
                                
                            <td>
                                <div id="star6" class="dialog-open">
                                <h2 class='titletable'>
                                    Actividades en grupo
                                </h2>
                                Parrilladas, viajes, caídas, after office, actividades espontaneas etc
                                </div>
                                
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio6" id="checkbox-6" value="6" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_6!!}/></td>
                        </tr>
                        
                             <tr class="alt"><td>
                                <div id="star6" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro6.jpg')!!}" alt="" />
                                </div>
                                
                            <td>
                                <div id="star6" class="dialog-open">
                                <h2 class='titletable'>
                                  Festividades
                                </h2>
                                Parrilladas, viajes, caídas, after office, actividades espontaneas etc
                                </div>
                                
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio9" id="checkbox-9" value="9" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_9!!}/></td>
                        </tr>
                        
                        
                              <tr class="alt"><td>
                                <div id="star6" class="dialog-open">
                                    <img src="{!! asset('public/images/register/registro6.jpg')!!}" alt="" />
                                </div>
                                
                            <td>
                                <div id="star6" class="dialog-open">
                                <h2 class='titletable'>
                                  Eventos
                                </h2>
                                Eventos
                                </div>
                                
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio10" id="checkbox-10" value="10" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_10!!}/></td>
                        </tr>
                        
                        
                        
                        <tr class="alt"><td>
                                <div id="star8" class="dialog-open">
                                    <img src="{!! asset('public/images/register/inspirational.jpg')!!}" alt="" />
                                </div>
                                
                            <td>
                                <div id="star6" class="dialog-open">
                                <h2 class='titletable'>
                                    Inspiración
                                </h2>
                                Agrega mensajes de inspiración al mundo
                                </div>
                                
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio8" id="checkbox-8" value="8" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_8!!}/></td>
                        </tr>

                        
                          <tr class="alt">  <td> 
                                <div id="star2" class="dialog-open">
                                    <img src="{!! asset('images/register/registro2.jpg')!!}" alt="" />
                                </div>
                                </td>
                            <td>
                                <div id="star2" class="dialog-open">
                                <h2 class='titletable'>
                                    Trips
                                </h2>
                                
                                Trips
                                </div>
                                </td>
                            <td><input class="demo labelauty" name="id_catalogo_servicio11" id="checkbox-11" value="11" type="checkbox" data-labelauty="No brindo este servicio|Si brindo este servicio" {!!$servicio_11!!}/></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="form-group-step2">
            <div class="box-content-button-step2">
                <a class="button" onclick="AjaxContainerRegistro('registro_stepoperador')" href="#">Siguiente</a>
            </div>
        </div>    

    </div>



    {!! Form::close() !!}
</div>

@section('scripts')
{!! HTML::script('public/js/registro/registroajax_serviciooperador.js') !!}
{!!HTML::script('public/js/jquery-labelauty.js') !!}
@stop
@stop