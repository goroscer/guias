<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Guía 2.0 - Pagar</title>
      <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
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
                      <h3 class="box-title m-b-0">Pago</h3>
                   <form method="POST" name="form" action="{{ url('/forms') }}/save_vep/{{$form->id}}/{{$tokennro}}">
                      {{ csrf_field() }}
                      <div class="form-body">
                              <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;"> Datos</h3>
                              <hr class="m-t-0 m-b-40">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nro de transacción de Pago de  TRS <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="El número de transacción de pago lo obtendrás del comprobante emitido por la entidad bancaria una vez que hayas efectuado el pago"></span>:</label>
                                       <div class="col-md-9">
                                            <div class="input-group"> 
                                                <input type="text" class="form-control" placeholder="" name="nrot_trs" @if($trs == 0) disabled @else required value="{{$form->nrot_trs}}" @endif>
                                                <span class="input-group-addon" id="snrot_trs">$ {{ $trs }}</span>

                                            </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!--/span-->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nro de transacción de Pago de IIBB <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="El número de transacción de pago lo obtendrás del comprobante emitido por la entidad bancaria una vez que hayas efectuado el pago"></span>: </label>
                                        <div class="col-md-9">
                                            <div class="input-group"> 
                                                    
                                                <input type="text" class="form-control" placeholder="" name="nrot_iibb" @if($iibb == 0) disabled @else required value="{{$form->nrot_iibb}}" @endif>
                                                <span class="input-group-addon" id="snrot_iibb">${{ $iibb }}</span>

                                            </div>
                                        </div>

                                    </div>
                                 </div>
                                 <!--/span-->
                              </div>


                              <hr class="m-t-0 m-b-40">


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


      $('#example23').DataTable({
         "aoColumnDefs": [
                 { "bSearchable": false, "aTargets": [ 9 ] }
                     ], 
         "order": [
             [0, 'desc']
                  ],
         "iDisplayLength": 10,
         "aLengthMenu": [5, 10, 25, 50, 100]
      });

      $('[data-toggle="tooltip"]').tooltip();  

   </script>

    <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

    @include('sweet::alert')

   <script>

         $("form").submit(function(e){
               e.preventDefault(e);
                  text = '';

                  trs = $("[name='nrot_trs']").val();
                  iibb = $("[name='nrot_iibb']").val();
                  if(trs){
                     text += "<strong>TRS: </strong>"+trs+"<br>";
                  }
                  if(iibb){
                     text += "<strong>IIBB: </strong>"+iibb+"<br>";
                  }

                  swal({

                     title: "Por favor verifique que los datos ingresados son los correctos",
                     html:"<p align='left'>"+text+"</p>",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Confirmar!',
                     cancelButtonText: 'Cancelar'

                     }).then((result) => {
                        if (result.value) {
                           document.form.submit();
                        }
                     })
            
         });


   </script>

  </body>
</html>