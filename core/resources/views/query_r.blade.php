<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Guía 2.0 - Listado</title>
      <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   </head>
   <body class="fix-sidebar">
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <div id="wrapper">
         <style>.white-box { background: #fff; margin-bottom: 15px; padding: 24px !important; }.jsgrid-grid-body{min-height: 1900px !Important;}#basicgrid {height: auto !Important;}div.dt-buttons { position: relative; float: left; display: none !important; }table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_desc_disabled { padding-left: 10px !important; font-weight: 400 !important; }</style>
         <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header" style="    background-color: #9ACA3C;">
               <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
               <div class="top-left-part"><a class="logo" href="{{ url('/forms') }}"><b><img src="http://jbosolutions.com/works/arba/wp-content/uploads/2017/07/Escudo_de_la_Provincia_de_Santiago_del_Estero.png" alt="home" style="max-width: 31px;" /></b><span class="hidden-xs"><strong>Exentos</strong>Web</span></a></div>
               <ul class="nav navbar-top-links navbar-left hidden-xs">     
               </ul>
               <ul class="nav navbar-top-links navbar-right pull-right">
                  </li>
                  </li>
                  
               </ul>
            </div>
         </nav>
         <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Sistema de Administración</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <a href="{{ url('/consulta') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Volver</a>
                     <ol class="breadcrumb">
                        
                    </ol>
                  </div>
               </div>

               
               <div class="row">
                  <div class="col-sm-12">
                     <div class="white-box">
                        <h3 class="box-title m-b-0">Listado de Excenciones </h3>
                        <span href="#">Recomendamos configuración de pantalla minima de 1600px, caso contrario, recomendamos disminuir <br>el zoom del navegador, para una mejor visualización de la tabla informativa</span>
                        <div class="table-responsive">
                           <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th>N° Solicitud</th>
                                    <th>F.Pedido</th>
                                    <th>Período</th>
                                    <th>CUIT</th>
                                    <th>Razón Social</th>
                                    <th>Estado - N° Resolución</th>
                                    <th>Form - Constancia</th>
                                    <th>Adjuntos</th>
                                    <th>Asignado a</th>

                                 </tr>
                              </thead>
                              <tbody>

                                @foreach($forms as $form)

                                @if($form->created_at == $form->updated_at)
                                    @php
                                        $mod = '';
                                    @endphp

                                @else
                                    @php 
                                        $mod = $form->updated_at;
                                    
                                    @endphp
                                @endif
                                @if(empty($form->resolucion) OR $form->estatus != 'Aprobado')
                                    @php
                                        $r = '';
                                    @endphp
                                @else
                                    @php 
                                        $r = ' - '.$form->resolucion;
                                    
                                    @endphp
                                @endif
                                @if($form->estatus == 'Denegado')
                                    @php
                                        $r = ' - '.$form->comment;
                                    @endphp
                                @endif
                                @php
                                    $e_id = base64_encode(base64_encode($form->id+6000));

                                    $p1 = date('Y', strtotime($form->created_at));
                                    $p2 = $p1+1;
                                @endphp
                                <tr>
                                        <td>{{ $form->id+6000 }}</td>
                                        <td>{{ $form->created_at }}</td>
                                        <td>{{$p1}}-{{$p2}}</td>
                                        <td>{{ $form->cuit }}</td>
                                        <td>{{ $form->name }}</td>
                                        
                                        <td><code style="color: #2196F3;">{{ $form->estatus }}</code>{{ $r }}</td>
                                        
                                        <td><button type="button" onclick="window.open('{{ url('forms/print') }}/{{base64_encode($form->id.'-print-'.$form->id)}}')" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Descargar PDF"><i class="ti-file" aria-hidden="true"></i></button>@if($form->estatus == 'Aprobado' AND !empty($form->resolucion)) - <button type="button" onclick="window.open('{{ url('forms/cons') }}/{{base64_encode($form->id.'-cons-'.$form->id)}}')" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Descargar Constancia"><i class="ti-file" aria-hidden="true"></i></button>@endif</td>

                                        <td><button type="button" onclick="window.location.href = '{{ url('forms/archives') }}/{{ $e_id }}'" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Descargar Archivos"><i class="ti-download" aria-hidden="true"></i></button></td>
                                        <td>{{ $form->user }}</td>
                                    
                                     </tr>

                                @endforeach
 
                                





                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <p style="text-align: center; color: white; margin-top: 56px;font-size: 12px;"><a href="http://www.intelsantiago.com.ar" style="    text-decoration: none;"> Desarrollado por INTELSGO </a></p>
         </div>
      </div>
      <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('bootstrap/dist/js/tether.min.js') }}"></script>
      <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
      <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
      <script src="{{ asset('js/waves.js') }}"></script>
      <script src="{{ asset('js/custom.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
      <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
      <script>
         $(document).ready(function() {
             $('#myTable').DataTable();
             $(document).ready(function() {
                 var table = $('#example').DataTable({
                     "columnDefs": [{
                         "visible": false,
                         "targets": 2
                     }],
                     "order": [
                         [2, 'asc']
                     ],
                     "displayLength": 25,
                     "drawCallback": function(settings) {
                         var api = this.api();
                         var rows = api.rows({
                             page: 'current'
                         }).nodes();
                         var last = null;
         
                         api.column(2, {
                             page: 'current'
                         }).data().each(function(group, i) {
                             if (last !== group) {
                                 $(rows).eq(i).before(
                                     '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                 );
         
                                 last = group;
                             }
                         });
                     }
                 });
         
                 // Order by the grouping
                 $('#example tbody').on('click', 'tr.group', function() {
                     var currentOrder = table.order()[0];
                     if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                         table.order([2, 'desc']).draw();
                     } else {
                         table.order([2, 'asc']).draw();
                     }
                 });
             });
         });
         $('#example23').DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ]
         });
      </script>
      <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')

    </body>
</html>