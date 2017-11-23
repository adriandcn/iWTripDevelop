@extends('front.masterPageServicios')

@section('step1')

<div style='display:none'>
    <img src="{!! asset('public/img/x.png')!!}" alt='' />
</div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('public/img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div id="basic-modal-content" class="cls loadModal"></div>

<div class="rowerror">
</div>

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">
      

           
            <h2 class="head-title">
    I am            <strong>Admin</strong>
            </h2>
        </div>
        <div id="description-box-type">
            Detalle de cantones
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios')!!}'"> 
       <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 1 </strong></a>
               
            </h2>
    </div>
    
    
    
    <div id="space"></div>
    
{!! Form::open(['url' => route('postGeoLoc'),  'id'=>'postGeoLoc']) !!}
    <div class="wrapper uwa-font-aa">
          <div id='provincias'>
                    @section('provincias')
                    @show
                    
                </div>
        
        

    </div>
    {!! Form::close() !!}

          
<script>
  $.ajaxSetup({
                    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                });</script>


    
                
</div>


<script>
    $(document).ready(function () {
        
        GetDataAjaxProvincias("{!!asset('/getProvinciasCanton')!!}");
    });


$('#id_provincia').on('change', function() {
    var valor=this.value;
  $('#id_auxiliar').val(valor);
  
});
</script>

@stop