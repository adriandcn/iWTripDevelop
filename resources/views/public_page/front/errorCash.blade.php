<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip | {{ trans('booking/labels.label31')}}</title>

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

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,300,500,600,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public_components/components/magnific-popup/magnific-popup.css')}}"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css" />
        {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
        {!!HTML::script('js/sweetAlert/sweetalert2.min.js') !!}
        
        
        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/responsive.css')}}">


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
            @include('public_page.reusable.banner', ['titulo' =>'Confirmacion PayPal'])  

            <ul class="breadcrumbs">
                <li class="active">{{ trans('booking/labels.label31')}}</li>
            </ul>
        </div>
            <script type='text/javascript'>
			   swal(
                          '{{ trans("booking/labels.label30")}}',
			  '{{ trans("booking/labels.label11")}}',
			  'warning');
            </script>
        <section id="content">
            <div class="container">
                <div class="row" id="print">
                    <div id="main" class="col-sm-12 col-md-12">
                        <h1 class="entry-title" style="text-align:center;padding:4%;">{{ trans('booking/labels.label29')}}</h1>
                        <div class="product type-product">
                            
                            
                            <div class="woocommerce-tabs tab-container vertical-tab clearfix box">
                                                   <div class="row">
                            <div class="col-sm-6">
                                <div class="woocommerce-billing-fields box">
                                    <h4>{{ trans('booking/labels.label6')}}</h4>

                                    <div class="form-group column-2 no-column-bottom-margin">
                                        <label style="padding-bottom:1%;">{{ trans('booking/labels.label1')}}</label>
                                        <input class="input-text full-width" placeholder="First name" type="text"
                                               value="{!!$infoReserva2[0]->nombre_contacto_operador_1!!}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label style="padding-bottom:1%;">{{ trans('booking/labels.label2')}}</label>
                                        <input class="input-text full-width" placeholder="Company name" type="text"
                                               value="{!!$infoReserva2[0]->nombre_empresa_operador!!}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label style="padding-bottom:1%;">{{ trans('booking/labels.label3')}}</label>
                                        <input class="input-text full-width" placeholder="Address" type="text"
                                               value="{!!$infoReserva2[0]->direccion_empresa_operador!!}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label style="padding-bottom:1%;">{{ trans('booking/labels.label4')}}</label>
                                        <input class="input-text full-width" placeholder="Phone" type="text"
                                               value="{!!$infoReserva2[0]->telf_contacto_operador_1!!}" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label style="padding-bottom:1%;">{{ trans('booking/labels.label5')}}</label>
                                        <input class="input-text full-width" placeholder="Email" type="text"
                                               value="{!!$infoReserva2[0]->email_contacto_operador!!}" readonly="">
                                    </div>
                                
                                </div>
                                <div class="woocommerce-shipping-fields box">
                                    <h4>{{ trans('booking/labels.label8')}}</h4>
                                    <div class="shipping-address">

                                        <div class="form-group">
                                            <div id="qrcode"></div>
                                             <?php 
                                            /*echo "<br>";
                                            echo "<center>";
                                            $codigo = $infoReservas[0]->uuid;
                                            echo $qr = DNS2D::getBarcodeHTML($codigo, "QRCODE");
                                            //echo '<img src="'.$qr.'" />';
                                            echo "</center>";
                                            echo "<br>";*/
                                            ?>
                                        </div>




                                    </div>


                                </div>
                            </div>
                            <div class="col-sm-6">

                            <h4>{{ trans('booking/labels.label7')}}</h4>
                                <div id="order_review">
                                    <table class="shop_table box" id="basic-table">
                                      
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label13')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoPago[0]->nombreCalendario!!}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label12')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->c_name!!}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label14')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->c_email!!}</span>
                                                </td>
                                            </tr>
                                             <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label17')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->c_phone!!}</span>
                                                </td>
                                            </tr>
                                             <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label15')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->date_from!!}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label16')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->date_to!!}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label18')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->c_adults!!}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label19')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoReservas[0]->c_children!!}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label40')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{ trans('booking/labels.label42')}}</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ trans('booking/labels.label43')}}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{!!$infoPago[0]->created_at!!}</span>
                                                </td>
                                            </tr>                                            
                                        </tbody>
                                        <tfoot>
                                            <!--<tr class="tax">
                                                <th>Tax</th>
                                                <td>
                                                    $15.00
                                                </td>
                                            </tr> -->
                                            <tr class="product-name">
                                                <th>{{ trans('booking/labels.label20')}}</th>
                                                <td><span class="amount"> <strong>{!!$infoPago[0]->montoPago!!} $</strong></span></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment">
                                        <h4>{{ trans('booking/labels.label21')}}</h4>
                                        <ul class="payment_methods methods box-sm">
                                            <li class="payment_method_paypal">
                                                <label>
                                                    PayPal <img src="http://demo.qodeinteractive.com/bridge/wp-content/plugins/woocommerce/assets/images/icons/paypal.png" alt="PayPal">
                                                </label>
                                            </li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                </div>



                            </div>
                        </div>

                                    
                              
                            </div>

                        </div>
                        <div class="text-center">
                        <button class="btn btn-default" id="create_pdf">{{ trans('booking/labels.label22')}}</button>   
                     @if($user != Array() && $partePublica == false)
			        <button class="btn btn-default" onclick="window.location.href ='{{ asset('/servicios/serviciooperador/'.$idUsuarioServicio.'/'.$idCatalogo)}}'">{{ trans('booking/labels.label23')}}</button>
                        @elseif($user != Array() && $partePublica == true)
			        <button class="btn btn-default" onclick="window.location.href ='{{ asset('/detalle/Atracciones/'.$idUsuarioServicio)}}'">{{ trans('booking/labels.label23')}}</button>
                        @else
                               <button class="btn btn-default" onclick="window.location.href ='{{ asset('/detalle/Atracciones/'.$idUsuarioServicio)}}'">{{ trans('booking/labels.label23')}}</button>
                        @endif
                        
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer" class="style4">
            <!-- <div class="callout-box style2">
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
            </div> -->
            @include('public_page.reusable.footer')
        </footer>
    </div>

    <!-- Javascript -->
{!! HTML::script('js/jquery.js') !!}
    {!!HTML::script('js/js_public/Compartido.js') !!}
    {!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}
        {!!HTML::script('js/jquery.autocomplet.js') !!}
        {!!HTML::script('js/Compartido.js') !!}
        {!!HTML::script('js/sweetAlert/qrcode.js') !!}
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-2.1.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.noconflict.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/modernizr.2.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/jquery-ui.1.11.2.min.js')}}"></script>
    
            {!!HTML::script('js/sweetAlert/html2canvas.js') !!}
    {!!HTML::script('js/sweetAlert/jspdf.js') !!}
    {!!HTML::script('js/sweetAlert/jspdf.plugin.autotable.js') !!}

    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="{{ asset('public_components/js/bootstrap.min.js')}}"></script>

    <!-- Magnific Popup core JS file -->
    <script type="text/javascript" src="{{ asset('public_components/components/magnific-popup/jquery.magnific-popup.min.js')}}"></script> 

     
    <!-- parallax -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.stellar.min.js')}}"></script>

    <!-- waypoint -->
    <script type="text/javascript" src="{{ asset('public_components/js/waypoints.min.js')}}"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

    <!-- plugins -->
    <script type="text/javascript" src="{{ asset('public_components/js/jquery.plugins.js')}}"></script>


<!-- Google Map Api -->
    <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="{{ asset('public_components/js/gmap3.js')}}"></script>



         <script>   
var qrcode = new QRCode("qrcode");

function makeCode () {      
    qrcode.makeCode('{!!$infoReservas[0]->uuid!!}');
}

makeCode();
    </script>
    
    <script> 

(function(){

$('#create_pdf').on('click',function(){
        generate();
});

function generate() {
  
  var imgData = $('img[alt="Scan me!"]').attr("src");
  console.log(imgData);

  var doc = new jsPDF('p', 'mm','a4');

  var res = doc.autoTableHtmlToJson(document.getElementById("basic-table"));
  doc.autoTable(res.columns, res.data, {margin: {top: 80}});
  
  var header = function(data) {
    doc.setFontSize(10);
    doc.setTextColor(40);
    doc.setFontStyle('normal');
    //doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
    doc.text(60, 20, '{{ trans("booking/labels.label9")}}');
    doc.text(80, 30, 'Informacion del Operador');
    doc.text(20, 40, 'Nombre Operador: {!!$infoReserva2[0]->nombre_contacto_operador_1!!}');
    doc.text(20, 45, 'Empresa Operador: {!!$infoReserva2[0]->nombre_empresa_operador!!}');
    doc.text(20, 50, 'Direccion Operador: {!!$infoReserva2[0]->direccion_empresa_operador!!}');
    doc.text(20, 55, 'Correo Operador: {!!$infoReserva2[0]->telf_contacto_operador_1!!}');
    doc.text(20, 60, 'Telefono Operador: {!!$infoReserva2[0]->email_contacto_operador!!}');
    doc.text(80, 70, 'Informacion de la Reservacion');
    doc.addImage(imgData, 'JPEG', 70, 180, 60, 60);
    
  };

  var options = {
    beforePageContent: header,
    margin: {
      top: 80
    },
    //startY: doc.autoTableEndPosY() + 20
  };

  doc.autoTable(res.columns, res.data, options);

  doc.save('Reservacion-{!!$infoReservas[0]->c_name!!}-{!!$infoPago[0]->created_at!!}.pdf');
}



}());

</script>
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

    @endif
    
<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    


</body>
</html>
