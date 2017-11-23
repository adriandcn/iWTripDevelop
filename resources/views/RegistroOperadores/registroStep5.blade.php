@extends('front.masterPageRegistro')
@section('step4')

	{!! Form::open(['url' => 'registro/step1', 'method' => 'post', 'role' => 'form', 'id'=>'registro_step1'] ) !!}

	<div class="row setup-content" id="step-5">
		<div class="col-xs-6 col-md-offset-3">
			<div class="col-md-12">
				<h3> {{ trans('registro/registrosteps.step4') }}</h3>
				<div id="">
					<label class="control-label">{{ trans('registro/registrosteps.step4-field1') }}</label>
					<input  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre"  />
					<label class="control-label">{{ trans('registro/registrosteps.step4-field2') }}</label>
					<input  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre"  />
					<label class="control-label">{{ trans('registro/registrosteps.step4-field3') }}</label>
					<input  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre"  />
					<label class="control-label">{{ trans('registro/registrosteps.step4-field5') }}</label>
					<input  maxlength="100" type="text" required="required" class="form-control" placeholder="Ingrese Nombre"  />
				</div>
				<button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
			</div>
		</div>
	</div>


	{!! Form::close() !!}

@stop