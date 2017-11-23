@section('topPlaces')	
<div id="x1">

@foreach ($topPlacesCosta as $region)
                                @if($region->id_region==1)
                                <div style=" margin-bottom: 0;" class="shortcode-banner style-animated iso-item TopPlace filter-all filter-costa" >
                                    <article class="post">
                                   <figure ><img src="{{ asset('public/images/icon/'.$region->filename)}}" alt="{!!$region->nombre_servicio!!}"></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        
                                        <?php
                        $nombre = str_replace(' ', '-', $region->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                                        
                                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$region->id!!}" ><h3 class="banner-title">{!!$region->nombre_servicio!!}</h3></a>
                                        
                                        
                                        
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                @endif

                                @endforeach
                                @foreach ($topPlacesSierra as $region)
                                @if($region->id_region==2)
                                <div style=" margin-bottom: 0;" class="shortcode-banner style-animated TopPlace iso-item filter-all filter-sierra" >
                                   <article class="post">
                                   <figure ><img src="{{ asset('public/images/icon/'.$region->filename)}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                    <?php
                        $nombre = str_replace(' ', '-', $region->nombre_servicio);
                        ?>
                                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$region->id!!}" ><h3 class="banner-title">{!!$region->nombre_servicio!!}</h3></a>
                                        
                                        
                                        
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                   
                                    </article>
                                </div>
                                @endif
                                @endforeach
                                @foreach ($topPlacesOriente as $region)
                                @if($region->id_region==3)
                                <div style=" margin-bottom: 0;" class="shortcode-banner style-animated TopPlace iso-item filter-all filter-oriente ">
                                   <article class="post">
                                   <figure ><img src="{{ asset('public/images/icon/'.$region->filename)}}" alt=""></figure>
                                     @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <?php
                        $nombre = str_replace(' ', '-', $region->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$region->id!!}" ><h3 class="banner-title">{!!$region->nombre_servicio!!}</h3></a>
                                        
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                 
                                    </article>
                                </div>
                                @endif
                                @endforeach
                                @foreach ($topPlacesGalapagos as $region)
                                @if($region->id_region==4)
                                <div style=" margin-bottom: 0;" class=" shortcode-banner style-animated TopPlace iso-item filter-all filter-galapagos">
                                   <article class="post">
                                   <figure ><img src="{{ asset('public/images/icon/'.$region->filename)}}" alt="">
                                   </figure> 
                                @if(session('device')!='mobile')
                                        <div class="shortcode-banner-inside" style=" width: 108%;">
                                            @else
                                            <div class="shortcode-banner-inside" style=" width: 112%;">
                                            @endif
                                    <div class="shortcode-banner-content">
                                        <?php
                        $nombre = str_replace(' ', '-', $region->nombre_servicio);
                        $nombre = str_replace('/', '-', $nombre);
                        ?>
                                        <a href="{!!asset('/detalle')!!}/{!!$nombre!!}/{!!$region->id!!}" ><h3 class="banner-title">{!!$region->nombre_servicio!!}</h3></a>
                                        <div class="details">
                                            <p>{!!$region->detalle_servicio!!}</p>
                                        </div>
                                    </div>
                                </div>
                                    
                                    </article>
                                </div>
                                @endif
                                @endforeach
                            
                                </div>   
                                    
                                @endsection
                                