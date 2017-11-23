@extends('front.masterPageServicios')

@section('step1')
{!! HTML::style('css/calendar/ui-jquery.css') !!}
{!! HTML::style('css/detalleEspecialidad/detalleEspecialidad.css') !!}

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>   

<div class="rowerror">
</div>

<div id="basic-modal-content" class="cls loadModal">
</div>


@foreach ($listItinerarios as $itiner)
<?php

$usuarioServicio=$itiner->id_usuario_servicio;
$itiner_id=$itiner->id;
$catalogoEspecialidad=$itiner->id_catalogo_especialidad;
?>
<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">
            
          <?php 
          $prefix="";
        $operadorName="";
          switch (session('tip_oper')) {
    case 1:
        $prefix="I'm an ";
        $operadorName="Agency";
        break;
    case 2:
        $prefix="I'm an ";
        $operadorName="Enterprise";
        break;
    case 3:
        $prefix="I'm just";
        $operadorName="Me";
        break;
    
}
?>

           
         <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            En ésta sección podrás crear eventos bookeables y sus respectivas actividades detalladas para poder dar al 
            turista la seguridad de lo que se está ofreciendo. En el caso de brindar una actividad de transporte 
            se tratarán como rutas y sus respectivas paradas si fuese el caso.
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $itiner->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'"> 
       <strong><img src="{!! asset('img/flecha-1.png')!!}" height="15px" width="15px" /> Regresar </strong></a>
               
       
               
            </h2>
    </div>
    <div id="space"></div>
    {!! Form::open(['url' => route('postEspecialidad'), 'method' => 'post', 'role' => 'form', 'id'=>'UpdateEspecialidad']) !!}
    
<input type="hidden" name="id" id="idDetalle" value="{{ $itiner->id }}">
<input type="hidden" name="id_usuario_servicio" value="{{ $itiner->id_usuario_servicio }}">
<input type="hidden" name="id_catalogo_especialidad" value="{{ $itiner->id_catalogo_especialidad }}">

<div class="wrapper uwa-font-aa">
        <div id="part-1-form">
            <div id="principal-data" >
                <div class="form-group-step2">
                    {!!Form::label('nombre_especialidad', 'Nombre Especialidad', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::text('nombre_especialidad', $itiner->nombre_especialidad, 
                    array('class'=>'inputtext-step2',"title"=>"Nombre de la Especialidad.",'placeholder'=>'Nombre de la Especialidad'))!!}
                </div>
                <div class="form-group-step2">
                    {!!Form::label('descripcion_especialidad', 'Descripcion Especialidad', array('id'=>'iconFormulario-step2'))!!}
                    {!!Form::textarea('descripcion_especialidad', $itiner->descripcion_especialidad, 
                    array('class'=>'inputtextarea-step2'))!!}
                </div>
                <div id="form-group-step2-popup">
                    <div class="box-content-button-1">
                        <a class="button-1" onclick="AjaxContainerRegistro('UpdateEspecialidad')" href="#">Guardar</a>
                        <a class="button-1" onclick="AjaxContainerRegistro('UpdateEspecialidad'); 
                           window.location.href = '{!!asset('/servicios/serviciooperador')!!}/{{ $itiner->id_usuario_servicio }}/{!!$servicio->id_catalogo_servicio!!}'" href="#">Regresar</a>
                    </div>
                </div>
            </div>
            <div id="secondary-data">
                <table style="width: 100%;padding-top: 50px">
                    <tr>
                        <td>
                            <div id="promocion" style="margin-left: 145px">
                                
                                <a onclick="RenderPartialGenericFotografia('reusable.uploadImagePopUp', 3, {!!$itiner->id_usuario_servicio!!}, {!!$itiner->id!!})" href="#">
                                    <img src="{{ asset('img/fotograf.png')}}" style="width:111px"></a>
                            </div> 
                        </td>
                    </tr>
                </table>    
            </div>
            

                
            </div>

        </div>

    {!! Form::close() !!}
    
     
       <div id="renderPartialImagenes">
            @section('contentImagenes')
            @show
        </div>
    
<input type="hidden" value="0" id="flag_image">



<div ng-app="especialidadApp" ng-controller="detallesEspecialidadController">
    <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Detalle de Especialidad</h1>    
                    </div>
                    
        </div>  
        <div id="form-group-step2-popup">
                    <div class="box-content-button-1">
                        <a class="button-1" ng-click="agregarDetalle()" href="#">Agregar Detalle</a>
                    </div>
        </div>
    	<div class="row">
        <div class="col-md-12 text-center">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Fecha Inicio </th>
                <th>Hora Inicio</th>
                <th>Fecha Fin </th>
                <th>Hora Fin</th>
                <th>Disponible</th>
                <th>Descuento(%)</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
              <tr ng-repeat='detalle in detalles'> 
                <td><% detalle.fecha_inicio %></td>
                <td><% detalle.hora_inicio %></td>
                <td><% detalle.fecha_fin%></td>
                <td><% detalle.hora_fin%></td>
                <td><% detalle.numero_reservas%></td>
                <td><% detalle.descuento%></td>
                <td>
                 <div id="form-group-step2-popup">
                    <div class="box-content-button-1">
                        <a class="button-1" ng-click="editarDetalle(detalle.id)" href="#">Editar</a>
                    </div>
                </div>
                <div id="form-group-step2-popup">
                    <div class="box-content-button-1">
                        <a class="button-1" ng-click="eliminarDetalle(detalle.id)" href="#">Eliminar</a>
                    </div>
                </div>    
                </td>
              </tr>
        </tbody>
    </table>
    		</div>
	</div>
    
           <!-- modales -->
       
       <div class="nuevo" ng-if='modalAgregarDetalle'>
          <div class="modal-content" style="width: 60%;">
            <div class="modal-header" style="background-color: #ef620a;">
                <div class="col-md-10"> <h2 class="tituloModal">Ingresar Nuevo Detalle</h2></div>
            </div>
            <form name="myForm" method="post">  
              <input type="hidden" name="id_especialidad" id="id_especialidad" value="{{ $itiner->id }}"> 
              <input type="hidden" ng-model='token' id="token" name="_token" value='{{ csrf_field() }}'>
            <div class="modal-body">
            <div class="inputForm">
                <table class="table borderless" cellspacing="0" cellpadding="0" style="text-align: center;">
                <tr>
                        <td style="width: 30%;height: 30%;"> <label class="labelTable" style="width: auto;margin: 10%;">Fecha Inicio: </label> </td>
                        <td> <input name="fecha_inicio" type="date" id="fecha_ini" ng-model='fecha_inicio' required> 
                        </td>
                        <td> <label class="labelTable" style="width: auto;margin-left: 2%;">Hora Inicio: </label> </td>
                        <td>
                        <select class="selectHoras" name="hora_inicio" ng-model='hora_inicio' required>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="22:00">21:00</option>
                            <option value="23:00">23:00</option>
                         </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label class="labelTable" style="width: auto;margin: 10%;">Fecha Inicio: </label> </td>
                        <td> <input name="fecha_fin" type="date" id="fecha_fin" ng-model='fecha_fin' required value="<% fecha_fin | date: 'yyyy-MM-dd' %>"> </td>
                        <td> <label class="labelTable" style="width: auto;margin-left: 2%;">Hora Inicio: </label> </td>
                        <td>
                        <select class="selectHoras" name="hora_fin" ng-model='hora_fin' required>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="22:00">21:00</option>
                            <option value="23:00">23:00</option>
                         </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label class="labelTable" style="width: auto;margin: 10%;">Precio: </label> </td>
                        <td style="color: black;font-weight: bold;"> <input name="numero_reservas" type="number" style="width: 60%;" ng-model='precio' placeholder="Precio" required min="0"> 
                                $ </td>
                        <td> <label class="labelTable" style="width: auto;margin-left: 10%;">Descuento: </label> </td>
                        <td style="color: black;font-weight: bold;"> <input name="descuento" type="number" style="width: 60%;" ng-model='descuento' placeholder="Descuento" 
                                    required min="0" ng-disabled="!precio" ng-change="calculoTotal(precio,descuento);"> % </td>
                    </tr>
                    <tr>
                        <td> <label class="labelTable" style="width: auto;margin-left: 10%;">Precio con Descuento: </label> </td>
                        <td> <p class="precioDescuento" ng-show="descuento"> <% totalDescuento %> $ </p> </td>
                        <td> <label class="labelTable" style="width: auto;margin: 10%;">Cantidad Disponible: </label> </td>
                        <td> <input name="numero_reservas" type="number" style="width: 60%;" ng-model='numero_reservas' required min="0"> </td>
                    </tr>
                    
                    <tr>
                        <td colspan="4"> <input name="bookeable"  type="hidden" ng-model='bookeable'> </td>
                    </tr>
                </table>
            <div class="row">
                  <div class="col-md-12">
                        <p ng-if="myForm.fecha_inicio.$error.required" class="aviso">Fecha Inicio es Requerido</p>
                        <p ng-if="myForm.hora_inicio.$error.required" class="aviso">Hora Inicio es Requerido</p>
                        <p ng-if="myForm.fecha_fin.$error.required" class="aviso">Fecha Fin es Requerido</p>
                        <p ng-if="myForm.hora_fin.$error.required" class="aviso">Hora Fin es Requerido</p>
                        <p ng-if="myForm.precio.$error.required" class="aviso">Precio es Requerido</p>
                        <p ng-if="myForm.descuento.$error.required" class="aviso">Descuento es Requerido</p>
                        <p ng-if="myForm.numero_reservas.$error.required" class="aviso">Cantidad Disponible es Requerido</p>
                  </div>
            </div> 
           
                
            </div>
           
            </div>
            <div class="modal-footer" style="background-color: #ef620a;">
                
                <button class="btn btn-primary" style="margin: 2%;"type="button" ng-disabled='myForm.$invalid' 
                        ng-click="guardarDetalle(token,id_especialidad,fecha_inicio,hora_inicio,fecha_fin,hora_fin,
                                  numero_reservas,precio,descuento,bookeable)">
                    Guardar</button>
                <button class="btn btn-primary" style="margin: 2%;"type="button" ng-click="cerrarNuevoDetalle()">Cancelar</button>
           </div>
            </form>
          </div>
           <br> <br>
        </div>
        
       <div class="nuevo" ng-if='modalEditarDetalle'>
          <div class="modal-content" style="width: 60%;">
              <div class="modal-header" style="background-color: #ef620a;">
                <div class="col-md-10"> <h2 class="tituloModal">Editar Detalle</h2></div>
            </div>
             <form name="myForm" method="post">  
            <div class="modal-body">
                <input type="hidden" name="id" ng-model='id' >
                <input type="hidden" name="id_especialidad" ng-model='id_especialidad'> 
            <div class="inputForm">
              <table class="table borderless" cellspacing="0" cellpadding="0" style="text-align: center;">
                <tr>
                        <td style="width: 30%;height: 30%;"> <label class="labelTable" style="width: auto;margin: 10%;">Fecha Inicio: </label> </td>
                        <td> <input name="fecha_inicio" type="date" id="fecha_ini" ng-model='fecha_inicio' ng-value="fecha_inicio"> 
                        </td>
                        <td> <label class="labelTable" style="width: auto;margin-left: 2%;">Hora Inicio: </label> </td>
                        <td>
                        <select class="selectHoras" name="hora_inicio" ng-model='hora_inicio' required>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="22:00">21:00</option>
                            <option value="23:00">23:00</option>
                         </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label class="labelTable" style="width: auto;margin: 10%;">Fecha Fin: </label> </td>
                        <td> <input name="fecha_fin" type="date" id="fecha_fin" ng-model='fecha_fin' ng-value="fecha_fin"> </td>
                        <td> <label class="labelTable" style="width: auto;margin-left: 2%;">Hora Fin: </label> </td>
                        <td>
                        <select class="selectHoras" name="hora_fin" ng-model='hora_fin' required>
                            <option value="05:00">05:00</option>
                            <option value="06:00">06:00</option>
                            <option value="07:00">07:00</option>
                            <option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
                            <option value="20:00">20:00</option>
                            <option value="22:00">21:00</option>
                            <option value="23:00">23:00</option>
                         </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label class="labelTable" style="width: auto;margin: 10%;">Precio: </label> </td>
                        <td style="color: black;font-weight: bold;"> <input name="numero_reservas" type="number" style="width: 60%;" ng-model='precio' placeholder="Precio" required min="0"> 
                                $ </td>
                        <td> <label class="labelTable" style="width: auto;margin-left: 10%;">Descuento: </label> </td>
                        <td style="color: black;font-weight: bold;"> <input name="descuento" type="number" style="width: 60%;" ng-model='descuento' placeholder="Descuento" 
                                    required min="0"> % </td>
                    </tr>
                    <tr>
                        <td> <label class="labelTable" style="width: auto;margin: 10%;">Cantidad Disponible: </label> </td>
                        <td> <input name="numero_reservas" type="number" style="width: 60%;" ng-model='numero_reservas' required min="0"> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    
                    <tr>
                        <td colspan="4"> <input name="bookeable"  type="hidden" ng-model='bookeable'> </td>
                    </tr>
                </table>
            <div class="row">
                  <div class="col-md-12">
                        <p ng-if="myForm.hora_inicio.$error.required" class="aviso">Hora Inicio es Requerido</p>
                        <p ng-if="myForm.hora_fin.$error.required" class="aviso">Hora Fin es Requerido</p>
                        <p ng-if="myForm.precio.$error.required" class="aviso">Precio es Requerido</p>
                        <p ng-if="myForm.descuento.$error.required" class="aviso">Descuento es Requerido</p>
                        <p ng-if="myForm.numero_reservas.$error.required" class="aviso">Cantidad Disponible es Requerido</p>
                  </div>
            </div> 
           
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" style="margin: 2%;"type="button" ng-disabled='myForm.$invalid' 
                        ng-click="actualizarDetalle(id,id_especialidad,fecha_inicio,hora_inicio,fecha_fin,hora_fin,
                                  numero_reservas,precio,descuento,bookeable)">
                    Editar</button>
                <button class="btn btn-primary" style="margin: 2%;"type="button" ng-click="cerrarEditarDetalle()">Cancelar</button>
            </div>
            </form>  
          </div>
        </div>
            <br> <br>
        </div>     
       
    
</div>
 

@endforeach 
</div>

@section('scripts')

{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}



@stop
<script>
    $(document).ready(function () {
        GetDataAjaxSectionItiner("{!!asset('/getlistaItinerarios')!!}/{!!$itiner->id!!}",{!!$usuarioServicio!!});
        GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/3/{!!$itiner_id!!}");
    });
    
       ///Script para actualizar el container una vez que se hayan subido las imagenes
     setInterval( function() {
    
        if ($('#flag_image').val() == 1) {
            
            // Save the new value
           GetDataAjaxImagenes("{!!asset('/imagenesAjax')!!}/3/{!!$itiner_id!!}");
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

@stop