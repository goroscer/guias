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
                     <h4 class="page-title">Sistema de Usuarios</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <a href="{{ url('/close') }}" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">SALIR DEL SISTEMA</a>
                     <ol class="breadcrumb">
                        

                        @if($type == 'WebMaster')
                            <!--<li><a href="{{ url('/forms') }}">Historial de Guías</a></li>-->
                            <li class="active"><a href="{{ url('/users') }}">Administrar Usuarios del Sistema</a></li>
                        @else


                        <!--<li><a href="{{ url('/forms_i') }}">Historial de Guías</a></li>-->

                        @endif
                        <li><a href="{{ url('/user') }}">Modificar Usuario</a></li>
                     </ol>
                  </div>
               </div>


               <center>

  
                  @if($type == 'Rentas ADM' OR $type == 'WebMaster')

  
                      <button type="button" onclick="window.location.href ='{{ url('/receptorias') }}'" class="btn btn-default"><span class="glyphicon glyphicon-tag"></span><a style="color:black" > Receptorías</a></button>
                      
                  @endif
                      <button type="button" onclick="window.location.href ='{{ url('/export') }}'" class="btn btn-default"><span class="glyphicon glyphicon-download-alt"></span><a style="color:black" > Exportar guías</a></button>
  
              
              
              </center>



               <div class="row">
                  <div class="col-sm-12">
                     <div class="white-box">
                        <h3 class="box-title m-b-0">Listado de Productos </h3>
                        
                        <center><button type="button" onclick="window.location.href ='{{ url('/products/create') }}'" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span><a style="color:black" > Añadir</a></button></center>


                        <div class="table-responsive">
                           <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                              <thead>
                                 <tr>

                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Unidad</th>
                                    <th>TRS</th>
                                    <th>Categoría</th>
                                    <th>Cambiar Datos</th>

                                 </tr>
                              </thead>
                              <tbody>

                                 @foreach($products as $product)



                                 <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ number_format($product->trs, 2, ',', '.') }}</td>
                                        <td>{{ $product->cate }}</td>

                                        <td>
                                            
                                            <button type="button" onclick="window.location.href = '{{ url('products') }}/{{$product->id}}/edit'" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Editar Datos"><i class="ti-settings" aria-hidden="true"></i></button>
                                    
                                            <a onclick="confirmDelete({{$product->id}})"> <span style="color: grey;" class="glyphicon glyphicon-trash" title="Delete"></a>
                                        </td>
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

         $('#example23').DataTable({
            "displayLength": 10
         });
      </script>
      <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')

      <script>


         function confirmDelete(id){
 
             swal({
                 title: '¿Esta usted seguro?',
                  text: "Este proceso no puede ser revertido!",
                  type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Borrar!',
                    cancelButtonText: 'Cancelar'
 
                 }).then((result) => {
                     if (result.value) {
                         $.ajax({
                             data: {
                                 "_token": "{{ csrf_token() }}"
                             },
                             type: "DELETE",
                             url: '{{ url('products') }}/'+id,
                             success: function(affectedRows) {
 
                                 if (affectedRows > 0) window.location = "{{ url('products') }}";
                             }
                         });
                     }
 
                 })
 
         }
 





    
    
    
        </script>


    </body>
</html>