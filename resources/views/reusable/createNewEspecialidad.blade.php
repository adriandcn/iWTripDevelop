  <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: 'textarea#descripcion_especialidad1',
    auto_focus: 'descripcion_especialidad',
    editor_selector : "mceEditor",
    width: 400,
    height: 200,
    resize: false,
    menubar: false,
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent|  preview forecolor backcolor',
    content_css: [
    '//www.tinymce.com/css/codepen.min.css'
    ],
    theme: 'modern',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ]
    
  });
  
  </script>

<div style='display:none'>
                <img src="{!! asset('img/x.png')!!}" alt='' />
            </div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div class="rowerrorM">
</div>
<div id="testboxForm" class="testboxForm">
    <h1>{!!trans('registro/labels.label13')!!} </h1>
    
    {!! Form::open(['url' => route('postEspecialidad'),  'id'=>'especialidad-popup']) !!}
       <input type="hidden"  class="id_usuario_servicio" name="id_usuario_servicio">
    <!--<input type="hidden"  name="activo" value="true"> -->
       <input type="hidden"  name="id_catalogo_especialidad" value="1">
       
    <hr>
        <div class="form-group-step2-popup">
            {!!Form::label('nombre_1', trans('registro/labels.label14'), array('id'=>'iconFormulario-step2-popup'))!!}
            {!!Form::text('nombre_especialidad',NULL, array("title"=>"Es el nombre de la especialidad.",
            'class'=>'inputtext-step2-popup', 'placeholder'=>trans('registro/labels.label15')))!!}
        </div>
        <div class="form-group-step2-popup">
            {!!Form::label('Detalle_1', trans('registro/labels.label7'), array('id'=>'iconFormulario-step2-popup'))!!}
            <textarea id="descripcion_especialidad" title="Descripción del Evento Bookeable" style="display:inline-block;" 
                      name="descripcion_especialidad" class="ptm-popup" placeholder="Detalle Evento Bookeable"></textarea>
        </div>
        <input type="hidden"  name="activo" value="true">
   
        <div id="form-group-step2-popup">
            <div class="box-content-button-1">
                <a class="button-1" onclick="AjaxContainerRegistroWithLoad('especialidad-popup','simplemodal-wrap')" href="#">Siguiente</a>
            </div>              
        </div>
{!! Form::close() !!}

</div>

<script>
  $(function() {
    var tooltips = $( "[title]" ).tooltip({
      position: {
        my: "left top",
        at: "right+5 top-5"
      }
    });
   
  });
  </script>
