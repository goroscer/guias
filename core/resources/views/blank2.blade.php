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

      <style>
            html, body {
               height:100%;
               width:100%;
               margin:0;
         }
         .h_iframe iframe {
               width:100%;
               height:100%;
         }
         .h_iframe {
               height: 100%;
               width:100%;
         }
      </style>

   </head>

   
   
   <div class="h_iframe">
      <iframe src="http://www.dgrsantiago.gob.ar" frameborder="0" allowfullscreen></iframe>

   </div>


      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')



    </body>


    <script language="JavaScript">

        function cerrar() {
        var ventana = window.self;
        ventana.opener = window.self;
        ventana.close();
        }
        setTimeout('cerrar()',60000); //60 segundos.
    </script>





</html>