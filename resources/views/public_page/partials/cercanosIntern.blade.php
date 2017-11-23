@section('cercanos')	
<div class="TopPlace">
<!-Obtiene los cercanos a la parroquia->
@if(count($parroquia)>0 || $parroquia!=null)
@foreach ($parroquia as $catpr)


<?php
$nombrepa = str_replace(' ', '-', $catpr->nombre_servicio);
$nombrepa = str_replace('/', '-', $nombrepa);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombrepa!!}/{!!$catpr->id_usuario_servicio!!}"  onclick="" class="product-image">
                <img src="{{ asset('images/icon/'.$catpr->filename)}}" alt="{!!$catpr->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombrepa!!}/{!!$catpr->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catpr->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                            @if(isset($catpr->nombre))
                        </span>{{$catpr->nombre}}</span>
                @endif

                
              


                  <span class="product-price" ><span class="currency-symbol">
                        
                            
                              @if(isset($catpr->catalogo_nombre))
                        </span>{!!$catpr->catalogo_nombre!!}</span>
                @endif
                        
                            
                            <br>

                    @if(isset($catpr->distancia))
                      <span class="product-price" ><span class="currency-symbol">
                        
                               
                        </span> A <b> {!!$catpr->distancia!!} </b> KM</span>
                
                    @endif
            </div>
        </article>
    </div>



@endforeach   
@endif





<!-Obtiene los eventos cercanos a la parroquia->
@if(count($evntParroquia)>0 || $evntParroquia!=null)
@foreach ($evntParroquia as $catrr)


<?php
$nombreevpa = str_replace(' ', '-', $catrr->nombre_servicio);
$nombreevpa = str_replace('/', '-', $nombreevpa);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombreevpa!!}/{!!$catrr->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$catrr->filename)}}" alt="{!!$catrr->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombreevpa!!}/{!!$catrr->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catrr->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                            
                              @if(isset($catrr->nombre))
                        </span>{{$catrr->nombre}}</span>
                @endif

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol"></span>Event</span>


            </div>
        </article>
    </div>



@endforeach   
@endif




<!-Obtiene las promociones cercanos a la parroquia->
@if(count($prmoParroquia)>0 || $prmoParroquia!=null)
@foreach ($prmoParroquia as $catprom)


<?php
$nombreprompa = str_replace(' ', '-', $catprom->nombre_servicio);
$nombreprompa = str_replace('/', '-', $nombreprompa);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombreprompa!!}/{!!$catprom->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$catprom->filename)}}" alt="{!!$catprom->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombreprompa!!}/{!!$catprom->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catprom->nombre_promocion!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                            
                              @if(isset($catprom->nombre))
                        </span>{{$catprom->nombre}}</span>
                @endif

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol">
                        
                                @if(isset($catprom->catalogo_nombre))
                        </span>{!!$catprom->catalogo_nombre!!}</span>
                @endif
                        


            </div>
        </article>
    </div>



@endforeach   
@endif










<!-Obtiene las lugares cercanos al canton->
@if(count($canton)>0 || $canton!=null)
@foreach ($canton as $caton)


<?php
$nombrecan = str_replace(' ', '-', $caton->nombre_servicio);
$nombrecan = str_replace('/', '-', $nombrecan);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombrecan!!}/{!!$caton->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$caton->filename)}}" alt="{!!$caton->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombrecan!!}/{!!$caton->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$caton->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                            
                              @if(isset($caton->nombre))
                        </span>{{$caton->nombre}}</span>
                @endif

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol">
                        
                            
                              @if(isset($caton->catalogo_nombre))
                        </span>{!!$caton->catalogo_nombre!!}</span>
                @endif

      
                <br>
                  @if(isset($caton->distancia))
                      <span class="product-price" ><span class="currency-symbol">
                        
                               
                        </span> A <b> {!!$caton->distancia!!} </b> KM</span>
                
                    @endif

            </div>
        </article>
    </div>



@endforeach   
@endif








<!-Obtiene las eventos cercanos al canton->
@if(count($evntCanton)>0 || $evntCanton!=null)
@foreach ($evntCanton as $catevc)


<?php
$nombreevcan = str_replace(' ', '-', $catevc->nombre_servicio);
$nombreevcan = str_replace('/', '-', $nombreevcan);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombreevcan!!}/{!!$catevc->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$catevc->filename)}}" alt="{!!$catevc->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombreevcan!!}/{!!$catevc->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catevc->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                              @if(isset($catevc->nombre))
                        </span>{{$catevc->nombre}}</span>
                @endif

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol">
                        
                              @if(isset($catevc->catalogo_nombre))
                        </span>{!!$catevc->catalogo_nombre!!}</span>
                @endif


            </div>
        </article>
    </div>



@endforeach   
@endif


<!-Obtiene las promociones cercanos al canton->
@if(count($prmoCanton)>0 || $prmoCanton!=null)
@foreach ($prmoCanton as $catproc)


<?php
$nombreprocan = str_replace(' ', '-', $catproc->nombre_servicio);
$nombreprocan = str_replace('/', '-', $nombreprocan);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombreprocan!!}/{!!$catproc->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$catproc->filename)}}" alt="{!!$catproc->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombreprocan!!}/{!!$catproc->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catproc->nombre_promocion!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                              @if(isset($catproc->nombre))
                        </span>{{$catproc->nombre}}</span>
                @endif

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol">
                        
                              @if(isset($catproc->catalogo_nombre))
                        </span>{!!$catproc->catalogo_nombre!!}</span>
                @endif


            </div>
        </article>
    </div>



@endforeach   
@endif

                

<!-Obtiene las lugares cercanos al provincia->
@if(count($provincias)>0 || $provincias!=null)
@foreach ($provincias as $catprv)


<?php
$nombreprov = str_replace(' ', '-', $catprv->nombre_servicio);
$nombreprov = str_replace('/', '-', $nombreprov);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombreprov!!}/{!!$catprv->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$catprv->filename)}}" alt="{!!$catprv->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombreprov!!}/{!!$catprv->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catprv->nombre_servicio!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol">
                              
                              @if(isset($catprv->nombre))
                        </span>{{$catprv->nombre}}</span>
                @endif

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol">
                        
                                @if(isset($catprv->catalogo_nombre))
                        </span>{!!$catprv->catalogo_nombre!!}</span>
                @endif

                <br>
                  @if(isset($catprv->distancia))
                      <span class="product-price" ><span class="currency-symbol">
                        
                               
                        </span> A <b> {!!$catprv->distancia!!} </b> KM</span>
                
                    @endif

            </div>
        </article>
    </div>



@endforeach   
@endif
                        
                        
                        




<!-Obtiene las eventos cercanos al provincia->
@if(count($evntProvincia)>0 || $evntProvincia!=null)
@foreach ($evntProvincia as $catep)


<?php
$nombreevpro = str_replace(' ', '-', $catep->nombre_servicio);
$nombreevpro = str_replace('/', '-', $nombreevpro);
?>

    <div class="iso-item filter-all filter-website ">
        <article class="post">

            <a href="{!!asset('/detalle')!!}/{!!$nombreevpro!!}/{!!$catep->id_usuario_servicio!!}"  onclick="$('.categorias1').LoadingOverlay('show');" class="product-image">
                <img src="{{ asset('images/icon/'.$catep->filename)}}" alt="{!!$catep->nombre_servicio!!}">
                <span class="image-extras"></span>
            </a>
            <div class="portfolio-content">

                <h5 class="portfolio-title"><a href="{!!asset('/detalle')!!}/{!!$nombreevpro!!}/{!!$catep->id_usuario_servicio!!}"  onclick="$('.container').LoadingOverlay('show');">{!!$catep->nombre_evento!!}</a></h3>


                    <span class="product-price" style=" color: #eb3b50;
                          float: left;
                          font-size: 1.3333em;
                          font-weight: 600;
                          margin-right: 8px;" ><span class="currency-symbol"></span>Eventos</span>

                    <br>
                    <br>


                    <span class="product-price" ><span class="currency-symbol">
                        
                                @if(isset($catep->catalogo_nombre))
                        </span>{!!$catep->catalogo_nombre!!}</span>
                @endif


            </div>
        </article>
    </div>



@endforeach   
@endif

                                                
                        
</div>
@endsection
