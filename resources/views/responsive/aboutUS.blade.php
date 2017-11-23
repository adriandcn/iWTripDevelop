<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip | {{ trans('front/loginres.title')}}</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWaNaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
     
<link rel="apple-touch-icon" href="{{ asset('images/favicon.png')}}" />        
        <!-- Theme Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/font-awesome.min.css')}}">

        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public_components/components/magnific-popup/magnific-popup.css')}}"> 
         
        
        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/responsive.css')}}">
                {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
        

        <!-- CSS for IE -->
        <!--[if lte IE 9]>
            <link rel="stylesheet" type="text/css" href="{{ asset('public_components/css/ie.css')}}" />
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
        <![endif]-->

        
    </head>
    
    
    <body class="woocommerce">
        
        <?php
$operadorid1=0;
$operadorid2=0;
$operadorid3=0;
?>
        
        @if(count($listOperadores) !=0 )
@foreach ($listOperadores as $operadores)
@if ($operadores->id_tipo_operador == 1)

    <?php $label_tipo_operador_agencia = 'Ver mi perfil';
$operadorid1=$operadores->id_usuario_op;
?>
@endif

@if ($operadores->id_tipo_operador == 2)
<?php $label_tipo_operador_empresa = 'Ver mi perfil';
$operadorid2=$operadores->id_usuario_op;?>
@endif
@if ($operadores->id_tipo_operador == 3)
<?php $label_tipo_operador_persona = 'Ver mi perfil';
$operadorid3=$operadores->id_usuario_op;?>
@endif

@endforeach
@endif
        
            <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
            @include('public_page.reusable.banner', ['titulo' =>'About Us'])  

            <ul class="breadcrumbs">
                <li class="active">{{trans('front/responsive.breadcumbs1')}}</li>
            </ul>
        </div>    
        
 <section id="content">
            <div class="container">
                
                <div id="main">
                    
                    <?php $str2=utf8_encode("Debido a la gran belleza natural y multiculturalidad del Ecuador, este ostenta un increíble atractivo turístico. iWaNaTrip busca desarrollar este potencial dando a conocer los encantos naturales y la riqueza socio-cultural del Ecuador, interna e internacionalmente. ") ?>
                    <?php $str3=utf8_encode("Nuestro equipo de trabajo y aliados estratégicos trabajan para posicionar al Ecuador como un destino encantador, amigable y accesible. Juntos haremos haremos de esta comunidad turistica la más completa y grande del país.") ?>
        {!! Form::open(['url' => route('postTipoOperadorProfileRes'),  'id'=>'operadorres']) !!}
            <input type="hidden"  name="tipo_operador" id="tipo_operador">
            <input type="hidden"  name="operador_id" id="operador_id">
        @if(isset($label_tipo_operador_agencia))
           <div class="section-info">
                <h3 class="section-title">{{trans('front/responsive.bienvenido')}}</h3>
                <div class="tab-container vertical-tab">
                  <div id="tab3-3" class="tab-content in active">
                        <div class="tab-pane">
                            <img src="https://iwanatrip.com/public/img/logo_iwana2.jpg" alt="" class="pull-left">
                            <p>{!!$str2!!}</p>
                            <p>{!!$str3!!}</p>
                             <a class="btn style1"> onclick="$('#tipo_operador').val(1);$('#operador_id').val({!!$operadorid1!!});AjaxContainerRegistro1('operadorres')" href="#">{{trans('front/responsive.perfil')}}</a>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        
        @if(isset($label_tipo_operador_empresa))
            <div class="section-info">
                <h3 class="section-title">{{trans('front/responsive.bienvenido')}}</h3>
                <div class="tab-container vertical-tab">
                  <div id="tab3-3" class="tab-content in active">
                        <div class="tab-pane">
                            <img src="http://placehold.it/270x237" alt="" class="pull-left">
                            <p>{!!$str2!!}</p>
                            <p>{!!$str3!!}</p>
                            <a class="btn style1" onclick="$('#tipo_operador').val(2);$('#operador_id').val({!!$operadorid2!!});AjaxContainerRegistro1('operadorres')" href="#">{{trans('front/responsive.perfil')}}</a>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        
        @if(isset($label_tipo_operador_persona))
            <div class="section-info">
                <h3 class="section-title">{{trans('front/responsive.bienvenido')}}</h3>
                <div class="tab-container vertical-tab">
                  <div id="tab3-3" class="tab-content in active">
                        <div class="tab-pane">
                            <img src="https://iwanatrip.com/public/img/logo_iwana2.jpg" alt="" class="pull-left">
                            <p>{!!$str2!!}</p>
                            <p>{!!$str3!!}</p>
                            <a class="btn style1" onclick="$('#tipo_operador').val(3);$('#operador_id').val({!!$operadorid3!!});AjaxContainerRegistro1('operadorres')" href="#">{{trans('front/responsive.perfil')}}</a>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        
        @if(!isset($label_tipo_operador_persona)&& !isset($label_tipo_operador_empresa)&& !isset($label_tipo_operador_agencia))
        
                    <div class="section-info">
                <h3 class="section-title">{{trans('front/responsive.bienvenido')}}</h3>
                <div class="tab-container vertical-tab">
                  <div id="tab3-3" class="tab-content in active">
                        <div class="tab-pane">
                            <img src="https://iwanatrip.com/public/img/logo_iwana2.jpg" alt="" class="pull-left">
                            <p>{!!$str2!!}</p>
                            <p>{!!$str3!!}</p>
                             <a class="btn style1" onclick="$('#tipo_operador').val(3);$('#operador_id').val({!!$operadorid3!!});AjaxContainerRegistro1('operadorres')" href="#">{{trans('front/responsive.perfil')}}</a>
                        </div>
                    </div>

                </div>
            </div>
        @endif


                    {!! Form::close() !!}    
                    
                </div>
                
            </div>
        </section>
        
        
        
        
        <footer id="footer" class="style4">
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
    {!! HTML::script('js/jquery.js') !!}
    {!!HTML::script('js/js_public/Compartido.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('js/jquery.autocomplet.js') !!}
    {!!HTML::script('js/Compartido.js') !!}
    

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
                                });

     </script>
     
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
            background:url ("{!!asset('img/internas/b05.png')!!}") no-repeat;
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
            background:url("{!!asset('img/internas/a12.png')!!}") no-repeat;
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
<?php $header = "/img/portada_face_iwanatrip_04.jpg";?>
  <script>
jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
});
  

</script>
    @endif
    
<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
</body>
</html>
