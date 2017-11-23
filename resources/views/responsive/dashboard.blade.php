<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip | {{ trans('front/dashboard.title')}}</title>

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
        
        <!--<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" /> -->
        
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
        {!!HTML::script('js/sweetAlert/sweetalert2.min.js') !!}
        {!! HTML::style('css/calendar/ui-jquery.css') !!}    
        


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
            
                .mores {
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
    </head>
      
    <body class="woocommerce">
        
                  <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
            @include('public_page.reusable.header')
            </header>
            @include('public_page.reusable.banner', ['titulo' =>'Dashboard'])  

            <!--<ul class="breadcrumbs">
                <li class="active">{{trans('front/dashboard.breadcumbs')}}</li>
            </ul>-->
            <ul class="breadcrumbs" id="dashboard1" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li class="active"> {{trans('front/responsive.dashboard')}}</li>
           </ul>
            <ul class="breadcrumbs" id="dashboard2" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li class="active"> {{trans('front/responsive.edicion')}}</li>
            </ul> 
            <ul class="breadcrumbs" id="dashboard3" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li class="active"> {{trans('front/responsive.preview')}}</li>
            </ul>            
            <ul class="breadcrumbs" id="dashboard4" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li class="active"> {{trans('front/responsive.informacion')}}</li>
           </ul>
            <ul class="breadcrumbs" id="dashboard5" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li class="active"> {{trans('front/responsive.listapromo')}}</li>
            </ul>
            <ul class="breadcrumbs" id="dashboard6" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li><a href="#" id="listarpromo" onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.listapromo')}}</a></li>
                <li class="active"> {{trans('front/responsive.editpromo')}}</li>
            </ul>
            <ul class="breadcrumbs" id="dashboard7" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li class="active"> {{trans('front/responsive.listaevento')}}</li>
            </ul> 
            <ul class="breadcrumbs" id="dashboard8" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li><a href="#" id="listarevento"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.listaevento')}}</a></li>
                <li class="active"> {{trans('front/responsive.editevento')}}</li>
            </ul> 
            <ul class="breadcrumbs" id="dashboard10" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li><a href="#" id="listarpromo1" onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.listapromo')}}</a></li>
                <li><a href="{!!asset('/edicionPromocion')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.editpromo')}}</a></li>
                <li class="active"> {{trans('front/responsive.previewpromo')}}</li>
            </ul>
           <ul class="breadcrumbs" id="dashboard11" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li><a href="{!!asset('/edicionServicios')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.edicion')}}</a></li>
                <li><a href="#" id="listarevento1"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.listaevento')}}</a></li>
                <li><a href="{!!asset('/edicionEvento')!!}"   onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.editevento')}}</a></li>
                <li class="active"> {{trans('front/responsive.previewpromo')}}</li>
            </ul> 
            <ul class="breadcrumbs" id="dashboard12" style="display:none;">
                <li><a href="{!!asset('/')!!}"  onclick="$('#target').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li><a href="{!!asset('/serviciosres')!!}"  onclick="$('#target').LoadingOverlay('show')">{{trans('front/responsive.dashboard')}}</a></li>
                <li class="active"> {{trans('front/responsive.adminerror')}}</li>
           </ul>            
                    
        </div>    

        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="woocommerce">
                        <div class="tab-container dashboard row">
                                  <div class="col-sm-12 col-md-12">
                                      <br><br>
                                    <h4 class="full-name skin-color">{{trans('front/dashboard.saludo')}}, {!!session('user_name')!!}</h4>
                                    <div class="description">
                                        <p>{{trans('front/dashboard.texto')}}</p>
                                    </div>
                                    <hr class="color-light1">
                                </div>
                            <div class="col-sm-3 col-md-3">
                                <h4>{{trans('front/responsive.micuenta')}}</h4>
                                <ul class="tabs arrow-circle size-medium box">
                                    <li><a style="border: 0px;margin-left:1%;text-align: left; padding-top: 4%;" class="btn btn-sm style4" onclick="window.location.href = '{!!asset('/serviciosres')!!}'" data-toggle="tab"> {{trans('front/dashboard.menu1')}} </a></li>
                                    <li><a style="border: 0px;margin-left:1%;text-align: left; padding-top: 4%;"class="btn btn-sm style4" onclick="window.location.href = '{!!asset('/myinfores')!!}'" data-toggle="tab"> {{trans('front/dashboard.menu2')}} </a></li>
                                    <li id="errores" style="display:none;"><a style="border: 0px;margin-left:1%;text-align: left; padding-top: 4%;"class="btn btn-sm style4" onclick="window.location.href = '{!!asset('/errorAdmin')!!}'" data-toggle="tab"> Administracion de Errores</a></li>
                                    
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-9" id="target">
                                
                                    @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <footer id="footer" class="style4">
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
    {!! HTML::script('js/jquery.js') !!}
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script>
    
        
    {!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
    {!!HTML::script('js/jquery.autocomplet.js') !!}
    {!!HTML::script('js/Compartido.js') !!}
    
    
    <!-- Twitter Bootstrap -->
    <script src="{{ asset('public_components/js/bootstrap.min.js')}}"></script>
    <!-- Magnific Popup core JS file -->
    <script type="text/javascript" src="{{ asset('public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.stellar.min.js')}}"></script>
    <!-- waypoint -->
    <script type="text/javascript" src="{{ asset('public_components/js/waypoints.min.js')}}"></script>
    <!-- Owl Carousel -->
    <!--<script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script> -->
    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.plugins.js')}}"></script>
    <!-- Google Map Api -->
    
   <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/gmap3.js')}}"></script>
    
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
    
<script>

    $(document).ready(function () {
 //$('.btn dropdown-toggle bs-placeholder btn-default').width('100%');
 $("#username").val("");
 $(".input-text.full-width").val("");
 
    });

</script>
    
{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


@yield('scripts')

</body>
</html>
