@extends('front.masterPageServicios')

@section('step1')

<?php
$operadorid1=0;
$operadorid2=0;
$operadorid3=0;
?>

@if(count($listOperadores) !=0 )
@foreach ($listOperadores as $operadores)
@if ($operadores->id_tipo_operador == 1)

    <?php $label_tipo_operador_agencia = 'Ver mi perfil';
$operadorid1=$operadores->id_usuario_op;
?>
@endif

@if ($operadores->id_tipo_operador == 2)
<?php $label_tipo_operador_empresa = 'Ver mi perfil';
$operadorid2=$operadores->id_usuario_op;?>
@endif
@if ($operadores->id_tipo_operador == 3)
<?php $label_tipo_operador_persona = 'Ver mi perfil';
$operadorid3=$operadores->id_usuario_op;?>
@endif

@endforeach
@endif

<div class="rowerror">
</div>
<div class="row-step41">
    <div id="space"></div>
    {!! Form::open(['url' => route('postTipoOperadorProfile'),  'id'=>'registro_step1']) !!}
    <input type="hidden"  name="tipo_operador" id="tipo_operador">
    
    <input type="hidden"  name="operador_id" id="operador_id">
    <div class="wrapperb uwa-font-aa">
        @if(isset($label_tipo_operador_agencia))
        <div class="box-content box-content-team left">
             <h2 class="box-content-title">
                Soy un               <strong>Negocio</strong>
            </h2>
            <div class="box-content-text">
                <p> Soy un negocio que proporciona directamente uno o más servicios turísticos.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$('#tipo_operador').val(1);$('#operador_id').val({!!$operadorid1!!});AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_agencia}}</a>
                </div>
            </div>
        </div>
        @endif
        
        @if(isset($label_tipo_operador_empresa))
        <div class="box-content box-content-team middle">
            <h2 class="box-content-title">
                Soy una                <strong>Agencia</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy un agencia que proporciona servicios turísticos, directamente y/o en coordinación con otras agencias y negocios.</p>
              <div class="box-content-button">
                    <a class="button" onclick="$('#tipo_operador').val(2);$('#operador_id').val({!!$operadorid2!!});AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_empresa}}</a>
                </div>
            </div>
        </div>
        @endif
        
        @if(isset($label_tipo_operador_persona))
        <div class="box-content box-content-team right">
           <h2 class="box-content-title">
                Bienvenido a                <strong>iWaNaTrip</strong>
            </h2>
            <div class="box-content-text">
                <p align="justify">
                    Ayudaremos a que tu negocio sea conocido por nuestra red de turistas y trabajaremos en conjunto para desarrollar el potencial turístico del Ecuador. Gracias a nuestros algoritmos de búsqueda, marketing digital y recomendaciones  por preferencia, harémos que los  viajeros lleguen a tus locales de una manera eficaz.</p> 
 
<p align="justify">Nuestro servicio de registro es completamente gratuito y tu negocio aparecerá en las búsquedas y recomendaciones de los viajeros. iWaNaTrip implementa principios de calidad y sostenibilidad turística por lo que la información que nos brindas será compartida a nivel mundial.</p>
                 <div class="box-content-button">
                    <a class="button" onclick="$('#tipo_operador').val(3);$('#operador_id').val({!!$operadorid3!!});AjaxContainerRegistro('registro_step1')" href="#">Continuar</a>
                </div>
            </div>
        </div>
        @endif
        
        @if(!isset($label_tipo_operador_persona)&& !isset($label_tipo_operador_empresa)&& !isset($label_tipo_operador_agencia))
        
        <div class="box-content box-content-individual right">
            <h2 class="box-content-title">
                Crear<strong>Perfil</strong>
            </h2>
            <div class="box-content-text">
                <p>
                    Para crear tu perfil haz click aquí e ingresa los servicios turisticos que ofreces completamente gratis.</p>
                <div class="box-content-button">
                    <a class="button" onclick="window.location.href = '{!!asset('/')!!}'" href="#">Crear perfil</a>
                </div>
            </div>
        </div>
        @endif
    </div>
    {!! Form::close() !!}
</div>


@stop