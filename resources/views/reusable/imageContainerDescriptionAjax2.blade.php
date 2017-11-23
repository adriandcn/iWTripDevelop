@section('contentImagenes')	

{!! HTML::style('css/calendar/ui-jquery.css') !!}
{!! HTML::style('css/imageAjax/owl.carousel.css') !!}
{!! HTML::style('css/imageAjax/owl.theme.css') !!}
{!! HTML::style('css/imageAjax/prettify.css') !!}
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.carousel.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ asset('public_components/components/owl-carousel/owl.transitions.css')}}" media="screen" />

@if(isset($ImgPromociones) && count($ImgPromociones)>0)
{!! Form::open(['url' => route('delete-image1'),  'id'=>'deleteImage']) !!}
<br><br>
        <div class="product-images col-sm-12 box-lg">
            <div id="owl-demo" class="owl-carousel">
                
                @foreach ($ImgPromociones as $imagen)

                <?php
                $url = "images/icon/" . $imagen->filename
                //$url = "images/fullsize/" . $imagen->filename;
                
                ?>

                <!--<div class="item-1" style="border: 1px solid black;width: 180px;padding: 5%;margin-right: 20px;"> -->
                <div class="item-1" style="padding: 5%;">
                    <img src="{!! asset('img/x.png')!!}" onclick='alertaConfirm({!!$imagen->id!!})' style=" width:35px; height:32px; position:absolute; top:2px; right:0px; cursor:pointer;" alt='' />
                    <img src="{{asset($url)}}" href='#' class="img-res"/>
                    
            
                    <input type="text" value="{!!$imagen->descripcion_fotografia!!}" name="descripcion_fotografia_{!!$imagen->id!!}" 
                           style='height: 25px;width: 100%;' placeholder='Descripcion' 
                           onchange="AjaxSaveDetailsFotografia1('deleteImage','{!!$imagen->id!!}')">
                </div>
                @endforeach 

            </div>

           <!--         <div id="sync1" class="owl-carousel images">
                        <div class="post-slider style3 owl-carousel box">
                               @foreach ($ImgPromociones as $imagen)
                                <?php
                                $url = "images/icon/" . $imagen->filename
                                ?>
                                <a href="{{ asset('images/fullsize/'.$imagen->filename)}}" class="soap-mfp-popup">
                                    <img src="{!! asset('img/x.png')!!}" onclick='alertaConfirm({!!$imagen->id!!})' style=" width:50px; height:50px; position:absolute;top:2px; right:8px; cursor:pointer;" alt='' />
                                    <img src="{{asset($url)}}" href='#' style="80% !important;"/>

                                    @if($imagen->descripcion_fotografia!="")
                                    <div class="slide-text caption-animated" data-animation-type="slideInLeft" data-animation-duration="2">
                                        <h4 class="slide-title">{!!$imagen->descripcion_fotografia!!}</h4>

                                    </div>
                                    @endif
                                </a>
                                @endforeach
                        </div>
                    </div>-->

        </div>
{!! Form::close() !!}
@endif

<!--{!! HTML::script('js/imageAjax/owl.carousel.js') !!} -->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
<script type="text/javascript" src="{{ asset('public_components/components/owl-carousel/owl.carousel.min.js')}}"></script>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
<script>
	 $(document).ready(function() {
		    $("#owl-demo").owlCarousel({
		    autoPlay: 5000,
		            items : 1,
		            itemsDesktop : [1199, 3],
		            itemsDesktopSmall : [979, 3]
		    });
	 });
         
</script>
<style>
    #owl-demo-1 .item-1{
        margin: 3px;
    }
    #owl-demo-1 .item-1 .img-res{
        display: block;
        width: 100%;
        height: 150px;
        
    }
</style>
<script>
                //Funcion para eliminación
            function alertaConfirm(id){
            var r = confirm("Está seguro de que desea eliminar esta imagen?");
                    if (r == true) {
            AjaxContainerRetrunMessageImagenRes("deleteImage", id);
            $("#flag_image").val('1');
            
                    } else {
            txt = "Cancelado";
                    }
            }
	</script>


{!! HTML::script('js/imageAjax/bootstrap-collapse.js') !!}
{!! HTML::script('js/imageAjax/bootstrap-transition.js') !!}
{!! HTML::script('js/imageAjax/bootstrap-tab.js') !!}
{!! HTML::script('js/imageAjax/prettify.js') !!}
{!! HTML::script('js/imageAjax/application.js') !!}


@endsection


