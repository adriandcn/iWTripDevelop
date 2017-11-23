<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>{!!$atraccion->nombre_servicio!!} | iWaNaTrip</title>


        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="{!!$atraccion->nombre_servicio!!}. Viaja y descubre lugares,tours, aventuras,gente y más. Hoteles · Diversión · Restaurantes · Cultura| iWaNaTrip">

        <meta name="author" content="iWaNaTrip team">
        <meta property="og:title" content="{!!$atraccion->nombre_servicio!!}" /> 
        <meta property="og:description" content="{!!$atraccion->nombre_servicio!!}. Viaja y descubre lugares,tours, aventuras,gente y más.Hoteles · Diversión · Restaurantes · Cultura | iWaNaTrip" />
        <meta property="og:image" content="{{ asset('images/fullsize/1171touraventura.jpg')}}" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme Styles -->

        <link rel="apple-touch-icon" href="{{ asset('public/img/60x60_logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/76x76logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/120x120logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/180x180logo_iwana.png')}}">
        <link rel="icon" sizes="180x180" href="{{ asset('public/img/180x180logo_iwana.png')}}">
        <link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}" />
        <link rel="apple-touch-icon" href="{{ asset('public/images/favicon.png')}}" />  
        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85546019-1', 'auto');
  ga('send', 'pageview');

</script>
    </head>
    <body>
        <div id="page-wrapper">
            <header id="header"  class="header-color-white" >
             @include('public_page.reusable.header')
            </header>
            @include('public_page.reusable.banner', ['titulo' =>$atraccion->nombre_servicio])  
            <ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li class="active">{!!$atraccion->nombre_servicio!!}
                </li>
            </ul>
        </div>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-md-8">
                        <div class="blog-posts">
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">1</span>

                                </div>

                                <div class="heading-box col-md-10 col-lg-8">
                                    <h2 class="box-title"> <em class="skin-color">{!!$atraccion->nombre_servicio!!}</em> </h2>

                                </div>
                                <div class="post-image">
                                    <div class="image-container">
                                        
                                        
                                          <div id="sync1" class="owl-carousel images">
                                        <div class="post-slider style3 owl-carousel box">
                                    
                                            <a href="{{ asset('images/fullsize/1171touraventura.jpg')}}" class="soap-mfp-popup">
                                                <img src="{{ asset('images/fullsize/1171touraventura.jpg')}}" alt="Tour Aventura - iWaNaTrip.com">
                                    </div></div>  
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="post-action">

                                        <div id="fb-root"></div>
                                        <script>(function (d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0];
                                                if (d.getElementById(id))
                                                    return;
                                                js = d.createElement(s);
                                                js.id = id;
                                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>

                                        <div class="fb-share-button" data-href="{!!asset('/trip')!!}/{!!$atraccion->nombre_servicio!!}/{!!$atraccion->id!!}" data-layout="button_count"></div>

                                    </div>
                                    <h2 class="entry-title"><a href="#">{!!$atraccion->nombre_servicio!!}</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category"> <a href="#">Aventura y Biodiversidad </a></span>

                                    </div>
                                    <?php $str = utf8_encode("La Amazonía de Ecuador es una de las más biodiversas del planeta. Mientras caminas por senderos, exploras cavernas o simplemente navegas en uno de los cientos de ríos, apreciarás la gran cantidad de animales y plantas. De la misma forma, sus espectaculares vistas y cascadas te pondrán en contacto con la naturaleza en su máximo esplendor. ") ?>
                                    
                                    <p>{!!$str!!}</p>
                                    
                                </div>
                            </article>
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">1</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="image-container">

                                        <a href="https://iwanatrip.com/detalle/Papallacta/171"><img src="{{ asset('public/images/fullsize/171termasnochecom.jpg')}}" alt="Papallacta"></a>
                                    </div>
                                </div>
                                <div class="post-content">

                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Papallacta/171">Papallacta</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>

                                    </div>
                                    <?php $str4 = utf8_encode("Comienza tu ruta en Quito donde previamente contrata los alojamientos en las entrañas de la selva como son el Parque Nacional Cuyabeno (desde Lago Agrio) y Limoncocha – Yasuní (desde Coca). Una vez que sepas las horas, comienza tu viaje en Quito rumbo al este a Papallacta donde puedes disfrutar de aguas termales de agua cristalina con una vista espectacular de las montañas. Pasa la noche en la pequeña villa y al día siguiente emprende tu camino hacia Baeza donde puedes hacer rafting, senderismo, bicicleta, avistamiento de aves y actividades al aire libre.  ") ?>

                                    <p>{!!$str4!!} </p>
                                </div>
                            </article>

                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">2</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">

                                        <a href="https://iwanatrip.com/detalle/Cascada-de-San-Rafael/173"><img src="{{ asset('public/images/fullsize/173sanrafaelfallsoriginal4027.jpg')}}" alt="Cascada San Rafael"></a>
                                    </div>
                                </div>
                                <div class="post-content">

                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Cascada-de-San-Rafael/173">Cascada de San Rafael</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>

                                    </div>
                                    <?php $str5 = utf8_encode("Camino hacia al Oriente te encontrarás con la magnífica Cascada de San Rafael que es la cascada más grande de Ecuador con alrededor de 150 m de altura. Regresando a la ruta principal continúa tu camino hacia Lago Agrio donde durante todo el trayecto encontrarás cascadas, cuevas y senderos. Lago Agrio es el punto de partida hacia el espesor de la selva. Desde ahí, tendrás que continuar en lancha (tours contratados) hacia el espectacular parque nacional Cuyabeno con una de las más altas reservas de biodiversidad del mundo.  ") ?>

                                    <p>{!!$str5!!} </p>


                                </div>
                            </article>

                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">3</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <a href="https://iwanatrip.com/detalle/Misahuall%C3%AD/205">
                                        <img src="{{ asset('images/fullsize/20572934050.jpg')}}" alt="Misahualli"></a>

                                    </div>
                                </div>
                                <div class="post-content">

                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Misahuall%C3%AD/205">Misahualli</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>

                                    </div>
                                    <?php $str6 = utf8_encode("De regreso en Lago Agrio, dirígete hacia el Coca donde se toma la embarcación hacia la parte baja del río Napo camino al Yasuní y pasando por Limoncocha con los mejores hoteles en medio de la selva. Los tour te retornan a el Coca de donde puedes continuar a la encantadora ciudad del Tena. Esta ciudad con un malecón a orillas del río, es perfecta para visitar cascadas, cuevas subterráneas y el centro del rafting ecuatoriano con nivel III y IV. A pocos kilómetros del Tena se encuentra la pequeña ciudad de Misahuallí, antiguo puerto fluvial con monos en sus calles desde donde se puede salir en daytrips hacia la selva.  ") ?>

                                    <p>{!!$str6!!} </p>


                                </div>
                            </article>

                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">4</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <a href="https://iwanatrip.com/detalle/Mirador-de-Indichuris/364"><img src="{{ asset('images/fullsize/3641507887411560180478220411675480156571472143n.jpg')}}" alt="Indichuris"></a>

                                    </div>
                                </div>
                                <div class="post-content">
                                    <?php $str17 = utf8_encode("Indichuris") ?>
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Mirador-de-Indichuris/364">{!!$str17!!}</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>

                                    </div>
                                    <?php $str7 = utf8_encode("Finalmente, si el tiempo lo permite dirígete hacia la menos concurida la ciudad de Macas pasando por el mirador de Indichuris. En esta zona es llena de comunidades aborígenes con shamanes que te permitirán conocer mejor la cultura de la selva ecuatoriana. ") ?>

                                    <p>{!!$str7!!} </p>


                                </div>
                            </article>

                            



                        </div>

                    </div>
                    <div class="sidebar col-md-4">
                        <div class="main-mini-search-form full-width box">
                            {!! Form::open(['url' => route('min-search'),  'method' => 'get', 'id'=>'min-search']) !!}
                            <div class="search-box">
                                <input type="text" id="s"  placeholder="Search" name="s" value="">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="box">
                            <h4>{{ trans('publico/labels.label131AB')}}</h4>
                            <ul class="product-list-widget">
                                @if($eat!=null)
                                @foreach ($eat as $serv)
                                @if($serv!=null)
                                <li>



                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/{!!$serv->nombre_servicio!!}/{!!$serv->id!!}">

                                            <img src="{{ asset('images/icon/'.$serv->filename)}}" alt="{!!$serv->nombre_servicio!!}">
                                        </a>
                                    </div>


                                    <div class="product-content">


                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$serv->nombre_servicio!!}/{!!$serv->id!!}"  >{!!$serv->nombre_servicio!!}</a></h6>



                                        <span class="product-price">{!!$serv->ubicacion!!}</span>

                                    </div>



                                </li>
                                @endif
                                @endforeach
                                @endif

                            </ul>
                        </div>
                        <div class="box">
                            <h4>More Trips</h4>
                            <div class="row">
                                <div class="col-xs-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        @if($moretrips!=null)
                                        @foreach ($moretrips as $trips)
                                        @if($trips!=null)
                                        <li><a href="{!!asset('/trip')!!}/{!!$trips->nombre_servicio!!}/{!!$trips->id!!}">{!!$trips->nombre_servicio!!}</a></li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="box">
                            <h4>{{ trans('publico/labels.label132AB')}}</h4>

                            <ul class="product-list-widget">
                                @if($sleep!=null)
                                @foreach ($sleep as $sleepe)
                                @if($sleepe!=null)

                                <li>



                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/{!!$sleepe->nombre_servicio!!}/{!!$sleepe->id!!}"  >

                                            <img src="{{ asset('images/icon/'.$sleepe->filename)}}" alt="{!!$serv->nombre_servicio!!}">
                                        </a>
                                    </div>


                                    <div class="product-content">


                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$sleepe->nombre_servicio!!}/{!!$sleepe->id!!}"  >{!!$sleepe->nombre_servicio!!}</a></h6>



                                        <span class="product-price">{!!$sleepe->ubicacion!!}</span>

                                    </div>



                                </li>
                                @endif
                                @endforeach
                                @endif

                            </ul>

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
                            <h4>{{ trans('publico/labels.label26')}}</h4>
                        </div>
                        <div class="callout-action">
                            <a onclick="$('.woocommerce').LoadingOverlay('show');" class="btn style4">{{ trans('publico/labels.label27')}}</a>
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


    <!-- Google Map Api -->
    <script type='text/javascript' src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/gmap3.js')}}"></script>
    <script>


                                sjq(document).ready(function ($) {
                                    // Configure/customize these variables.
                                    var showChar = 100; // How many characters are shown by default
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




    </script>
    @endif





    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->


</body>
</html>