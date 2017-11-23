<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWanaTrip | Vive la experiencia Ecuador</title>

        <link rel="shortcut icon" href="{{ asset('public/images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWanaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Theme Styles -->

        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        
{!! HTML::style('public/css/jquery-labelauty.css') !!} 
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('public/js/sliderTop/jssor.slider.mini.js') !!}

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

        <style>

            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;
            }

        </style>
        <style>
            .ui-menu {
    box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
    background:rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
    width: 240px;
            }
        </style>
    </head>
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
                                       @if(session('locale') == 'es' )
                                          <?php $titlUp="Misión&Visión"?>
                                            @else
                                           
                                           <?php $titlUp="Mision&Vision"?>  @endif

      @include('public_page.reusable.banner', ['titulo' =>$titlUp])  
<ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
              
                
             
                <li class="active">{!!$titlUp!!}</li>
            </ul>
        </div>
       
        
        
        
        <section id="content">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-8">
                            <div class="post-slider style1 owl-carousel box">
                                <a href="{{ asset('public/img/portada_face_iwanatrip_02.jpg')}}" class="soap-mfp-popup">
                                    <img src="{{ asset('public/img/portada_face_iwanatrip_02.jpg')}}" alt="">
                                </a>
                                <a href="{{ asset('public/img/portada_face_iwanatrip_01.jpg')}}" class="soap-mfp-popup">
                                    <img src="{{ asset('public/img/portada_face_iwanatrip_01.jpg')}}" alt="">
                                </a>
                                <a href="{{ asset('public/img/portada_face_iwanatrip_04.jpg')}}" class="soap-mfp-popup">
                                    <img src="{{ asset('public/img/portada_face_iwanatrip_04.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <h3>iWaNaTrip</h3>
                            <p>iWaNaTrip es el primer motor de búsqueda dedicado exclusivamente a servicios turísticos. A través de iWaNaTrip el turista encontrará información detallada de su próximo destino y a la vez podrá conectarse directamente con los operadores turísticos locales. Nuestro motor de búsqueda permitirá encontrar todas las respuestas que un turista necesita saber de una forma transparente y confiable.</p>

                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="parallax has-caption parallax-image2" data-stellar-background-ratio="0.5">
                <div class="caption-wrapper">
                    <h2 class="caption animated size-lg" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0">{{ trans('publico/labels.label107')}}</h2>
                    <br>
                    <h3 class="caption animated size-md" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="1">{{ trans('publico/labels.label108')}}</h3>
                </div>
            </div>
            <div class="section">
                <div class="container">
                    <div class="heading-box">
                        <h2 class="box-title">Our Work Process</h2>
                        <p class="desc-md">Get to know how we achive it</p>
                    </div>
                    <ul class="process-builder style-simple items-4 clearfix">
                        <li class="process-item">
                            <div class="process-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="process-details">
                                <h4 class="process-title">{{ trans('publico/labels.label113')}}</h4>
                            </div>
                        </li>
                        <li class="process-item active">
                            <div class="process-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="process-details">
                                <h4 class="process-title">{{ trans('publico/labels.label114')}}</h4>
                            </div>
                        </li>
                        <li class="process-item">
                            <div class="process-icon">
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            <div class="process-details">
                                <h4 class="process-title">{{ trans('publico/labels.label115')}}</h4>
                            </div>
                        </li>
                        <li class="process-item">
                            <div class="process-icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="process-details">
                                <h4 class="process-title">{{ trans('publico/labels.label116')}}</h4>
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>iWaNaTrip es un espacio de busqueda para la red viajeros de todo el mundo, permite compartir el contenido de forma sencilla a traves de internet.</p>
                            <p>Nosotros ponemos a la disposicion del viajero informacion no solo de las atracciones mas visitadas sino tambien sitios que nunca encontrarias en los libros ni en internet permitiendote descubrir sitios increhibles en tu viaje.</p>
                        </div>
                        <div class="col-sm-6">
                            <p>Nuestros sofisticados algoritmos de desarrollo permiten posicionar y recomendar los sitios acordes a los intereses del viajero.</p>
                            <p>Los operadores turisticos tienen la capacidad de manejar su propia publicidad y su nivel de ranking el cual le permite ser encontrado por miles de turistas a nivel mundia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parallax parallax-image1" data-stellar-background-ratio="0.5">
                <div class="section">
                    <div class="container">
                        <div class="row add-circle-box-line">
                            <div class="col-sm-6 col-md-3 box">
                                <div class="counters-box style1">
                                    <div class="icon-wrap">
                                        <img src="{{ asset('public/img/check.png')}}" alt="">
                                    </div>
                                    <dl>
                                        <dt class="fontsize-lg">{{ trans('publico/labels.label109')}}</dt>
                                        <dd class="display-counter color-white" data-value="9850">9850</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 box">
                                <div class="counters-box style1">
                                    <div class="icon-wrap">
                                        <img src="{{ asset('public/img/coffee.png')}}" alt="">
                                    </div>
                                    <dl>
                                        <dt class="fontsize-lg">{{ trans('publico/labels.label110')}}</dt>
                                        <dd class="display-counter color-white" data-value="7325">7325</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 box">
                                <div class="counters-box style1">
                                    <div class="icon-wrap">
                                        <img src="{{ asset('public/img/heart.png')}}" alt="">
                                    </div>
                                    <dl>
                                        <dt class="fontsize-lg">{{ trans('publico/labels.label111')}}</dt>
                                        <dd class="display-counter color-white" data-value="1924">1924</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 box">
                                <div class="counters-box style1">
                                    <div class="icon-wrap">
                                        <img src="{{ asset('public/img/cog.png')}}" alt="">
                                    </div>
                                    <dl>
                                        <dt class="fontsize-lg">{{ trans('publico/labels.label112')}}</dt>
                                        <dd class="display-counter color-white" data-value="14275">14275</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

          <footer id="footer" class="style4">
            <div class="callout-box style2">
                <div class="container">
                    <div class="callout-content">
                        <div class="callout-text">
                            <h4>{{ trans('publico/labels.label119')}}</h4>
                        </div>
                    
                    </div>
                </div>
            </div>
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
    

{!! HTML::script('public/js/jquery.js') !!}
    {!!HTML::script('public/js/js_public/Compartido.js') !!}
    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
        {!!HTML::script('public/js/jquery.autocomplet.js') !!}
        {!!HTML::script('public/js/Compartido.js') !!}

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

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>




    
                             
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
            background:url ("{!!asset("public/img/internas/b05.png")!!}") no-repeat;
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

    @endif
    
    


    
    
    
    <!-- load page Javascript -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>


</body>
</html>