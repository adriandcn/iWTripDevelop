 @if(session('device')!='mobile')
<div class="page-title-container">               
 <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1360px; height: 235px; overflow: hidden; visibility: hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <!-- Loading Screen 
                        <div style="position:absolute;display:block;background:url("{!!asset('img/internas/loading.gif')!!}") no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                        -->
                    </div>


                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1360px; height: 235px; overflow: hidden;">
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-1.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-11.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-3.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-4.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-5.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-6.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-7.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-8.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-9.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-13.png')}}" />
                        </div>
                        <div data-p="112.50" style="display: none;">
                            <img data-u="image" src="{{ asset('img/internas/banner-15.png')}}" />
                        </div>
                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                        <!-- bullet navigator item prototype -->
                        <div data-u="prototype" style="width:16px;height:16px;"></div>
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>



                </div>

                @else
   <div class="page-title-container parallax style3"  data-stellar-background-ratio="0.5">
            <div class="page-title">
                <div class="container">
                    <h1 class="whitex">{!!$titulo!!}</h1>
                </div>
            </div>
            
        
               
                @endif