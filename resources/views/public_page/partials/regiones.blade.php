@section('regiones')	
 

@if($location->city!="")
<?php
$titulo=$location->city;
?>
@else
$titulo="Ecuador";
@endif
     
     

        
                
                    <h2 class="section-title">{{ trans('publico/labels.masvisitados')}}{!!$titulo!!} </h2>
                    
      <div class="container">
                <div id="main">
                    <div class="post-wrapper">
                        <div class="post-filters">
                            <a href="#" class="btn btn-sm style4 hover-blue active" data-filter="filter-all">Todos</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-logo">Costa</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-business">Sierra</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-website">Oriente</a>
                            <a href="#" class="btn btn-sm style4 hover-blue" data-filter="filter-website">Galápagos</a>
                        </div>
                        <div class="iso-container iso-col-4 style-masonry">
                            <div class="iso-item double-width filter-all filter-logo">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="{{ asset('images/icon/5709-08-2015-23.jpg')}}">
                                        <img src="{{ asset('images/fullsize/5709-08-2015-23.jpg')}}" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="{{ asset('images/fullsize/5709-08-2015-25.jpg')}}">
                                        <img src="{{ asset('images/icon/5709-08-2015-25.jpg')}}" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/780x535">
                                        <img src="http://placehold.it/780x535" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/500x665">
                                        <img src="http://placehold.it/500x665" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/457x533">
                                        <img src="http://placehold.it/457x533" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website filter-business">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/496x800">
                                        <img src="http://placehold.it/496x800" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/551x534">
                                        <img src="http://placehold.it/551x534" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website filter-business filter-logo">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/800x569">
                                        <img src="http://placehold.it/800x569" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/510x507">
                                        <img src="http://placehold.it/510x507" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-business filter-logo">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/475x534">
                                        <img src="http://placehold.it/475x534" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/551x534">
                                        <img src="http://placehold.it/551x534" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/678x500">
                                        <img src="http://placehold.it/678x500" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                            <div class="iso-item filter-all filter-website">
                                <article class="post">
                                    <a class="image soap-mfp-popup hover-style3" href="http://placehold.it/780x394">
                                        <img src="http://placehold.it/780x394" alt="">
                                        <span class="image-extras"></span>
                                    </a>
                                </article>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn style4 hover-blue load-more">Load More</a>
                        </div>
                    </div>
                </div>
            </div>

<script>

$( ".post-wrapper" ).toggleClass( "isotope-active" );
$( "#regionesprov").toggleClass( "isotope-active" );
</script>

                        
         
@endsection
