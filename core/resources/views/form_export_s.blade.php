<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Gu&iacute;a 2.0 - Usuarios</title>
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
               <div class="top-left-part" style="background-color:#0C7AFF !important"><a class="logo" href="{{ url('/forms') }}"><b><img src="{{ asset('images/provincia.png') }}" alt="home" style="max-width: 31px;" /></b><span class="hidden-xs"><strong>Gu&iacute;as</strong>Web</span></a></div>
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
                        


                     </ol>
                  </div>
               </div>
               <div class="row">


                  <div class="col-sm-12">
                     <div class="white-box">

                            <center><button type="button" onclick="window.location.href = '{{ url('/forms') }}'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span><a style="color:black" > Volver</a></button></center>

                        <h3 class="box-title m-b-0">Intervalos de fecha a exportar </h3>
                        <form method="POST" action="{{ url('/export') }}">
                        {{ csrf_field() }}

                        <div class="form-body">
                                <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;"> Datos</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label col-md-3">Desde </label>
                                         <div class="col-md-9">
                                            <input type="date" class="form-control" placeholder="" name="c1" required >
                                         </div>
                                      </div>
                                   </div>
                                   <!--/span-->
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="control-label col-md-3">Hasta</label>
                                         <div class="col-md-9">
                                            <input type="date" class="form-control" name="c2" required >
                                         </div>
                                      </div>
                                   </div>
                                   <!--/span-->
                                </div>
  
                            

                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label class="control-label col-md-3">Receptor&iacute;a </label>
                                     <div class="col-md-9">
                                            <select class="form-control" name="c3" required>
                                                @if($type == 'Rentas ADM' OR $type == 'WebMaster' OR substr($type, 0, 8) == 'Rentas C')

                                                    <option value="">Selecione una</option>  
                                                    <option>TODAS LAS RECEPTORIAS</option>
                                                    <option value="0">RENTAS</option>
                                                    @foreach($receptorias as $receptoria)

                                                        <option value="{{ $receptoria->id }}">{{ $receptoria->localidad.' - '.$receptoria->n }}</option>

                                                    @endforeach
                                                @else
                                                    @if($office == 0) 
                                                        <option value="0">RENTAS</option>

                                                    @else 

                                                        @foreach($receptorias as $receptoria)

                                                            @if($office == $receptoria->id) 
                                                               <option value="{{ $receptoria->id }}">{{ $receptoria->localidad.' - '.$receptoria->n }}</option>
                                                            @endif 

                                                        @endforeach

                                                    @endif 


                                                @endif

                                            </select>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label col-md-3">Estatus</label>
                                    <div class="col-md-9">
                                       <select class="form-control" name="c4" required>
                                          <option>Todos</option>
                                          <option value="Pendiente">Pendientes</option>
                                          <option value="Pagado">Pagadas</option>
                                          <option value="Vencido">Vencidas</option>
                                          <option>Estado AutomÃƒÆ’Ã‚Â¡tico</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                            </div>









                                <div class="form-actions">
                                        <div class="row" style="margin-top: 70px">
                                           <div class="col-md-12">
                                              <div class="row">
                                                 <div class="col-md-offset-12 col-md-6">
                                                    <input type="reset"class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px;" value="Limpiar Formulario">

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


      <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')

    </body>
</html>