@if(session('device')!='mobile')
<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en'>
    <!--<![endif]-->
    <head>
        <title>iWaNaTrip- Deja de ser turista conviertete en viajero</title>
        <meta charset='utf-8' />
        
        <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="Registra tus servicios turisticos. Nosotros haremos que lo conozcan a nivel internacional y turistas de todo el mundo vengan a visitarte. iWaNaTrip surge como una alternativa turística comunitaria para defender y revalorizar los recursos culturales y naturales. Planea tu viaje y aprende sobre la historia y la cultura del país mientras te involucras en la realidad del mismo. iWaNaTrip te brindara información práctica de acuerdo a tus intereses sobre el lugar específico que decidas visitar. Encuentra hoteles, day trips, museos, playas, sitios turísticos, restaurantes, bares, todo tipo de atracciones desde la más pequeña a la más grande. Y lo más importante si lo deseas, iWaNaTrip te guiará en tu recorrido para que ayudes a generar ingresos complementarios a comunidades locales en busca de desarrollo. Nos encontraos en la etapa de registro de operadores turísticos">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="iWaNaTrip group">
        <title>{{ trans('welcome/index.labelComming') }}</title>	

        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="images/favicon.png" />


        {!! HTML::style('public/css/maximage.css') !!} 
        {!! HTML::style('public/css/styles.css') !!} 
        {!! HTML::style('public/css/registerForm.css') !!} 

        <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

        {!! HTML::style('public/css/demo.css') !!} 

        
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

        <!--[if IE 6]>
                <style type="text/css" media="screen">
                        .gradient {display:none;}
                </style>
        <![endif]-->
    </head>

    <body>
        <div id="target">
            <!-- Logo -->


            <div id="logo_">
                    <div id="logo-imagen">

                        <a href="#" onclick="window.location.href = '{!!asset('/')!!}'"><img src="{{ asset('public/img/index-logo.png')}}" width="230" height="218" alt="iWaNaTrip" /></a> 
                    </div>

            </div>

            <!-- Switch to full screen -->


            <!-- Site Logo <div id="logo">Iguna Trip</div> -->
            <div id="lang">


                <a href="{!! url('language') !!}"><img width="32" height="32" alt="en" src="{!! asset('public/img/' . (session('locale') == 'es' ? 'english' : 'espanol') . '-flag.png') !!}"></a>
            </div>



            <!-- Main Navigation -->
            <nav class="main-nav">
                <ul>

                    <li><a onclick="window.location.href = '{!!asset('/TermsConditions')!!}'"> {{ trans('welcome/index.labelRegister') }}</a></li>
                    <li><a href="#about">{{ trans('welcome/index.labelAbout') }}</a></li>
                    <li><a href="#contact">{{ trans('welcome/index.labelContact') }}</a></li>
                    


                </ul>
            </nav>

            <!-- Slider Controls -->


            <!-- Home Page -->
            <div id="logindiv">
                @yield('contentLogin')
            </div>


            <section class="content show" id="home">
                @yield('contentRegistro')
            </section>


            <!-- About Page -->
            <section class="content hide" id="about">
                <h1>{{ trans('welcome/index.labelAbout') }}</h1>
                <h5>{{ trans('welcome/index.labelSubAbout') }}</h5>
                <p>{{ trans('welcome/index.pAboutDescription') }}
                </p>
            </section>

            <!-- Contact Page -->
            <section class="content hide" id="contact">
                <h1>{{ trans('welcome/index.labelContact') }}</h1>
                <h5>{{ trans('welcome/index.labelContact') }}</h5>
                <p>Email: <a href="#">info@iwannatrip.com</a><br />
                    <!-- Contact Page {!! link_to('contact/create', trans('front/site.contact')) !!}-->
                    <br /></p>
                <p><br />
                </p>
            </section>        
            <!-- Background Slides -->
            <div id="maximage">
                <div>
                                        <img src="{!! asset('public/img/galapagos2.jpg')!!}" alt="" />
				<img class="gradient" src="{!! asset('public/images/backgrounds/gradient.png')!!}" alt="Galapagos" />
                </div>
                
                

            </div>

            {!!HTML::script('public/js/jquery_.js') !!}
            {!!HTML::script('public/js/jquery.easing.min.js') !!}
            {!!HTML::script('public/js/jquery.cycle.all.js') !!}
            {!!HTML::script('public/js/jquery.maximage.js') !!}
            {!!HTML::script('public/js/jquery.fullscreen.js') !!}
            {!!HTML::script('public/js/jquery.ba-hashchange.js') !!}
            {!!HTML::script('public/js/main.js') !!}
        {!!HTML::script('public/js/loadingScreen/loadingoverlay.js') !!}

    {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
            
            @yield('scripts')
            
            <script type="text/javascript" charset="utf-8">
                          $('.logininput').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
      
            $('.logininput').closest('form').submit();
  }
}); 
                $(function () {
                    $('#maximage').maximage({
                        cycleOptions: {
                            fx: 'fade',
                            speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
                            timeout: 9000,
                            prev: '#arrow_left',
                            next: '#arrow_right',
                            pause: 0,
                            before: function (last, current) {
                                if (!$.browser.msie) {
                                    // Start HTML5 video when you arrive
                                    if ($(current).find('video').length > 0)
                                        $(current).find('video')[0].play();
                                }
                            },
                            after: function (last, current) {
                                if (!$.browser.msie) {
                                    // Pauses HTML5 video when you leave it
                                    if ($(last).find('video').length > 0)
                                        $(last).find('video')[0].pause();
                                }
                            }
                        },
                        onFirstImageLoaded: function () {
                            jQuery('#cycle-loader').hide();
                            jQuery('#maximage').fadeIn('fast');
                        }
                    });

                    // Helper function to Fill and Center the HTML5 Video
                    jQuery('video,object').maximage('maxcover');

                });

            </script>
        </div>
    </body>

</html>

@else
<!DOCTYPE html>

@include('mobile/completeRegister')

@endif