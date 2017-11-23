<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWanaTrip | Vive la experiencia Ecuador</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWanaTrip team">
        <meta name="keywords" content="Viajar, Ecuador, Aventura, Tours">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" href="{{ asset('images/favicon.png')}}" />        
        <!-- Theme Styles -->

        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">

        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('public/js/sliderTop/jssor.slider.mini.js') !!}

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

        <style>

            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;
            }

        </style>
    </head>
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
            
  @if(session('locale') == 'es' )
                                          <?php $titlUp=$catalogo->nombre_servicio?>
                                            @else
                                           
                                           <?php $titlUp=$catalogo->nombre_servicio_eng?>
                                            @endif

      @include('public_page.reusable.banner', ['titulo' =>$titlUp])  
<ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
              
   <?php
                        $nombre = str_replace(' ', '-', $ServicioPrevio->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>

                
                <li><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$ServicioPrevio->id!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{!!$ServicioPrevio->nombre_servicio!!}</a>
                          
                <li class="active">{!!$titlUp!!}</li>
            </ul>
        </div>
        
        
        
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="widget box">
                            <h4>{{ trans('publico/labels.label18')}}</h4>
                            <ul class="filter-categories panel-group">
                                
                                @if($provincia!=null)
                                
                                        <li><a href="#">{!!$provincia->nombre!!}</a></li>
                                        
                                
                                @endif
                                @if($canton!=null)
                                       <li><a href="#">{!!$canton->nombre!!}</a></li>
                                 
                                @endif
                                @if($parroquia!=null)
                                <li class="category-has-children">
                                    <a href="#cat-sweaters-jacketsparroquia" data-toggle="collapse">{{ trans('publico/labels.label58')}}</a>
                                    <ul id="cat-sweaters-jacketsparroquia" class="collapse">
                                        <li><a href="#">{!!$parroquia->nombre!!}</a></li>
                                        
                                    </ul>
                                </li>
                                @endif
                                <li class="category-has-children">
                                    <a href="#cat-all-dresses" class="active" data-toggle="collapse">{{ trans('publico/labels.label53')}}</a>
                                    <ul id="cat-all-dresses" class="collapse in">
                                          <?php
                        $nombre = str_replace(' ', '-', $ServicioPrevio->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>

                                        <li><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$ServicioPrevio->id!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{!!$ServicioPrevio->nombre_servicio!!}</a>
                                        
                                        
                                        </li>
                                        
                                    </ul>
                                </li>
                                 <li class="category-has-children">
                                    <a href="#cat-sweaters-jacketsserv" data-toggle="collapse">{{ trans('publico/labels.label54')}}</a>
                                    <ul id="cat-sweaters-jacketsserv" class="collapse">
                                        
                                            @foreach ($servicios as $serv)
                                               @if(session('locale') == 'es' )
                                                <li><a href="{!!asset('/tokenDc$ripT')!!}/{!!$ServicioPrevio->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio!!}</a></li>
                                            @else
                                            <li><a href="{!!asset('/tokenDc$ripT')!!}/{!!$ServicioPrevio->id!!}/{!!$serv->id_catalogo_servicios!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio_eng!!}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            
                            
                            
                                      {!! Form::open(['url' => route('filtersCategoriaIntern'),  'id'=>'filter_Category']) !!}
                  
                            <h4>{{ trans('publico/labels.label146')}} {!!$ServicioPrevio->nombre_servicio!!}</h4>
                            <input type="hidden"  class="id_usuario_servicio" name="catalogo" value="{!!$catalogo->id_catalogo_servicios!!}">
                            <input type="hidden"  class="id_usuario_previo" name="id_usuario_previo" value="{!!$ServicioPrevio->id!!}">
                             
                        <div class="main-mini-search-form full-width box">
                            
                                <div class="search-box">
                                    <input type="text" placeholder="Search" name="searchCity" value="" class="searchCity">
                                                                        <span><i class="fa fa-search" 
                                                                                 
                                                                                 title="Search" style="cursor: pointer"></i></span>
                                </div>
                            
                        </div>
                            
                           
                        </div>
                        
<!--                  
                         <div class="widget box">
                            
                            <h4>{{ trans('publico/labels.label76')}}</h4>
                            
                            <ul class="filter-categories panel-group">
                                
                                
                                <li class="category-has-children">
                                    <a href="#cat-sweaters-jackets" data-toggle="collapse">{{ trans('publico/labels.label68')}}</a>
                                    <ul id="cat-sweaters-jackets" class="collapse">
                                        
                                            @if(isset($actividades) && count($actividades)>0)
                                            
                                        
                                            @foreach ($actividades as $explor)
                                            <li><input id="checkbox1" name="act_{!!$explor->id!!}" type="checkbox"  /> {!!$explor->nombre_servicio_est!!}
                                            </li>
                                            @endforeach
                                        
                                    
                                    @endif
                                        
                                    </ul>
                                </li>
                                
                                
                            </ul>
                         
                        </div>
                        <div class="post-pagination">
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more filter" onclick="AjaxContainerRegistroWithLoadFilter('filter_Category','Searchcategorias')">{{ trans('publico/labels.label67')}}</a>
                                
                            </div>
                        </div>-->
                            

                       
                   
                    {!! Form::close() !!}
                    
                            
                            
                        

                         @if(session('device')!='mobile')
                        <div class="widget banner-slider box">
                            <div class="owl-carousel" data-itemsPerDisplayWidth="[[0, 1], [480, 2], [768, 1], [992, 1], [1200, 1]]" data-items="1">
                                <a href="#">
                                    <img src="{{ asset('public/img/rsz_00kwwk8s.jpg')}}" alt="">
                                </a>
                              
                            </div>
                        
                        </div>
                           
                   
                        @endif
@if(session('device')!='mobile')
                        <div class="widget box">
                            <h4>{{ trans('publico/labels.label121')}}</h4>
                            <ul class="product-list-widget">
                                <li>
                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/ESTACION-CHARLES-DARWIN/228">
                                            <img src="{{ asset('public/images/icon/228estacion6.jpg')}}" alt="Charles Darwin">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/ESTACION-CHARLES-DARWIN/228">Estación Charles Darwin</a></h6>
                                        <span class="product-price">{{ trans('publico/labels.label128')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    
                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/Centro-Histórico-de-Quito/127">
                                            <img src="{{ asset('public/images/icon/127centrohistoricociclovia.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/Centro-Histórico-de-Quito/127">Centro Histórico de Quito</a></h6>
                                        <span class="product-price">{{ trans('publico/labels.label128')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                                
                                <li>
                                    
                                    
                                    <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/Montañita/148">
                                            <img src="{{ asset('public/images/icon/148103677257361922164010645062755965301191111n.jpg')}}" alt="Montañita">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h6 class="product-title"><a href="{!!asset('/detalle')!!}/Montañita/148">Montañita</a></h6>
                                        <span class="product-price">{{ trans('publico/labels.label128')}}</span>
                                        <span class="star-rating" title="4" data-toggle="tooltip">
                                            <span data-stars="4"></span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
@endif
                    </div>
                    <div id="main" class="col-sm-8 col-md-9">
                        
                        @if(session('device')!='mobile')
                        <div class="image-banner box">
                            <div class="image-container">
                                @if($catalogo->id_catalogo_servicios==1)
                                <img src="{{ asset('public/img/serr/eat.jpg')}}" alt="eat_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==2)
                                <img src="{{ asset('public/img/serr/sleep.jpg')}}" alt="sleep_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==3)
                                <img src="{{ asset('public/img/serr/trip.jpg')}}" alt="trip_iWaNaTrip">
                                 @elseif($catalogo->id_catalogo_servicios==11)
                                <img src="{{ asset('public/img/serr/trip.jpg')}}" alt="trip_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==4)
                                <img src="{{ asset('public/img/serr/tour.jpg')}}" alt="tour_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==5)
                                <img src="{{ asset('public/img/serr/night.jpg')}}" alt="night_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==8)
                                <img src="{{ asset('public/img/serr/culture.jpg')}}" alt="culture_iWaNaTrip">
                                @elseif($catalogo->id_catalogo_servicios==6)
                                   <img src="{{ asset('public/img/serr/night.jpg')}}" alt="night_iWaNaTrip">
                                @endif
                            </div>
                            <div class="caption-wrapper position-left">
                                <div class="captions">
                                       @if(session('locale') == 'es' )
                                          <h2>{!!$catalogo->nombre_servicio!!}</h2>
                                            @else
                                           <h2>{!!$catalogo->nombre_servicio_eng!!}</h2>
                                            @endif
                                       
                                            
                                    <a href="{!!asset('/tokenDz$rip')!!}/{!!$catalogo->id_catalogo_servicios!!}"  onclick="$('.parallax').LoadingOverlay('show')" class="action">view all</a>
                                </div>
                            </div>
                        </div>
                        @endif
                      <!--  <form method="get" class="woocommerce-ordering box">
                            <select class="orderby selector" name="orderby" id="orderby">
                                <option value="satisfaction">Sort by satsifaction</option>
                                <option value="rating">Sort by average rating</option>
                                <option selected="selected" value="popularity">Sort by popularity</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </form>-->
                      
                        <div class="post-wrapper">
                     <!--     <div class="post-filters">
                            <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">All</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-logo">Logo</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-business">Business</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-website">Website</a>
                        </div> -->
                        <div class="iso-container iso-col-3 style-masonry has-column-width categorias1 ">
                            
                            
                              @section('categorias')
                                @show
                                
                        </div>
                     
                    </div>
                       <!--   <ul class="products row add-clearfix catagorias">
                               <ul class="products row add-clearfix categorias">
                                  
                            @section('categorias')
                                @show
                        </ul>  
                        <div class="post-pagination">
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImg">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>-->
                    </div>
                       <div class="post-pagination">
                            <div class="text-center">
                                <a  class="btn style4 hover-blue load-more moreImg">{{ trans('publico/labels.label31')}}</a>
                            </div>
                        </div>
                </div>
                
                
            </div>
        </section>
<input type="hidden" name="pagina" class="pagina">
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
{!!HTML::script('public/js/Compartido.js') !!}
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
    @else
  <script>


jQuery(document).ready(function ($) {
   
     @if($catalogo->id_catalogo_servicios==1)
                                $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/eat.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==2)
                                    $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/sleep.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==3)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/trip.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==4)
                                  $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/tour.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==5)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/night.jpg")!!})');
                                @elseif($catalogo->id_catalogo_servicios==8)
                                            $(".page-title-container.style3").css('backgroundImage','url({!!asset("public/img/serr/culture.jpg")!!})');
                                            @elseif($catalogo->id_catalogo_servicios==6)
                                   $(".page-title-container.style3").css('backgroundImage','url({!!asset("img/serr/night.jpg")!!})');
                                @endif    
});
  

</script>
    @endif
    
<script>
            
                   $(document).ready(function () {
                                                                var pagina = 1;
                                                               GetDataAjaxCatogories("{!!asset('/getCatalogosServicios')!!}/{!!$ServicioPrevio->id!!}/{!!$id_catalogo!!}");
                                                               var contador = pagina+1;
                                                                $(".pagina").val(contador);
                                                            });
             
             
             
             
             var _throttleTimer = null;
                                                            var _throttleDelay = 90;
                                                            var $window = $(window);
                                                            var $document = $(document);
                                                            var validate = 0;

                                                   $document.ready(function () {

                                                             $window
                                                             .off('scroll', ScrollHandler)
                                                             .on('scroll', ScrollHandler);

                                                            });

                                                            function ScrollHandler(e) {

                                                                //throttle event:
                                                                clearTimeout(_throttleTimer);
                                                                //validate=0;
                                                                _throttleTimer = setTimeout(function () {
                                                                console.log($window.scrollTop() + $window.height() + ' scroll ' + $document.height());

                                                                //do work

                                                                if ($window.scrollTop() + $window.height() > $document.height() - 5000) {
                                                                
                                                                pagina = $(".pagina").val();
                                                                
                                                                  var valor2=$(".searchCity").val();     
                                                                    if(valor2 == ''){
                                                                            GetDataAjaxCatogories("{!!asset('/getCatalogosServicios')!!}/{!!$ServicioPrevio->id!!}/{!!$id_catalogo!!}");
                                                                        }
                                                                        else
                                                                        {

                                                                         GetDataAjaxSearchCatogoriesIntern("{!!asset('/getSearchCatalogosServiciosIntern')!!}/{!!$ServicioPrevio->id!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor2);   
                                                                        }

                                                                 contador = parseInt(pagina)+1;
                                                               
                                                                $(".pagina").val(contador);
                                                                }

                                                                
                                                            }, _throttleDelay);


                                                            }
                                                            
                                                           
             
             
             
            $(".moreImg").click(function () {
        var valor2=$(".searchCity").val();     
        if(valor2 == ''){
                GetDataAjaxCatogories("{!!asset('/getCatalogosServicios')!!}/{!!$ServicioPrevio->id!!}/{!!$id_catalogo!!}");
            }
            else
            {
                
             GetDataAjaxSearchCatogoriesIntern("{!!asset('/getSearchCatalogosServiciosIntern')!!}/{!!$ServicioPrevio->id!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor2);   
            }
            
            });
            
            
            
</script>


     <script>
              
            $(".fa-search").click(function () {
                window.current_pageSeCat=0;
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogoriesIntern("{!!asset('/getSearchCatalogosServiciosIntern')!!}/{!!$ServicioPrevio->id!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
            });
            
               

$('.searchCity').keypress(function (e) {
 var key = e.which;
 if(key == 13)  // the enter key code
  {
      window.current_pageSeCat=0;
                var valor=$(".searchCity ").val();
                GetDataAjaxSearchCatogoriesIntern("{!!asset('/getSearchCatalogosServiciosIntern')!!}/{!!$ServicioPrevio->id!!}/{!!$catalogo->id_catalogo_servicios!!}/"+valor);
  }
}); 


     $(document).on("keypress", "form", function(event) { 
    return event.keyCode != 13;
});
            </script>
    
    <!-- load page Javascript -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>


</body>
</html>