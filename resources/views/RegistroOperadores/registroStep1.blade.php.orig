@extends('front.masterPageServicios')

@section('step1')




<div class="row">






    {!! Form::open(['url' => route('upload-postservicios'),  'id'=>'registro_step1']) !!}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-6 col-md-offset-3">
            <div class="col-md-12">
                <h3> {{ trans('registro/registrosteps.step1') }}</h3>
                <div class="form-group">


                    {!!Form::label('company', 'Compania Nombre', array('class'=>'control-label'))!!}
                    {!!Form::text('nombre_empresa_operador', null, array('class'=>'form-control','placeholder'=>'Ingrese Nombre Compania'))!!}

                </div>
                <div class="form-group">
                    <label class="control-label">Contacto Nombre</label>
                    <input id="nombre_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre contacto" />
                    
                    
                </div>
                <div class="form-group">
                    <label class="control-label">Telefono</label>
                    <input id="telf_contacto_operador_1" maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese telefono contacto" />
                </div>
                <!--      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"  onclick="$(this).closest('form').submit()">Siguiente</button>-->
                <a href="#" class="button" onclick="$(this).closest('form').submit()">siguiente</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}


</div>

@section('scripts')

<!-- End Dropzone Preview Template -->
{!! HTML::script('/js/registro/registroajax.js') !!}
@stop

@stop
