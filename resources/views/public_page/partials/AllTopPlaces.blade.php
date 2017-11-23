@section('topPlaces')	
<div id="x1">

    
    @if(isset($topEventsIndividual))
    
     @foreach ($topEventsIndividual as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

                                
                                @if($cat->id_region==1)
                                <div class="iso-item filter-all filter-website TopPlace  filter-costa" >
                                    @elseif($cat->id_region==2)
                                <div  class="iso-item filter-all filter-website TopPlace  filter-sierra" >
                                    @elseif($cat->id_region==3)
                                <div class="iso-item filter-all filter-website TopPlace  filter-oriente" >
                                        @elseif($cat->id_region==4)
                                <div  class="iso-item filter-all filter-website TopPlace  filter-galapagos" >
                                @endif
    
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                                        <br>
                    
<img style="width:40px" src="{{ asset('public/img/events.png')}}" title="Turismo" alt="turismo"> 


                    <?php $date = date_create($cat->fecha_ingreso);
                                    $date2 = date_create($cat->fecha_fin);
                                                             ?>
                              <span class="comment-date" style="color: #EB5D5E">{!!date_format($date, 'j F ')!!}-{!!date_format($date2, 'j F ')!!}</span>


            </div>
        </article>
    </div>



@endforeach   
    
    @endif
    
    @if(isset($topEvents))
    
    
     @foreach ($topEvents as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_evento);
$nombre = str_replace('/', '-', $nombre);
?>

                                
                                @if($cat->id_region==1)
                                <div class="iso-item filter-all filter-website TopPlace  filter-costa" >
                                    @elseif($cat->id_region==2)
                                <div  class="iso-item filter-all filter-website TopPlace  filter-sierra" >
                                    @elseif($cat->id_region==3)
                                <div class="iso-item filter-all filter-website TopPlace  filter-oriente" >
                                        @elseif($cat->id_region==4)
                                <div  class="iso-item filter-all filter-website TopPlace  filter-galapagos" >
                                @endif
    
        <article class="post">

            <a href="{!!asset('/detalleEvento/atraccion/')!!}/{!!$nombre!!}/{!!$cat->id_evento!!}"  onclick="" class="product-image">
                
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalleEvento/atraccion/')!!}/{!!$nombre!!}/{!!$cat->id_evento!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    
<img style="width:50px" src="{{ asset('public/img/events.png')}}" title="Turismo" alt="turismo"> 


                    <?php $date = date_create($cat->fecha_desde);
                                    $date2 = date_create($cat->fecha_hasta);
                                                             ?>
                              <span class="comment-date" style="color: #EB5D5E">{!!date_format($date, 'j F ')!!}-{!!date_format($date2, 'j F ')!!}</span>
                    


            </div>
        </article>
    </div>



@endforeach   
    @endif
    
    
    @if(isset($topPlacesCosta))
    
    @foreach ($topPlacesCosta as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    
        
                                @if($cat->id_region==1)
                                <div class="iso-item filter-all filter-website   filter-costa" >
                                    @elseif($cat->id_region==2)
                                <div  class="iso-item filter-all filter-website   filter-sierra" >
                                    @elseif($cat->id_region==3)
                                <div class="iso-item filter-all filter-website   filter-oriente" >
                                        @elseif($cat->id_region==4)
                                <div  class="iso-item filter-all filter-website   filter-galapagos" >
                                    @else
                                    <div  class="iso-item filter-all filter-website  " >
                                    
                                @endif
        
        
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price filter-oriente" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>

                        @if($cat->id_catalogo_servicio==1)
                                <img style="width:40px" src="{{ asset('public/img/register/1.png')}}" title="eatDrink" alt="eatDrink"> 
                                
                                 <span class="product-price" ><span class="currency-symbol"></span>
                        
                        
                        Eat & Drink</span>
                                
                                    @elseif($cat->id_catalogo_servicio==2)
                                <img style="width:40px" src="{{ asset('public/img/register/2.png')}}" title="Sleep" alt="Sleep">
                                
                                <span class="product-price" ><span class="currency-symbol"></span>
                        
                        
                        Sleep</span>
                                    @elseif($cat->id_catalogo_servicio==3)
                                <img src="{{ asset('public/img/ic_serv/centro_turistico.png')}}" title="Turismo" alt="turismo">
                                <span class="product-price" ><span class="currency-symbol"></span>
                        
                        
                        Tour Operator</span>
                                
                                     @elseif($cat->id_catalogo_servicio==9)
                                <img style="width:50px"  src="{{ asset('public/img/ic_serv/festividades.png')}}" title="Festividades" alt="turismo">
                                <span class="product-price" ><span class="currency-symbol"></span>
                       

                        
                        Festividades</span>
                                    <?php $date = date_create($cat->ingreso);
                                    $date2 = date_create($cat->fecha_fin);
                                                             ?>
                              <span class="comment-date" style="color: #EB5D5E">{!!date_format($date, 'j F ')!!}-{!!date_format($date2, 'j F ')!!}</span>
                    
                                
                                        @else
                                <img src="{{ asset('public/img/ic_serv/centro_turistico.png')}}" title="Turismo" alt="turismo">
                                <span class="product-price" ><span class="currency-symbol"></span>
                        
                        
                        Turism</span>
                                @endif
                    

                   


            </div>
        </article>
    </div>



@endforeach   


@endif
           

@if(isset($topPlacesSierra))

@foreach ($topPlacesSierra as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website filter-all filter-sierra">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>Turismo</span>


            </div>
        </article>
    </div>



@endforeach  
 @endif                               
                                
       @if(isset($topPlacesOriente))             

@foreach ($topPlacesOriente as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website filter-all filter-oriente">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>Turismo</span>


            </div>
        </article>
    </div>



@endforeach  
       @endif            


       @if(isset($topPlacesGalapagos))
@foreach ($topPlacesGalapagos as $cat)


<?php
$nombre = str_replace(' ', '-', $cat->nombre_servicio);
$nombre = str_replace('/', '-', $nombre);
?>

    <div class="iso-item filter-all filter-website filter-all filter-galapagos">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="" class="product-image">
                <img src="{{ asset('images/icon/'.$cat->filename)}}" alt="{!!$cat->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$cat->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$cat->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>{{$cat->nombre}}</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>Turismo</span>


            </div>
        </article>
    </div>



@endforeach  
          @endif                      
                                
                                
                                
                                
                            
                                </div>   
                                    
                                @endsection
                                