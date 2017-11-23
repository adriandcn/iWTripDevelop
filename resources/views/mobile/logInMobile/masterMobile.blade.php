<!DOCTYPE HTML>
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
    
	</head>
	<body class="landing">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">iWaNaTrip</a></h1>
						
					</header>

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
                                                                    @yield('content')
                                                                    
                                                                    
								
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img data-u="image" src="{{ asset('public/img/cotopaxi.jpg')}}" /></div><div class="content">
								<h2>{{ trans('welcome/index.labelAbout')}}</h2>
								<p>{{ trans('welcome/index.descrip2')}}</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="{!! asset('public/img/extra-pag-1b.png')!!}" alt="" /></div><div class="content">
								<h2>{{ trans('welcome/index.title2Mob')}}</h2>
								<p>{{ trans('welcome/index.descrip3')}}</p>
							</div>
						</section>
					</section>

				
				<!-- CTA -->
				

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
		{!!HTML::script('public/js/jquery_.js') !!}
                @yield('scripts')
                
                {!!HTML::script('public/js/responsiveAdmin/skel.min.js') !!}
                
                {!!HTML::script('public/js/responsiveAdmin/main.js') !!}
                
                {!!HTML::script('public/js/loadingScreen/loadingoverlay.js') !!}
            
            
            {!!HTML::script('public/js/loadingScreen/loadingoverlay.min.js') !!}
            
                

	</body>
</html>

 