@extends('responsive.dashboard')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />

{!! HTML::script('js/jquery.js') !!}


<script>
$("#dashboard1").hide();        
$("#dashboard2").hide();    
$("#dashboard3").hide();
$("#dashboard4").hide();
$("#dashboard5").hide();
$("#dashboard6").hide();
$("#dashboard7").hide();
$("#dashboard8").hide();
$("#dashboard10").show();
</script>




    <div id="account-dashboard" class="tab-content in active">
                <div class="product type-product">
                    <div class="row single-product-details">
                        <div class="product-images col-sm-6 box-lg">
                                    <?php $header= asset('images/fullsize/'.$imagenes[0]->filename)?>
                                    <div id="sync1" class="owl-carousel images">
                                        <div class="post-slider style3 owl-carousel box">
                                            <?php
                                            $profile=null;
                                            ?>
                                            
                                            @foreach ($imagenes as $imagen)
    
                                            @if($imagen->estado_fotografia==1)
                                            <?php
                                            $profile=$imagen;
                                            ?>
                                            @endif
                                            
                                            @endforeach
                                            
                                            @foreach ($imagenes as $imagen)
                                            @if($profile!=null)
                                            <?php $header= asset('images/fullsize/'.$profile->filename)?>
                                            <a href="{{ asset('images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup">
                                                <img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$promocion[0]->nombre_promocion!!}">
                                                
                                                @if($profile->descripcion_fotografia!="")
                                                <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                                    <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>
                                                    
                                                </div>
                                                @endif
                                            </a>
                                            @else
                                            <?php $header= asset('images/fullsize/'.$imagenes->filename)?>
                                             <a href="{{ asset('images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup">
                                                <img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$promocion[0]->nombre_promocion!!}">
                                                
                                                @if($imagenes->descripcion_fotografia!="")
                                                <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                                    <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>
                                                    
                                                </div>
                                                @endif
                                            </a>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div id="sync2" class="owl-carousel post-slider style3 thumbnails" data-items="4">
                                         @foreach ($imagenes as $imagen)
                                           
                                          <div class="item">
                                            <a href="{{ asset('images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup"><img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$promocion[0]->nombre_promocion!!}"></a>
                                        </div>
                                            @endforeach
                                    </div>
                                    
                                                       
                            
                            
                            
                        </div>
                        <div class="summary entry-summary col-sm-6 box-lg">
                            <div class="clearfix">
                                <h2 class="product-title entry-title"> {!!$promocion[0]->nombre_promocion!!} </h2>
                                <!--<span class="star-rating" title="4" data-toggle="tooltip">
                                    <span data-stars="4"></span>
                                </span> -->
                            </div>
                            @if($promocion[0]->precio_normal != 0)
                            <span class="product-price box">${!!$promocion[0]->precio_normal!!}</span>
                            @else
                            <span class="product-price box"> FREE </span>
                            @endif
                            <p>{!!$promocion[0]->descripcion_promocion !!}</p>
            
                        </div>
                    </div>
                    <div class="woocommerce-tabs tab-container vertical-tab clearfix box">
                        <ul class="tabs">
                            <li class="active"><a href="#tab3-2" data-toggle="tab">{{ trans('publico/labels.informacionpromocion')}}</a></li>
                        </ul>
                        <div id="tab3-3" class="tab-content panel entry-content in active">
                           <div class="tab-pane">
                                <dl class="shop_attributes">
                                    <dt>{{ trans('publico/labels.fechainicio')}} :</dt>
                                    <dd> <?php echo date("d-m-Y", strtotime($promocion[0]->fecha_desde));?> </dd>
                                    <dt> {{ trans('publico/labels.fechahasta')}} :</dt>
                                    <dd> <?php echo date("d-m-Y", strtotime($promocion[0]->fecha_hasta));?> </dd>
                                    <dt>{{ trans('publico/labels.descuento')}} :</dt>
                                    <dd> <?php echo $promocion[0]->descuento." %";?> </dd>
                                    <dt>{{ trans('publico/labels.codigo')}} :</dt>
                                    <dd> {!!$promocion[0]->codigo_promocion !!} </dd>
                                    <dt>{{ trans('publico/labels.permanente')}} :</dt>
                                    <dd> <?php if($promocion[0]->permanente == 1){
                                        echo "Si";
                                    }else{
                                        echo "No";
                                    }?> </dd>                                    
                                    <dt class="note">{{ trans('publico/labels.observaciones')}}:</dt>
                                    <dd> {!!$promocion[0]->observaciones_promocion!!} </dd>
    
                                </dl>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <!-- VISTA PREVIA Y GUARDAR-->
        <br>
            <div class="form-group" style="display: inline-table; margin-left: 4%;">

                
                
            </div>
        </div> 


        <br>
        <div class="col-xs-12 col-md-12 res text-center">
            <div class="form-group" style="display: inline-table; margin-left: 4%;">
                                  <a class="btn btn-medium style1" title="Volver" 
                    onclick="AjaxContainerEdicionPromociones({!!$promocion[0]->id!!});" href="#">Volver</a>
            </div>
        </div>


  
@section('scripts')

{!! HTML::script('js/jquery.js') !!}
<script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
<script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.stellar.min.js')}}"></script>
    <!-- waypoint -->
    <script type="text/javascript" src="{{ asset('public_components/js/waypoints.min.js')}}"></script>
    

<script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

<script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{ asset('public_components/js/gmap3.js')}}"></script>



    <script>
    
            $(document).ready(function () {
  
                $("#listarpromo1").attr("href", "{!!asset('/listarPromociones1')!!}/{!!$promocion[0]->id_usuario_servicio!!}");
            });
    
    </script>
    
@if(session('device')!='mobile')
    
    @else
    <?php $header = "/img/portada_face_iwanatrip_04.jpg";?>
  <script>
      


jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
});
  

</script>
    @endif
    

    
<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
    
@stop

 
@stop
