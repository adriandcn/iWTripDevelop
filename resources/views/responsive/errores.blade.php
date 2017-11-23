@extends('responsive.dashboard')
@section('content')

{!! HTML::script('js/jquery.js') !!}
<script>
$("#dashboard1").hide();        
$("#dashboard2").hide();    
$("#dashboard3").hide();
$("#dashboard4").hide();
$("#dashboard5").hide();
$("#dashboard6").hide();
$("#dashboard7").hide();
$("#dashboard8").hide();
$("#dashboard10").hide();
$("#dashboard11").hide();
$("#dashboard12").show();
</script>


         <div class="col-md-12 col-lg-12" id="target">
                
                <!-- <h4>{{trans('front/responsive.tituloformulario')}}</h4> -->
                <h4>Administracion de Errores</h4>
                
            <table class="table table-bordered" style="margin: auto;" id="example">
            <thead>
                <tr>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Nombre del Servicio </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Tipo de Error </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Nombre </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Email </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Telefono </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Fecha Creacion </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> IP Envio Error </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Dispositivo </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Estado </th>
                <th class="center" style="background-color: #ff6600 !important; color: white; font-weight: bold;"> Resuelto </th>
                
                </tr>
            </thead>    
                @foreach($erroresReportados as $error)
                <tr>
                <?php $nombreAtarccion = $error->id_usuario_servicio; $usuarioServicio = $error->servicio;?>    
                <td class="center">
                    <a href="{{ asset("/detalle/$usuarioServicio/$nombreAtarccion") }}"  onclick="$('#target').LoadingOverlay('show')"><?php echo $error->servicio; ?></a>
                </td>    
                <td class="center"><?php echo $error->tipo; ?></td>
                <td class="center"><?php echo $error->nombre; ?></td>
                <td class="center"><?php echo $error->email; ?></td>
                <td class="center"><?php echo $error->telefono; ?></td>
                <td class="center"><?php echo $error->fecha_creacion; ?></td>
                <td class="center"><?php echo $error->ip_envio_error; ?></td>
                <td class="center"><?php echo $error->dispositivo ; ?></td>
                <td class="center"><?php if($error->estado == 1){echo "Activo";} ?></td>
                <td class="center">
                    <input type="checkbox"  id='permanente' name="permanente" 
                               onchange="UpdateEstadoError('{!!asset('/updateEstadoError')!!}/{!!$error->id!!}')">
                    
                </td>
                
                
                </tr>
                @endforeach
            </table>
            </div> 

               
@section('scripts')
{!! HTML::script('js/jquery.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.js') !!}
{!!HTML::script('js/loadingScreen/loadingoverlay.min.js') !!}

<script type="text/javascript" src="{{ asset('public_components/js/main.js')}}"></script>


{!! HTML::style('css/DataTables/jquery.dataTables.min.css') !!}
{!! HTML::style('css/DataTables/buttons.dataTables.min.css') !!}
{!! HTML::style('css/DataTables/responsive.dataTables.min.css') !!}

{!!HTML::script('js/DataTables/jquery.dataTables.min.js') !!}
{!!HTML::script('js/DataTables/dataTables.buttons.min.js') !!}
{!!HTML::script('js/DataTables/buttons.print.min.js') !!}
{!!HTML::script('js/DataTables/buttons.html5.js') !!}
{!!HTML::script('js/DataTables/buttons.flash.js') !!}
{!!HTML::script('js/DataTables/buttons.bootstrap.min.js') !!}

{!!HTML::script('js/DataTables/dataTables.responsive.min.js') !!}
{!!HTML::script('js/DataTables/dataTables.select.min.js') !!}
{!!HTML::script('js/pdfMake/pdfmake.min.js') !!}
{!!HTML::script('js/pdfMake/vfs_fonts.js') !!}
{!!HTML::script('js/pdfMake/jszip.min.js') !!}

             	<script>
$(document).ready(function() {
    $('#example').DataTable( {
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
        },
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
               {
                extend: 'excelHtml5',
                title: 'Administracion de Errores IWannaTrip',
                header: true,
                },
                {
                  extend: 'pdf',
                  title: 'Administracion de Errores IWannaTrip',
                  orientation: 'landscape',
                  pageSize: 'A4',
                  pageMargins: [ 0, 0, 0, 0 ],
                  
                },
              'print'
        ]
    } );
} );
</script>   
        
@stop



@stop