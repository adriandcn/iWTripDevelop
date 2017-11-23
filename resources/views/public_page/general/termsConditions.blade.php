<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWanaTrip | Vive la experiencia Ecuador</title>

        <link rel="shortcut icon" href="{{ asset('public/images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWanaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Theme Styles -->

        <link rel="stylesheet" href="{{ asset('public/public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/public_components/css/font-awesome.min.css')}}">

        <link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
{!! HTML::style('public/css/jquery-labelauty.css') !!} 
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
        <style>
            .ui-menu {
    box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
    background:rgba(255, 255, 255, 0.9) none repeat scroll 0 0;
    width: 240px;
            }
        </style>
    </head>
    <body class="woocommerce">
        <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
                                       @if(session('locale') == 'es' )
                                          <?php $titlUp="Términos y Condiciones"?>
                                            @else
                                           
                                           <?php $titlUp="Terms & Conditions"?>  @endif

      @include('public_page.reusable.banner', ['titulo' =>$titlUp])  
<ul class="breadcrumbs">
                <li><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
              
                
             
                <li class="active">{!!$titlUp!!}</li>
            </ul>
        </div>
       
        
        
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="sidebar col-sm-4 col-md-3">
                        <ul class="arrow-circle hover-effect filter-options">
                            
                            <li class="active"><a href="#">{{ trans('publico/labels.label80')}}</a></li>
                            
                        </ul>
                    </div>
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="box">
                            <h3>Términos y condiciones</h3>
                            <p>Los términos y condiciones aplican a todos los servicios directos (a través de IWaNaTrip) o indirectos (a través de los distribuidores) disponibles online, a través de cualquier dispositivo móvil, por correo electrónico o por teléfono. Al acceder, introducir información, navegar y utilizar nuestro sitio web o cualquiera de nuestras aplicaciones disponibles a través de plataformas online, aceptas haber leído, entendido y estar de acuerdo con los términos y condiciones que se muestran a continuación (incluyendo el fragmento referente a la privacidad).

Estas páginas, su contenido, estructura e infraestructura  que proporcionan a través de este sitio web (el “servicio”) pertenecen y son gestionadas y suministradas por IWaNaTrip ("IWaNaTrip.com", "nos", "nosotros” o "nuestro"). Solo pueden ser utilizadas con fines personales y no comerciales, conforme a los términos y condiciones especificados a continuación.
</p>
                        </div>
                        <div class="box">
                            <h3>1. Ámbito de nuestro servicio</h3>
                            <p>A través de este sitio web, nosotros (IWaNaTrip) proporcionamos una plataforma online por medio de la cual todos los tipos operadores turisticos (por ejemplo, daytrips, restaurantes, hoteles, lugares turísticos, etc……) ofertan sus servicios turísticas/no turísticas y los usuarios de la página web pueden informarse. Nosotros no realizamos resevas ni somos responsables del servicio o calidad del servicio prestados por los operadores. Nosotros actuamos únicamente como intermediarios entre tú y el establecimiento, trasmitiendo los datos del establecimiento.

La información que mostramos está basada en la información que nos proporcionan los establecimientos. Los establecimientos tienen acceso a una extranet mediante la cual se hacen totalmente responsables de actualizar las tarifas, la disponibilidad y los otros datos que aparecen en nuestro sitio web. Aunque intentamos que nuestro servicio sea lo más preciso posible, no podemos verificar ni garantizar que toda la información sea exacta, completa o correcta. Tampoco nos hacemos responsables de errores (como errores manifiestos y tipográficos), interrupciones (debido a caídas temporales y/o parciales del servidor o a reparaciones, actualizaciones y mantenimiento de nuestro sitio web u otros motivos), información imprecisa, engañosa o falsa, o falta de información. El establecimiento es responsable en todo momento de la precisión, la exactitud y la corrección de la información (tanto descriptiva como referente a tarifas y disponibilidad) que aparece en nuestro sitio web. Nuestro sitio web no constituye ni debe ser visto como una recomendación o promoción de la calidad, el nivel de servicio, la calificación o clasificación (por estrellas) de cualquier establecimiento disponible.

Nuestros servicios son únicamente para uso personal y no comercial. Por lo tanto, no está permitido revender, realizar deep-links, utilizar, copiar, monitorizar (por ejemplo, spider, scrape), mostrar, bajar o reproducir el contenido, la información, el software, los productos o los servicios disponibles en nuestro sitio web para cualquier actividad comercial o competitiva.
</p>
                        </div>
                        <div class="box">
                            <h3> 2. Precios y tarifas</h3>
                            <p>Todos los precios del sitio web de IWaNaTrip.com son referenciales tratando de ser lo más exactos posibles. Sin embargo, las condiciones y precios pueden variar por lo que IWaNaTrip no se hace responsable por la veracidad ni exactitud de los precios suministrados.
Los errores evidentes (erratas incluidas) no son vinculantes. Todas las ofertas especiales y promociones están marcadas como tal.
</p>
                        </div>
                        <div class="box">
                            <h3> 3. Privacidad y cookies</h3>
                            <p>IWaNaTrip.com respeta tu privacidad. Consulta nuestra política de privacidad y cookies para obtener más información.</p>
                            
                        </div>
                        <div class="box">
                            <h3> 4. Servicio gratuito</h3>
                            <p>Nuestro servicio es gratuito porque, a diferencia de otros, no cobramos por la información mostrada ni por publicarse como operador turístico en nuestro sitio.
Los operadores del servicio pagan una comisión o un pequeño porcentaje por resaltar su publicidad o salir en las primeras opciones de búsqueda. Sin embargo, toda la información de todos los operadores está sin alteracion y de acceso gratuito.
</p>
                            
                        </div>
                        <div class="box">
                            <h3> 5. Ranking, estrellas y comentarios</h3>
                            <p>La clasificación de los operadores que aparece por defecto en nuestro sitio web es por Recomendados y lo llamamos "ranking por defecto". También ofrecemos otras formas de clasificar los establecimientos. Cada servicio tiene un listado de calificaciones las cuales son valoradas por numero de estrellas por los usuarios. El ranking por defecto se crea a través de un sistema automático de clasificación (algoritmo) y se basa en diversos criterios.
Los comentarios pueden (a) visualizarse en la página de información del establecimiento en nuestro sitio web con el fin de compartir tu opinión sobre el nivel del servicio y la calidad del servicio con (futuros) clientes. IWaNaTrip.com también los puede (b) utilizar (de forma parcial o completa) según su criterio (ej. para marketing, promoción o mejora del servicio) en nuestro sitio web o en plataformas sociales, newsletters, ofertas especiales, aplicaciones u otros canales utilizados o que sean propiedad de IWaNaTrip.com. Nos reservamos el derecho de adaptar, rechazar o eliminar los comentarios que creamos oportunos. Los comentarios tienen la consideración de una encuesta y no incluyen ofertas comerciales, invitaciones ni incentivos de ningún tipo.
</p>
                            
                        </div>
                        
                        
                            <div class="box">
                            <h3> 6. Exención de responsabilidad</h3>
                            <p>En la medida en que esté permitido por la ley, ni nosotros ni ninguno de nuestros directores, empleados, representantes, u otras personas involucradas en el proceso de creación, patrocinio y promoción del sitio web y sus contenidos será responsable de: (i) pérdidas o daños punitivos, especiales, indirectos o consecuentes, pérdidas de producción, de beneficios, ingresos, contratos, así como de pérdidas o daños de clientes o de reputación y pérdidas de demandas; (ii) errores relacionados con la descripción de la información (incluida la información sobre precios, disponibilidad y clasificaciones) del operador en nuestro sitio web; (iii) servicios prestados o productos ofertados por el operador u otros socios de negocio; (iv) pérdidas, daños o costes (directos, indirectos, consecuentes o punitivos) que sufras, contraigas o pagues, surgidos o relativos al uso, indisponibilidad o retraso de nuestro sitio web; o (v) cualquier tipo de perjuicio (personal), muerte, daño de la propiedad u otros daños, pérdidas y gastos (directos o indirectos, consecuentes o punitivos) que sufras, contraigas o pagues, ya sea a causa de actos (legales), errores, infracciones, negligencias (evidentes), mala conducta profesional deliberada, omisiones, incumplimientos, representación errónea, responsabilidad extracontractual objetiva o (completa o parcialmente) atribuible al operador o a otros socios de negocio (incluyendo cualquiera de sus empleados, directores, personal, apoderados, representantes o empresas afiliadas) cuyos productos o servicios (directa o indirectamente) estén disponibles, se oferten o promocionen en o a través de nuestra página web, incluyendo cualquier cancelación (parcial), overbooking, huelga, fuerza mayor u otro acto que escape a nuestro control.

Ya que el operador del tour te cobra (o te ha cobrado) por su servicio, aceptas que el operador es, a todos los efectos, el responsable de la recogida, retención, envío y pago de los impuestos aplicables sobre el precio total del servicio a las autoridades fiscales pertinentes. IWaNaTrip.com no es responsable del envío, recogida, retención o pago de los impuestos sobre el precio total de los servicios turisticos a las autoridades fiscales pertinentes.

Al subir fotos u otras imágenes a nuestro sistema (por ejemplo, al enviar un comentario) certificas, garantizas y confirmas que estás en posesión del copyright de la foto/imagen y que estás de acuerdo con que IWaNaTrip.com utilice dicha foto o imagen en sus webs (móviles), apps y materiales promocionales (online y offline), así como en cualquier publicación que IWaNaTrip.com considere apropiada. Estás garantizando a IWaNaTrip.com un derecho no-exclusivo, universal, irrevocable, incondicional y permanente, así como la licencia para utilizar, reproducir, mostrar, hacer reproducir, distribuir, sublicenciar, comunicar y facilitar las fotos/imágenes en la forma que IWaNaTrip.com considere apropiada. Al subir estas fotos/imágenes, la persona que las sube acepta la responsabilidad legal y moral sobre todas y cada una de las reclamaciones legales realizadas por un tercero (incluyendo, pero no limitándose a, los propietarios de los operadores) a raíz del uso y publicación de las fotos/imágenes por parte de IWaNaTrip.com. IWaNaTrip.com no posee ni avala de forma alguna las fotos/imágenes que se suben. La veracidad, validez y derecho de uso de todas las fotos/imágenes la asumirá la persona que ha subido la foto, y nunca será responsabilidad de IWaNaTrip.com. IWaNaTrip.com niega cualquier responsabilidad u obligación sobre las fotografías publicadas. La persona que ha subido las fotos garantiza que las fotos/imágenes no contienen ningún virus, troyano o archivos infectados, así como ningún material pornográfico, ilegal, obsceno, ofensivo, censurable o inapropiado, y que no infringe los derechos (de propiedad intelectual, de copyright o de privacidad) de terceros. Cualquier foto/imagen que no cumpla con los requisitos mencionados no será publicada y/o puede ser eliminada por IWaNaTrip.com en cualquier momento y sin previo aviso.

</p>
                            
                        </div>

                        
                                                    <div class="box">
                            <h3>7. Derechos de propiedad intelectual</h3>
                            <p>Si no se indica lo contrario, el software necesario para nuestros servicios o utilizado en nuestro sitio web y los derechos de propiedad intelectual (incluidos los copyrights) de los contenidos y la información, así como el material de nuestro sitio web pertenecen a IWaNaTrip.com.
IWaNaTrip.com se reserva exclusivamente la propiedad de todos los derechos, título e interés en (todos los derechos de propiedad intelectual de) (la apariencia (incluyendo la infraestructura) de) la página web donde el servicio tiene disponibilidad (incluyendo los comentarios de los clientes y el contenido traducido), y no tienes derecho a copiar, recopilar, enlazar a, publicar, promocionar, vender, integrar, utilizar, combinar o utilizar el contenido (incluidas las traducciones y los comentarios de los clientes) o nuestra marca sin un permiso por escrito nuestro. En la medida que quieras usar (completamente o parcialmente) nuestro contenido (traducido) (incluyendo los comentarios de los clientes) o seas propietario de cualquier derecho de propiedad intelectual de la página web o cualquier contenido (traducido) o comentarios de los clientes, por la presente, transfieres y cedes todos los derechos de propiedad intelectual a IWaNaTrip.com. Cualquier tipo de uso indebido o cualquier tipo de acción o comportamiento anteriormente mencionado constituirá una infracción de nuestros derechos de propiedad intelectual (incluyendo el copyright y el derecho de base de datos).

</p>

                    </div>
                        
                        
                        <div class="box">
                            <h3>8. Miscelánea</h3>
                            <p>En la medida en que lo permita la ley, estos términos y condiciones y la prestación de nuestros servicios se regirán e interpretarán de acuerdo a la legislación ecuatoriana, y cualquier controversia que surja por estos términos y condiciones generales o por nuestros servicios se presentará únicamente ante los tribunales competentes de Quito, en Ecuador.

La versión original en español de estos términos y condiciones ha sido traducida a otros idiomas. La versión traducida es una traducción de cortesía y no oficial, por lo tanto no se pueden extraer derechos de la traducción. En caso de disputa sobre el contenido o la interpretación de los términos y condiciones, así como en el supuesto de conflictos, contradicciones o discrepancias entre la versión en español y el resto de versiones en otros idiomas, la versión en español de estos términos prevalece y es concluyente en la medida en que esté permitido por la ley. Podrás consultar la versión en español en nuestro sitio web (seleccionando el idioma) o pedirnos por escrito que te la enviemos.
Si alguna disposición de estos términos y condiciones es o se convierte en inválida o no vinculante, seguirás estando vinculado al resto de disposiciones mencionadas. Si esto ocurriese, la disposición no válida deberá cumplirse hasta el máximo permitido por la ley aplicable y, en la medida de lo posible, se aceptará un efecto similar al de las disposiciones inválidas o no vinculantes, conforme al contenido y objeto de estos términos y condiciones.

</p>
                            
                        </div>
                        
                        <div class="box">
                            <h3>9. Sobre iWaNaTrip.com</h3>
                            <p>IWaNaTrip.com presta el servicio de publicidad de servicios turísticos online. Se trata de una sociedad privada de responsabilidad limitada constituida según la legislación de Ecuador y con sede social en Quito.

La sede de IWaNaTrip.com se encuentra en Quito, Ecuador, IWaNaTrip.com no acepta ni asume ningún otro domicilio en ningún lugar, ubicación u oficina del mundo, que no sea su domicilio social de Quito.

</p>
                            
                        </div>
                </div>
            </div>
        </section>

          <footer id="footer" class="style4">
        <div class="callout-box style2">
                <div class="container">
                    <div class="callout-content">
                        <div class="callout-text">
                            <h4>{{ trans('publico/labels.label119')}}</h4>
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
    @endif
    
    


    
    
    
    <!-- load page Javascript -->
    <script type="text/javascript" src="{{ asset('public/public_components/js/main.js')}}"></script>


</body>
</html>