@extends('responsive.dashboard')
@section('content')
{!! HTML::style('css/calendar/ui-jquery.css') !!}


{!! HTML::script('js/jquery.js') !!}
<script>
$("#dashboard1").hide();        
$("#dashboard2").hide();    
$("#dashboard3").hide();
$("#dashboard4").hide();
$("#dashboard5").show();
$("#dashboard6").hide();
$("#dashboard7").hide();
$("#dashboard8").hide();
</script>


            <div class="col-xs-12 col-md-12 res" id="target">

            <div id="main">
                    <div class="section-info">
                        <h4 class="section-title">Lista de Promociones</h4>
                        
                        <div class="row">
                            <div class="col-md-12 box">
                                <div class="panel-group" id="accordion-4">
                                <?php $contador = 1; ?>
                                @foreach($promociones as $promo)
                                    <div class="panel style3">
                                        <h5 class="panel-title" style="display: inline-table;width: 90%;">
                                            <a href="#acc3-{!!$promo->id!!}" data-toggle="collapse" data-parent="#accordion-3">
                                                <span class="open-sub"></span>
                                                <strong onclick="GetDataEditPromo('{!!asset('/promo')!!}/{!!$promo->id!!}')"> {!!$promo->nombre_promocion!!} </strong>
                                                
                                            </a>
                                        </h5>
                                        <div style="display: inline-table;">
                                            <label style="padding-left: 2%; float: right;">  Activo</label>
                                            <input type="checkbox"  style="float: right;" id='estado_promo_{!!$contador!!}' class="agrupar" name="estado_promo" value="{!!$promo->estado_promocion!!}"
                                                       onchange="UpdateEstado('{!!asset('/updateEstadoPromo')!!}/{!!$promo->id!!}/{!!$promo->id_usuario_servicio!!}')">
                                                
                                        </div>
                                        <div class="panel-collapse collapse" id="acc3-{!!$promo->id!!}">
                                            <div class="panel-content">
                                                <p> {!!$promo->descripcion_promocion!!} </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php $contador++; ?>
                                @endforeach    
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    
                </div>

    
            </div> 



               
@section('scripts')
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('js/jsModal/basic.js') !!}
{!! HTML::script('js/calendar/calendar.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}

<script>
    
$(document).ready(function () {
    
    var count = $(".agrupar").length;
    //alert(count);
    var i;
    for (i = 0; i < count; i++) {
        //alert(i+1);
        var indice = i+1
        var check = $("#estado_promo_"+indice).val();
        //alert(check);
                if(check == 1){
                    $("#estado_promo_"+indice).prop( "checked", true );
                }
    } 

                
                
});
</script>

    @if(session('device')!='mobile')
    
    @else
   <?php $header = "/img/portada_face_iwanatrip_04.jpg";?> 
  <script>

jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
   $(".col-xs-12.col-md-12.res").css('padding','0');
   
});

</script>


    @endif
@stop



@stop