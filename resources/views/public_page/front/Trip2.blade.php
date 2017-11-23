<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        
        <?php $strG=utf8_encode("Gal·pagos es el paraÌso en la Tierra. Imagina la belleza de una isla del PacÌfico con aguas cristalinas color turquesa y paisajes alucinantes con la pequeÒa peculiaridad que est·n infestada de grandiosos animales por donde vayas. Com˙nmente se cree que es muy caro viajar a las islas. Sin embargo, no es del todo cierto. Tomar un full tour en un crucero es insanamente costoso pero si vas por tu cuenta y planificas en detalle la diferencia econÛmicamente ser· notable.") ?>
        <!-- Page Title -->
        <title>{!!$atraccion->nombre_servicio!!} | iWaNaTrip</title>

        
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="{!!$atraccion->nombre_servicio!!}. {!!$strG!!}| iWaNaTrip">
        
        <meta name="author" content="iWaNaTrip team">
        <meta property="og:title" content="{!!$atraccion->nombre_servicio!!}" /> 
        <meta property="og:description" content="{!!$atraccion->nombre_servicio!!}. {!!$strG!!} | iWaNaTrip" />
        <meta property="og:image" content="{{ asset('images/fullsize/galapagositiner.jpg')}}" />
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
        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public/public_components/components/magnific-popup/magnific-popup.css')}}"> 
        {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
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
 
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85546019-1', 'auto');
  ga('send', 'pageview');

</script>
        <style>
            
            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;
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

<body>
    <div id="page-wrapper">
         <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
        @include('public_page.reusable.banner', ['titulo' =>$atraccion->nombre_servicio])  

      
            <ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
                <li class="active">{!!$atraccion->nombre_servicio!!}
                 
                </li>
            </ul>
        </div>

        <section id="content">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-md-8">
                        <div class="blog-posts">
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">1</span>
                                    
                                </div>
                                
                                    <div class="heading-box col-md-10 col-lg-8">
                    <h2 class="box-title"> <em class="skin-color">{!!$atraccion->nombre_servicio!!}</em> </h2>
                    
                </div>
                                <div class="post-image">
                                    <div class="image-container">
                                        
                                        
                                        
                                          <div id="sync1" class="owl-carousel images">
                                        <div class="post-slider style3 owl-carousel box">
                                    
                                            <a href="{{ asset('images/fullsize/galapagositiner.jpg')}}" class="soap-mfp-popup">
                                                <img src="{{ asset('images/fullsize/galapagositiner.jpg')}}" alt="Galapagos - iWaNaTrip.com">
                                    </div></div>  
                                        
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="post-action">
                                        
                                                                 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

      <div class="fb-share-button" data-href="{!!asset('/trip')!!}/{!!$atraccion->nombre_servicio!!}/{!!$atraccion->id!!}" data-layout="button_count"></div>
                                   
                                    </div>
                                    <h2 class="entry-title"><a href="#">{!!$atraccion->nombre_servicio!!}</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category"> <a href="#">8 d√≠as </a></span>
                                        
                                    </div>
                                    <?php $str=utf8_encode("Gal·pagos es el paraÌso en la Tierra. Imagina la belleza de una isla del PacÌfico con aguas cristalinas color turquesa y paisajes alucinantes con la pequeÒa peculiaridad que est·n infestada de grandiosos animales por donde vayas. Com˙nmente se cree que es muy caro viajar a las islas. Sin embargo, no es del todo cierto. Tomar un full tour en un crucero es insanamente costoso pero si vas por tu cuenta y planificas en detalle la diferencia econÛmicamente ser· notable.") ?>
                                    <?php $str2=utf8_encode("El principal gasto es el vuelo hacia las islas que para extranjeros cuesta alrededor de $480 regreso desde Quito. Ecuatorianos tienen otra tarifa ($280), colonos de la isla pagan a˙n mucho menos ($200). Luego el segundo gasto es la entrada al Parque Nacional Gal·pagos, para menores de 2 aÒos es gratis. Para turistas cuesta ($100, $50<12aÒos) para Latinoamericanos ($50, $25<12aÒos) para Ecuatorianos ($6, $3<12aÒos). Es m·s barato tomar el vuelo desde Guayaquil. Una vez en las islas el costo de vida es mucho m·s manejable. Hospedaje desde $30 por pareja, alimentaciÛn $5 por comida y no se requiere de mayor transporte dentro de las islas. Las islas m·s pobladas tienen ATMs sin embargo por pagar con tarjeta de crÈdito te cargar·n 28% extra y muy pocos establecimientos aceptan tarjetas. Por ello es mejor llevar efectivo. Los ferrys entre islas cuestan $30 y los taxis internos $1.5 dentro de la ciudad. ") ?>
                                    <?php $str3=utf8_encode("Tranquilamente puedes pasar m·s de una semana explorando gratuitamente los fascinantes paisajes de Gal·pagos. Sin embargo, las m·s espectaculares atracciones se encuentran lejos de las zonas pobladas. Para ello existen los daytrips que salen diariamente hacia estos puntos que van desde $35 hasta los $200 cuando las distancias son muy largas. En resumen para disfrutar al m·ximo Gal·pagos se requiere de alrededor de unos $80 diarios y de 7 a 15 dÌas. La mayorÌa de gente lo hace en 6-9 dÌas y no es aconsejable ir por menos de 5 dÌas.") ?>
                                    
                                    <p>{!!$str!!}</p>
                                    <br>
                                    <p>{!!$str2!!}</p>
                                    <br>
                                    <p>{!!$str3!!}</p>
                                    </div>
                            </article>
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">1</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="image-container">
                                        
                                        <a href="https://iwanatrip.com/detalle/ISLA-SANTA-CRUZ/226"><img src="{{ asset('public/images/fullsize/226160628gv2050plazasurpanoldljpg4288x2848q85cropupscale.jpg')}}" alt="Santa Cruz"></a>
                                    </div>
                                </div>
                                <div class="post-content">
                               
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/ISLA-SANTA-CRUZ/226">Santa Cruz</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    </div>
                                      <?php $str4=utf8_encode("Viaje Quito Santa Cruz. Llegaran tipo 12pm  y en la tarde pueden Visitar La estaciÛn Charles Darwin. Comprar los tickets para ir a Isabela en la maÒana del siguiente dÌa.") ?>
                                  
                                    <p>{!!$str4!!} </p>
                                  </div>
                            </article>
                        
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">2</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        
                                        <a href="https://iwanatrip.com/detalle/Muro-de-las-L%C3%A1grimas/256"><img src="{{ asset('public/images/fullsize/256oba53508galapagos-262-muro-de-las-lagrimas.jpg')}}" alt="Muro de las lagrimas"></a>
                                    </div>
                                </div>
                                <div class="post-content">
                                 
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Muro-de-las-L%C3%A1grimas/256">Isabela</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    </div>
                                    <?php $str5=utf8_encode("Viaje a Isabela a las 7am. Llegaran tipo 9:30am. DespuÈs del check in en el hotel. Visitar el ìMuro de las Lagrimasî en bicicleta (alquiler diario 5$) o a pie 6km. En el camino hay unas lindas vistas y lugares para recorrer como playas miradores etc. ") ?>
                                  
                                    <p>{!!$str5!!} </p>
                                    
                                    
                                   </div>
                            </article>
                            
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">3</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <img src="{{ asset('images/fullsize/252itinerary-header.jpg')}}" alt="Concha y Perla">
                                        
                                    </div>
                                </div>
                                <div class="post-content">
                                
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Concha-de-Perla/252">Concha y Perla</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    </div>
                                    <?php $str6=utf8_encode("Ir a ìConcha y Perlaî donde pueden nadar con focas, tortugas y snorker. Deben alquilar el equipo de snorker. Es preferible ir en marea baja ya que en marea alta hay mucha corriente. TambiÈn hay que ir cuando hay sol fuerte ya que las focas van a refrescarse all· y es cuando se puede nadar con ellas. En la tarde pueden ir a la ìGalapagueraî. En la direcciÛn al Muro de las L·grimas despuÈs del ultimo hotel virar a la derecha.  AhÌ est· el camino a la ìGalapagueraî aquÌ es el centro de crianza de tortugas de gal·pagos con especies de todas las islas. El sendero  que va hacia la Galapaguera est· construido sobre humedales donde se puede apreciar aves y en especial Flamingos e Iguanas.
                                            Comprar el tour a Sierra Negra y a los T˙neles") ?>
                                  
                                    <p>{!!$str6!!} </p>
                                    
                                    
                                     </div>
                            </article>
                            
                              <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">4</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <img src="{{ asset('images/fullsize/257galapagos-sierra-negra-volcano-16-of-72-june-15.jpg')}}" alt="Volc·n Sierra Negra">
                                        
                                    </div>
                                </div>
                                <div class="post-content">
                                   <?php $str17=utf8_encode("Volc·n Sierra Negra") ?>
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Volc%C3%A1n-Sierra-Negra/257">{!!$str17!!}</a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    </div>
                                    <?php $str7=utf8_encode("Tour al Volc·n Sierra Negra ($35, $25 extra si quieren en caballo) Una caminata hacia los cr·teres del volc·n desde donde se podr· apreciar las islas adjuntas.") ?>
                                  
                                    <p>{!!$str7!!} </p>
                                    
                                    
                                 </div>
                            </article>
                            
                                <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">5</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <img src="{{ asset('images/fullsize/258lavatube.jpg')}}" alt="Los Tuneles">
                                        
                                    </div>
                                </div>
                                <div class="post-content">
                                 
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Los-T%C3%BAneles-de-Isabela/258">Los Tuneles </a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    
                                    </div>
                                    <?php $str8=utf8_encode("Tomar el tour a ìLos Tunelesî ($110). Probablemente este es uno de los mejores tours de Gal·pagos y solo hay 100 cupos diarios. Les llevar·n en lancha a un ·rea donde har·n snorker por varias horas y ver·n tiburones, tortugas marinas, matarrallas, caballos de mar, peces, lobos marinos. El tour les recogen en el hotel en la maÒana e incluye un refrigerio. Las agencias suelen alquilar el traje tÈrmico por $5 extras ya que se pasa varias horas de snorker.") ?>
                                  
                                    <p>{!!$str8!!} </p>
                                    
                                    
                                 </div>
                            </article>
                            
                            
                               <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">6</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <img src="{{ asset('images/fullsize/227the-galapagos-islands-santa-cruz-island-tortuga-bay.jpg')}}" alt="Tortuga Bay">
                                        
                                    </div>
                                </div>
                                <div class="post-content">
                                 
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/PLAYA-TORTUGA-BAY/227">Tortuga Bay </a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    </div>
                                    <?php $str9=utf8_encode("Lancha de Isabela a Santa Cruz. Visita a ìTortuga Bayî (una playa muy bonita hay que caminar 40 min para llegar) luego visitar ìLas grietasî que son unas rocas y en medio un lugar para baÒarse. Finalmente visitar la finca ìel Chatoî ($3 por persona) aquÌ se puede ver las tortugas gigantes en el habitad natural. Para llegar a la finca se puede alquilar una camioneta que por dos horas les cobrar· alrededor de $30 y les llevar· y esperar· por ustedes. La finca queda a mas o menos 12Km o 20 min de la ciudad.Comprar Tour a Puerto Baquerizo ($180)") ?>
                                  
                                    <p>{!!$str9!!} </p>
                                    
                                    
                                 </div>
                            </article>
                            
                            
                            <article class="post post-classic">
                                <div class="post-date">
                                    <span class="day">7-8</span>
                                    <span class="month">parada</span>
                                </div>
                                <div class="post-image">
                                    <div class="post-slider style3 owl-carousel">
                                        <img src="{{ asset('images/fullsize/286toursquitoimagen2.jpg')}}" alt="Quito">
                                        
                                    </div>
                                </div>
                                <div class="post-content">
                                 
                                    <h2 class="entry-title"><a href="https://iwanatrip.com/detalle/Quito/286">Regreso a Quito </a></h2>
                                    <div class="post-meta">
                                        <span class="entry-author fn">by <a href="#">Admin</a></span>
                                        <span class="post-category">in <a href="#">iWaNaTrip</a></span>
                                        
                                    </div>
                                    <?php $str10=utf8_encode("El tour los recogen y los devuelve al hotel. Este es sin duda el mejor tour ya que incluye buceo y te dan todo el equipo para dos inmersiones. Regreso a Quito. Hay buses de Santa Cruz a baltra desde las 7am.") ?>
                                  
                                    <p>{!!$str10!!} </p>
                                    
                                    
                                 </div>
                            </article>
                         
                           
                        </div>
                   
                    </div>
                    <div class="sidebar col-md-4">
                       <div class="main-mini-search-form full-width box">
                            {!! Form::open(['url' => route('min-search'),  'method' => 'get', 'id'=>'min-search']) !!}
                                            <div class="search-box">
                                                <input type="text" id="s"  placeholder="Search" name="s" value="">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        {!! Form::close() !!}
                        </div>
                        <div class="box">
                            <h4>{{ trans('publico/labels.label131AB')}}</h4>
                            <ul class="product-list-widget">
                                @if($eat!=null)
                                @foreach ($eat as $serv)
                                @if($serv!=null)
                                <li>
                              
                                    
                                    
                                     <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/{!!$serv->nombre_servicio!!}/{!!$serv->id!!}" >
                                            
                                            <img src="{{ asset('images/icon/'.$serv->filename)}}" alt="{!!$serv->nombre_servicio!!}">
                                        </a>
                                    </div>
                                    
                                    
                                    <div class="product-content">
                                    
                                         
                                    <h6 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$serv->nombre_servicio!!}/{!!$serv->id!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$serv->nombre_servicio!!}</a></h6>
                                    
                                    
                                        
                                        <span class="product-price">{!!$serv->ubicacion!!}</span>
                                        
                                    </div>
                                    
                                    
                                    
                                </li>
                                @endif
                                @endforeach
                                @endif
                                
                            </ul>
                        </div>
                        <div class="box">
                            <h4>More Trips</h4>
                            <div class="row">
                                <div class="col-xs-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        @if($moretrips!=null)
                                        @foreach ($moretrips as $trips)
                                        @if($trips!=null)
                                        <li><a href="{!!asset('/trip')!!}/{!!$trips->nombre_servicio!!}/{!!$trips->id!!}">{!!$trips->nombre_servicio!!}</a></li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                        <div class="box">
                            <h4>{{ trans('publico/labels.label132AB')}}</h4>
                            
                                <ul class="product-list-widget">
                                    @if($sleep!=null)
                                    @foreach ($sleep as $sleepe)
                                @if($sleepe!=null)
                             
                                  <li>
                              
                                    
                                    
                                     <div class="product-image">
                                        <a href="{!!asset('/detalle')!!}/{!!$sleepe->nombre_servicio!!}/{!!$sleepe->id!!}">
                                            
                                            <img src="{{ asset('images/icon/'.$sleepe->filename)}}" alt="{!!$serv->nombre_servicio!!}">
                                        </a>
                                    </div>
                                    
                                    
                                    <div class="product-content">
                                    
                                         
                                    <h6 class="product-title"><a href="{!!asset('/detalle')!!}/{!!$sleepe->nombre_servicio!!}/{!!$sleepe->id!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$sleepe->nombre_servicio!!}</a></h6>
                                    
                                    
                                        
                                        <span class="product-price">{!!$sleepe->ubicacion!!}</span>
                                        
                                    </div>
                                    
                                    
                                    
                                </li>
                                @endif
                                    @endforeach
                                    @endif
                                    
                                </ul>
                            
                        </div>
                        <div class="box">
                              <h4>Tags</h4>
                            <div class="tags">
                                @if($atraccion->tags!="")
                                <?php 
                            $tags = explode(",", $atraccion->tags);
                            ?>
                                  @foreach ($tags as $tag)
                                <a class="tag" href="#">{!!$tag!!}</a>
                                @endforeach
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/jquery.plugins.js')}}"></script>


<!-- Google Map Api -->
    <script type='text/javascript' src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="{{ asset('public/public_components/js/gmap3.js')}}"></script>
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


  

</script>
    @endif
    
    

    
    
<script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
 
</body>
</html>