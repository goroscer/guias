<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Guía 2.0 - Usuarios</title>
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
                     <h4 class="page-title">Sistema de Administración</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <a href="{{ url('/close') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">SALIR DEL SISTEMA</a>
                     <ol class="breadcrumb">
                        
                        <!--<li><a href="{{ url('/forms') }}">Historial de Guías</a></li>-->
                        
                        @if($type == 'Rentas ADM' OR $type == 'WebMaster')

                            <li class="active"><a href="{{ url('/users') }}">Administrar Usuarios del Sistema</a></li>
                            
                        @endif
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="white-box">
                        <h3 class="box-title m-b-0">Envio</h3>
                     <form method="POST" action="{{ url('/forms') }}/cycle/{{$form->id}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                                <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;"> Datos</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label col-md-3">N° Solicitud</label>
                                         <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" value="{{ $form->id+6000 }}" disabled>
                                         </div>
                                      </div>
                                   </div>

                                   <!--/span-->
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label col-md-3">Receptoría a enviar</label>
                                         <div class="col-md-9">
                                            <select class="form-control" name="office" required>
                                                <option value="">Selecione una</option>  


                                                @if($office == 'Subdirección de Asuntos Juridicos')
                                                
                                                @if($user->office != 'Secretaria General')<option>Secretaria General</option>@endif
                                                @if($user->office != 'Jefe de Dpto')<option>Jefe de Dpto</option>@endif
                                                
                                                @endif
                                                

                                                @if($office == 'Secretaria General')
                                                
                                                @if($user->office != 'Jefe de Dpto')<option>Jefe de Dpto</option>@endif
                                                @if($user->office != 'Subdirección de Asuntos Juridicos') <option>Subdirección de Asuntos Juridicos</option> @endif


                                                @endif



                                                @if($office == 'Controladores')
                                                
                                                @if($user->office != 'Área Legal') <option>Área Legal</option>@endif
                                                @if($user->office != 'Jefe de Dpto') <option>Jefe de Dpto</option>@endif

                                                @endif


                                                @if($office == 'Área Legal')
                                                
                                                @if($user->office != 'Controladores') <option>Controladores</option>@endif
                                                @if($user->office != 'Jefe de Dpto') <option>Jefe de Dpto</option>@endif

                                                @endif



                                                @if($office == 'Jefe de Dpto')
                                                

                                                @if($user->office != 'Controladores') <option>Controladores</option>@endif

                                                @if($user->office != 'Área Legal') <option>Área Legal</option>@endif

                                                @if($office != 'Secretaria General' ) <option>Secretaria General</option> @endif

                                                @if($user->office != 'Subdirección de Asuntos Juridicos') <option>Subdirección de Asuntos Juridicos</option> @endif

                                                @if($user->office != 'Jefe de Dpto') <option>Jefe de Dpto</option>@endif
                                                
                                                @endif






                                            </select>
                                         </div>
                                      </div>
                                   </div>
                                   <!--/span-->
                                </div>
 
      
                                <hr class="m-t-0 m-b-40">


                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label col-md-3">Dictamen</label>
                                         <div class="col-md-9">
                                            <textarea class="form-control" placeholder="Todo se encuentra correctamente" name="comment" required></textarea>
                                         </div>
                                      </div>
                                   </div>
                                   <!--/span-->











                                <div class="form-actions">
                                        <div class="row" style="margin-top: 70px">
                                           <div class="col-md-12">
                                              <div class="row">
                                                 <div class="col-md-offset-12 col-md-6">
                                                    <button type="button" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px;">Limpiar Formulario</button>
                                                 </div>
                                                 <div class="col-md-offset-12 col-md-6">
                                                    <button type="submit" class="btn btn-success" style="width: 100%; margin-bottom:20px;width: 100%; margin-bottom: 20px; background: #9aca3c; height: 51px; font-size: 17px; border: none !important; height: 51px; font-size: 17px;">Enviar Formulario</button>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>

                            </form>





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