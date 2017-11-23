<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
    
    <head>
        <!-- Page Title -->
        <title>iWaNaTrip | {{ trans('front/loginres.title')}}</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta name="description" content="iWanaTrip.com">
        <meta name="author" content="iWaNaTrip team">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
     
<link rel="shortcut icon" href="{{ asset('public/favicon.ico')}}" />
        <link rel="apple-touch-icon" href="{{ asset('public/images/favicon.png')}}" />        
        <!-- Theme Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/font-awesome.min.css')}}">
        
        <link rel="apple-touch-icon" href="{{ asset('public/img/60x60_logo_iwana.png')}}">
        
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/76x76logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/120x120logo_iwana.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/180x180logo_iwana.png')}}">
        <link rel="icon" sizes="180x180" href="{{ asset('public/img/180x180logo_iwana.png')}}">
        
        
<meta property="og:title" content="iWaNaTrip | Ecuador" /> 
<meta property="og:description" content="es un espacio de busqueda para la red viajeros de todo el mundo, permite compartir el contenido de forma sencilla a traves de internet.
              iWaNaTrip es experiencia de vida. Deja de ser turista, conviertete en viajero. Viaja por el mundo y descubre Ecuador" />
<meta property="og:image" content="{{ asset('public/img/index-fondo.jpg')}}" />
     

<link rel="stylesheet" href="{{ asset('public/public_components/css/letras.css')}}">
        <link rel="stylesheet" href="{{ asset('public_components/css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="{{ asset('public_components/components/magnific-popup/magnific-popup.css')}}"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
         <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css" />
         
        
        <!-- Main Style -->
        <link id="main-style" rel="stylesheet" href="{{ asset('public_components/css/style.css')}}">

        <!-- Updated Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/updates.css')}}">

        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/custom.css')}}">

        <!-- Responsive Styles -->
        <link rel="stylesheet" href="{{ asset('public_components/css/responsive.css')}}">
                {!!HTML::script('js/sliderTop/jssor.slider.mini.js') !!}
       
        
        
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
            @include('public_page.reusable.banner', ['titulo' =>'Bienvenido'])  

            <ul class="breadcrumbs">
                <li class="active"><a href="{!!asset('/')!!}"  onclick="$('.woocommerce').LoadingOverlay('show')">{{ trans('publico/labels.label1')}}</a></li>
            </ul>
        </div>    
        
   <section id="content">
        <div class="container">
            <div id="main">
                        
                
                    <div class="section-info">
                        
                        
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::open(['url' => 'auth/loginr', 'method' => 'post', 'role' => 'form', 'class'=>'form-bordered','id' => 'loginform']) !!}
                                <h4>{{trans('front/loginres.ingresocuenta')}}</h4>
                                
                                    <div class="form-group">
                                        <input type="text" class="input-text full-width" id="email" name="log" placeholder="{{trans('front/loginres.log')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="input-text full-width" id="password" name="password" placeholder="{{trans('front/loginres.password')}}">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::check('memory', trans('front/loginres.remind'),array('class' => 'logininput')) !!}
                                        
                                        {!! link_to('password/email', trans('front/loginresregister.forget'),array('class' => 'logininput')) !!}
                                    </div>
                                    <div class="form-group">
                                        <a href="#" class="btn style1" onclick="$(this).closest('form').submit()">{!! (trans('front/loginres.logbtn')) !!}</a>
                                        
                                    </div>
                                <div class="text-center" style="color: red;font-weight: bold;">
                         
                <div class="rowerror">

    <br>
    @if(session()->has('error'))
    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
    @endif

    @if(session()->has('ok'))
    @include('partials/message', ['type' => 'message', 'message' => session('ok')])
    @endif	
    @if($errors->has())

    <div>

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif


</div> 
                             
                             
                         <br>  
                         
                     </div>
                                
                                {!! Form::close() !!}
                                                 
                               
                                 <div>
                </div>
                                
                            </div>
                         
                            
                                <div>
                            <div class="col-sm-6">
                                <br>
                                  <img src="http://placehold.it/270x237" alt="" class="pull-left" style="padding-right: 2%; padding-bottom: 2%;">
                                        <p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explica aborem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                                        <p>Lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.</p>  
                                
                            </div>
                        </div>
                             
                        
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-sm-6">
                               <img src="http://placehold.it/270x237" alt="" class="pull-left" style="padding-right: 2%; padding-bottom: 2%;">
                                        <p>Nulla mattis rsitmet dolor sollicitudi aliquamquae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explica aborem ipsum dolor sit amet gravida sagittis lacus. Morbi sit amet mauris mi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                                        <p>Lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim.</p>
                                 <div>
                     <div class="text-center" style="color: red;font-weight: bold;">
                         
                <div class="rowerror1">

    <br>
    @if(session()->has('error'))
    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
    @endif

    @if(session()->has('ok'))
    @include('partials/message', ['type' => 'message', 'message' => session('ok')])
    @endif	
    @if($errors->has())

    <div>

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif


</div> 
                             
                             
                         <br>  
                         
                     </div>
                    
                </div>
                                
                            </div>
                         
                            
                   <div>
                            <div class="col-sm-6 testbox1">
                                    {!! Form::open(['url' => 'auth/registerr', 'method' => 'post', 'role' => 'form','class'=>'form-bordered', 'id' => 'registro']) !!}
                                
                                    <h4>{{trans('front/registerres.register')}} </h4>
                          
                                    <div class="form-group">
                                        <input type="text" class="input-text full-width" id="username" name="username" placeholder="{{trans('front/registerres.pseudo')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="input-text full-width" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="input-text full-width" id="email" name="email_confirmation" 
                                               placeholder="{{trans('front/registerres.confirm-email')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="input-text full-width" id="password" name="password" placeholder="{{trans('front/registerres.password')}}">
                                    </div>
                                    <div class="form-group">
                                        {!! Recaptcha::render() !!}
                                    </div>
                                    <div class="form-group">
                                            <label>By clicking Register, you agree on our <a href="{{ url('TermsConditions') }}">terms and condition</a>.</label>
                                    </div>
                                    <div class="form-group">
                                        <a href="#" class="btn style1" onclick="$(this).closest('form').submit()">{!! (trans('front/form.send')) !!}</a>
                                    </div>
                          
                          
                                {!! Form::close() !!}
                                    
                              
                                
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
    <?php $header = "/img/portada_face_iwanatrip_04.jpg";?>
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

        
        $(".testbox1").LoadingOverlay("show");
        
        
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
                 $(".testbox1").LoadingOverlay("hide", true);
                //$('#error').html(errorString);
                $('.rowerror1').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

            }
            if (data.success) {
                $(".testbox1").LoadingOverlay("hide", true);
                $('.register').fadeOut(); //hiding Reg form
                var successContent = '' + data.message + '';
                $('.rowerror1').html("@include('partials/error', ['type' => 'danger','message'=>'Success'])");
                window.location.href = data.redirectto;



            } //success
        }); //done
        
    });
</script>


</body>
</html>
