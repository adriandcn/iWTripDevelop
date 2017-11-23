<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>{!!$evento[0]->nombre_evento!!} | iWaNaTrip</title>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
                                    
        <meta name="description" content='{!!$evento[0]->nombre_evento!!} |iWaNaTrip.com'>
        <meta name="keywords" content="{!!$evento[0]->nombre_evento!!} ">
        <meta name="author" content="iWaNaTrip group">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="Content-Language" content="es">
        <META NAME="robots" CONTENT="all | index | follow">
        <META name="Revisit" content="3 days"> 
      
        <meta property="og:title" content="{!!$evento[0]->nombre_evento!!}" /> 
        <meta property="og:description" content="{!!$evento[0]->nombre_evento!!}!!}" />
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
        
        -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
        
        <!-- Magnific Popup core CSS file -->
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
            @include('public_page.reusable.banner', ['titulo' =>$evento[0]->nombre_evento])  
                <?php $nombreAtarccion = $nombreAtraccion[0]->nombre_servicio; 
                       $usuarioServicio = $evento[0]->id_usuario_servicio; ?>
            <ul class="breadcrumbs" id="dashboard2">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{{ asset("/detalle/$nombreAtarccion/$usuarioServicio") }}"  onclick="$('#target').LoadingOverlay('show')">{{ $nombreAtraccion[0]->nombre_servicio }}</a></li>
                <li class="active"> {{ trans('publico/labels.detallepromocion')}}</li>
            </ul> 
        </div>
        
        <section id="content">
            <div class="container">
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
                                                <img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$evento[0]->nombre_evento!!}">
                                                
                                                @if($profile->descripcion_fotografia!="")
                                                <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                                    <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>
                                                    
                                                </div>
                                                @endif
                                            </a>
                                            @else
                                            <?php $header= asset('images/fullsize/'.$imagenes[0]->filename)?>
                                             <a href="{{ asset('images/fullsize/'.$imagenes[0]->filename)}}" class="soap-mfp-popup">
                                                <img src="{{ asset('images/icon/'.$imagenes[0]->filename)}}" alt="{!!$evento[0]->nombre_evento!!}">
                                                
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
                                            <a href="{{ asset('images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup"><img src="{{ asset('images/icon/'.$imagen->filename)}}" alt="{!!$evento[0]->nombre_evento!!}"></a>
                                        </div>
                                            @endforeach
                                    </div>
                        </div>
                        <div class="summary entry-summary col-sm-6 box-lg">
                            <div class="clearfix">
                                <h2 class="product-title entry-title"> {!!$evento[0]->nombre_evento!!} </h2>
                                <!-- <span class="star-rating" title="4" data-toggle="tooltip">
                                    <span data-stars="4"></span>
                                </span> -->
                            </div>
                            <span class="product-price box"> FREE </span>
                            <pre class="more">{!!$evento[0]-> descripcion_evento !!}</pre>
            
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
                                    <dd> <?php echo date("d-m-Y", strtotime($evento[0]->fecha_desde));?> </dd>
                                    <dt> {{ trans('publico/labels.fechahasta')}} :</dt>
                                    <dd> <?php echo date("d-m-Y", strtotime($evento[0]->fecha_hasta));?> </dd>
                                    <dt>{{ trans('publico/labels.permanenteevento')}} :</dt>
                                    <dd> <?php if($evento[0]->permanente == 1){
                                        echo "Si";
                                    }else{
                                        echo "No";
                                    }?> </dd>                                    
                                    <!--<dt class="note">{{ trans('publico/labels.observaciones')}}:</dt>
                                    <dd> {!!$evento[0]->observaciones_evento!!} </dd> -->
    
                                </dl>
                            </div>
                        </div>
                        
                    </div>
                     <ul class="related products row add-clearfix"> 
                         <h2 class="product-title entry-title"> {{ trans('publico/labels.ubicacionevento')}}: </h2>
                         
                                                               @if(session('device')!='mobile')
                                    <div class="soap-google-map maps ">
      
                                </div>    
                                        @else
                                        <div class="soap-google-map maps mapMobile">
                                    </div>
                                        @endif  

                    </ul>
                    <br><br>
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
    <!--{!!HTML::script('js/js_Compartido.js') !!} -->
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('js/Compartido.js') !!}

    {!!HTML::script('public_components/js/jquery-2.1.3.min.js') !!}
    {!!HTML::script('public_components/js/jquery.noconflict.js') !!}
    {!!HTML::script('public_components/js/modernizr.2.8.3.min.js') !!}
    {!!HTML::script('public_components/js/jquery-migrate-1.2.1.min.js') !!}
    {!!HTML::script('public_components/js/jquery-ui.1.11.2.min.js') !!}
    <!-- <script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script> -->

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

                    center: [{!!$evento[0]->latitud_evento!!},{!!$evento[0]->longitud_evento !!}],
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
                    {latLng:[ {!!$evento[0]->latitud_evento!!},{!!$evento[0]->longitud_evento !!}], data:"Ecuador"}
                    

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
          window.open('https://maps.google.com.ec/maps?saddr=My Location&daddr='  + {!!$evento[0]->latitud_evento!!} + ',' + {!!$evento[0]->longitud_evento !!},"_blank");
          
                
            });
    
    @else
   $(".maps").dblclick(function () {
    
    myNavFunc();
 });
 
 function myNavFunc(){
    // If it's an iPhone..
    
         window.open("maps://maps.google.com/maps?daddr={!!$evento[0]->latitud_evento!!},{!!$evento[0]->longitud_evento !!}");
    
}
 


    @endif
    </script>

</body>
</html>