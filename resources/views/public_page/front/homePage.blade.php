<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip - Viaja y vive la experiencia de conocer Ecuador - Aventura</title>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
        <meta name="description" content="iWaNaTrip es un espacio de busqueda para la red viajeros de todo el mundo, permite compartir el contenido de forma sencilla a traves de internet.
              iWaNaTrip es experiencia de vida. Deja de ser turista, conviertete en viajero. Viaja por el mundo y descubre Ecuador">
        <meta name="keywords" content="iWaNaTrip, Vive, Turismo, Transformacion digital, Guia turistica,  Marketing digital, Turistas, Viajeros, Viaja, Potencial turistico, Ecuador, Viajar,  Aventura, Tours">
        <meta name="author" content="iWaNaTrip group">
        <meta http-equiv="Content-Language" content="es">
        <meta NAME="robots" CONTENT="all | index | follow">
        <meta name="Revisit" content="3 days"> 
        <meta name="msvalidate.01" content="421B34D10B14BB413DA96450492A81E9" />

        <!-- Theme Styles -->

        <link rel="apple-touch-icon" href="{{ asset('public/img/60x60_logo_iwana.png')}}">

        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/76x76logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/120x120logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/180x180logo_iwana.png')}}">
        <link rel="icon" sizes="180x180" href="{{ asset('public/img/180x180logo_iwana.png')}}">


        <meta property="og:title" content="iWaNaTrip | Ecuador" /> 
        <meta property="og:description" content="es un espacio de busqueda para la red viajeros de todo el mundo, permite compartir el contenido de forma sencilla a traves de internet.
              iWaNaTrip es experiencia de vida. Deja de ser turista, conviertete en viajero. Viaja por el mundo y descubre Ecuador" />
        <meta property="og:image" content="{{ asset('public/img/index-fondo.jpg')}}" />

        <link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}" />
        <link rel="apple-touch-icon" href="{{ asset('public/images/favicon.png')}}" />        
        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/search_inbox/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/search_inbox/css/component.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/revolution_slider/css/settings.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/revolution_slider/css/style.css')}}" media="screen" />

        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public/public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public/public_components/css/responsive.css')}}">

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
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-85546019-1', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
    <body>

        <style>
            .ui-menu {
                box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
                background:rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
                width: 240px;
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

                background: url("../public/img/top.png") no-repeat;
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
                background: url("../public/img/top.png") no-repeat;
            }

            #search-box {
                position: relative;
                width: 100%;
                margin: 0;
            }

            .sear
            {
                height: 43px;
                border: 1px solid #999;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                background-color: #fff;
                overflow: hidden;
            }
            #search-text 
            {
                font-size: 14px;
                color: #ddd;
                border-width: 0;
                background: transparent;
            }
            #search-box input[type="text"]
            {
                width: 90%;
                padding: 11px 0 12px 1em;
                color: #333;
                outline: none;
            }

            #search-button {
                position: absolute;
                top: 0;
                right: 0;
                height: 42px;
                width: 80px;
                font-size: 14px;
                color: #fff;
                text-align: center;
                line-height: 42px;
                border-width: 0;
                background-color: #e67e22 ;
                -webkit-border-radius: 0px 5px 5px 0px;
                -moz-border-radius: 0px 5px 5px 0px;
                border-radius: 0px 5px 5px 0px;
                cursor: pointer;
            }





        </style>
        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                @include('public_page.reusable.header')
            </header>
            @if(session('device')!='mobile')
            <div id="slideshow">
                <div class="revolution-slider">
                    <ul>    <!-- SLIDE  -->
                        <li data-slotamount="7" 
                            data-transition="notransition" 
                            class="tp-revslider-slidesli active-revslide current-sr-slide-visible">
                            <!-- MAIN IMAGE -->
                            @if(session('device')!='mobile')
                            <div  data-bgfit="cover" style="width:100%;height:100%;" class="slotholder">
                                <div style="background-color: transparent; 
                                     background-repeat: no-repeat; 
                                     
                                     background-image: url('{{ asset('public/img/index-fondo.jpg')}}'); 
                                     background-size: cover; 
                                     background-position: center center;
                                     width: 100%; height: 100%; opacity: 1; 
                                     visibility: inherit;" 
                                     data-src="{{ asset('public/images/backgrounds/gradient.png')}}"
                                     src="{{ asset('public/img/index-rodelas.png')}}" 
                                     data-bgrepeat="no-repeat" 
                                     data-bgposition="center center" data-bgfit="cover" 
                                     class="tp-bgimg defaultimg">



                                </div>
                            </div>
                            @else
                            <!--   <div  data-bgfit="cover" style="width:100%;height:100%;" class="slotholder">
                           <div style="background-color: transparent; 
                               background-repeat: no-repeat; 
                                
                                background-image: url('{{ asset('public/img/hero.jpg')}}'); 
                                background-size: cover; 
                                background-position: center center;
                                width: 100%; height: 100%; opacity: 1; 
                                visibility: inherit;" 
                                data-src="{{ asset('public/images/backgrounds/gradient.png')}}"
                                src="{{ asset('public/img/index-rodelas.png')}}" 
                                data-bgrepeat="no-repeat" 
                                data-bgposition="center center" data-bgfit="cover" 
                                class="tp-bgimg defaultimg">
                               
                               </div>
                       </div>-->
                            @endif     
                            <!-- LAYERS -->
                            <div 
                                data-endspeed="300" data-endelementdelay="0.1" 
                                data-elementdelay="0.1" data-splitout="none" data-splitin="none"
                                data-easing="easeInCubic" data-start="500" data-speed="600" 
                                data-y="460" data-hoffset="0"   data-x="center"
                                class="tp-caption lft fadeout tp-resizeme start">
                                @if(session('device')!='mobile')
                                 <h2  class="caption-xl" >
                                     <b>#</b>iWaNaTrip<b>all</b>Ecuador
                                 </h2>

                                @else
                                <h2 class="caption-xl" style="font-size: 58px;">
                                    {{ trans('publico/labels.label127')}}
                                </h2>
                                @endif
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div 
                                data-endspeed="300" data-endelementdelay="0.1"
                                data-elementdelay="0.1" data-splitout="none" 
                                data-splitin="none" data-easing="easeInOutCubic"
                                data-start="700" data-speed="600" data-y="540" 
                                data-hoffset="0" data-x="center" 
                                class="tp-caption lfl fadeout tp-resizeme start">


                                @if(session('device')!='mobile')
                                <!--  <h2 class="caption-md skin-color" ><b>{{ trans('publico/labels.label123')}}</b></h2>-->

                                @else

                                <h2 class="caption-md skin-color" style="font-size: 53px;" >{{ trans('publico/labels.label123')}}</h2>
                                @endif


                            </div>

                            @if(session('device')!='mobile')
                            <!-- LAYER NR. 3 -->
                            <div style="margin-left: 10px;"
                                 data-endspeed="300" data-endelementdelay="0.1"
                                 data-elementdelay="0.1" data-splitout="none"
                                 data-splitin="none" data-easing="Power3.easeInOut"
                                 data-start="1000" data-speed="300" data-voffset="-79" 
                                 data-y="35" data-x="-280" class="tp-caption sfl fadeout start">
                                  <img alt="" src="{{ asset('public/img/index-logo.png')}}" >
                                <!--<h2  style="font-size: 53px;" ><b>iWaNaTrip</b></h2>-->

                            </div>1

                            @endif
                            <!-- LAYER NR. 4 -->
                            @if(session('device')!='mobile')
                            <div style='width: 80%'
                                 data-endspeed="300" data-endelementdelay="0.1" data-elementdelay="0.1" 
                                 data-splitout="none" data-splitin="none" data-easing="easeOutBack"
                                 data-start="1500" data-speed="600" data-y="630" data-x="center"
                                 class="tp-caption sfr str start">

                                {!! Form::open(['url' => route('min-search'),  'method' => 'get', 'id'=>'min-search']) !!}
                                @if(session('device')!='mobile')
                                <input class="sb-search-input" placeholder="{{ trans('publico/labels.label127')}}" type="text" value="" name="s" id="s">
                                @else
                                <input class="sb-search-input" placeholder="{{ trans('publico/labels.label10')}}" style="font-size: 12px;" type="text" value="" name="s" id="s">
                                @endif

                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search "></span>
                                {!! Form::close() !!}
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            <?php
            $titulo = "Ecuador";
            ?>

            @if($location->city!="")
                <?php
                $titulo = $location->city;
                ?>
            @else
                $titulo="Ecuador";
            @endif
            
            @if(session('device')=='mobile')
            <br><br><br><br>
            <section id="content" style=" background-size: 100% auto;background-repeat: no-repeat;background-image:url('{{asset('img/iWanaBack2.jpg')}}')">
                @else
                <section id="content" >
                    @endif          
                    <section id="content" class="back">
                        <div class="container">
                            @if(session('device')=='mobile')
                            <!-- Responsive Styles -->
                            <br>
                            <br>
                            @if(session('locale') == 'es' )
                            <div class="heading-box col-md-10 col-lg-8">
                                <h2 > 
                                    <p><em style="color:white"><b>#</b>iWaNaTrip<b>todo</b>Ecuador</em></p>
                                </h2>
                            </div> 
                            @else
                            <div class="heading-box col-md-10 col-lg-8">
                                <h2 > 
                                    <p><em style="color:white"><b>#</b>iWaNaTrip<b>all</b>Ecuador</em></p>
                                </h2>
                            </div> 
                            @endif
                            <br>
                            <div id='search-box'>
                                {!! Form::open(['url' => route('min-search'),'class'=>'sear form-wrapper cf',  'method' => 'get', 'id'=>'min-search']) !!}
                                <input id='search-text' name='s' placeholder='Search' type='text'/>
                                <button id='search-button' type='submit'>                     
                                    <span>Search</span>
                                </button>
                                {!! Form::close() !!}
                            </div>
                            <br>
                            <br>  <br>
                            @else
                            <div class="heading-box col-md-10 col-lg-8">
                                <h2 class="box-title">{{ trans('publico/labels.label138AB')}} <em class="skin-color">{!!$titulo!!}</em> {{ trans('publico/labels.label139AB')}}</h2>
                                <p><em class="skin-color">iWaNaTrip</em> {{ trans('publico/labels.label140AB')}}</p>
                            </div>
                            @endif
                            <br>


                            @if(session('device')=='mobile')

                            <div class="heading-box col-md-10 col-lg-8">

                                <h2 class="box-title"><em class="skin-color">{!!$titulo!!}</em> </h2>
                            </div>

                            <div class="widget box">

                                <ul class="product-list-widget">

                                    <li style="background:#f7f7f7 ; border: solid #f7f7f7; 
                                        box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
                                        ">
                                        <div class="product-image">
                                            <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.container').LoadingOverlay('show');">
                                                <img src="{{ asset('public/img/register/')}}/4.png" alt="iwanatrip">
                                            </a>
                                        </div>
                                        <div class="product-content">

                                            @if(session('locale') == 'es' )
                                            <h6 class="product-title" ><a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">Que visitar</a></h6>

                                            @else
                                            <h6 class="product-title" ><a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">What to visit </a></h6>

                                            @endif
                                        </div>
                                    </li>

                                    <li style="background:#f7f7f7; border: solid #f7f7f7; 
                                        box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
                                        ">
                                        <div class="product-image">
                                            <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">

                                                <img src="{{ asset('public/img/register/')}}/1.png" alt="iwanatrip">
                                            </a>
                                        </div>

                                        <div class="product-content">

                                            @if(session('locale') == 'es' )
                                            <h6 class="product-title" ><a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">Comidas&Bebidas </a></h6>

                                            @else
                                            <h6 class="product-title" ><a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">Eat&Drink </a></h6>

                                            @endif


                                        </div>
                                    </li>

                                    <li style="background:#f7f7f7; border: solid #f7f7f7; 
                                        box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
                                        ">
                                        <div class="product-image">
                                            <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">

                                                <img src="{{ asset('public/img/register/')}}/2.png" alt="iwanatrip">
                                            </a>
                                        </div>


                                        <div class="product-content">

                                            @if(session('locale') == 'es' )
                                            <h6 class="product-title" ><a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">Alojamiento </a></h6>

                                            @else
                                            <h6 class="product-title" ><a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.container').LoadingOverlay('show');
                                                    $('.container').LoadingOverlay('hide', true);">Sleep </a></h6>

                                            @endif


                                        </div>
                                    </li>

                                </ul>
                            </div>

                            @else
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="icon-box style-side-2 animated box" data-animation-type="fadeInUp" data-animation-delay="0">
                                        
                                           <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.container').LoadingOverlay('show');">
                                                <img src="{{ asset('public/img/iconos')}}/visit.jpg" alt="iwanatrip">
                                            </a>
                                        
                                        
                                        <div class="">
                                            <br>
                                            <h4 class="box-title"><a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')">{{ trans('publico/labels.label130AB')}}</a></h4>

                                            <p>{{ trans('publico/labels.label133AB')}} {!!$titulo!!} {{ trans('publico/labels.label134AB')}} </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="icon-box style-side-2 animated box" data-animation-type="fadeInUp" data-animation-delay="0.5">
                                        
                                        
                                        <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.container').LoadingOverlay('show');">
                                                <img src="{{ asset('public/img/iconos')}}/eat.jpg" alt="iwanatrip">
                                            </a>
                                        
                                        <div class="">
                                        <br>
                                            <h4 class="box-title"><a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')">{{ trans('publico/labels.label131AB')}}</a></h4>
                                            {{ trans('publico/labels.label135AB')}} <p>{!!$titulo!!} {{ trans('publico/labels.label136AB')}} </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="icon-box style-side-2 animated box" data-animation-type="fadeInUp" data-animation-delay="1">
                                        
                                        
                                        
                                        <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.container').LoadingOverlay('show');">
                                                <img src="{{ asset('public/img/iconos')}}/sleep.jpg" alt="iwanatrip">
                                            </a>
                                        
                                        <div class="">
                                        <br>
                                            <h4 class="box-title"><a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')">{{ trans('publico/labels.label132AB')}}</a></h4>
                                            <p>{!!$titulo!!} {{ trans('publico/labels.label137AB')}}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <br>
                            <br>

                            <!--
                            <div id="main">
                                <div class="post-wrapper">
                                   <div class="post-filters">
                                        <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-alls">{{ trans('publico/labels.label12')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-atracciones">{{ trans('publico/labels.label65')}}</a>
                            <!--<a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-eventos">{{ trans('publico/labels.label32')}}</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-promo">{{ trans('publico/labels.label33')}}</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-inspire">{{ trans('publico/labels.label265')}}</a>-->
                            <!--  
                           </div>
                           <div class="iso-container iso-col-4 style-masonry eventsPromo">
                          
                               @section('eventsPromo')
                               @show
                               
                           </div>
                           <div class="text-center">
                               <a  class="btn style4 hover-blue load-more moreImagesEvents">{{ trans('publico/labels.label31')}}</a>
                           </div>
                       </div>
                   </div>-->


                            <p class="desc-lg"> </p>
                            <p class="desc-lg"> </p>
                            <p class="desc-lg"> </p>
                            <p class="desc-lg"> </p>
                            <p class="desc-lg"> </p>
                            <p class="desc-lg"> </p>
                            <br/>
                            <br/>

                            <div class="heading-box col-md-10 col-lg-8">
                                @if(session('device')=='mobile')
                                <h2 class="box-title"><em class="skin-color">iWaNaTrip  </em><em >Travel Advice</em> <em>Ecuador  </em></h2>
                                @else
                                <h2 class="box-title"><em class="skin-color">iWaNaTrip  </em>Travel Advice <em class="skin-color">Ecuador  </em></h2>
                                @endif
                            </div>
                            <div class="theme-features">
                                <div class="overflow-hidden">
                                    <div class="row same-height">


                                        @if(session('device')=='mobile')

                                        <div class="col-sm-6">
                                            <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="1" data-animation-delay="0">
                                                <div class="col-sms-4 col-sm-4 image-container fixed">

                                                    <a href="https://iwanatrip.com/trip/Ruta-Mochilera/1122" >
                                                        <img src="{{ asset('images/icon/1122imgmaparuta01xl.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="col-sms-8 col-sm-8 details">
                                                    <a href="https://iwanatrip.com/trip/Ruta-Mochilera/1122" ><h3 class="title">Ruta Mochilera</h3></a>
                                                        <?php $str = "Tu mochila y un presupuesto de 20 dólares por día te llevarán a explorar los diferentes mundos que ofrece Ecuador sin viajar grandes distancias. Descubre los fríos paisajes de los Andes para luego adentrarte a la calurosa puerta de la Amazonía y terminar con una relajante surf y exquisita comida en la playa." ?>
                                                    <p>{!!$str!!}</p>

                                                </div>
                                            </div>
                                        </div>

                                        <div id="mapas">
                                            <div class="col-sm-6">
                                                <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                    <div class="col-sms-4 col-sm-4 image-container fixed">
                                                        <a href="https://iwanatrip.com/trip/Galapagos/1170" >
                                                            <img src="{{ asset('images/icon/1170imgmaparuta03xl.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="col-sms-8 col-sm-8 details">
                                                            <?php $str20 = "Galápagos" ?>
                                                        <a href="https://iwanatrip.com/trip/Galapagos/1170" >
                                                            <h3 class="title">{!!$str20!!}</h3></a>
                                                             <?php $str2 = "Es el paraíso en la Tierra. Imagina la belleza de una isla del Pacífico con aguas cristalinas color turquesa y paisajes alucinantes con la pequeña peculiaridad que están infestada de grandiosos animales por donde vayas. Comúnmente se cree que es muy caro viajar a las islas. Sin embargo, no es del todo cierto." ?>
                                                        <p>{!!$str2!!}</p>


                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                    <div class="col-sms-4 col-sm-4 image-container fixed">
                                                        <a href="https://iwanatrip.com/trip/Adrenalina-Amazonia/1171" >
                                                            <img src="{{ asset('images/icon/1171touraventura.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="col-sms-8 col-sm-8 details">
                                                    <?php $str20 = "Adrenalína- Amazonía" ?>
                                                        <a href="https://iwanatrip.com/trip/Adrenalina-Amazonia/1171" >
                                                            <h3 class="title">{!!$str20!!}</h3></a>
                                                    <?php $str2 = "La Amazonía de Ecuador es una de las más biodiversas del planeta. Mientras caminas por senderos, exploras cavernas o simplemente navegas en uno de los cientos de ríos, apreciar la gran cantidad de animales y plantas. De la misma forma, sus espectaculares vistas y cascadas te pondrán en contacto con la naturaleza en su máximo esplendor. " ?>
                                                        <p>{!!$str2!!}</p>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                    <div class="col-sms-4 col-sm-4 image-container fixed">
                                                        <a href="https://iwanatrip.com/trip/Sol-Arena-Ecuador/1172" >
                                                            <img src="{{ asset('images/icon/1172imgmaparuta04xl.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="col-sms-8 col-sm-8 details">
<?php $str20 = "Sol y Surf Ecuador" ?>
                                                        <a href="https://iwanatrip.com/trip/Sol-Arena-Ecuador/1172" >
                                                            <h3 class="title">{!!$str20!!}</h3></a>
<?php $str2 = "Las playas Ecuatorianas ofrecen una gran diversidad de sitios para tomar el sol, surfear, ir de fiesta, hermosos paisajes, la sabrosa comida marinera, pesca o simplemente relajarse y disfrutar del clima de playa. Lo característico del agua es que tiene una elevada temperatura entre 25 a 27 grados centígrados durante todo el año, lo que lo hace perfecto para un baño o surfear.  " ?>
                                                        <p>{!!$str2!!}</p>


                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                    <div class="col-sms-4 col-sm-4 image-container fixed">
                                                        <a href="https://iwanatrip.com/trip/Lo-Mejor-Del-Ecuador/1173" >
                                                            <img src="{{ asset('images/icon/1173imgmaparuta05xl.jpg')}}" alt=""></a>
                                                    </div>
                                                    <div class="col-sms-8 col-sm-8 details">
<?php $str20 = "Lo mejor del Ecuador" ?>
                                                        <a href="https://iwanatrip.com/trip/Lo-Mejor-Del-Ecuador/1173" >
                                                            <h3 class="title">{!!$str20!!}</h3></a>
<?php $str2 = "Lo mejor de Ecuador se encuentra en probar un poquito de cada región. Siente el frío los espectaculares paisajes de las montañas. Vive la naturaleza y la biodiversidad al máximo en la Amazonía. Relájate y aprende surf en las calurosas playas para finalmente ver la magnificencia del paraíso en la Tierra: Las Islas Galápagos.  " ?>
                                                        <p>{!!$str2!!}</p>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @else


                                        <div class="col-sm-6">
                                            <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="1" data-animation-delay="0">
                                                <div class="col-sms-4 col-sm-4 image-container fixed">

                                                    <a href="https://iwanatrip.com/trip/Ruta-Mochilera/1122" >
                                                        <img src="{{ asset('images/icon/1122imgmaparuta01xl.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="col-sms-8 col-sm-8 details">
                                                    <a href="https://iwanatrip.com/trip/Ruta-Mochilera/1122" ><h3 class="title">Ruta Mochilera</h3></a>
<?php $str = "Tu mochila y un presupuesto de 20 dólares por día te llevarán a explorar los diferentes mundos que ofrece Ecuador sin viajar grandes distancias. Descubre los fríos paisajes de los Andes para luego adentrarte a la calurosa puerta de la Amazonía y terminar con una relajante surf y exquisita comida en la playa." ?>
                                                    <p>{!!$str!!}</p>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                <div class="col-sms-4 col-sm-4 image-container fixed">
                                                    <a href="https://iwanatrip.com/trip/Galapagos/1170" >
                                                        <img src="{{ asset('images/icon/1170imgmaparuta03xl.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="col-sms-8 col-sm-8 details">
<?php $str20 = "Galápagos" ?>
                                                    <a href="https://iwanatrip.com/trip/Galapagos/1170" >
                                                        <h3 class="title">{!!$str20!!}</h3></a>
<?php $str2 = "Es el paraíso en la Tierra. Imagina la belleza de una isla del Pacífico con aguas cristalinas color turquesa y paisajes alucinantes con la pequeña peculiaridad que están infestada de grandiosos animales por donde vayas. Comúnmente se cree que es muy caro viajar a las islas. Sin embargo, no es del todo cierto." ?>
                                                    <p>{!!$str2!!}</p>


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                <div class="col-sms-4 col-sm-4 image-container fixed">
                                                    <a href="https://iwanatrip.com/trip/Adrenalina-Amazonia/1171" >
                                                        <img src="{{ asset('images/icon/1171touraventura.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="col-sms-8 col-sm-8 details">
<?php $str20 = "Adrenalína- Amazonía" ?>
                                                    <a href="https://iwanatrip.com/trip/Adrenalina-Amazonia/1171" >
                                                        <h3 class="title">{!!$str20!!}</h3></a>
<?php $str2 = "La Amazonía de Ecuador es una de las más biodiversas del planeta. Mientras caminas por senderos, exploras cavernas o simplemente navegas en uno de los cientos de ríos, apreciar la gran cantidad de animales y plantas. De la misma forma, sus espectaculares vistas y cascadas te pondrán en contacto con la naturaleza en su máximo esplendor. " ?>
                                                    <p>{!!$str2!!}</p>


                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                <div class="col-sms-4 col-sm-4 image-container fixed">
                                                    <a href="https://iwanatrip.com/trip/Sol-Arena-Ecuador/1172" >
                                                        <img src="{{ asset('images/icon/1172imgmaparuta04xl.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="col-sms-8 col-sm-8 details">
<?php $str20 = "Sol y Surf Ecuador" ?>
                                                    <a href="https://iwanatrip.com/trip/Sol-Arena-Ecuador/1172" >
                                                        <h3 class="title">{!!$str20!!}</h3></a>
<?php $str2 = "Las playas Ecuatorianas ofrecen una gran diversidad de sitios para tomar el sol, surfear, ir de fiesta, hermosos paisajes, la sabrosa comida marinera, pesca o simplemente relajarse y disfrutar del clima de playa. Lo característico del agua es que tiene una elevada temperatura entre 25 a 27 grados centígrados durante todo el año, lo que lo hace perfecto para un baño o surfear.  " ?>
                                                    <p>{!!$str2!!}</p>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="image-box row animated" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0.5">
                                                <div class="col-sms-4 col-sm-4 image-container fixed">
                                                    <a href="https://iwanatrip.com/trip/Lo-Mejor-Del-Ecuador/1173" >
                                                        <img src="{{ asset('images/icon/1173imgmaparuta05xl.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="col-sms-8 col-sm-8 details">
                            <?php $str20 = "Lo mejor del Ecuador" ?>
                                                    <a href="https://iwanatrip.com/trip/Lo-Mejor-Del-Ecuador/1173" >
                                                        <h3 class="title">{!!$str20!!}</h3></a>
                            <?php $str2 = "Lo mejor de Ecuador se encuentra en probar un poquito de cada región. Siente el frío los espectaculares paisajes de las montañas. Vive la naturaleza y la biodiversidad al máximo en la Amazonía. Relájate y aprende surf en las calurosas playas para finalmente ver la magnificencia del paraíso en la Tierra: Las Islas Galápagos.  " ?>
                                                    <p>{!!$str2!!}</p>


                                                </div>
                                            </div>
                                        </div>



                                        @endif

                                        @if(session('device')=='mobile')
                                        <br>
                                        <br>
                                        <div class="text-center">
                                            <a  class="btn style4 hover-blue load-more moremaps">{{ trans('publico/labels.label31')}}</a>
                                        </div>
                                        <br>

                                        @endif


                                    </div>
                                </div>
                            </div>


                        </div>
                    </section>       


                    @if(session('device')=='mobile')



                    <div class="parallax parallax-image1" data-stellar-background-ratio="0.1">
                        <div class="section text-center">
                            <div class="container">
                                <div class="heading-box">
                                    <h2 class="box-title color-white">{{ trans('publico/labels.label30')}}</h2>
                                </div>

                                <h3 class="skin-color">{{ trans('publico/labels.label124')}}</h3>
                                <p>{{ trans('publico/labels.label125')}}</p>
                            </div>
                        </div>
                    </div>

                    @endif

                    @if(session('device')!='mobile')

                    <div class="parallax parallax-image1" data-stellar-background-ratio="0.1">
                        <div class="section text-center">
                            <div class="container">
                                <div class="heading-box">
                                    <h2 class="box-title color-white">{{ trans('publico/labels.label30')}}</h2>
                                </div>
                                <div class="features-icon-slider owl-carousel box-lg" data-items="6">

                                    @if(session('locale') == 'es' )
                                    <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-cutlery"></i><div style="alignment-baseline: central">Alimentación y bebidas</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-bed"></i><div style="alignment-baseline: central">Alojamiento</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/3"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-suitcase"></i><div style="alignment-baseline: central">Agencias de viajes</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-map-marker"></i><div style="alignment-baseline: central">Lugares</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/8"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-hand-scissors-o"></i><div style="alignment-baseline: central">Eventos</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/9"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-users"></i><div style="alignment-baseline: central">Festividades</div></a>

                                    @else
                                    <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-cutlery"></i><div style="alignment-baseline: central">Eat & drink</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-bed"></i><div style="alignment-baseline: central">Sleep</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/3"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-suitcase"></i><div style="alignment-baseline: central">Travel agency</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-map-marker"></i><div style="alignment-baseline: central">Places</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/8"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-hand-scissors-o"></i><div style="alignment-baseline: central">Events</div></a>
                                    <a href="{!!asset('/tokenDz$rip')!!}/9"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-users"></i><div style="alignment-baseline: central">Festivities</div></a>

                                    @endif

                                </div>
                                <h3 class="skin-color">{{ trans('publico/labels.label124')}}</h3>
                                <p>{{ trans('publico/labels.label125')}}</p>
                            </div>
                        </div>
                    </div>

                    <section id="content" class="no-padding">
                        <div class="section no-padding">
                            <h2 class="section-title">{{ trans('publico/labels.label126')}}</h2>

                            <div class="post-wrapper">
                                <div class="iso-container iso-col-4 style-fancy">
                                    <div class="shortcode-banner style-animated iso-item  filter-all " >
                                        <article class="post">
                                            <figure ><img src="{{ asset('public/img/costa.jpg')}}" alt=""></figure>
                                            @if(session('device')!='mobile')
                                            <div class="shortcode-banner-inside" style=" width: 108%;">
                                                @else
                                                <div class="shortcode-banner-inside" style=" width: 112%;">
                                                    @endif
                                                    <div class="shortcode-banner-content">
                                                        <a href="{!!asset('/getRegionDescipcion/1')!!}" onclick="$('.iso-container').LoadingOverlay('show');">
                                                            <h3 class="banner-title">Costa</h3></a>
                                                        <div class="details">

                                                        </div>
                                                    </div>
                                                </div>

                                        </article>
                                    </div>
                                    <div class="shortcode-banner style-animated iso-item  filter-all " >
                                        <article class="post">
                                            <figure ><img src="{{ asset('public/img/sierra.jpg')}}" alt=""></figure>
                                            @if(session('device')!='mobile')
                                            <div class="shortcode-banner-inside" style=" width: 108%;">
                                                @else
                                                <div class="shortcode-banner-inside" style=" width: 112%;">
                                                    @endif
                                                    <div class="shortcode-banner-content">
                                                        <a href="{!!asset('/getRegionDescipcion/2')!!}" onclick="$('.iso-container').LoadingOverlay('show');"><h3 class="banner-title">Sierra</h3>
                                                        </a>
                                                        <div class="details">

                                                        </div>
                                                    </div>
                                                </div>

                                        </article>
                                    </div>
                                    <div class="shortcode-banner style-animated iso-item  filter-all " >
                                        <article class="post">
                                            <figure ><img src="{{ asset('public/img/oriente.jpg')}}" alt=""></figure>
                                            @if(session('device')!='mobile')
                                            <div class="shortcode-banner-inside" style=" width: 108%;">
                                                @else
                                                <div class="shortcode-banner-inside" style=" width: 112%;">
                                                    @endif
                                                    <div class="shortcode-banner-content">
                                                        <a href="{!!asset('/getRegionDescipcion/3')!!}" onclick="$('.iso-container').LoadingOverlay('show');"><h3  class="banner-title">Oriente</h3>
                                                        </a>
                                                        <div class="details">

                                                        </div>
                                                    </div>
                                                </div>

                                        </article>
                                    </div>
                                    <div class="shortcode-banner style-animated iso-item  filter-all " >
                                        <article class="post">
                                            <figure ><img src="{{ asset('public/img/galapagos.jpg')}}" alt=""></figure>
                                            @if(session('device')!='mobile')
                                            <div class="shortcode-banner-inside" style=" width: 108%;">
                                                @else
                                                <div class="shortcode-banner-inside" style=" width: 112%;">
                                                    @endif
                                                    <div class="shortcode-banner-content">
                                                        <a href="{!!asset('/getRegionDescipcion/4')!!}" onclick="$('.iso-container').LoadingOverlay('show');"><h3  class="banner-title">Galápagos</h3>
                                                        </a>
                                                        <div class="details">

                                                        </div>
                                                    </div>
                                                </div>

                                        </article>
                                    </div>
                                </div>
                            </div>

                    </section>
                    @endif
                    <section id="content">
                        <div class="container">
                            <div class="heading-box col-md-10 col-lg-8">
                                <h2 class="box-title">Ecuador an <em class="skin-color">amazing </em> country waiting for you</h2>
                                <p>Find the most beautiful and featured cities, events, parties, everything that you can imagine for your enjoy.</p>
                            </div>
                            <div id="main">
                                <div class="post-wrapper">
                                    <div class="post-filters">
                                        <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">{{ trans('publico/labels.label12')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-costa">{{ trans('publico/labels.label13')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-sierra">{{ trans('publico/labels.label14')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-oriente">{{ trans('publico/labels.label15')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-galapagos">{{ trans('publico/labels.label16')}}</a>
                                    </div>
                                    <div class="iso-container iso-col-4 style-masonry has-column-width topPlaces ">

                                        @section('topPlaces')
                                        @show

                                    </div>
                                    <div class="text-center">
                                        <a  class="btn style4 hover-blue load-more moreImagesTop">{{ trans('publico/labels.label31')}}</a>
                                    </div>

                                    <div class="post-filters">
                                        <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">{{ trans('publico/labels.label12')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-costa">{{ trans('publico/labels.label13')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-sierra">{{ trans('publico/labels.label14')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-oriente">{{ trans('publico/labels.label15')}}</a>
                                        <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-galapagos">{{ trans('publico/labels.label16')}}</a>
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
                  <input type="hidden" name="pagina" class="pagina">
                    <footer id="footer" class="style4">
                        @include('public_page.reusable.footer')
                    </footer>
                    </div>
                    <!-- Javascript -->
                    {!! HTML::script('public/js/jquery.js') !!}
                    {!!HTML::script('public/js/js_public/Compartido.js') !!}
                    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
                    {!!HTML::script('public/js/jquery.autocomplet.js') !!}

                    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-2.1.3.min.js')}}"></script>
                    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.noconflict.js')}}"></script>
                    <script type="text/javascript" src="{{ asset('public/public_components/js/modernizr.2.8.3.min.js')}}"></script>
                    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
                    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery-ui.1.11.2.min.js')}}"></script>

                    <!-- Twitter Bootstrap -->
                    <script type="text/javascript" src="{{ asset('public/public_components/js/bootstrap.min.js')}}"></script>

                    <!-- Magnific Popup core JS file -->
                    <script type="text/javascript" src="{{ asset('public/public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

                    <!-- parallax -->
                    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.stellar.min.js')}}"></script>

                    <!-- waypoint -->
                    <script type="text/javascript" src="{{ asset('public/public_components/js/waypoints.min.js')}}"></script>

                    <!-- Owl Carousel -->
                    <script type="text/javascript" src="{{ asset('public/public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

                    <!-- load revolution slider scripts -->
                    <script type="text/javascript" src="{{ asset('public/public_components/components/revolution_slider/js/jquery.themepunch.tools.min.js')}}"></script>
                    <script type="text/javascript" src="{{ asset('public/public_components/components/revolution_slider/js/jquery.themepunch.revolution.min.js')}}"></script>

                    <!-- plugins -->
                    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>

                    <!-- load page Javascript -->
                    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>

                    <script type="text/javascript" src="{{ asset('public/public_components/js/revolution-slider.js')}}"></script>

                    <script type="text/javascript" src="{{ asset('public/public_components/js/lugares_ecuador.js')}}"></script>
                    <script>
                                                            $(document).ready(function () {
                                                                var pagina = 1;
                                                                 
                                                                GetDataAjaxTopPlaces("{!!asset('/getTopPlaces')!!}?page="+pagina);
                                                                //GetDataAjaxEventsInd("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
                                                               var contador = pagina+1;
                                                               
                                                                $(".pagina").val(contador);


                                                            });

                                                            @if (session('device') == 'mobile')
                                                                    $("#mapas").hide();
                                                                    @endif

                                                                    $(".moremaps").click(function () {
                                                                $("#mapas").show();
                                                            });


                                                            var _throttleTimer = null;
                                                            var _throttleDelay = 90;
                                                            var $window = $(window);
                                                            var $document = $(document);
                                                            var validate = 0;

                                                            $document.ready(function () {

                                                             $window
                                                             .off('scroll', ScrollHandler)
                                                             .on('scroll', ScrollHandler);

                                                            });

                                                            function ScrollHandler(e) {

                                                                //throttle event:
                                                                clearTimeout(_throttleTimer);
                                                                //validate=0;
                                                                _throttleTimer = setTimeout(function () {
                                                                console.log($window.scrollTop() + $window.height() + ' scroll ' + $document.height());

                                                                //do work

                                                                if ($window.scrollTop() + $window.height() > $document.height() - 5000) {
                                                                
                                                                pagina = $(".pagina").val();
                                                                
                                                                GetDataAjaxTopPlacesHome("{!!asset('/getTopPlaces')!!}");
                                                                
                                                                 contador = parseInt(pagina)+1;
                                                               
                                                                $(".pagina").val(contador);
                                                                }

                                                                
                                                            }, _throttleDelay);


                                                            }

                                                            $(".moreImagesTop").click(function () {
                                                                pagina = $(".pagina").val();
                                                                
                                                                GetDataAjaxTopPlacesHome("{!!asset('/getTopPlaces')!!}");
                                                                 contador = parseInt(pagina)+1;
                                                               
                                                                $(".pagina").val(contador);
                                                            });

                                                            $(".moreImagesEvents").click(function () {
                                                                var valor = $("#ciudad").val();
                                                                //GetDataAjaxEventsHome("{!!asset('/getEventscloseToMe')!!}/"+valor);
                                                            });


                                                            $(".search-city").click(function () {
                                                                var valor = $("#ciudad").val();
                                                                window.current_page_e = 1;
                                                                //GetDataAjaxEventsIndbyCity("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
                                                            });

                                                            $(".sb-icon-search").click(function () {
                                                                $("#min-search").submit();
                                                            });
                                                            $(window).scroll(function () {
                                                                if ($(this).scrollTop() > 1000) {
                                                                    $('.scrollup').fadeIn();
                                                                } else {
                                                                    $('.scrollup').fadeOut();
                                                                }
                                                            });
                                                            
                                                            
                                                            
                                                            
                                                            $('.btn-sm').click(function () {
                                                                //$("html, body").animate({scrollTop: 0}, 600);
                                                                $('html, body').animate({scrollTop: parseInt($(".topPlaces").offset().top)}, 2000);
                                                                

                                                                return false;
                                                            });
                                                            
                                                            $('.scrollup').click(function () {
                                                                //$("html, body").animate({scrollTop: 0}, 600);
                                                                $('html, body').animate({scrollTop: parseInt($(".topPlaces").offset().top)}, 2000);
                                                                

                                                                return false;
                                                            });


                                                            $(window).scroll(function () {
                                                                if ($(this).scrollTop() > 100) {
                                                                    $('.scrollupWeb').fadeIn();
                                                                } else {
                                                                    $('.scrollupWeb').fadeOut();
                                                                }
                                                            });
                                                            $('.scrollupWeb').click(function () {
                                                                //$("html, body").animate({scrollTop: 0}, 600);
                                                                $('html, body').animate({scrollTop: parseInt($(".topPlaces").offset().top)}, 2000);
                                                                return false;
                                                            });


                                                            $(function () {


                                                                $("#ciudad").autocomplete({
                                                                    source: availableTags

                                                                });

                                                            });






                    </script>
                    </body>
                    </html>