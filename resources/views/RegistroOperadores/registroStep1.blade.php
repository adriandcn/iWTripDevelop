@extends('front.masterPageServicios')

@section('step1')



<?php

$label_tipo_operador_agencia = 'Registro gratis';
$label_tipo_operador_empresa = 'Registro gratis';
$label_tipo_operador_persona = 'Registro gratis';
?>
@if(count($listOperadores) !=0 )
@foreach ($listOperadores as $operadores)
@if ($operadores->id_tipo_operador === 1)
<?php $label_tipo_operador_agencia = 'Actualizar' ?>
@elseif ($operadores->id_tipo_operador === 2)
<?php $label_tipo_operador_empresa = 'Actualizar' ?>
@else (count($records) === 3)
<?php $label_tipo_operador_persona = 'Actualizar' ?>
@endif
@endforeach
@endif

<div class="rowerror">
</div>
<div class="row-step41">
    <div id="space"></div>
    {!! Form::open(['url' => route('upload-postTipoOperador'),  'id'=>'registro_step1']) !!}
    <input type="hidden" value="0" name="tipo_operador" id="tipo_operador">
    <div class="wrapperb uwa-font-aa">
        <div class="box-content box-content-team left">
            <h2 class="box-content-title">
                Soy un               <strong>Negocio</strong>
            </h2>
            <div class="box-content-text">
                <p> Soy un negocio que proporciona directamente uno o más servicios turísticos.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(1);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_agencia}}</a>
                </div>
            </div>
        </div>
        <div class="box-content box-content-team middle">
            <h2 class="box-content-title">
                Soy una                <strong>Agencia</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy un agencia que proporciona servicios turísticos, directamente y/o en coordinación con otras agencias y negocios.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(2);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_empresa}}</a>
                </div>
            </div>
        </div>
        <div class="box-content box-content-individual right">
            <h2 class="box-content-title">
                Soy solo               <strong>Yo</strong>
            </h2>
            <div class="box-content-text">
                <p>Soy una persona que proporciona servicios de guaina y/o traducción ó, soy una persona en busca de encontrar gente afín para organizar un viaje dentro del Ecuador.</p>
                <div class="box-content-button">
                    <a class="button" onclick="$(tipo_operador).val(3);AjaxContainerRegistro('registro_step1')" href="#">{{$label_tipo_operador_persona}}</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>


@stop