<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip | {{ trans('front/dashboard.title')}}</title>

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
        
        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/responsive.css')}}">
                {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
        {!!HTML::script('js/sweetAlert/sweetalert2.min.js') !!}


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
    
   <?php
$id_usuario_op = NULL;
$nombre_empresa_operador = NULL;
$direccion_empresa_operador = NULL;
$nombre_contacto_operador_1 = NULL;
$telf_contacto_operador_1 = NULL;
$email_contacto_operador = NULL;
?> 
 
    
    <body class="woocommerce">
        
            <div id="page-wrapper">

            <header id="header"  class="header-color-white" >
                @include('public_page.reusable.header')
            </header>
            @include('public_page.reusable.banner', ['titulo' =>'Confirmacion PayPal'])  

            <ul class="breadcrumbs">
                <li class="active">{{trans('front/dashboard.breadcumbs')}}</li>
            </ul>
        </div>    
        
   <section id="content">
            <div class="container">
                <div id="main">
                    <div class="woocommerce">
                        <div class="tab-container dashboard row">
                                  <div class="col-sm-12 col-md-12">
                                      <br><br>
                                    <h4 class="full-name skin-color">{{trans('front/dashboard.saludo')}}, {!!session('user_name')!!}</h4>
                                    <div class="description">
                                        <p>{{trans('front/dashboard.texto')}}</p>
                                    </div>
                                    <hr class="color-light1">
                                </div>
                            <div class="col-sm-4 col-md-3">
                                <h4>My Account</h4>
                                <ul class="tabs arrow-circle size-medium box">
                                    <li class="active"><a href="#account-dashboard" data-toggle="tab">{{trans('front/dashboard.menu1')}}</a></li>
                                    <li><a href="#account-information" data-toggle="tab">{{trans('front/dashboard.menu2')}}</a></li>
                                    <li><a href="#address-book" data-toggle="tab">{{trans('front/dashboard.menu3')}}</a></li>
                                    <li><a href="#my-orders" data-toggle="tab">{{trans('front/dashboard.menu4')}}</a></li>
                                    <li><a href="#my-product-reviews" data-toggle="tab">My Product Reviews</a></li>
                                    <li><a href="#my-tags" data-toggle="tab">My Tags</a></li>
                                    <li><a href="#my-wishlist" data-toggle="tab">My Wishlist</a></li>
                                    <li><a href="#newsletter-subscriptions" data-toggle="tab">Newsletter Subscriptions</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div id="account-dashboard" class="tab-content in active">
                                    <h4>Account Information</h4>
                                    
                                    <div class="row view-account-information same-height add-clearfix">
                                        <div class="col-md-6 box">
                                            <div class="information" style="border-style: dashed;border-color: black;">
                                                <i class="fa fa-plus fa-3x" aria-hidden="true" 
                                                   style="display:inline-table;margin-top:1%;margin-right: 2%;"></i>
                                                <h5 style="display:inline-table;margin-bottom: 4%;">Crear una Pagina</h5>
                                                <div class="description">
                                                    <p>
                                                        Descripcion de crear pagina
                                                        <a href="#" class="btn btn-sm style4">Crear</a>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6 box">
                                            <div class="information">
                                                <a href="#" class="btn btn-sm style4">Modify</a>
                                                <h5>Newsletters</h5>
                                                <div class="description">
                                                    <p>You are currently not subscribed to any newsletter.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 box">
                                            <div class="information">
                                                <a href="#" class="btn btn-sm style4">Modify</a>
                                                <h5>Billing Address</h5>
                                                <div class="description">
                                                    <p>
                                                        Default Billing Address
                                                        <br>
                                                        You have not set a default billing address.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 box">
                                            <div class="information">
                                                <a href="#" class="btn btn-sm style4">Modify</a>
                                                <h5>Shipping Address</h5>
                                                <div class="description">
                                                    <p>
                                                        Default Shipping Address
                                                        <br>
                                                        You have not set a default shipping address.
                                                    </p>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                </div>
                                <div id="account-information" class="tab-content">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-8">
                                            <h4>Account Information</h4>
                                            {!! Form::open(['url' => route('upload-postoperador1'),  'id'=>'registro_step1']) !!}
                                            <!--<input type="hidden" value="{!!$data['tipoOperador']!!}" name="id_tipo_operador" id="id_tipo_operador">
                                            <input type="hidden" value="{!!$id_usuario_op!!}" name="id_usuario_op" id="id_usuario_op"> -->
                                                <div class="form-group">
                                                    {!!Form::label('nombre_1', 'Nombre del contacto', array('id'=>'iconFormulario-step2'))!!}
                                                    {!!Form::text('nombre_contacto_operador_1', $nombre_contacto_operador_1, array("title"=>"Es el nombre del administrador del servicio o de quien se haga cargo de la información que ésta página despliegue.",'class'=>'input-text full-width','placeholder'=>'Ingrese Nombre contacto'))!!}
                                                </div>
                                                <div class="form-group">
                                                    {!!Form::label('direccion_1', 'Direccion del contacto', array('id'=>'iconFormulario-step2'))!!}
                                                    {!!Form::text('direccion_empresa_operador', $direccion_empresa_operador, array("title"=>"Es la dirección de la matriz del establecimiento.",'class'=>'input-text full-width','placeholder'=>'Ingrese direccion compania'))!!}
                                                </div>
                                                <div class="form-group">
                                                    {!!Form::label('telefono_1', 'Teléfono del contacto', array('id'=>'iconFormulario-step2'))!!}
                                                    {!!Form::text('telf_contacto_operador_1', $telf_contacto_operador_1, array("title"=>"Es el telefono del contacto del servicio, se puede tener varios servicios pero un solo representante al cual le haremos llegar noticias, mercadería, premios, etc.",'class'=>'input-text full-width','placeholder'=>'Ingrese telefono contacto'))!!}
                                                </div>
                                                <div class="form-group">
                                                  {!!Form::label('email_1', 'Email del Contacto', array('id'=>'iconFormulario-step2'))!!}
                                                  {!!Form::text('email_contacto_operador', $email_contacto_operador, array("title"=>"Es el email del contacto del servicio, se puede tener varios servicios pero un solo representante al cual le haremos llegar noticias, mercadería, premios, etc.",'class'=>'input-text full-width','placeholder'=>'Ingrese email contacto'))!!}
                                                </div>
                                                <div class="form-group">
                                                    <a class="btn btn-medium style1" onclick="AjaxContainerRegistro('registro_step1')" href="#">Guardar</a>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <div id="address-book" class="tab-content">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-8">
                                            <form>
                                                <h4>Billing Address</h4>
                                                
                                                <div class="form-group dropdown">
                                                    <select class="selector full-width default-style">
                                                        <option value="">Select a Country</option>
                                                        <option value="US">United States</option>
                                                    </select>
                                                </div>
                                                <div class="form-group column-2 no-column-bottom-margin">
                                                    <input type="text" placeholder="First name" class="input-text">
                                                    <input type="text" placeholder="Last name" class="input-text">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Company name" class="input-text full-width">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Address" class="input-text full-width">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Appartment, unit, etc. (optional)" class="input-text full-width">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" placeholder="Town / City" class="input-text full-width">
                                                </div>
                                                <div class="form-group column-2 no-margin">
                                                    <input type="text" placeholder="State / County" class="input-text">
                                                    <input type="text" placeholder="Zip code" class="input-text">
                                                </div>
                                                <div class="form-group column-2 no-margin">
                                                    <input type="text" placeholder="Email address" class="input-text">
                                                    <input type="text" placeholder="Phone" class="input-text">
                                                </div>
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox">Create an account?</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-medium style1">Save Information</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="my-orders" class="tab-content">
                                    <h4>Recent Orders</h4>
                                    <table class="shop_table my_account_orders">
                                        <thead>
                                            <tr>
                                                <th class="order-number"><span class="nobr">Order</span></th>
                                                <th class="order-date"><span class="nobr">Date</span></th>
                                                <th class="order-status"><span class="nobr">Status</span></th>
                                                <th class="order-total"><span class="nobr">Total</span></th>
                                                <th class="order-actions">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="order">
                                                <td class="order-number">
                                                    <a href="#">#7117</a>
                                                </td>
                                                <td class="order-date">
                                                    <time datetime="2014-11-05">November 5, 2014</time>
                                                </td>
                                                <td class="order-status">
                                                    Cancelled
                                                </td>
                                                <td class="order-total">
                                                    <span class="amount">$16.00</span> for 2 items
                                                </td>
                                                <td class="order-actions">
                                                    <a class="btn btn-sm style1 view no-margin" href="#">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="my-product-reviews" class="tab-content">
                                    <h4>My Product Reviews</h4>
                                    <table class="shop_table my_product_reviews">
                                        <thead>
                                            <tr>
                                                <th class="review-date">Created at</th>
                                                <th class="product-name">Product Name</th>
                                                <th class="product-review">Review</th>
                                                <th class="product-comment">Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="review-date"><time datetime="2014-11-05">November 5, 2014</time></td>
                                                <td class="product-name">Mesh-Trimmed Dress</td>
                                                <td class="product-review"><span class="star-rating" title="4" data-toggle="tooltip"><span data-stars="4"></span></span></td>
                                                <td class="product-comment">Aliquam hendrerit a aug insus Pellente sque id erat quis sa sollicitudin.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="my-tags" class="tab-content">
                                    <h4>My Tags</h4>
                                    <p>Click on a tag to view your corresponding products.</p>
                                    <div class="my_tags tags">
                                        <a href="#" class="tag">Night Dress</a>
                                        <a href="#" class="tag">female tights</a>
                                        <a href="#" class="tag">gowns</a>
                                        <a href="#" class="tag">shirts</a>
                                        <a href="#" class="tag">coats</a>
                                    </div>
                                </div>
                                <div id="my-wishlist" class="tab-content">
                                    <form>
                                        <h4>My Wishlist</h4>
                                        <table class="shop_table my-wishlist box">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th class="product-desc">Product Details and Comment</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-img">
                                                        <img src="http://placehold.it/58x63" alt="">
                                                    </td>
                                                    <td class="product-desc">
                                                        <h6>Easy Draped Cardigan</h6>
                                                        <p>Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis mauris sollicitudin commodo venenatis ligula commodo. Sed blandit convallis dignissim.Donec vel pellentesque neque. Nulla et quam vitae sapien vestibulum molestie. Cras ac ligula vitae urna suscipit venenatis id quis urnaauris sodales lacinia mauris.</p>
                                                        <textarea rows="5" class="input-text full-width" placeholder="write message"></textarea>
                                                    </td>
                                                    <td class="qty-wrap">
                                                        <input type="text" class="input-text" value="1">
                                                    </td>
                                                    <td class="product-price">
                                                        <span>$23.58</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-medium style1">Update Wishlist</button>
                                    </form>
                                </div>
                                <div id="newsletter-subscriptions" class="tab-content">
                                    <form>
                                        <h4>Newsletter Subscriptions</h4>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" checked>General Subscription
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-medium style1">Save Information</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <footer id="footer" class="style4">
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
                                });

     </script>
     
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
            background:url ("{!!asset('img/internas/b05.png')!!}") no-repeat;
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
            background:url("{!!asset('img/internas/a12.png')!!}") no-repeat;
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
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
});
  

</script>
    @endif
    
<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>
    <!-- load page Javascript -->
    
<script>

    $(document).ready(function () {
 //$('.btn dropdown-toggle bs-placeholder btn-default').width('100%');
 $("#username").val("");
 $(".input-text.full-width").val("");
 
    });

</script>
    
    
<script type="text/javascript">
    $('.error').html('');

    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

    $("#registro").submit(function (event) {

        
        $(".testbox").LoadingOverlay("show");

        event.preventDefault();
        var $form = $(this),
                data = $form.serialize(),
                url = $form.attr("action");
       
         var posting = $.post(url, {formData: data});
        posting.done(function (data) {
            if (data.fail) {

                
                var errorString = '<ul>';
                $.each(data.errors, function (key, value) {
                    errorString += '<li>' + value + '</li><br>';
                });
                errorString += '</ul>';
                 $(".testbox").LoadingOverlay("hide", true);
                //$('#error').html(errorString);
                $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

            }
            if (data.success) {
                 $(".testbox").LoadingOverlay("hide", true);
                $('.register').fadeOut(); //hiding Reg form
                var successContent = '' + data.message + '';
                $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'Success'])");
                window.location.href = data.redirectto;



            } //success
        }); //done
    });
</script>


</body>
</html>
