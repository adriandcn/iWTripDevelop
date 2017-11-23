<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <title>iWaNaTrip - Deja de ser turista conviertete en viajero</title>
        <meta charset='utf-8' />
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="Registra tus servicios turísticos. Nosotros haremos que lo conozcan a nivel internacional y turistas de todo el mundo vengan a visitarte. IguanaTrip surge como una alternativa turística comunitaria para defender y revalorizar los recursos culturales y naturales. Planea tu viaje y aprende sobre la historia y la cultura del país mientras te involucras en la realidad del mismo. IguanaTrip te brindara información práctica de acuerdo a tus intereses sobre el lugar específico que decidas visitar. Encuentra hoteles, day trips, museos, playas, sitios turísticos, restaurantes, bares, todo tipo de atracciones desde la más pequeña a la más grande. Y lo más importante si lo deseas, IgunaTrip te guiará en tu recorrido para que ayudes a generar ingresos complementarios a comunidades locales en busca de desarrollo. Nos encontraos en la etapa de registro de operadores turísticos">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="iWaNaTrip group">
        <link rel="shortcut icon" href="public/favicon.ico" />
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png')}}" />        

       
            
    </head>
     {!! HTML::style('public/css/demo.css') !!} 
     {!! HTML::style('public/css/masterPagesRegistro.css') !!}
        {!! HTML::style('public/css/base/layoutBase.css') !!} 
        {!! HTML::style('public/css/popupModal/basic.css') !!} 
        {!! HTML::style('public/css/calendar/ui-jquery.css') !!}
        {!!HTML::script('public/js/sliderTop/jquery-1.9.1.min.js') !!}
        {!!HTML::script('public/js/sliderTop/jssor.slider.mini.js') !!}
        
          <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85546019-1', 'auto');
  ga('send', 'pageview');

</script>
   
        <body class="full-padding" style="margin: 0;padding: 0;min-width: 100%;">
    <div id='loadingScreen'>
            <center class="wrapper" style="display: table;table-layout: fixed;width: 100%;min-width: 620px;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;background-color: #323232;">
            

            <header role="banner">
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1360px; height: 235px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <!-- Loading Screen 
            <div style="position:absolute;display:block;background:url("{!!asset('public/img/internas/loading.gif')!!}") no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            -->
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1360px; height: 235px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-1.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-11.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-3.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-4.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-5.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-6.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-7.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-8.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-9.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-13.png')}}" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="{{ asset('public/img/internas/banner-15.png')}}" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
        
    </div>
                <div id="menu">
                    <div id="menu-ul">
                        <ul id="seleccionitem">
                            <li><a href="{!!asset('/myProfileOp')!!}">{{ trans('welcome/index.home') }}</a></li>
                            <li><a href="#" onclick="window.location.href = '{!!asset('/myProfileOp')!!}'">Mi perfil</a></li>
                                                        <!--@if(session('statut')=='admin')
                             Bullet Navigator 
                            <li><a href="#" onclick="window.location.href = '{!!asset('/getProvinciasDescipcion')!!}'">Descr. Provincias</a></li>
                            <li><a href="#" onclick="window.location.href = '{!!asset('/getCantonesDescipcion')!!}'">Cantones</a></li>
                            <li><a href="#" onclick="window.location.href = '{!!asset('/getParroquiaDescipcion')!!}'">Parroquia</a></li>
                            
                            @endif-->

                            <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>
                        </ul>
                    </div>
                    <div class="sessionName">Bienvenido {!!session('user_name')!!}</div>
                </div>
            </header>
            <div class="container" id="target">
                <div class="content show" id="registro-step1">
                    @yield('step1')
                </div>	

            </div>
            
            <div class="auspciantes" >
                
<img data-u="image" src="{{ asset('public/img/internas/logos-base-blanco.png')}}" />
            </div>

            <div id="footers">
                <div id="menu-ul">
                    <ul id="seleccionitem">
                            <li><a href="{!!asset('/myProfileOp')!!}">Home</a></li>
                            <li><a href="#" onclick="window.location.href = '{!!asset('/TermsConditions')!!}'">{{ trans('welcome/index.labelTerminos') }}</a></li>
                            <li><a href="#" onclick="window.location.href = '{!!asset('/AboutUs')!!}'">{{ trans('welcome/index.labelAcercaDe') }}</a></li>
                           <li><a href="#" onclick="window.location.href = '{!!asset('/contactAdmin')!!}'">Contacto</a></li>                            
                            <li>{!! link_to('auth/logout', trans('front/site.logout')) !!}</li>

                    </ul>
                </div>	
            </div>
            
               <div class="copyr" >
                
                  <span id="uxp_ftr_link_trademark">                  © 2016 iWaNaTrip Group All rights reserved                </span>
            </div>



            {!! HTML::script('public/js/jquery.js') !!}
            {!! HTML::script('public/js/bootstrap.min.js') !!}
            {!!HTML::script('public/js/loadingScreen/loadingoverlay.js') !!}
            
            {!!HTML::script('public/js/Compartido.js') !!}
            {!! HTML::script('public/js/calendar/calendar.js') !!}
            {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
            
            <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1800,$Opacity:2}
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
        });
    </script>
    
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
            background:url("{!!asset("public/img/internas/a12.png")!!}") no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>

            @yield('scripts')

 </center>
</div>
      
        </body>


</html>
