@extends('front.masterPageServicios')

@section('step1')


{!! HTML::style('public/css/table.css') !!} 
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
            En ésta sección, podrás administrar los servicios agregar, activar o desactivar los mismos, ingresar fotografías, eventos, itinerarios, etc.
        </div>
    </div>
    
    
     <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
               <a class="button-step4" onclick="window.location.href = '{!!asset('/operador')!!}'"> 
       <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Mi info </strong></a>
               <a class="button-step4" onclick="window.location.href = '{!!asset('/userservice')!!}'"> 
       <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Agregar servicio </strong></a>
                              
         <a class="button-step4 "> 
                   <div style="color:#F26803; display: block;
    font-size: 0.9em;
    font-weight: normal;
    line-height: 31px;
    text-indent: 31px;"> Mis servicios </div></a>
               <a class="button-step4 "> 
                   <div style="color:#999; display: block;
    font-size: 0.9em;
    font-weight: normal;
    line-height: 31px;
    text-indent: 31px;"> Detalles</div></a>
            </h2>
    </div>
    <div id="space"></div>

    <div class="wrapper uwa-font-aa">

        <?php $counter = 0; ?>
        @foreach ($listServiciosUnicos as $servicios)
        <?php $counter = $counter + 1; ?>

        {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}
        <div id="table_{!!$servicios->id!!}" class="servicio-usuario-detalle">
            <h2>{!!$servicios->nombre_servicio!!} <strong class="add-registro" onclick="RenderPartial('reusable.createNewServicio', {!!$servicios -> id_catalogo_servicios!!}, {!!$servicios -> id_usuario_operador!!})">+</strong> <strong class="text-add-registro">(agregar registro)</strong> </h2>
            <table class="tabla-servicio-usuario-detalle">
                <tr>
                    <th>Nombre del Servicio</th>
                    <th>Activo</th>
                    <th></th>
                </tr>
                @foreach ($listServiciosAll as $servicio)
                @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios)
                <?php $check = ''; ?>
                @if($servicio->estado_servicio_usuario==1)
                <?php $check = 'checked'; ?>
                @endif
                <!-- modal content -->
                <tr>
                    @if($servicio->nombre_servicio=="")
                    <td class="vinculo-servicio">
                        {!! link_to_route('details.show', 'Ingresar', [$servicio->id,$servicio->id_catalogo_servicios]) !!}
                    </td>
                    @else
                    <td class="vinculo-servicio">
                        {!! link_to_route('details.show',$servicio->nombre_servicio, [$servicio->id,$servicio->id_catalogo_servicios]) !!}

                    </td>
                    @endif
                    <td> 
                        <label class="switch switch-green">
                            <input type="checkbox" id='estado_servicio_usuario_{!!$servicio->id!!}' {!!$check!!} name ='estado_servicio_usuario_{!!$servicio->id!!}' class="switch-input" onchange="AjaxContainerRetrunMessage({!!$servicios -> id_catalogo_servicios!!}, {!!$servicio -> id!!})">
                            <span class="switch-label" data-on="Si" data-off="No"></span>
                            <span class="switch-handle"></span>

                        </label>
                    </td>
                <input type="hidden" value="{!!$servicio->id!!}" name="usuario_servicio">
                <td id='basic-modal' contenteditable="true">
                </td>
                <td id='change'>
                    <img src="{!! asset('public/img/flecha-1.png')!!}" height="10px" width="10px" />
                    
                    {!! link_to_route('details.show', 'Para modificar el servicio dale click aquí', [$servicio->id,$servicio->id_catalogo_servicios]) !!}
                </td>



                </tr>
                @endif
                @endforeach 

            </table>

        </div>
        <br>



        {!! Form::close() !!}
        @endforeach 
    </div>
</div>




<script>
    $('#change a').css('color','white');
    </script>




@section('scripts')
{!! HTML::script('public/js/tabla_dinamica.js') !!}
{!! HTML::script('public/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('public/js/jsModal/basic.js') !!}

@stop

@stop