<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Guía 2.0 - Listado</title>
      <link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap.min.css">
      <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <style>
         
         th, td {
            white-space: nowrap;
            padding-left: 10px !important;
            padding-right: 10px !important;
         }
         div.dataTables_wrapper {
            width: 100%;
            margin: 0 auto;
         }
         .dataTables_processing {
            z-index: 1000;
         }
      </style>
   </head>
   <body class="fix-sidebar">
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <div id="wrapper">
         <style>.white-box { background: #fff; margin-bottom: 15px; padding: 24px !important; }.jsgrid-grid-body{min-height: 1900px !Important;}#basicgrid {height: auto !Important;}div.dt-buttons { position: relative; float: left; display: none !important; }table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_desc_disabled { padding-left: 10px !important; font-weight: 400 !important; }</style>
         <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header" style="background-color:#0C7AFF !important">
               <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
               <div class="top-left-part" style="background-color:#0C7AFF !important"><a class="logo" href="{{ url('/forms') }}"><b><img src="{{ asset('images/provincia.png') }}" alt="home" style="max-width: 31px;" /></b><span class="hidden-xs"><strong>Guías</strong>Web</span></a></div>
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
                     <h4 class="page-title">Consulta Guías Contribuyente</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">


                  </div>
               </div>

               
               <div class="row">
                <div class="col-sm-12">
                   <div class="white-box">
                      <h3 class="box-title m-b-0">Listado de Guías </h3>
                      <span href="#">Recomendamos configuración de pantalla minima de 1600px, caso contrario, recomendamos disminuir <br>el zoom del navegador, para una mejor visualización de la tabla informativa</span>
                      <div class="table-responsive">
                         <table id="myTable" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                    <th>Acciones</th>
                                    <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                    <th>Guía - Pago - Adjunto</th>
                                    <th>Estado</th>
                                    
                                    <th>Operación</th>
                                    <th>Origen</th>
                                    <th>Destino</th>

                                    <th>Generador</th>
                                    <th>Razón Social</th>

                                    <th>Productor</th>

                                    <th>Intermediario</th>
                                    <th>Destinatario</th>
                                    <th>Transportista</th>
                                    <th>Detalle</th>
                                    <th>Fecha</th>
                                    <th>Receptoría</th>

                               </tr>
                            </thead>

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

      $('#example23').DataTable({
         "aoColumnDefs": [
                 { "bSearchable": false, "aTargets": [ 9 ] }
                     ], 
         "order": [
             [1, 'desc']
                  ],
         "iDisplayLength": 10,
         "aLengthMenu": [5, 10, 25, 50, 100]
      });
   </script>


<script>
      $(document).ready(function () {

          $('#myTable').DataTable({
            scrollY:        "100%",
               scrollX:        true,
               scrollCollapse: true,
               fixedColumns:   true,
          "aLengthMenu": [10, 25, 50, 100],
          "bFilter": false,
             "order": [[ 1, "desc" ]],
              "dom": 'Blfr<"button">tip',
              buttons: [
                  {
                      extend: 'excel',
                      text: 'Exportar como Excel',
                      exportOptions: {
                          columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 16 ]
                      }
                  },
                  {
                      extend: 'pdfHtml5',
                      text: 'Exportar a PDF',
                      orientation: 'landscape',
                      exportOptions: {
                         columns: [ 0, 1, 2, 3, 4, 5, 6, 11, 12, 13, 14, 16 ]
                      }
                  }

              ],
            "processing": true,
            "language": {
                 "processing": "Cargando..."
              },
            "serverSide": true,
              "ajax":{
                       "url": "{{ url('/formsrecords_q') }}",
                       "dataType": "JSON",
                       "type": "POST",
                       "data":{ _token: "{{csrf_token()}}",
                                  cuit: "{{ $cuit }}",
                                  tokennro : "{{ $tokennro }}",
                              }
                     },
              "columns": [
                  { "data": "pay" },
                  { "data": "id" },
                  { "data": "created_at" },
                  { "data": "r5" },
                  { "data": "links" },
                  { "data": "estatus" },
                  
                  { "data": "tipo" },
                  { "data": "origen_l" },
                  { "data": "final_p" },
  
                  { "data": "cuit" },
                  { "data": "rs" },
  
                  { "data": "cuit1" },
                  { "data": "cuit2" },
                  { "data": "cuit3" },
                  { "data": "cuit4" },
  
                  { "data": "d_trans" },
                  
                  { "data": "updated_at" },
                  { "data": "receptoria" },
                  
              ]
  
          });

      var tableX = $('#myTable').DataTable();
      tableX.button(0).nodes().css('background', 'green');
      var last;
         $('#myTable tbody').on('click', 'tr', function () {
            $(last).toggleClass('selected');
            $(this).toggleClass('selected');
            last = this;
         });
  
      });
  
      
  
  </script>
  



    <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

    @include('sweet::alert')


    <script>

      var perfEntries = performance.getEntriesByType("navigation");

      if (perfEntries[0].type === "back_forward") {
          location.reload(true);
      }
      
  </script>


  </body>
</html>