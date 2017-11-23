@section('contentPanelItinerarios')	
{!! HTML::style('public/css/table.css') !!} 
<div id="itinerario-detalle">
    
    <h2>Detalle del tour o itinerario <strong class="add-registro" onclick="RenderPartialGenericMap('reusable.createNewPuntoItinerario', {!!$id_itinerario!!})">+</strong> (agregar registro) </h2>
    <input type="hidden" value="" class='id_usuario_servicio' name="id_usuario_servicio">
    <table class="tabla-itinerario-detalle">
        <tr>
            <th>Punto de Encuentro</th>
            <th>Dia/Hora</th>
            <th>Confirmado</th>
        </tr>
        @foreach ($listItinerarios as $detalle)
        <tr>
            <td>
                <a class="button-1 white" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario', {!!$id_itinerario!!}, {!!$detalle->id!!})" href="#">{!!$detalle->lugar_punto!!}</a>
            </td>
            <td>
            <a class="button-1 white" onclick="RenderPartialGenericMapUpdate('reusable.createNewPuntoItinerario', {!!$id_itinerario!!}, {!!$detalle->id!!})" href="#">{!!$detalle->diahora_punto!!}</a>    
            </td>
            <td> 
                @if($detalle->estado_punto==1)
                  <label class="switch switch-green">
                        <input type="checkbox" id='estado_itinerario_{!!$detalle->id!!}' checked name ='estado_itinerario_{!!$detalle->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerario')!!}/',{!!$detalle->id!!},{!!$detalle->id!!},'itinerario-detalle')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                <label class="switch switch-green">
                        <input type="checkbox" id='estado_itinerario_{!!$detalle->id!!}'  name ='estado_itinerario_{!!$detalle->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinrario')!!}/',{!!$detalle->id!!},{!!$detalle->id!!})">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
            </td>
            <td>
                <div id='delete'>
                    <h2> <strong class="remove-registro" onclick="alertaConfirmItiner({!!$detalle->id!!})" >X</strong></h2></div>
            </td>
        </tr>
        
        <script>
        
           
            //Funcion para eliminación
            
            
            function alertaConfirmItiner(id){

            var r = confirm("Está seguro de que desea eliminar este itinerario?");
                    if (r == true) {
            
            AjaxContainerRetrunBurnURL('{!!asset('/deleteItinerario')!!}/',id,id);
            GetDataAjaxSectionItiner('{!!asset('/getlistaItinerarios')!!}/'+id,$('.id_usuario_servicio').val());
            
                    } else {
            txt = "Cencelado";
                    }
            }
                </script>
        @endforeach 

    </table>

</div>
<br>
@section('scripts')
{!! HTML::script('public/js/tabla_dinamica.js') !!}
{!! HTML::script('public/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('public/js/jsModal/basic.js') !!}

@stop
@endsection