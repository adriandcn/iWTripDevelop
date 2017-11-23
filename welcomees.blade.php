<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en'>
	<!--<![endif]-->
	<head>
		<meta charset='utf-8' />
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
		<title>Iguana Trip - Se acerca</title>	
		
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="apple-touch-icon" href="images/favicon.png" />
		
		<link rel="stylesheet"  href="{{ URL::asset('public/css/maximage.css') }}" type="text/css" media="screen" charset="utf-8" />
                            <link rel="stylesheet"  href="{{ URL::asset('public/css/styles.css') }}" type="text/css" media="screen" charset="utf-8" />
		
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<!--[if IE 6]>
			<style type="text/css" media="screen">
				.gradient {display:none;}
			</style>
		<![endif]-->
	</head>
     
	<body>

		<!-- Logo -->
		
                
                  <div id="logo_">
        	<div id="logo-imagen">
    	    <img src="{{ URL::asset('public/img/index-logo.png')}}" width="270" height="258" alt="IguanaTrip" /></div>
            <div id="logo-construccion">
       	    <img src="{{ URL::asset('public/img/index-rodelas.png')}}" width="106" height="90" alt="IguanaTripconstruccion" /></div>
    </div>

		<!-- Switch to full screen -->
		<button class="full-screen" onclick="$(document).toggleFullScreen()"></button>

		<!-- Site Logo <div id="logo">Iguna Trip</div> -->
<div id="lang">
   	    
        
                
    <a href="esp"><img src="{{ URL::asset('public/img/index-bandera-2.png')}}" width="29" height="29" alt="esp" /></a> 
    <a href="eng"><img src="{{ URL::asset('public/img/index-bandera-1.png')}}" width="29" height="29" alt="eng" /></a> </div>
		<!-- Main Navigation -->
		<nav class="main-nav">
			<ul>
				<li><a href="#home" class="active">Inicio</a></li>
				<li><a href="#about">Nosotros</a></li>
				<li><a href="#contact">Contacto</a></li>
			</ul>
		</nav>

		<!-- Slider Controls -->
		<a href="" id="arrow_left"><img src="{{ URL::asset('public/images/arrow-left.png')}}" alt="Slide Left" /></a>
		<a href="" id="arrow_right"><img src="{{ URL::asset('public/images/arrow-right.png')}}" alt="Slide Right" /></a>

		<!-- Home Page -->
		<section class="content show" id="home">
			<h1>Bienvenido</h1>
			<h5>Nuestro nuevo sitio estará listo pronto!</h5>
			<p>Iguana Trip surge como una alternativa turistica comunitaria para defender y revalorizar los recursos culturales y naturales. Planea tu viaje y aprende sobre la historia y la cultura del país mientras te involucras en la realidad del mismo. 
                        </p>
			<p><a href="#about">Más Info &#187;</a></p>
		</section>

		<!-- About Page -->
		<section class="content hide" id="about">
			<h1>Nosotros</h1>
			<h5>Un pequeño adelanto de lo que haremos.</h5>
			<p>Iguana Trip surge como una alternativa turistica comunitaria para defender y revalorizar los recursos culturales y naturales. Planea tu viaje y aprende sobre la historia y la cultura del país mientras te involucras en la realidad del mismo. 
                            Iguana Trip te brindara información práctica de acuerdo a tus intereses sobre el lugar específico que decidas visitar. Encuentra hoteles, day trips, museos, playas, sitios turisticos, restaurantes, bares, todo tipo de atracciones desde la más pequeña a la más grande. Y lo más importante si lo deseas, IgunaTrip te guiará en tu recorrido para que ayudes a generar ingresos complementarios a comunidades locales en busca de desarrollo.</p>
			
		</section>

		<!-- Contact Page -->
		<section class="content hide" id="contact">
			<h1>Contacto</h1>
			<h5>Mantente en contacto.</h5>
			<p>Email: <a href="#">info@iguanatrip.com</a><br />
				<br /></p>
			<p><br />
				</p>
		</section>
		
		<!-- Background Slides -->
		<div id="maximage">
			<div>
				<img src="{{ URL::asset('public/img/index-fondo.png')}}" alt="" />
				<img class="gradient" src="{{ URL::asset('public/images/backgrounds/gradient.png')}}" alt="Galapagos" />
			</div>
			<div>
				<img src="{{ URL::asset('public/img/cotopaxi.jpg')}}" alt="" />
				<img class="gradient" src="{{ URL::asset('public/images/backgrounds/gradient.png')}}" alt="Galapagos" />
			</div>
			<div>
				<img src="{{ URL::asset('public/img/galapagos2.jpg')}}" alt="" />
				<img class="gradient" src="{{ URL::asset('public/images/backgrounds/gradient.png')}}" alt="Galapagos" />
			</div>
			<div>
				<img src="{{ URL::asset('public/img/quito.jpg')}}" alt="" />
				<img class="gradient" src="{{ URL::asset('public/images/backgrounds/gradient.png')}}" alt="Galapagos" />
			</div>
			<div>
				<img src="{{ URL::asset('public/img/ecuador2.jpg')}}" alt="" />
				<img class="gradient" src="{{ URL::asset('public/images/backgrounds/gradient.png')}}" alt="Galapagos" />
			</div>
		</div>
		
		
                {{Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js')}}
		<script src="{{ URL::asset('js/jquery.easing.min.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ URL::asset('js/jquery.cycle.all.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ URL::asset('js/jquery.maximage.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ URL::asset('js/jquery.fullscreen.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ URL::asset('js/jquery.ba-hashchange.js') }}" type="text/javascript" charset="utf-8"></script>
		<script src="{{ URL::asset('js/main.js') }}" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript" charset="utf-8">
			$(function(){
				$('#maximage').maximage({
					cycleOptions: {
						fx: 'fade',
						speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
						timeout: 9000,
						prev: '#arrow_left',
						next: '#arrow_right',
						pause: 0,
						before: function(last,current){
							if(!$.browser.msie){
								// Start HTML5 video when you arrive
								if($(current).find('video').length > 0) $(current).find('video')[0].play();
							}
						},
						after: function(last,current){
							if(!$.browser.msie){
								// Pauses HTML5 video when you leave it
								if($(last).find('video').length > 0) $(last).find('video')[0].pause();
							}
						}
					},
					onFirstImageLoaded: function(){
						jQuery('#cycle-loader').hide();
						jQuery('#maximage').fadeIn('fast');
					}
				});
	
				// Helper function to Fill and Center the HTML5 Video
				jQuery('video,object').maximage('maxcover');
	
			});
		</script>
  </body>
</html>
