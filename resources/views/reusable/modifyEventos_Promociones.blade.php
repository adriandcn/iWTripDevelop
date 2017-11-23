@section('contentPanelServicios')	

{!! HTML::style('public/css/table.css') !!} 
<div id="contenedor-columnas-servicios">
    @if(isset($itinerarios) && count($itinerarios)>0)
    <div id='itinerarios-1'>
        <h1>Itinerarios</h1>
        
   
        <table width="400" >
            <tr>
                <td>Nombre</td><td>Activo</td>
            </tr>
        @foreach ($itinerarios as $itinerario)
        
        <tr><td width="35%">
                <a class="button-1 white" onclick="redirect('{!!asset('/itinerario')!!}/'+{!!$itinerario->id!!})" href="#">{!!$itinerario->nombre_itinerario!!}</a></td>
            <td>
            @if($itinerario->estado_itinerario==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}' checked name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerarioPrincipal')!!}/',{!!$itinerario->id!!},{!!$itinerario->id!!},'itinerarios')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$itinerario->id!!}'  name ='estado_itinerario_{!!$itinerario->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerarioPrincipal')!!}/',{!!$itinerario->id!!},{!!$itinerario->id!!},'itinerarios')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif

            
         </td>    
        </tr>
        
        @endforeach
</table>
    </div>
    @endif
    @if(isset($eventos) && count($eventos)>0)
    <div id='eventos-1'>
        <h1>Eventos</h1>
        <table width="400" >
            <tr>
                <td>Nombre</td><td>Activo</td>
            </tr>
        @foreach ($eventos as $evento)
         <tr><td width="35%">
        
                 <a class="button-1 white" onclick="redirect('{!!asset('/eventos')!!}/'+{!!$evento->id!!})" href="#">{!!$evento->nombre_evento!!}</a></td>
             <td>
                @if($evento->estado_evento==1)
                  <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_evento_{!!$evento->id!!}' checked name ='estado_evento_{!!$evento->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoEvento')!!}/',{!!$evento->id!!},{!!$evento->id!!},'eventos')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_evento_{!!$evento->id!!}'  name ='estado_evento_{!!$evento->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoItinerarioPrincipal')!!}/',{!!$evento->id!!},{!!$evento->id!!},'eventos')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
                </td>
            
         
        @endforeach
</table>
    </div>
    @endif
    @if(isset($promociones) && count($promociones)>0)
    <div id='promociones-1'>
        <h1>Promociones</h1>
       <table width="400" >
           <tr>
                <td>Nombre</td><td>Activo</td>
            </tr>
        @foreach ($promociones as $promocion)
        <tr><td width="35%">
        
                <a class="button-1 white" onclick="redirect('{!!asset('/promocion')!!}/'+{!!$promocion->id!!})" href="#">{!!$promocion->nombre_promocion!!}</a></td>
                
            <td>@if($promocion->estado_promocion==1)
                
                <label class="switch switch-green">
                        
                        <input type="checkbox" id='estado_itinerario_{!!$promocion->id!!}' checked name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoPromocion')!!}/',{!!$promocion->id!!},{!!$promocion->id!!},'promociones')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @else
                
                 <label class="switch switch-green">
                            
                        <input type="checkbox" id='estado_itinerario_{!!$promocion->id!!}'  name ='estado_itinerario_{!!$promocion->id!!}' class="switch-input" onchange="AjaxContainerRetrunBurnURL('{!!asset('/estadoPromocion')!!}/',{!!$promocion->id!!},{!!$promocion->id!!},'promociones')">
                        <span class="switch-label" data-on="Si" data-off="No"></span>
                        <span class="switch-handle"></span>
                        
                    </label>
                @endif
            </td>
            
            
            
        
        @endforeach
</table>
    </div>
    @endif
    
        @if(isset($hijos) && count($hijos)>0)
    <div id='itinerarios-1'>
        <h1>Dependencias</h1>
        
   
        <table width="400" >
            <tr>
                <td>Nombre</td>
            </tr>
        @foreach ($hijos as $hijos)
        
        <tr><td width="35%">
                
            
                 <a class="button-1 white" onclick="redirect('{!!asset('/servicios/serviciooperador')!!}/{!!$hijos->id!!}/4')" href="#">{!!$hijos->nombre_servicio!!}</a></td>

              
        </tr>
        
        @endforeach
</table>
    </div>
    @endif

</div>

<script>
function redirect($url)
{
    
    window.location.href = $url;
}
</script>


@endsection