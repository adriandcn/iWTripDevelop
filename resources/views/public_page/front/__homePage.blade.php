<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip - Viaja y vive la experiencia de conocer Ecuador - Aventura</title>

        
        
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        
        <meta name="description" content="iWaNaTrip es experiencia de vida. Deja de ser turista, conviertete en viajero. Viaja por el mundo y descubre Ecuador">
        <meta name="keywords" content="Viajar, Ecuador, Aventura, Tours">
        <meta name="author" content="iWaNaTrip group">
        
        
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
        <link rel="stylesheet" href="{{ asset('public/public_components/search_inbox/css/default.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/search_inbox/css/component.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/revolution_slider/css/settings.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/revolution_slider/css/style.css')}}" media="screen" />

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
    </head>
    <body>
        
        <style>
            .ui-menu {
    box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
    background:rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
    width: 240px;
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
    
    background: url("../public/img/top.png") no-repeat;
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
    background: url("../public/img/top.png") no-repeat;
}

        </style>
        <div id="page-wrapper">
            <header id="header" class="header-color-white">
                @include('public_page.reusable.header')
            </header>
            @if(session('device')!='mobile')
            <div id="slideshow">
                <div class="revolution-slider">
                    <ul>    <!-- SLIDE  -->
                        <li data-slotamount="7" 
                            data-transition="notransition" 
                            class="tp-revslider-slidesli active-revslide current-sr-slide-visible">
                            <!-- MAIN IMAGE -->
                            @if(session('device')!='mobile')
                            <div  data-bgfit="cover" style="width:100%;height:100%;" class="slotholder">
                                <div style="background-color: transparent; 
                                     
                                    
                                    background-repeat: no-repeat; 
                                     background-image: url('{{ asset('public/img/index-fondo.jpg')}}'); 

                                     background-size: cover; 
                                     background-position: center center;
                                     width: 100%; height: 100%; opacity: 1; 
                                     visibility: inherit;" 
                                     data-src="{{ asset('public/images/backgrounds/gradient.png')}}"
                                     src="{{ asset('public/img/index-rodelas.png')}}" 
                                     data-bgrepeat="no-repeat" 
                                     data-bgposition="center center" data-bgfit="cover" 
                                     class="tp-bgimg defaultimg">
                                    
                            
                                    
                                </div>
                            </div>
                                    @else
                                 <!--   <div  data-bgfit="cover" style="width:100%;height:100%;" class="slotholder">
                                <div style="background-color: transparent; 
                                    background-repeat: no-repeat; 
                                     
                                     background-image: url('{{ asset('public/img/hero.jpg')}}'); 
                                     background-size: cover; 
                                     background-position: center center;
                                     width: 100%; height: 100%; opacity: 1; 
                                     visibility: inherit;" 
                                     data-src="{{ asset('public/images/backgrounds/gradient.png')}}"
                                     src="{{ asset('public/img/index-rodelas.png')}}" 
                                     data-bgrepeat="no-repeat" 
                                     data-bgposition="center center" data-bgfit="cover" 
                                     class="tp-bgimg defaultimg">
                                    
                                    </div>
                            </div>-->
                                    @endif     
                            <!-- LAYERS -->
                            <div 
                                data-endspeed="300" data-endelementdelay="0.1" 
                                data-elementdelay="0.1" data-splitout="none" data-splitin="none"
                                data-easing="easeInCubic" data-start="500" data-speed="600" 
                                data-y="460" data-hoffset="0"   data-x="center"
                                class="tp-caption lft fadeout tp-resizeme start">
                                @if(session('device')!='mobile')
                                <h2 class="caption-xl" >
                                    {{ trans('publico/labels.label127')}}
                                </h2>
                                @else
                                <h2 class="caption-xl" style="font-size: 58px;">
                                    {{ trans('publico/labels.label127')}}
                                </h2>
                                @endif
                            </div>

                            <!-- LAYER NR. 2 -->
                            <div 
                                data-endspeed="300" data-endelementdelay="0.1"
                                data-elementdelay="0.1" data-splitout="none" 
                                data-splitin="none" data-easing="easeInOutCubic"
                                data-start="700" data-speed="600" data-y="540" 
                                data-hoffset="0" data-x="center" 
                                class="tp-caption lfl fadeout tp-resizeme start">
                                
                                
                                @if(session('device')!='mobile')
                                <h2 class="caption-md skin-color" >{{ trans('publico/labels.label123')}}</h2>
                                @else
                                
                                <h2 class="caption-md skin-color" style="font-size: 53px;" >{{ trans('publico/labels.label123')}}</h2>
                                @endif
                                
                                
                            </div>

                            @if(session('device')!='mobile')
                            <!-- LAYER NR. 3 -->
                            <div style="margin-left: 10px;"
                                 data-endspeed="300" data-endelementdelay="0.1"
                                 data-elementdelay="0.1" data-splitout="none"
                                 data-splitin="none" data-easing="Power3.easeInOut"
                                 data-start="1000" data-speed="300" data-voffset="-79" 
                                 data-y="35" data-x="-280" class="tp-caption sfl fadeout start">
                                <img alt="" src="{{ asset('public/img/index-logo.png')}}" >
                            </div>

                            @endif
                            <!-- LAYER NR. 4 -->
                            @if(session('device')!='mobile')
                            <div style='width: 80%'
                                 data-endspeed="300" data-endelementdelay="0.1" data-elementdelay="0.1" 
                                 data-splitout="none" data-splitin="none" data-easing="easeOutBack"
                                 data-start="1500" data-speed="600" data-y="630" data-x="center"
                                 class="tp-caption sfr str start">

                                {!! Form::open(['url' => route('min-search'),  'method' => 'get', 'id'=>'min-search']) !!}
                                    @if(session('device')!='mobile')
                                    <input class="sb-search-input" placeholder="{{ trans('publico/labels.label10')}}" type="text" value="" name="s" id="s">
                                    @else
                                    <input class="sb-search-input" placeholder="{{ trans('publico/labels.label10')}}" style="font-size: 12px;" type="text" value="" name="s" id="s">
                                    @endif

                                    <input class="sb-search-submit" type="submit" value="">
                                    <span class="sb-icon-search "></span>
                                {!! Form::close() !!}
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            <?php
            $titulo = "Ecuador";
            
            ?>
            
              @if($location->city!="")
            <?php
            
            $titulo = $location->city;
            ?>
            @else
            $titulo="Ecuador";
            @endif
            <section id="content">
                <div class="container">
                      @if(session('device')=='mobile')
                      
                          
                          <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public/cssMobile/searchbar.css')}}">

       
           {!! Form::open(['url' => route('min-search'),'class'=>'form-wrapper cf',  'method' => 'get', 'id'=>'min-search']) !!}
        <input type="text" class='sb-search-input' name="s" id="s" placeholder="{{ trans('publico/labels.label10')}}" required>
        <button type="submit">Search</button>
   {!! Form::close() !!}

                        
                    
                    
                    
                    @endif
               
                    
                      <div class="heading-box col-md-10 col-lg-8">
                    <h2 class="box-title">{{ trans('publico/labels.label266')}} <em class="skin-color">{!!$titulo!!}</em> </h2>
                    <p>{{ trans('publico/labels.label267')}} <em class="skin-color">iWaNaTrip</em></p>
                </div>
                    
                    
                    
                    <div id="main">
                        <div class="post-wrapper">
                           <div class="post-filters">
                                <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-alls">{{ trans('publico/labels.label12')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-atracciones">{{ trans('publico/labels.label65')}}</a>
                                <!--<a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-eventos">{{ trans('publico/labels.label32')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-promo">{{ trans('publico/labels.label33')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-inspire">{{ trans('publico/labels.label265')}}</a>-->
                                
                            </div>
                            <div class="iso-container iso-col-4 style-masonry eventsPromo">
                           
                                @section('eventsPromo')
                                @show
                                
                            </div>
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImagesEvents">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>                   

            <div class="parallax parallax-image1" data-stellar-background-ratio="0.1">
                <div class="section text-center">
                    <div class="container">
                        <div class="heading-box">
                            <h2 class="box-title color-white">{{ trans('publico/labels.label30')}}</h2>
                        </div>
                        <div class="features-icon-slider owl-carousel box-lg" data-items="6">
                           
                                @if(session('locale') == 'es' )
                                           <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-cutlery"></i><div style="alignment-baseline: central">Alimentación y bebidas</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-bed"></i><div style="alignment-baseline: central">Alojamiento</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/3"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-suitcase"></i><div style="alignment-baseline: central">Agencias de viajes</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-map-marker"></i><div style="alignment-baseline: central">Lugares</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/8"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-hand-scissors-o"></i><div style="alignment-baseline: central">Eventos</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/9"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-users"></i><div style="alignment-baseline: central">Festividades</div></a>
                            

                                            @else
                            <a href="{!!asset('/tokenDz$rip')!!}/1"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-cutlery"></i><div style="alignment-baseline: central">Eat & drink</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/2"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-bed"></i><div style="alignment-baseline: central">Sleep</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/3"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-suitcase"></i><div style="alignment-baseline: central">Travel agency</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/4"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-map-marker"></i><div style="alignment-baseline: central">Places</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/8"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-hand-scissors-o"></i><div style="alignment-baseline: central">Events</div></a>
                            <a href="{!!asset('/tokenDz$rip')!!}/9"  onclick="$('.parallax').LoadingOverlay('show')" class="feature-icon"><i class="fa fa-users"></i><div style="alignment-baseline: central">Festivities</div></a>
                            

                                            @endif
                           

                        </div>
                        <h3 class="skin-color">{{ trans('publico/labels.label124')}}</h3>
                        <p>{{ trans('publico/labels.label125')}}</p>
                    </div>
                </div>
            </div>

          
@if(session('device')!='mobile')
            <section id="content" class="no-padding">
                <div class="section no-padding">
                    <h2 class="section-title">{{ trans('publico/labels.label126')}}</h2>
                    
                    <div class="post-wrapper">
                        <div class="iso-container iso-col-4 style-fancy">
                               <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/costa.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <a href="{!!asset('/getRegionDescipcion/1')!!}" onclick="$('.iso-container').LoadingOverlay('show');">
                                            <h3 class="banner-title">Costa</h3></a>
                                        <div class="details">
                                           
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                        <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/sierra.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <a href="{!!asset('/getRegionDescipcion/2')!!}" onclick="$('.iso-container').LoadingOverlay('show');"><h3 class="banner-title">Sierra</h3>
                                            </a>
                                        <div class="details">
                                            
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                        <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/oriente.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <a href="{!!asset('/getRegionDescipcion/3')!!}" onclick="$('.iso-container').LoadingOverlay('show');"><h3  class="banner-title">Oriente</h3>
                                            </a>
                                        <div class="details">
                                           
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                        <div class="shortcode-banner style-animated iso-item  filter-all " >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/img/galapagos.jpg')}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <a href="{!!asset('/getRegionDescipcion/4')!!}" onclick="$('.iso-container').LoadingOverlay('show');"><h3  class="banner-title">Galápagos</h3>
                                        </a>
                                        <div class="details">
                                            
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                        </div>
                    </div>
                                     
            </section>
            @endif
            <section id="content">
                <div class="container">
                    <div class="heading-box col-md-10 col-lg-8">
                        <h2 class="box-title">Ecuador an <em class="skin-color">amazing </em> country waiting for you</h2>
                        <p>Find the most beautiful and featured cities, events, parties, everything that you can imagine for your enjoy.</p>
                    </div>
                    <div id="main">
                        <div class="post-wrapper">
                            <div class="post-filters">
                                <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">{{ trans('publico/labels.label12')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-costa">{{ trans('publico/labels.label13')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-sierra">{{ trans('publico/labels.label14')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-oriente">{{ trans('publico/labels.label15')}}</a>
                                <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-galapagos">{{ trans('publico/labels.label16')}}</a>
                            </div>
                            <div class="iso-container iso-col-4 style-masonry topPlaces">
                             
                                @section('topPlaces')
                                @show

                            </div>
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImagesTop">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @if(session('device')!='mobile')
                           <a href="#" class="scrollupWeb">Scroll</a>
            @else
                           <a href="#" class="scrollup">Scroll</a>
            @endif
            
               
                           

            <footer id="footer" class="style4">
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

        <!-- load revolution slider scripts -->
        <script type="text/javascript" src="{{ asset('public/public_components/components/revolution_slider/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('public/public_components/components/revolution_slider/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- plugins -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>

        <!-- load page Javascript -->
        <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>
        
        <script type="text/javascript" src="{{ asset('public/public_components/js/revolution-slider.js')}}"></script>

        <script type="text/javascript" src="{{ asset('public/public_components/js/lugares_ecuador.js')}}"></script>
        <script>
            $(document).ready(function () {
                var valor=$("#ciudad").val();
                GetDataAjaxTopPlaces("{!!asset('/getTopPlaces')!!}?page=1");
                GetDataAjaxEventsInd("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
            });
            $(".moreImagesTop").click(function () {
                GetDataAjaxTopPlacesHome("{!!asset('/getTopPlaces')!!}");
            });
            
            $(".moreImagesEvents").click(function () {
            var valor=$("#ciudad").val();    
                GetDataAjaxEventsHome("{!!asset('/getEventscloseToMe')!!}/"+valor);
            });

            
            $(".search-city").click(function () {
            var valor=$("#ciudad").val();
                window.current_page_e=1;
                GetDataAjaxEventsIndbyCity("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
            });
            
              $( ".sb-icon-search" ).click(function() {
  $( "#min-search" ).submit();
});


$('#ciudad').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {window.current_page_e=1;
      var valor=$("#ciudad").val();
    GetDataAjaxEventsIndbyCity("{!!asset('/getEventscloseToMe')!!}/"+valor+"?page=1");
  }
}); 

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


  $(function() {

    
    $( "#ciudad" ).autocomplete({

      source: availableTags

    });

  });

  


            
            
        </script>
    </body>
</html>