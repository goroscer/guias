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

                @if($type == 'Rentas ADM' OR $type == 'WebMaster' OR $type == 'Rentas Común')
                    <button type="button" onclick="window.location.href ='{{ url('/forms') }}'" class="btn btn-default"><span class="glyphicon glyphicon-th-list"></span><a style="color:black" > Guías (Generales)</a></button>

                @endif
                
                @if($type == 'Rentas ADM' OR $type == 'WebMaster' )

                    <button type="button" onclick="window.location.href ='{{ url('/products') }}'" class="btn btn-default"><span class="glyphicon glyphicon-tag"></span><a style="color:black" > Productos</a></button>

                    <button type="button" onclick="window.location.href ='{{ url('/receptorias') }}'" class="btn btn-default"><span class="glyphicon glyphicon-tag"></span><a style="color:black" > Receptorías</a></button>
                    
                @endif
                

                    <button type="button" onclick="window.location.href ='{{ url('/export') }}'" class="btn btn-default"><span class="glyphicon glyphicon-download-alt"></span><a style="color:black" > Exportar guías</a></button>

            
            
            </center>

               
               <div class="row">
                  <div class="col-sm-12">
                     <div class="white-box">
                        <h3 class="box-title m-b-0">Listado de Guías </h3>
                        <span href="#">Recomendamos configuración de pantalla minima de 1600px, caso contrario, recomendamos disminuir <br>el zoom del navegador, para una mejor visualización de la tabla informativa</span>
                        <div class="table-responsive">
                           <table id="myTable" class="display nowrap" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th>N°</th>
                                    <th>Fecha</th>
                                    <th>Operación</th>
                                    <th>Origen</th>
                                    <th>Destino</th>

                                    <th>Generador</th>
                                    <th>Razón Social</th>

                                    <th>Productor</th>

                                    <th>Intermediario</th>
                                    <th>Destinatario</th>
                                    <th>Transportista</th>

                                    <th>Cant.</th>
                                    <th>Unidad</th>
                                    <th>Produc.</th>
                                    <th>Importe</th>

                                    <th>Tipo</th>
                                    <th>Numérico</th>

                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Guía - Pago - Adjunto</th>
                                    <th>Receptoría</th>

                                    <th>Acciones</th>
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
   $(document).ready(function () {

       $('#myTable').DataTable({
          
        scrollY:        true,
       scrollX:        true,
       scrollCollapse: true,
       fixedColumns:   true,
       "aLengthMenu": [ [10, 25, 50, 100, 500, 1000, 2000, -1], [10, 25, 50, 100, 500, 1000, 2000, "Todas (Puede Tardar)"] ],
         "bFilter": false,
        "order": [[ 0, "desc" ]],
           "dom": 'Blfr<"button">tip',
           buttons: [
                   {
                       extend: 'excelHtml5',
                       text: 'Exportar como Excel',
                       exportOptions: {
                           columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 17, 18, 20 ],
     format: {
       body: function ( data, row, column, node ) {
        if (column === 15 ) {
           data = data.replace("<code style='color: #2196F3;'>", "");
           data = data.replace("</code>", "");
        }

              if (column === 11 || column === 12 || column === 13) {
                   //need to change double quotes to single
                   data = data.replace( /"/g, "'" );
                   //split at each new line
                   splitData = data.split('<br>');
                   /* data = '';
                   for (i=0; i < splitData.length; i++) {
                       //add escaped double quotes around each line
                       data += '\"' + splitData[i] + '\"';
                       //if its not the last line add CHAR(13)
                       if (i + 1 < splitData.length) {
                           data += ', CHAR(10), ';
                       }
                   }
                   //Add concat function
                   data = 'CONCATENATE(' + data + ')'; */
                   if(splitData.length > 0){

                     data = splitData[0];
                   }
                   return data;
               }
               return data;
           }
       }
   },
customize: function( xlsx ) {
   var sheet = xlsx.xl.worksheets['sheet1.xml'];
   var col = $('col', sheet);
   //console.log(sheet);
   //set the column width otherwise it will be the length of the line without the newlines
   $(col[12]).attr('width', 20);
   $(col[13]).attr('width', 20);
   $(col[14]).attr('width', 20);
/*    $('row c[r^="L"], row c[r^="M"], row c[r^="N"]', sheet).each(function(index) {
     if (index > 2) {
       if ($('is t', this).text()) {
           //wrap text

           $(this).attr('s', '55');
           //change the type to `str` which is a formula
           //$(this).attr('t', 'str');
           //append the concat formula
           $(this).append('<f>' + $('is t', this).text() + '</f>');
           //remove the inlineStr
           $('is', this).remove();
       }
     }
   }) 

     $('row', sheet).each(function(index) {
        if (index > 0) {
           $(this).attr('ht', 40);
           $(this).attr('customHeight', 1);
        }
     });*/

}
},
                   {
                       extend: 'pdf',
                       text: 'Exportar a PDF',
                       orientation: 'landscape',
                       pageSize: 'LEGAL',
                       exportOptions: {
                          columns: [ 0, 1, 2, 3, 4, 5, 6, 11, 12, 13, 14, 17, 18, 20 ],
                          stripNewlines: false
                          
                       }
                   }

               ],
           "processing": true,
           "language": {
                "processing": "Cargando..."
             },
           "serverSide": true,
           "ajax":{
                        "url": "{{ url('/formsrecords_e') }}",
                         "dataType": "JSON",
                         "type": "POST",
                         "data":{ _token: "{{csrf_token()}}",
                                    desde: "{{ $desde }}",
                                    hasta: "{{ $hasta }}",
                                    recep: "{{ $recep }}",
                                    status: "{{ $status }}"
                                }
                  },
           "columns": [
               { "data": "id" },
               { "data": "created_at" },
               { "data": "tipo" },
               { "data": "origen_l" },
               { "data": "final_p" },

               { "data": "cuit" },
               { "data": "rs" },

               { "data": "cuit1" },
               { "data": "cuit2" },
               { "data": "cuit3" },
               { "data": "cuit4" },

               { "data": "t_cant" },
               { "data": "t_unid" },
               { "data": "t_prod" },

               { "data": "r5" },

               { "data": "p_tipo" },
               { "data": "p_numb" },

               { "data": "estatus" },
               { "data": "updated_at" },
               { "data": "links" },
               { "data": "receptoria" },
               { "data": "actions" },
               
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


        function confirmDelete(id){

            swal({
                title: '¿Está usted seguro?',
                text: "Este proceso no puede ser revertido!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar!',
                cancelButtonText: 'Cancelar'

                }).then((result) => {
                    if (result.value) {

                        window.location.href = "{{ url('forms') }}/d/"+id;

                    }
                })

        }


        function confirmPay(id,imp,nguia){

            swal({
                title: '¿Está usted seguro?',
                text: "Usted está confirmando que recibió el dinero $"+imp+" de la guia nro "+nguia,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'

                }).then((result) => {
                    if (result.value) {

                        window.location.href = "{{ url('forms') }}/confirmpay/"+id;
                        

                    }
                })

        }

        var perfEntries = performance.getEntriesByType("navigation");

        if (perfEntries[0].type === "back_forward") {
            location.reload(true);
        }
        
    </script>


    </body>
</html>