
<div class="rowerrorM">
</div>
<div id="testboxForm" class="testboxForm">
    <h1>Invita a un amigo </h1>
    <hr>
    {!! Form::open(['url' => route('postinvitaamigo'),  'id'=>'invitacion']) !!}
    
       <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'De', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('invitacion_de',session('user_name'), array('class'=>'inputtext-step2-popup','placeholder'=>'Invitación de'))!!}
       </div>
    <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'Para', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('invitacion_para',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Invitación para'))!!}
       </div>
    
    <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', 'Email', array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('correo',NULL, array('class'=>'inputtext-step2-popup','placeholder'=>'Email para quien va la invitación'))!!}
       </div>
       
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" id="btnsubm" onclick="AjaxContainerRegistroWithMessage('invitacion','simplemodal-wrap','La invitación ha sido enviada, puede invitar más amigos si lo desa.')" href="#">Enviar</a>
            </div>              
        </div>
    
    <div id="logo_">
                <div id="logo-imagen">

                    <a href="eng"><img src="{{ asset('public/img/index-logo.png')}}" width="170" height="158" alt="IguanaTrip" /></a> 
                  
                </div>

            </div>

{!! Form::close() !!}
</div>
