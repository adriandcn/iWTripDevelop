<!DOCTYPE HTML>
<!--
        Spectral by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        {!! HTML::style('public/css/responsiveAdmin/main.css') !!} 
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
{!! HTML::style('public/cssMobile/themes/1/conf-room1.min.css') !!} 
    
    {!! HTML::style('public/libMobile/jqm/1.4.4/jquery.mobile.structure-1.4.5.min.css') !!} 
    {!! HTML::style('public/cssMobile/app.css') !!} 
    {!!HTML::script('public/libMobile/jqm/1.4.4/jquery-2.1.1.min.js') !!}
    {!!HTML::script('public/libMobile/jqm/1.4.4/jquery.mobile-1.4.5.min.js') !!}
    </head>
    <body class="landing">

        <!-- Page Wrapper -->
        <div id="page-wrapper">

            <!-- Header -->
            <header id="header" class="alt">
                <h1><a href="index.html">iWaNaTrip</a></h1>

            </header>
            @if(session()->has('error'))


            <div role="main" class="ui-content">
                <h3 class="mc-text-danger">Login Failed</h3>
                <p>Did you enter the right credentials?</p>
                <div class="mc-text-center"><a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-b mc-top-margin-1-5">OK</a></div>
            </div>


            @endif


            <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <h2>iWaNaTrip</h2>
                    <div id="logo_" align="center">
                        <div id="logo-imagen">

                            <a href="#" onclick="window.location.href = '{!!asset('/')!!}'"><img src="{{ asset('public/img/index-logo.png')}}" width="100" height="88" alt="IguanaTrip" /></a> 
                        </div>

                    </div>

                    <br/>
                    <br/>
                </div>


            </section>



            <!-- Two -->
            <section id="two" class="wrapper alt style2">
                <section class="spotlight">
                    <div class="content">

                        <h2>{{ trans('welcome/index.labelsignin') }}</h2>
                        <p>
                            {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
                        <div role="main" class="ui-content">
                            
                            <input type="text" class='logininput' id="email" name="log" placeholder="{{trans('front/login.log')}}">
                            <input type="password" class='logininput' id="password" name="password" placeholder="{{trans('front/login.password')}}">
                            
                            <br/>
                            <br/>
                            
                            
                            <ul class="actions vertical">
								<li>
                                                                    <a id='logbtn' href="#" data-transition="pop" data-position-to="window" class="button fit special" onclick="$(this).closest('form').submit()">{!! (trans('front/login.logbtn')) !!}</a></li>
                                                                    
							</ul>

                        
<!--  <p class="mc-top-margin-1-5"><a href="begin-password-reset.html">Can't access your account?</a></p>-->

                        </div><!-- /content -->
                        {!! Form::close() !!}    
                    </div><!-- /page -->
                    
                    
                </section>

            </section>




            <!-- Footer -->
            <footer id="footer">
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; iWaNaTrip.com</li><li>2016</li>
                </ul>
            </footer>

        </div>

        <!-- Scripts -->
        {!!HTML::script('public/js/responsiveAdmin/jquery.min.js') !!}
        {!!HTML::script('public/js/responsiveAdmin/jquery.scrollex.min.js') !!}
        {!!HTML::script('public/js/responsiveAdmin/jquery.scrolly.min.js') !!}
        {!!HTML::script('public/js/responsiveAdmin/skel.min.js') !!}
        {!!HTML::script('public/js/responsiveAdmin/util.js') !!}
        {!!HTML::script('public/js/responsiveAdmin/main.js') !!}



    </body>
</html>

