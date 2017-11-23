<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>{!!$agrupacion[0]->nombre!!} | iWaNaTrip</title>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <?php 
             $length = 150;
            //Primero eliminamos las etiquetas html y luego cortamos el string
            $stringDisplay = substr(strip_tags($atraccion[0]->detalle_servicio), 0, $length);
            //Si el texto es mayor que la longitud se agrega puntos suspensivos
            if (strlen(strip_tags($atraccion[0]->detalle_servicio)) > $length)
            $stringDisplay .= ' ...';

            $str = utf8_encode("Viaja y descubre lugares, tours, comida, huecas, aventuras,gente y más. Hoteles Diversión Restaurantes Cultura"); 
    
                ?>
                                    
        <meta name="description" content='{!!$atraccion[0]->nombre_servicio!!}. {!!str_replace("\""," ",$stringDisplay)!!} |iWaNaTrip.com'>
        <meta name="keywords" content="{!!$atraccion[0]->nombre_servicio!!} . {!!$str!!}">
        <meta name="author" content="iWaNaTrip group">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="Content-Language" content="es">
        <META NAME="robots" CONTENT="all | index | follow">
        <META name="Revisit" content="3 days"> 
      
        <meta property="og:title" content="{!!$atraccion[0]->nombre_servicio!!}" /> 
        <meta property="og:description" content="{!!$atraccion[0]->nombre_servicio!!}. {!!$stringDisplay!!}" />
        @if(isset($imagenes[0]->filename))
        <meta property="og:image" content="{{ asset('images/icon/')}}/{{$imagenes[0]->filename}}" />
         @endif
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme Styles -->
        
        <link rel="apple-touch-icon" href="{{ asset('img/60x60_logo_iwana.png')}}">
        
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/76x76logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/120x120logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/180x180logo_iwana.png')}}">
        <link rel="icon" sizes="180x180" href="{{ asset('img/180x180logo_iwana.png')}}">
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" />
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png')}}" />  

        <!-- Theme Styles -->
        {!! HTML::style('public_components/css/bootstrap.min.css') !!} 
        {!! HTML::style('public_components/css/font-awesome.min.css') !!} 
        {!! HTML::style('public_components/css/letras.css') !!} 
        {!! HTML::style('public_components/css/animate.min.css') !!} 
        {!! HTML::style('public_components/components/owl-carousel/owl.carousel.css') !!} 
        {!! HTML::style('public_components/css/font-awesome.min.css') !!} 
        {!! HTML::style('public_components/components/owl-carousel/owl.transitions.css') !!} 
        <!--
        <link rel="stylesheet" href="{{ asset('public_components/css/bootstrap.min.css')}}"> 
        <link rel="stylesheet" href="{{ asset('public_components/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        
        <link rel="stylesheet" href="{{ asset('public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/font-awesome.min.css')}}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
        
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
        <link rel="stylesheet" href="{{ asset('public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/responsive.css')}}">
  {!!HTML::script('js/sweetAlert/sweetalert2.min.js') !!}

  
        <!-- CSS for IE -->
        <!--[if lte IE 9]>
            <link rel="stylesheet" type="text/css" href="{{ asset('public_components/css/ie.css')}}" />
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->

        
         
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85546019-1', 'auto');
  ga('send', 'pageview');

</script>
        <style>
            
            a.morelink {
                text-decoration:none;
                outline: none;
            }
            
            .mapMobile {
                height: 270px;
            }
            .morecontent span {
                display: none;
            }
            
            .scrollupWeb{
    width:40px;
    height:40px;
    opacity:0.3;
    position:fixed;
    bottom:20px;
    right:0;
    display:none;
    text-indent:-9999px;
    
    /*background: url("../../img/top.png") no-repeat;*/
    background: url("../../../img/top.png") no-repeat;
}
            .scrollup{
    width:40px;
    height:40px;
    opacity:0.3;
    position:fixed;
    bottom:20px;
    right:40%;
    display:none;
    text-indent:-9999px;
    z-index: 10000;
    background: url("../../img/top.png") no-repeat;
}
            
                .more {
    background-color: white;
    border-radius: 4px;
    color: #939faa;
    display: block;
    font-size: 12px;
    line-height: 1.42857;
    margin: 0 0 10px;
    padding: 9.5px;
    text-align: justify;
    
    word-break: inherit;
    word-wrap: inherit;
    font-family: arial;
     border: 0 solid;
     white-space: pre-line;       /* CSS 3 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -pre-line;      /* Opera 4-6 */
        white-space: -o-pre-line;    /* Opera 7 */
        word-wrap: inherit;       /* Internet Explorer 5.5+ */


}

        </style>
        
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85546019-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>
    
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
            @include('public_page.reusable.banner', ['titulo' =>$atraccion[0]->nombre_servicio])  

            <ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li class="active">{!!$agrupacion[0]->nombre!!}
                 
                </li>
            </ul>
        </div>
        
 <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="product type-product">
                            <div class="row single-product-details ">
                                <div class="product-images col-sm-5 box-lg  ">
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
                                            <a href="https://iwannatrip.com/BookiW/app/web/uploads/{!!$imagen->filename!!}" class="soap-mfp-popup">
                                                <img src="https://iwannatrip.com/BookiW/app/web/uploads/{!!$imagen->filename!!}" alt="{!!$agrupacion[0]->nombre!!}">
                                                
                                                @if($profile->descripcion_fotografia!="")
                                                <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                                    <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>
                                                    
                                                </div>
                                                @endif
                                            </a>
                                            @else
                                            <?php $header= asset('images/fullsize/'.$imagenes->filename)?>
                                             <a href="https://iwannatrip.com/BookiW/app/web/uploads/{!!$imagen->filename!!}" class="soap-mfp-popup">
                                                <img src="https://iwannatrip.com/BookiW/app/web/uploads/{!!$imagen->filename!!}" alt="{!!$agrupacion[0]->nombre!!}">
                                                
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
                                            <a href="https://iwannatrip.com/BookiW/app/web/icon/{!!$imagen->filename!!}" class="soap-mfp-popup">
                                                <img src="https://iwannatrip.com/BookiW/app/web/icon/{!!$imagen->filename!!}" alt="{!!$agrupacion[0]->nombre!!}">
                                            </a>
                                        </div>
                                            @endforeach
                                    </div>                                    
                                </div>
                                <div class="summary entry-summary col-sm-7 box-lg">
                                    <div class="clearfix">
                                         <h2 class="product-title entry-title"> {!!$agrupacion[0]->nombre!!} </h2>
                                         <span class="star-rating" title="4" data-toggle="tooltip">
                                             <span data-stars="4"></span>
                                         </span>
                                     </div>
                                     <span class="product-price box"> Desde  10$ </span>
                                     <p>{!!$agrupacion[0]->descripcion !!}</p>                                    
                                    
                                    
                                    <div class="clearfix box" style=" width: 90%;  margin-left: 10%;">
                                        
                                    </div>
                              
                                </div>
                            </div>
                            
                            @if(session('device')=='mobile')     
                                <div class="sidebar col-sm-4 col-md-4">
                      
                     @if(isset($servicios))
                                
                        <div class="widget box">
                            
                            <h4>{{ trans('publico/labels.label18')}}</h4>
                            <ul class="product-list-widget">
                                @foreach ($servicios as $serv)
                             @if($serv->id_catalogo_servicios!=3)
                             
             
                       <li style="background:#fff; border: solid #f7f7f7; 
  box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
">     
                                                                       
                                    
                                    <div class="product-image">
                                        <a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">
                                            
                                            <img src="{{ asset('img/register/')}}/{!!$serv->id_catalogo_servicios!!}.png" alt="">
                                        </a>
                                    </div>
                                      <div class="product-content">
                                          
                                           @if(session('locale') == 'es' )
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio!!}</a></h6>
                                    
                                    @else
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio_eng!!}</a></h6>

                                    @endif
                                    </div>
                                </li>
                                @endif
                             @endforeach
                             
                             
                               @if(isset($trips)||isset($operadores))
                                
                                   <li style="background:#fff; border: solid #f7f7f7; 
  box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
">     
                                    <div class="product-image">
                                        <a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/11"  onclick="$('.container').LoadingOverlay('show');">
                                            
                                            <img src="{{ asset('img/register/')}}/11.png" alt="">
                                        </a>
                                    </div>
                                      <div class="product-content">
                                          
                                           @if(session('locale') == 'es' )
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/11"  onclick="$('.container').LoadingOverlay('show');">Itinerarios & Tours</a></h6>
                                    
                                    @else
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/11"  onclick="$('.container').LoadingOverlay('show');">Itineraries & Tours</a></h6>

                                    @endif
                                        
                                        
                                       
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif



                        
                    </div>
                            @endif 
                     <!-- carga de los calendarios -->   
                    <div class="section-info">
                        @if(count($calendarios)== 0)
                        <h3 class="section-title">No hay booking disponibles para este tour.</h3>
                        @endif
                        @if(count($calendarios)>0)
                        <h3 class="section-title">Booking</h3>
                        <div class="tab-container vertical-tab">
                            <ul class="tabs">
                                <?php $contador = 0;?>
                                @foreach($calendarios as $calendario)
                                    @if($calendario->content != '')
                                        @if($contador == 0)
                                            <li class="active"><a href="#tab3-{!!$calendario->id!!}" data-toggle="tab">{!!$calendario->content!!}</a></li>
                                        @else
                                            <li><a href="#tab3-{!!$calendario->id!!}" data-toggle="tab">{!!$calendario->content!!}</a></li>
                                        @endif
                                        <?php $contador++;?>
                                    @endif
                                 @endforeach 
                            </ul>
                            <?php $contador1 = 0;?>
                            @foreach($calendarios as $calendario)
                                @if($calendario->content != '')
                                    @if($contador1 == 0)
                                        <div id="tab3-{!!$calendario->id!!}" class="tab-content in active">
                                            <div class="tab-pane" style="height: 800px;">
                                                <h3>{!!$calendario->content!!}</h3>
                                                 <p> </p> 
                                                <link href="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoadCss&cid={!!$calendario->id!!}" type="text/css" rel="stylesheet" />
                                                <script type="text/javascript" src="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoad&cid={!!$calendario->id!!}&view=1"></script>                                        
                                            </div>
                                        </div>
                                    @else
                                        <div id="tab3-{!!$calendario->id!!}" class="tab-content">
                                            <div class="tab-pane" style="height: 800px;">
                                                <h3>{!!$calendario->content!!}</h3>
                                                 <p> </p> 
                                                <link href="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoadCss&cid={!!$calendario->id!!}" type="text/css" rel="stylesheet" />
                                                <script type="text/javascript" src="https://iwannatrip.com/BookiW/index.php?controller=pjFront&action=pjActionLoad&cid={!!$calendario->id!!}&view=1"></script>                                        
                                            </div>
                                        </div>                                
                                    @endif
                                    <?php $contador1++;?>
                                @endif
                            @endforeach 
                        </div>
                        @endif
                    </div>
                        
                        
                        
                        
                        </div>
                        <br>
                    </div>
                    <!-- Parte Derecha-->
                    <div class="sidebar col-sm-4 col-md-3" >
 <div class="main-mini-search-form full-width box">
                            <div class="search-box">
                            <div class="social-wrap">
                                        <div class="social-icons box size-lg style3">
                                    @if(session('statut')!='visitor')
                                    <a href="{!!asset('/serviciosres')!!}"  onclick="$('.container').LoadingOverlay('show');" class="social-icon"><label>{{utf8_encode( trans('publico/labels.label151'))}}</label> <i class="fa fa-plus has-circle"  data-toggle="tooltip" data-placement="top" title=""></i></a>                        
                                @else
                                    <a href="{!!asset('/login')!!}"  onclick="$('.container').LoadingOverlay('show');" class="social-icon"><label>{{utf8_encode( trans('publico/labels.label151'))}}</label> <i class="fa fa-plus has-circle"  data-toggle="tooltip" data-placement="top" title=""></i></a>                        
                                    @endif
                                        </div>
                                                    </div>
                                    </div>
                        </div> 
                        @if(session('device')!='mobile')
                        <div class="main-mini-search-form full-width box">
                            {!! Form::open(['url' => route('min-search'),  'method' => 'get', 'id'=>'min-search']) !!}
                                            <div class="search-box">
                                                <input type="text" id="s"  placeholder="Search" name="s" value="">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        {!! Form::close() !!}
                        </div>
                        @endif
                        <div class="widget box">
                            <h4>{{ trans('publico/labels.label18')}}</h4>
                            <ul class="product-list-widget">
                                
                                @if(isset($servicios))
                                
                                @foreach ($servicios as $serv)
                                   @if($serv->id_catalogo_servicios!=3)
                                <li>
                                    <div class="product-image">
                                        <a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">
                                            
                                            <img src="{{ asset('img/register/')}}/{!!$serv->id_catalogo_servicios!!}.png" alt="">
                                        </a>
                                    </div>
                                    
                                    
                                    <div class="product-content">
                                    
                                           @if(session('locale') == 'es' )
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio!!}</a></h6>
                                    
                                    @else
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio_eng!!}</a></h6>

                                    @endif
                                        
                                       
                                    </div>
                                </li>
                                @endif
                                @endforeach
                                
                                   @if(isset($trips)||isset($operadores))
                                
                                  <li>
                                    <div class="product-image">
                                        <a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/11"  onclick="$('.container').LoadingOverlay('show');">
                                            
                                            <img src="{{ asset('img/register/')}}/11.png" alt="">
                                        </a>
                                    </div>
                                      <div class="product-content">
                                          
                                           @if(session('locale') == 'es' )
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/11"  onclick="$('.container').LoadingOverlay('show');">Itinerarios & Tours</a></h6>
                                    
                                    @else
                                    <h6 class="product-title"><a href="{!!asset('/tokenDc$ripT')!!}/{!!$atraccion->id!!}/11"  onclick="$('.container').LoadingOverlay('show');">Itineraries & Tours</a></h6>

                                    @endif
                                        
                                        
                                       
                                    </div>
                                </li>
                                @endif
                                @endif
                                
                            </ul>
                        </div>
                          @if(session('device')=='mobile')  
                                        <!-- ERRORES -->
                                    <div class="social-wrap">
                                        <label>{{ trans('publico/labels.reportarerror')}}</label>
                                        <div class="social-icons">
                                            <div>
                                                <a href="#" data-toggle="modal" data-target="#errores">
                                            <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>    
                                                </a>    
                                            
                                            </div>
                                        </div>
                                        
                                    </div>  
                                        @endif
                        
                        <div class="promocionesAtraccion">
                              @section('promocionesAtraccion')
                                @show
                            
                        </div>

                        
                        <div class="eventosAtraccion">
                              @section('eventosAtraccion')
                                @show
                            
                        </div>
                        
                        
                        @if(session('device')!='mobile')
                        <div class="widget banner-slider box">
                            <div class="owl-carousel" data-itemsPerDisplayWidth="[[0, 1], [480, 2], [768, 1], [992, 1], [1200, 1]]" data-items="1">
                                <a href="#">
                                    <img src="{{ asset('img/rsz_00kwwk8s.jpg')}}" alt="">
                                </a>
                              
                            </div>
                        
                        </div>
                           
                        @endif
                        

                         <div class="box">
                            <h4>Tags</h4>
                            <div class="tags">
                                @if($agrupacion[0]->tags!="")
                                    <?php 
                                        $tags = explode(",", $agrupacion[0]->tags);
                                    ?>
                                    @foreach ($tags as $tag)
                                        <?php 
                                            $tagC=str_replace(" #","",$tag);
                                            $tagC=str_replace("#","",$tag);
                                        ?>
                                        <a class="tag" href="https://iwanatrip.com/Search?s={!!$tagC!!}">{!!$tag!!}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>                        

                        
                    </div>
                </div>
            </div>
        </section>
        
        
        @if(session('device')!='mobile')
                           <a href="#" class="scrollupWeb">Scroll</a>
            @else
                           <a href="#" class="scrollup">Scroll</a>
            @endif
            
            

        <footer id="footer" class="style4">
            <div class="callout-box style2">
                <div class="container">
                    <div class="callout-content">
                        <div class="callout-text">
                            <h4>{{ trans('publico/labels.label26')}}</h4>
                        </div>
                        <div class="callout-action">
                            <a href="https://iwanatrip.com" onclick="$('.woocommerce').LoadingOverlay('show');" class="btn style4">{{ trans('publico/labels.label27')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
    {!! HTML::script('js/jquery.js') !!}
    
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('js/Compartido.js') !!}
  {!!HTML::script('js/js_Compartido.js') !!} 

    <script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script>

    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="{{ asset('public_components/js/bootstrap.min.js')}}"></script>

    <!-- Magnific Popup core JS file -->
    <script type="text/javascript" src="{{ asset('public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

     
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.stellar.min.js')}}"></script>

    <!-- waypoint -->
    <script type="text/javascript" src="{{ asset('public_components/js/waypoints.min.js')}}"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.plugins.js')}}"></script>


<!-- Google Map Api -->
    <script type='text/javascript' src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/gmap3.js')}}"></script>
    <script>
        
        
                                sjq(document).ready(function ($) {
                                    // Configure/customize these variables.
                                    var showChar = 900; // How many characters are shown by default
                                    var ellipsestext = "...";
                                    var moretext = "Show more >";
                                    var lesstext = "Show less";
                                    $('.more').each(function () {
                                        var content = $(this).html();
                                        if (content.length > showChar) {

                                            var c = content.substr(0, showChar);
                                            var h = content.substr(showChar, content.length - showChar);
                                            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                                            $(this).html(html);
                                        }

                                    });
                                    $(".morelink").click(function () {
                                        if ($(this).hasClass("less")) {
                                            $(this).removeClass("less");
                                            $(this).html(moretext);
                                        } else {
                                            $(this).addClass("less");
                                            $(this).html(lesstext);
                                        }
                                        $(this).parent().prev().toggle();
                                        $(this).prev().toggle();
                                        return false;
                                    });
                                });</script>
    <script>
        sjq(document).ready(function ($) {
            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            sync1.owlCarousel({
                singleItem: true,
                slideSpeed: 1000,
                navigation: false,
                pagination: false,
                afterAction: syncPosition,
                responsiveRefreshRate: 200,
            });
            sync2.owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [991, 1],
                itemsTablet: [767, 2],
                itemsMobile: [479, 2],
                navigation: true,
                navigationText: false,
                pagination: false,
                responsiveRefreshRate: 100,
                afterInit: function (el) {
                    el.find(".owl-item").eq(0).addClass("synced");
                    el.find(".owl-wrapper").equalHeights();
                },
                afterUpdate: function (el) {
                    el.find(".owl-wrapper").equalHeights();
                }
            });
            function syncPosition(el) {
                var current = this.currentItem;
                $("#sync2")
                        .find(".owl-item")
                        .removeClass("synced")
                        .eq(current)
                        .addClass("synced")
                if ($("#sync2").data("owlCarousel") !== undefined) {
                    center(current)
                }
            }

            $("#sync2").on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).data("owlItem");
                sync1.trigger("owl.goTo", number);
            });
            function center(number) {
                var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
                var num = number;
                var found = false;
                for (var i in sync2visible) {
                    if (num === sync2visible[i]) {
                        var found = true;
                    }
                }

                if (found === false) {
                    if (num > sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                    } else {
                        if (num - 1 === -1) {
                            num = 0;
                        }
                        sync2.trigger("owl.goTo", num);
                    }
                } else if (num === sync2visible[sync2visible.length - 1]) {
                    sync2.trigger("owl.goTo", sync2visible[1])
                } else if (num === sync2visible[0]) {
                    sync2.trigger("owl.goTo", num - 1)
                }
            }
            var $easyzoom = $('.product-images .easyzoom').easyZoom();
            var $easyzoomApi = $easyzoom.data('easyZoom');
        });</script>

    @if(session('device')!='mobile')
    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
                {$Duration: 1800, $Opacity: 2}
            ];
            var jssor_1_options = {
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1360);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });</script>

    <style>

        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background:url ("{!!asset("img/internas/b05.png")!!}") no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background:url("{!!asset("img/internas/a12.png")!!}") no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>
    
    @else
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

                    center: [{!!$atraccion[0]->latitud_servicio!!},{!!$atraccion[0]->longitud_servicio!!}],
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
                    {latLng:[ {!!$atraccion[0]->latitud_servicio!!},{!!$atraccion[0]->longitud_servicio!!}], data:"Ecuador"}
                    

                ]
                ,
                options: {
              
                 
    //draggable: false,


                    //icon: "{!!asset("img/CollageIsmage_opt.png")!!}",
                },
            }
        });
    </script>

    
    <script>
        $(document).ready(function () {
          
                GetDataAjaxPromociones("{!!asset('/tokenDc$ripPromo')!!}/{!!$atraccion[0]->id!!}");
                GetDataAjaxEventos("{!!asset('/tokenDc$ripEvent')!!}/{!!$atraccion[0]->id!!}");    
                GetLikes("{!!asset('/getLikesA')!!}/{!!$atraccion[0]->id!!}");    
                GetReview("{!!asset('/getReviews')!!}/{!!$atraccion[0]->id!!}?page=1");    
                GetDataAjaxCloseIntern("{!!asset('/getCercanosIntern')!!}/{!!$atraccion[0]->id!!}/{!!$atraccion[0]->id_provincia!!}/{!!$atraccion[0]->id_canton!!}/{!!$atraccion[0]->id_parroquia!!}");

            });
        
      $(".moreImg").click(function () {
                GetDataAjaxCloseIntern("{!!asset('/getCercanosIntern')!!}/{!!$atraccion[0]->id!!}/{!!$atraccion[0]->id_provincia!!}/{!!$atraccion[0]->id_canton!!}/{!!$atraccion[0]->id_parroquia!!}");
                
            });
            $(".moreReviews").click(function () {
                GetReview("{!!asset('/getReviews')!!}/{!!$atraccion[0]->id!!}?page=1");    
                
            });
            
            


    </script>
<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
     <script>
     
     
$(window).scroll(function(){
   if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
   } else {
        $('.scrollup').fadeOut();
   }
});
$('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});


$(window).scroll(function(){
   if ($(this).scrollTop() > 100) {
        $('.scrollupWeb').fadeIn();
   } else {
        $('.scrollupWeb').fadeOut();
   }
});
$('.scrollupWeb').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});


     @if(session('device')!='mobile')
      $(".maps").dblclick(function () {
          window.open('https://maps.google.com.ec/maps?saddr=My Location&daddr='  + {!!$atraccion[0]->latitud_servicio!!} + ',' + {!!$atraccion[0]->longitud_servicio!!},"_blank");
          
                
            });
    
    @else
   $(".maps").dblclick(function () {
    
    myNavFunc();
 });
 
 function myNavFunc(){
    // If it's an iPhone..
    
         window.open("maps://maps.google.com/maps?daddr={!!$atraccion[0]->latitud_servicio!!},{!!$atraccion[0]->longitud_servicio!!}");
    
}
 


    @endif
    </script>


</body>
</html>