@extends('responsive.dashboard')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />

{!! HTML::script('js/jquery.js') !!}

<script>
$("#dashboard1").hide();
$("#dashboard2").hide();
$("#dashboard3").show();
$("#dashboard4").hide();
</script>

{!! Form::open(['url' => route('upload-postoperador2'),  'class'=>'form-bordered', 'id'=>'registro_step1_detalles']) !!}                 
            
    <div id="account-dashboard" class="tab-content in active">
               <div class="row view-account-information same-height add-clearfix">
                
                   <div id="main" class="col-sm-8 col-md-9">
                        <div class="product type-product">
                            <div class="row single-product-details ">
                                <div class="product-images col-sm-5 box-lg  ">
                                    <div id="sync1" class="owl-carousel images">
                                        <div class="post-slider style3 owl-carousel box">
                                           <?php //print_r($imagenes);echo count($imagenes);die();?>
                                            @if(isset($imagenes) && count($imagenes)>0)
                                            <?php //print_r($imagenes); die();?>
                                            @foreach ($imagenes as $imagen)
                                            
                                            <?php $header= asset('images/fullsize/'.$imagen->filename)?>
                                            <a href="{{ asset('images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup">
                                                <img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$atraccion->nombre_servicio!!}">
                                                
                                                @if($imagen->descripcion_fotografia!="")
                                                <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                                    <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>
                                                    
                                                </div>
                                                @endif
                                            </a>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div id="sync2" class="owl-carousel post-slider style3 thumbnails" data-items="4">
                                        @if(isset($imagenes) && count($imagenes)>0)
                                        
                                         @foreach ($imagenes as $imagen)
                                           
                                         
                                          <div class="item">
                                            <a href="#"><img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$atraccion->nombre_servicio!!}"></a>
                                            
                                            
                                        </div>
                                       
                                            @endforeach
                                            @endif
                                    </div>
                            
                                    
                                           @if(isset($explore) && count($explore)>0)
                                    <div class="social-wrap ">
                                        <label>{{ trans('publico/labels.label29')}}</label>
                                        <div class="social-icons">
                                            <?php //print_r($explore); die();?>
                                            @foreach ($explore as $explor)
                                                
                                            <a href="#" class="social-icon" title="{!!$explor->nombre_servicio_est!!}"><i title="{!!$explor->nombre_servicio_est!!}" class="fa  has-circle" data-toggle="tooltip" data-placement="top" ><img style=" max-width: 60%;" class='activities' src="{{ asset('/img/iconos/'.$explor->url_image)}}" alt="{!!$explor->nombre_servicio_est!!}"></i></a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    
                                   
                                </div>
                                <div class="summary entry-summary col-sm-7 box-lg">
                                    <div class="clearfix">
                                        <h2 class="product-title entry-title">{!!$atraccion->nombre_servicio!!} </h2>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                    
                                    @if($provincia!=null )
                                     @if($canton!=null)
                                     @if($parroquia!=null)
                                
                                       <span class="product-price box">{!!$provincia->nombre!!}-{!!$canton->nombre!!}-{!!$parroquia->nombre!!}</span>
                                    
                                       
                                       @else
                                       <span class="product-price box">{!!$provincia->nombre!!}-{!!$canton->nombre!!}</span>
                                            @endif
                                     @else
                                      <span class="product-price box">{!!$provincia->nombre!!}</span>
                                
                                  
                                @endif
                                    
                                    @endif
                                    
                                     
                             
                                
                                    @if($atraccion->id_catalogo_servicio==1)
                                    <img src="{{ asset('img/ic_serv/comida_bebida.png')}}" title="Alimentación y bebidas" alt="alimentacion">
                                    @elseif($atraccion->id_catalogo_servicio==2)
                                    <img src="{{ asset('img/ic_serv/hospedaje.png')}}" title="Sleep" alt="hospedaje">
                                    @elseif($atraccion->id_catalogo_servicio==3)
                                    <img src="{{ asset('img/ic_serv/icon_viajes.png')}}" title="Tours" alt="viajes">
                                    @elseif($atraccion->id_catalogo_servicio==4)
                                    <img src="{{ asset('img/ic_serv/centro_turistico.png')}}" title="Turismo" alt="turismo">
                                    @endif
                                       @if(session('locale') == 'es' )
                                        <pre class="mores">{!!$atraccion->detalle_servicio!!}</pre>
                                        @elseif(session('locale') == 'en' && $atraccion->detalle_servicio_eng!='') 
                                        <pre class="mores">{!!$atraccion->detalle_servicio_eng!!}</pre>
                                        @else
                                        <pre class="mores">{!!$atraccion->detalle_servicio!!}</pre>

                                        @endif
                                    
                                    <div class="clearfix box" style=" width: 90%;  margin-left: 10%;">
                                            <div class="col-xs-12 col-lg-6">
                                                
                                                @if($provincia!=null)
                                                <img class='activities' src="{{ asset('img/Maps/')}}/{!!$atraccion->id_provincia!!}.png" title="{!!$provincia->nombre!!}" alt="{!!$provincia->nombre!!}">
                                               @else
                                                
                                                <img class='activities' src="{{ asset('img/Maps/')}}/0.png" title="Ecuador" alt="Ecuador">
                                                @endif
                                            </div>
                                        </div>
                              
                             
                                <div class="likes" id="likes">
                                    
                                    @section('likes')
                                @show
                                </div>
                                       
                                </div>
                            </div>
                            
                            
                            
                            <div class="woocommerce-tabs tab-container vertical-tab clearfix box">
                                <ul class="tabs">
                                    <li ><a href="#tab3-1" data-toggle="tab">{{ trans('publico/labels.label41')}}</a></li>
                                    <li class="active"><a href="#tab3-2" data-toggle="tab">{{ trans('publico/labels.label36')}}</a></li>
                                    
                                    @if(count($itinerarios)>0)
                                    <li ><a href="#tab3-5" data-toggle="tab">{{ trans('publico/labels.label46')}}</a></li>
                                    @endif
                                   
                                </ul>
                                
                                <!-Info->
                                <div id="tab3-1" class="tab-content panel entry-content">
                                      <div class="tab-pane">
                                        
                                        @if($atraccion->direccion_servicio!="")
                                        <pre class="mores">{{ trans('publico/labels.label35')}}: {!!$atraccion->direccion_servicio!!}</pre>
                                        @endif
                                        
                                        @if($atraccion->horario!="")
                                        <pre class="mores">{{ trans('publico/labels.label75')}}: {!!$atraccion->horario!!}</pre>
                                        @endif
                                                            @if($atraccion->precio_desde!="")
                                        <pre class="mores">{{ trans('publico/labels.label73')}}: {!!$atraccion->precio_desde!!}</pre>
                                        @endif
                                                            @if($atraccion->precio_hasta!="")
                                        <pre class="mores">{{ trans('publico/labels.label74')}}: {!!$atraccion->precio_hasta!!}</pre>
                                        @endif
                                        
                                        @if($atraccion->telefono!="")
                                        <pre class="mores">{{ trans('publico/labels.label38')}}: {!!$atraccion->telefono!!}</pre>
                                        @endif
                                        @if($atraccion->correo_contacto!="")
                                        <pre class="mores">{{ trans('publico/labels.label39')}}: {!!$atraccion->correo_contacto!!}</pre>
                                        @endif
                                        @if($atraccion->pagina_web!="")
                                        <pre class="mores">{{ trans('publico/labels.label40')}}: {!!$atraccion->pagina_web!!}</pre>
                                        @endif
                                    </div>
                                </div>

                                <!-Como llegar->
                                <div id="tab3-2" class="tab-content panel entry-content in active">
                                    <div class="tab-pane">
                                        <!--<link href="http://localhost/Booking/index.php?controller=pjFront&action=pjActionLoadCss&cid=73" type="text/css" rel="stylesheet" />
                                        <script type="text/javascript" src="http://localhost/Booking/index.php?controller=pjFront&action=pjActionLoad&cid=73&view=1"></script>-->
                                          @if(session('locale') == 'es' )
                                        <pre class="mores">{!!$atraccion->como_llegar1!!}</pre>
                                        <pre class="mores">{!!$atraccion->como_llegar1_1!!}</pre>
                                        
                                        @elseif(session('locale') == 'en' && $atraccion->como_llegar2!='') 
                                        <pre class="mores">{!!$atraccion->como_llegar2!!}</pre>
                                        <pre class="mores">{!!$atraccion->como_llegar2_2!!}</pre>
                                        @else
                                        <pre class="mores">{!!$atraccion->como_llegar1!!}</pre>
                                        <pre class="mores">{!!$atraccion->como_llegar1_1!!}</pre>

                                        @endif
                                        
                                        
                                        <div class="soap-google-map maps">
                                        
      
                
            </div>
                                    </div>
                                </div>
                                
                                
                                <!-Itinerarios->
                                   @if(count($itinerarios)>0)
                                <div id="tab3-5" class="tab-content panel entry-content ">
                                    <div class="tab-pane">
                                        <div id="comments">
                                            <h3>{{ trans('publico/labels.label46')}}</h3>
                                            <ol class="commentlist">

                                             
                                                
                                                @foreach ($itinerarios as $itiner)
                                                <li class="comment">

                                                    <div class="author-img">
                                                        @if($ImgItiner!=null)
                                                        @foreach ($ImgItiner as $img)
                                                        @if($img->id_auxiliar==$itiner->id)
                                                        <span><img src="{{ asset('images/icon/'.$img->filename)}}" alt=""></span>
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        <span><img src="http://placehold.it/100x100" alt=""></span>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content">
                                                        <h5 class="comment-author-name"><a href="#">{!!$itiner->nombre_itinerario!!}</a></h5>
                                                        <span data-toggle="tooltip" title="4" class="star-rating">
                                                            <span data-stars="4"></span>
                                                        </span>
                                                        <?php
                                                            $date = date_create($itiner->fecha_desde);
                                                            $date2 = date_create($itiner->fecha_hasta);
                                                             ?>

                        
                                                        <span class="comment-date">{!!date_format($date, 'j F ')!!}-{!!date_format($date2, 'j F ')!!}</span>
                                                        <div class="description">
                                                            <p>{!!$itiner->descripcion_itinerario!!}</p>
                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            
                                            </ol>
                                        </div>

                                    </div>
                                </div>
                                    @endif
                                    
                       
                                    
                              
                            </div>

                        </div>
                        @if(count($related)>0)
                      <div class="product type-product">
                            <h4>{{ trans('publico/labels.label47')}}</h4>
                            <ul class="related products row add-clearfix">
                            
                                <!-Despliega los hijos que tiene una atraccion especifica ->                                

                                <?php $flag=0;?>
                                @for ($x = 0; $x < count($related); $x++)
                                    @if($flag==0)
                                         <li class="product col-sms-6 col-sm-6 col-md-4 box">
                                              <?php
                        $nombre = str_replace(' ', '-', $related[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                                             <a class="product-image" href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$related[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">
                                                  <div class="first-img">
                                                        <img alt="" src="{{ asset('images/icon/'.$related[$x]->filename)}}">
                                                  </div>
                                                    @if(isset($related[$x+1])&& $related[$x+1]->id_auxiliar==$related[$x]->id_auxiliar)
                                                  <div class="back-img">
                                                      <img alt="" src="{{ asset('images/icon/'.$related[$x+1]->filename)}}">
                                                  </div>
                                       <?php $flag=1;?>
                                        @endif
                                              </a>
                                    <div class="product-content">
                                        <?php
                        $nombre = str_replace(' ', '-', $related[$x]->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                        
                                        <h5 class="product-title"><a  href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$related[$x]->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show')">{!!$related[$x]->nombre_servicio!!}</a></h5>
                                        <span class="product-price"><span class="currency-symbol"></span>{!!$related[$x]->catalogo_nombre!!}</span>
                                       <span class="star-rating" title="" data-toggle="tooltip" data-original-title="4">
                                            <span data-stars="4"></span>
                                        </span>
                                        <p><a href="#">{!!$related[$x]->nombre!!}</p>
                                        
                                    </div>
                                    
                                </li>
                                @else
                                <?php $flag=0;?>
                                  @endif
                                @endfor
                                
                                
                        
                        
                        
                            </ul>
                        </div>
                        @endif
                        
                      
                        
                         <div class="product type-product">
                            <ul class="related products row add-clearfix cercanos">
                                @section('cercanos')
                                @show
                            </ul>
                        </div>
                          
                    </div>
                    <div class="sidebar col-sm-4 col-md-3" >

                        @if(session('device')!='mobile')
                 
                        @endif
                        
                      
                        
                        <div class="promocionesAtraccion">
                              @section('promocionesAtraccion')
                                @show
                            
                        </div>

                        
                        <div class="eventosAtraccion">
                              @section('eventosAtraccion')
                                @show
                            
                        </div>
                        
                        
                         <div class="box">
                            <h4>Tags</h4>
                            <div class="tags">
                                @if($atraccion->tags!="")
                                <?php 
                            $tags = explode(",", $atraccion->tags);
                            ?>
                                  @foreach ($tags as $tag)
                                <a class="tag" href="#">{!!$tag!!}</a>
                                @endforeach
                                @endif
                                @if($provincia!=null)
                                <a class="tag" href="#">#{!!$provincia->nombre!!}</a>
                                @endif
                                @if($canton!=null)
                                <a class="tag" href="#">#{!!$canton->nombre!!}</a>
                                @endif
                                @if($parroquia!=null)
                                <a class="tag" href="#">#{!!$parroquia->nombre!!}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                   
                       
        </div>
        


             <div class="col-sm-12 col-md-12 text-center">
            <div class="form-group" style="display: inline-table; margin-left: 4%;">
                 <a class="btn btn-medium style1" title="Volver" 
                    onclick="AjaxContainerEdicionServicios({!!$atraccion->id!!}, {!!$atraccion->id_catalogo_servicio!!});" href="#">Volver</a>
                    <!-- onclick="window.location.href = '/servicios/serviciooperador1/{!!$atraccion->id!!}/{!!$atraccion->id_catalogo_servicio!!}'" -->
                    
            </div>

               </div>
                <br><br>
     
    </div>
{!! Form::close() !!}  


 
  
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


@if(session('device')!='mobile')
    
    @else
    <?php $header = "/img/portada_face_iwanatrip_04.jpg";?>
  <script>
      


jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
});
  

</script>
    @endif
    
    
    <script type="text/javascript">
        sjq(".soap-google-map").gmap3({
            map: {
                options: {
                     scrollwheel: false,

                    center: [{!!$atraccion->latitud_servicio!!},{!!$atraccion->longitud_servicio!!}],
                    zoom: 15,
					mapTypeControlOptions: {
						position: google.maps.ControlPosition.RIGHT_BOTTOM
					},
					zoomControlOptions: {
						position: google.maps.ControlPosition.LEFT_CENTER
					},
					panControlOptions: {
						position: google.maps.ControlPosition.LEFT_CENTER
					}
                }
            },
            marker:{
                values: [
                    {latLng:[ {!!$atraccion->latitud_servicio!!},{!!$atraccion->longitud_servicio!!}], data:"Ecuador"}
                    

                ]
                ,
                options: {
              
                 
    //draggable: false,


                    //icon: "{!!asset("img/CollageIsmage_opt.png")!!}",
                },
            }
        });
    </script>

    
<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
     <script>
     @if(session('device')!='mobile')
      $(".maps").dblclick(function () {
          window.open('https://maps.google.com.ec/maps?saddr=My Location&daddr='  + {!!$atraccion->latitud_servicio!!} + ',' + {!!$atraccion->longitud_servicio!!},"_blank");
          
                
            });
    
    @else
   $(".maps").dblclick(function () {
    
    myNavFunc();
 });
 
 function myNavFunc(){
    // If it's an iPhone..
    
         window.open("maps://maps.google.com/maps?daddr={!!$atraccion->latitud_servicio!!},{!!$atraccion->longitud_servicio!!}");
    
}
 


    @endif
    </script>
    
    
    
@stop

 
@stop