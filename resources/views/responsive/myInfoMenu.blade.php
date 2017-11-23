@extends('responsive.dashboard')
@section('content')

{!! HTML::script('js/jquery.js') !!}
<script>
$("#dashboard1").hide();
$("#dashboard2").hide();
$("#dashboard3").hide();
$("#dashboard4").show();
</script>

<?php
$id_usuario_op = NULL;
$nombre_empresa_operador = NULL;
$direccion_empresa_operador = NULL;
$nombre_contacto_operador_1 = NULL;
$telf_contacto_operador_1 = NULL;
$email_contacto_operador = NULL;
?>
@foreach ($operador as $operadorData)
<?php
$id_usuario_op = $operadorData->id_usuario_op;
$nombre_empresa_operador = $operadorData->nombre_empresa_operador;
$direccion_empresa_operador = $operadorData->direccion_empresa_operador;
$nombre_contacto_operador_1 = $operadorData->nombre_contacto_operador_1;
$telf_contacto_operador_1 = $operadorData->telf_contacto_operador_1;
$email_contacto_operador = $operadorData->email_contacto_operador;
?>
@endforeach 
    

         <div class="col-md-12 col-lg-12" id="target">
                
                 {!! Form::open(['url' => route('upload-infoperador2'),  'class'=>'form-bordered', 'id'=>'registro_step1_upload']) !!}

                <h4>{{trans('front/responsive.tituloformulario')}}</h4>
              
                <div class="rowerror" style="color: red;font-weight: bold;margin-bottom: 3%;"></div>
                
                <input type="hidden" value="{!!$data['tipoOperador']!!}" name="id_tipo_operador" id="id_tipo_operador">
                <input type="hidden" value="{!!$id_usuario_op!!}" name="id_usuario_op" id="id_usuario_op">
                    <div class="form-group">
                        {!!Form::label('nombre_1', 'Nombre del contacto', array('id'=>'iconFormulario-step2'))!!}
                        <input type="text" name="nombre_contacto_operador_1" value="{!!$nombre_contacto_operador_1!!}" class="input-text" 
                               style="width: 100%;" title="Es el nombre del administrador del servicio o de quien se haga cargo de la información que ésta página despliegue." placeholder="Ingrese Nombre contacto">
                    </div>
                    <div class="form-group">
                        {!!Form::label('direccion_1', 'Direccion del contacto', array('id'=>'iconFormulario-step2'))!!}
                        <input type="text" name="direccion_empresa_operador" value="{!!$direccion_empresa_operador!!}" class="input-text" 
                               style="width: 100%;" title="Es la dirección de la matriz del establecimiento." placeholder="Ingrese direccion compania">
                    </div>
                    <div class="form-group">
                        {!!Form::label('telefono_1', 'Teléfono del contacto', array('id'=>'iconFormulario-step2'))!!}
                        <input type="text" name="telf_contacto_operador_1" value="{!!$telf_contacto_operador_1!!}" class="input-text" 
                               style="width: 100%;" title="Es el telefono del contacto del servicio, se puede tener varios servicios pero un solo representante al cual le haremos llegar noticias, mercadería, premios, etc." placeholder="Ingrese telefono contacto">
                    </div>
                    <div class="form-group">
                      {!!Form::label('email_1', 'Email del Contacto', array('id'=>'iconFormulario-step2'))!!}
                      <input type="text" name="email_contacto_operador" value="{!!$email_contacto_operador!!}" class="input-text" 
                             style="width: 100%;" title="Es el email del contacto del servicio, se puede tener varios servicios pero un solo representante al cual le haremos llegar noticias, mercadería, premios, etc." placeholder="Ingrese email contacto">
                    </div>
                    <div class="form-group">
                        <!-- <a class="btn btn-medium style1" onclick="AjaxContainerRegistro1('registro_step1_upload')" href="#">Guardar</a> -->
                        <!--<a class="btn btn-medium style1" onclick="AjaxContainerInfoOperador('registro_step1_upload')" href="#">Guardar</a>-->
                        <a class="btn btn-medium style1" onclick="AjaxContainerRegistro2('registro_step1_upload')" href="#">Guardar</a>
                        
                    </div>
                {!! Form::close() !!}

    
            </div> 

               
@section('scripts')
{!! HTML::script('js/jquery.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}

<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>

@stop



@stop