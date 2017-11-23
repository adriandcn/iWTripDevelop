@extends('responsive.dashboard')
@section('content')

   <style>
            a.morelink {
                text-decoration:none;
                outline: none;
            }
            .morecontent span {
                display: none;
            }
</style>
            
{!! HTML::script('js/jquery.js') !!}
<script>
$("#dashboard1").show();        
$("#dashboard2").hide();    
$("#dashboard3").hide();
$("#dashboard4").hide();
</script>

@if($usuario == 1)
<script>
$("#errores").show();
</script>
@endif

<div style='display:none'>
    <img src="{!! asset('img/x.png')!!}" alt='' />
</div>

<style>

#myModal {
    z-index: 1500;
}


.outer {
	width:100%;
}
.block1 {
	width:30%;
	float:left;
	display:inline;
        text-align: center;
}
.block2 {
	width:50%;
	padding:1%;
	float:left;
	display:inline;
}

.block3 {
	width:100%;
	padding:1%;
	float:left;
	display:inline;
	
        
}


</style>

<div class="rowerror"> </div>
    
    <div id="account-dashboard" class="tab-content in active">
        <div class="row view-account-information same-height add-clearfix">
            
        <?php 
         $cantidadResturant=0;
         $cantidadHotel =0;
          $cantidadTrip=0;
        foreach($controlDashboard as $cd){
                  if($cd->catalogo_servicio == 1){
                      $cantidadResturant = $cd->cantidad;
                  }
                  if($cd->catalogo_servicio == 2){
                      $cantidadHotel = $cd->cantidad;
                  }
                  if($cd->catalogo_servicio == 3){
                      $cantidadTrip = $cd->cantidad;
                  }
              }
              
              $cantidadResturant; $cantidadHotel; $cantidadTrip;
              
              $counts = array_count_values(array_column($listServiciosAll, 'id_catalogo_servicios'));
              //print_r()
              if(empty($counts[2])){
                  $hotel = 0; 
                  $cantidadHotel = 0;
                  $faltaHotel = $cantidadHotel - $hotel;
                  $faltaHotel1 = 0;
                  $arrayHotel = array();
                  $hotel1 = 0;
              }else{
                $hotel = $counts[2];
                $faltaHotel = $cantidadHotel - $hotel;
                $arrayHotel = array();
                for($i = 0; $i <  $faltaHotel; $i++){
                    $arrayHotel[] = 0;
                }
              }
              
              if(empty($counts[1])){
                $restaurant = 0; 
                $cantidadResturant = 0;
                $faltaRest = $cantidadResturant - $restaurant;
                $faltaRest1 = 0;
                $arrayRest = array();
                $restaurant1 = 0;
              }else{
                 $restaurant = $counts[1];
                 $faltaRest = $cantidadResturant - $restaurant;
                $arrayRest = array();
                for($i = 0; $i <  $faltaRest;$i++){
                    $arrayRest[] = 0;
                }
              }
              
              
              if(empty($counts[3])){
                  $trip = 0;
                  $cantidadTrip = 0;
                  $faltaTrip = $cantidadTrip - $trip;
                  $faltaTrip1 = 0;
                  $arrayTrip = array();
                  $trip1 = 0;
              }else{
                $trip = $counts[3];
                $faltaTrip = $cantidadTrip - $trip;
                $arrayTrip = array();
                for($i = 0; $i <  $faltaTrip;$i++){
                    $arrayTrip[] = 0;
                }
              }
             ?>

                @if (empty($listServiciosUnicos))
                    <!-- CREAR HOTEL -->             
                <!--    <div class="col-md-6 box" style="height:150% !important;">
                        <div style="border: 2px solid #edf6ff;width: 100%;">
                          <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                background-color:#4da6ff;"> </div>
                                <div style="margin-bottom: 5% !important;">
                                
                                <div style="width:20%;text-align: center;display: inline-table;">
                                    <i class="fa fa-bed fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                </div>
                                <div style="width:70%; display: inline-table;">
                                    
                                    <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                        {{trans('front/responsive.alojamiento')}} </h4>
                                </div>
                                <div style="width:100%;margin-top: 5%;">
                                    <a href="#" 
                                       data-toggle="modal" data-target="#hotel" 
                                       class="btn btn-sm style4"
                                       style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                     <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                     <strong>{{trans('front/responsive.crear')}}</strong>
                                    </a>
                                    <br>
                                </div>
                                    
                                </div>
                        </div>
                    </div> -->
                    <!-- CREAR RESTAURANT -->
                  <!--  <div class="col-md-6 box" style="height:150% !important;">
                        <div style="border: 2px solid #edf6ff;width: 100%;">
                          <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                background-color:#ffff33;"> </div>
                                <div style="margin-bottom: 5% !important;">
                                
                                <div style="width:20%;text-align: center;display: inline-table;">
                                    <i class="fa fa-cutlery fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                </div>
                                <div style="width:70%; display: inline-table;">
                                    
                                    <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                        {{trans('front/responsive.restaurant')}} </h4>
                                </div>
                                <div style="width:100%;margin-top: 5%;">
                                    <a href="#" 
                                       data-toggle="modal" data-target="#restaurant" 
                                       class="btn btn-sm style4"
                                       style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                     <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                     <strong>{{trans('front/responsive.crear')}}</strong>
                                    </a>
                                    <br>
                                </div>
                                    
                                </div>
                        </div>
                    </div> -->
                     <!-- CREAR TRIP -->
                   <!-- <div class="col-md-6 box" style="height:150% !important;">
                        <div style="border: 2px solid #edf6ff;width: 100%;">
                          <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                background-color:#f05a22;"> </div>
                                <div style="margin-bottom: 5% !important;">
                                
                                <div style="width:20%;text-align: center;display: inline-table;">
                                    <i class="fa fa-map-signs fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                </div>
                                <div style="width:70%; display: inline-table;">
                                    
                                    <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                        {{trans('front/responsive.trip')}} </h4>
                                </div>
                                <div style="width:100%;margin-top: 5%;">
                                    <a href="#" 
                                       data-toggle="modal" data-target="#trip"
                                       class="btn btn-sm style4"  
                                       style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                     <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                     <strong>{{trans('front/responsive.crear')}}</strong>
                                    </a>
                                    <br>
                                </div>
                                    
                                </div>
                        </div>
                    </div> -->
                @endif
        <?php $counter = 0; ?>
        @foreach ($listServiciosUnicos as $servicios)
        <?php $counter = $counter + 1; ?>
        {!! Form::open(['url' => route('upload-postDetalleOperador'),  'id'=>$servicios->id_catalogo_servicios]) !!}
                @foreach ($listServiciosAll as $servicio)
                    @if($servicio->id_catalogo_servicios==$servicios->id_catalogo_servicios)
                                                        @if($servicio->nombre_servicio=="")
                                    
                                @else
                                    @if($servicios->id_catalogo_servicios == 1)
                                       @if($restaurant == $restaurant)
                                        <div class="col-md-6 box" style="height:150% !important;">
                                            <div style="border: 2px solid #F0AD4E;width: 100%;">
                                              <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                                    background-color:#F0AD4E;"> </div>
                                                    <div style="margin-bottom: 5% !important;">

                                                    <div style="width:20%;text-align: center;display: inline-table;">
                                                        <i class="fa fa-cutlery fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                                    </div>
                                                    <div style="width:60%; display: inline-table;">
                                                        <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                                            {{ $servicio->nombre_servicio }} </h4>
                                                    </div>
                                                    <div style="width:100%;margin-top: 5%;">
                                                        <a  href= "#"
                                                            onclick="AjaxContainerEdicionServicios({!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"
                                                           class="btn btn-sm style4" 
                                                           style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                                         <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                                         <strong>{{trans('front/responsive.editar')}}</strong>
                                                        </a>
                                                        <br>
                                                    </div>

                                                    </div>
                                            </div>
                                        </div>
                                       @endif
                                    @endif 
                                   @if($servicios->id_catalogo_servicios == 2)
                                       @if($hotel == $hotel)
                                        <div class="col-md-6 box" style="height:150% !important;margin-bottom: 5%;">
                                            <div style="border: 2px solid #337AB7;width: 100%;">
                                              <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                                    background-color:#337AB7;"> </div>
                                                    <div style="margin-bottom: 5% !important;">
                                                    <div style="width:20%;text-align: center;display: inline-table;">
                                                        <i class="fa fa-bed fa-5x" aria-hidden="true" style="padding:15%;"></i>
                                                    </div>
                                                    <div style="width:60%; display: inline-table;">
                                                        <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                                            {{ $servicio->nombre_servicio }} </h4>
                                                    </div>
                                                    <div style="width:100%;margin-top: 5%;">
                                                        <a  href= "#"
                                                            onclick="AjaxContainerEdicionServicios({!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"
                                                           class="btn btn-sm style4" 
                                                           style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                                         <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                                         <strong>{{trans('front/responsive.editar')}}</strong>
                                                        </a>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @endif
                                    @endif
                                    @if($servicios->id_catalogo_servicios == 3)
                                       @if($trip == $trip)
                                       <div class="col-md-6 box" style="height:150% !important;margin-bottom: 6%;">
                                                <div style="border: 2px solid #D9534F;width: 100%;">
                                                  <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                                        background-color:#D9534F;"> </div>
                                                        <div style="margin-bottom: 5% !important;">

                                                        <div style="width:20%;text-align: center;display: inline-table;">
                                                            <i class="fa fa-map-signs fa-5x" aria-hidden="true" style="padding:15%;"></i>
                                                        </div>
                                                        <div style="width:60%; display: inline-table;">
                                                            <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                                                {{ $servicio->nombre_servicio }} </h4>
                                                        </div>
                                                        <div style="width:100%;margin-top: 5%;">
                                                            <a  href= "#"
                                                                onclick="AjaxContainerEdicionServicios({!!$servicio->id!!}, {!!$servicio->id_catalogo_servicios!!});"
                                                               class="btn btn-sm style4" 
                                                               style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                                             <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                                             <strong>{{trans('front/responsive.editar')}}</strong>
                                                            </a>
                                                            <br>
                                                        </div>

                                                        </div>
                                                </div>
                                            </div>                                         
                                       @endif
                                   @endif
                                    
                                  
                                @endif
                    @endif
                @endforeach 

        {!! Form::close() !!}
        @endforeach
                   


        </div>
    </div>

<br>

    <div id="account-dashboard" class="tab-content in active">
        <div class="row view-account-information same-height add-clearfix">
                            @if(isset($hotel1))
                    <div class="col-md-6 box" style="height:150% !important;margin-bottom: 5%;">
                        <div style="border: 2px solid #337AB7;width: 100%;">
                          <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                background-color:#337AB7;"> </div>
                                <div style="margin-bottom: 5% !important;">
                                
                                <div style="width:20%;text-align: center;display: inline-table;">
                                    <i class="fa fa-bed fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                </div>
                                <div style="width:70%; display: inline-table;">
                                    
                                    <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                        {{trans('front/responsive.alojamiento')}} </h4>
                                </div>
                                <div style="width:100%;margin-top: 5%;">
                                    <a href="#" 
                                       data-toggle="modal" data-target="#hotel" 
                                       class="btn btn-sm style4"
                                       style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                     <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                     <strong>{{trans('front/responsive.crear')}}</strong>
                                    </a>
                                    <br>
                                </div>
                                    
                                </div>
                        </div>
                    </div>               
                @endif
                
                @if(isset($restaurant1))
                    <div class="col-md-6 box" style="height:150% !important;">
                        <div style="border: 2px solid #F0AD4E;width: 100%;">
                          <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                background-color:#F0AD4E;"> </div>
                                <div style="margin-bottom: 5% !important;">
                                
                                <div style="width:20%;text-align: center;display: inline-table;">
                                    <i class="fa fa-cutlery fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                </div>
                                <div style="width:70%; display: inline-table;">
                                    
                                    <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                        {{trans('front/responsive.restaurant')}} </h4>
                                </div>
                                <div style="width:100%;margin-top: 5%;">
                                    <a href="#" 
                                       data-toggle="modal" data-target="#restaurant" 
                                       class="btn btn-sm style4"
                                       style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                     <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                     <strong>{{trans('front/responsive.crear')}}</strong>
                                    </a>
                                    <br>
                                </div>
                                    
                                </div>
                        </div>
                    </div>                
                @endif
                @if(isset($trip1))
                <div class="col-md-6 box" style="height:150% !important;margin-bottom: 6%;">
                        <div style="border: 2px solid #D9534F;width: 100%;">
                          <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                                background-color:#D9534F;"> </div>
                                <div style="margin-bottom: 5% !important;">
                                
                                <div style="width:20%;text-align: center;display: inline-table;">
                                    <i class="fa fa-map-signs fa-5x" aria-hidden="true" style="padding:20%;"></i>
                                </div>
                                <div style="width:70%; display: inline-table;">
                                    
                                    <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                        {{trans('front/responsive.trip')}} </h4>
                                </div>
                                <div style="width:100%;margin-top: 5%;">
                                    <a href="#" 
                                       data-toggle="modal" data-target="#trip"
                                       class="btn btn-sm style4"  
                                       style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                     <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                     <strong>{{trans('front/responsive.crear')}}</strong>
                                    </a>
                                    <br>
                                </div>
                                    
                                </div>
                        </div>
                    </div>
                @endif            
                
        </div>
    </div>    

        <br>
        @if(count($arrayHotel)>0 || count($arrayRest)>0 || count($arrayTrip)>0)
    <div id="account-dashboard" class="tab-content in active">
        <div class="row view-account-information same-height add-clearfix">
         <hr class="color-light1" style="width:100%;">    
            <div class="col-md-12 box">
                <h3 class="section-title" style="display:inline-table;">Servicios por Crear</h3>
                <h4 class="section-title" style="display:inline-table;padding-left: 10%;"> <strong>Alojamiento:</strong> <?php echo count($arrayHotel);?></h4>
                <h4 class="section-title" style="display:inline-table;padding-left: 10%;"> <strong>Resturant:</strong> <?php echo count($arrayRest);?></h4>
                <h4 class="section-title" style="display:inline-table;padding-left: 10%;"> <strong>Trip:</strong> <?php echo count($arrayTrip);?></h4>
            </div>
            
            
        </div>
    </div>    
     @endif           
    <div id="account-dashboard" class="tab-content in active">
        <div class="row view-account-information same-height add-clearfix">
               
        @foreach ($arrayRest as $faltanRestaurant)
               <div class="col-md-6 box" style="height:150% !important;margin-bottom: 5% !important;">
                    <div style="border: 2px solid #F0AD4E;width: 100%;">
                      <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                            background-color:#F0AD4E;"> </div>
                            <div style="margin-bottom: 5% !important;">

                            <div style="width:20%;text-align: center;display: inline-table;">
                                <i class="fa fa-cutlery fa-5x" aria-hidden="true" style="padding:20%;"></i>
                            </div>
                            <div style="width:70%; display: inline-table;">

                                <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                    {{trans('front/responsive.restaurant')}} </h4>
                            </div>
                            <div style="width:100%;margin-top: 5%;">
                                <a href="#" 
                                   data-toggle="modal" data-target="#restaurant" 
                                   class="btn btn-sm style4"
                                   style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                 <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                 <strong>{{trans('front/responsive.crear')}}</strong>
                                </a>
                                <br>
                            </div>

                            </div>
                    </div>
                </div>                                   
        @endforeach   
        
        @foreach ($arrayHotel as $faltanHoteles)
               <div class="col-md-6 box" style="height:150% !important;">
                    <div style="border: 2px solid #337AB7;width: 100%;">
                      <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                            background-color:#337AB7;"> </div>
                            <div style="margin-bottom: 5% !important;">

                            <div style="width:20%;text-align: center;display: inline-table;">
                                <i class="fa fa-bed fa-5x" aria-hidden="true" style="padding:15%;"></i>
                            </div>
                            <div style="width:60%; display: inline-table;">
                                <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                                    {{trans('front/responsive.alojamiento')}} </h4>
                            </div>
                            <div style="width:100%;margin-top: 5%;">
                                <a href="#" 
                                   data-toggle="modal" data-target="#hotel" 
                                   class="btn btn-sm style4"
                                   style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                 <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                 <strong>{{trans('front/responsive.crear')}}</strong>
                                </a>
                                <br>
                            </div>

                            </div>
                    </div>
                </div>                                   
        @endforeach         
        
        @foreach ($arrayTrip as $faltanTrips)
              <div class="col-md-6 box" style="height:150% !important;margin-bottom: 5% !important;">
                    <div style="border: 2px solid #D9534F;width: 100%;">
                      <div style="display:inline-table;margin-bottom: 4%;width: 100%;height: 20px;
                            background-color:#D9534F;"> </div>
                            <div style="margin-bottom: 5% !important;">

                            <div style="width:20%;text-align: center;display: inline-table;">
                                <i class="fa fa-map-signs fa-5x" aria-hidden="true" style="padding:15%;"></i>
                            </div>
                            <div style="width:60%; display: inline-table;">

                           <h4 class="section-title" style="margin-top: -20% !important;margin-left: 15%;">
                               {{trans('front/responsive.trip')}} </h4>
                            </div>
                            <div style="width:100%;margin-top: 5%;">
                                <a href="#" 
                                   data-toggle="modal" data-target="#trip"
                                   class="btn btn-sm style4"
                                   style="height:10%;font-weight: bold;padding: 1%;margin-right: 5%;margin-bottom: 5%;margin-top: -8%;">
                                 <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
                                 <strong>{{trans('front/responsive.crear')}}</strong>
                                </a>
                                <br>
                            </div>

                            </div>
                    </div>
                </div>                             
        @endforeach
       
      
        </div>
    </div>





    
    
 
  
@section('scripts')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
{!! HTML::script('/js/tabla_dinamica.js') !!}
{!! HTML::script('/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('/js/jsModal/basic.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}


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
    
    <?php $header = "/img/portada_face_iwanatrip_04.jpg";?>
  <script>


jQuery(document).ready(function ($) {
   $(".page-title-container.style3").css('backgroundImage','url({!!$header!!})');
});
  

</script>
    @endif
    

<!-- Modal hotel-->
<div class="modal fade" id="hotel" tabindex="-1" role="dialog">
    
         {!! Form::open(['url' => route('upload-postusuarioserviciosmini1'),  'id'=>'newServicio']) !!}   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div id="testboxForm" class="hotel">
                  <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarservicio')}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="rowerrorM"> </div>
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="2">
          <div class="form-group">
            {!!Form::label('nombre_1', 'Nombre', array('id'=>'iconFormulario-step2-popup'))!!}
            <input type="text" name="nombre_servicio" id="nombrehotel" class="input-text full-width" placeholder="Nombre del servicio"/>
          </div>
          <div class="form-group">
            {!!Form::label('detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea class="input-text full-width" name="detalle_servicio" id="detallehotel" placeholder="Incluye equipos, incluye almuerzo, no incluye bicicletas, etc" style="resize:none;"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> {{trans('front/responsive.cerrar')}} </button>
        <button type="button" id="btnsubm" class="btn btn-medium style1"
                onclick="AjaxContainerRegistroWithLoad1('newServicio','hotel')"> {{trans('front/responsive.siguiente')}} </button>
      </div>
            
        </div>  

    </div>
  </div>
  {!! Form::close() !!}  
  
  <script>
  $(document).ready(function() {
    var $submit = $("#btnsubm"),
        $inputs = $('#nombrehotel, #detallehotel');

    function checkEmpty() {
        return $inputs.filter(function() {
            return !$.trim(this.value);
        }).length === 0;
    }

    $inputs.on('blur', function() {
        $submit.prop("disabled", !checkEmpty());
    }).blur();
});

</script>
     

</div>
  
  
<!-- Modal restaurant-->
<div class="modal fade" id="restaurant" tabindex="-1" role="dialog">
    
         {!! Form::open(['url' => route('upload-postusuarioserviciosmini2'),  'id'=>'newServicio1']) !!}   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div id="testboxForm" class="restaurant">
                  <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarservicio')}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="rowerrorM"> </div>
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="1">
          <div class="form-group">
            {!!Form::label('nombre_1', 'Nombre', array('id'=>'iconFormulario-step2-popup'))!!}
            <input type="text" name="nombre_servicio" id="nombrerestaurant" class="input-text full-width" placeholder="Nombre del servicio"/>
          </div>
          <div class="form-group">
            {!!Form::label('detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea class="input-text full-width" name="detalle_servicio" id="detallerestaurant" placeholder="Incluye equipos, incluye almuerzo, no incluye bicicletas, etc" style="resize:none;"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('front/responsive.cerrar')}}</button>
        <button type="button" id="btnsubm1" class="btn btn-medium style1"
                onclick="AjaxContainerRegistroWithLoad1('newServicio1','restaurant')">{{trans('front/responsive.siguiente')}}</button>
      </div>
            
        </div>  

    </div>
  </div>
  {!! Form::close() !!}  
  
  <script>
  $(document).ready(function() {
    var $submit1 = $("#btnsubm1"),
        $inputs1 = $('#nombrerestaurant, #detallerestaurant');

    function checkEmpty1() {
        return $inputs1.filter(function() {
            return !$.trim(this.value);
        }).length === 0;
    }

    $inputs1.on('blur', function() {
        $submit1.prop("disabled", !checkEmpty1());
    }).blur();
});

</script>
     

</div>

<!-- Modal Trip-->
<div class="modal fade" id="trip" tabindex="-1" role="dialog">
    
         {!! Form::open(['url' => route('upload-postusuarioserviciosmini3'),  'id'=>'newServicio2']) !!}   
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div id="testboxForm" class="trip">
                  <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{trans('front/responsive.agregarservicio')}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="{{trans('front/responsive.cerrar')}}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="rowerrorM"> </div>
              <input type="hidden"  class="id_usuario_operador" name="id_usuario_operador" value="{!!session('operador_id')!!}">
              <input type="hidden" class='id_catalogo_servicio' name="id_catalogo_servicio" value="3">
          <div class="form-group">
            {!!Form::label('nombre_1', 'Nombre', array('id'=>'iconFormulario-step2-popup'))!!}
            <input type="text" name="nombre_servicio" id="nombretrip" class="input-text full-width" placeholder="Nombre del servicio"/>
          </div>
          <div class="form-group">
            {!!Form::label('detalle_1', 'Detalle', array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea class="input-text full-width" name="detalle_servicio" id="detalletrip" placeholder="Incluye equipos, incluye almuerzo, no incluye bicicletas, etc" style="resize:none;"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('front/responsive.cerrar')}}</button>
        <button type="button" id="btnsubm2" class="btn btn-medium style1"
                onclick="AjaxContainerRegistroWithLoad1('newServicio2','trip')">{{trans('front/responsive.siguiente')}}</button>
      </div>
            
        </div>  

    </div>
  </div>
  {!! Form::close() !!}  
  
  <script>
  $(document).ready(function() {
    var $submit2 = $("#btnsubm2"),
        $inputs2 = $('#nombretrip, #detalletrip');
        
    function checkEmpty2() {
        return $inputs2.filter(function() {
            return !$.trim(this.value);
        }).length === 0;
    }

    $inputs2.on('blur', function() {
        $submit2.prop("disabled", !checkEmpty2());
    }).blur();
});

</script>
     

</div>

@stop

@stop
