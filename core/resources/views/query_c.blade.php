<!DOCTYPE html>  
<html lang="es">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">     
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="IntelSGO">
      <title>Sistema Privado Guía 2.0</title>
      <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/register-steps/steps.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('css/colors/purple.css') }}" id="theme"  rel="stylesheet">
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      
   </head>
   <body>
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <section id="wrapper" class="step-register">
         <div class="register-box">
            <div class="">
               <a href="javascript:void(0)" class="text-center db m-b-40"><img src="http://www.dgrsantiago.gov.ar/wp-content/uploads/2017/12/cropped-logodgr.jpg" alt="Home" style="max-width: 183px;"/><br/></a>
            <form id="msform" method="POST" action="{{ action('FormController@query_c') }}">
                    {{ csrf_field() }}
                  <fieldset>
                     <h2 class="fs-title">Imprimir Constancia</h2>
                     <h3 class="fs-subtitle">Sistema Privado Guía 2.0</h3>
                     <input type="text" class="input-delimiter" name="cuit" placeholder="CUIT" required autofocus />
                     <input type="text" name="resolucion" placeholder="N° Resolución" pattern="[0-9]+" required/>
                     <!--<h3 class="fs-subtitle" style="color: #01c0c8; text-decoration: underline;"> <a href="#" style="color:  white;">Recuperar Contraseña</a></h3>-->
                     <input type="submit"  class="action-button" value="Consultar" style="background: #9aca3c;" />
                  </fieldset>
               </form>
               <div class="clear"></div>
            </div>
         </div>
      </section>
      <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('bootstrap/dist/js/tether.min.js') }}"></script>
      <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/register-steps/jquery.easing.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/register-steps/register-init.js') }}"></script>
      <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
      <script src="{{ asset('js/waves.js') }}"></script>
      <script src="{{ asset('js/custom.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')

      <script src="{{ asset('js/cleave.min.js') }}"></script>
      <script>
    
        var cleave = new Cleave('.input-delimiter', {
            delimiter: '-',
            blocks: [2, 8, 1],
            uppercase: true
        });
    
    </script>

    </body>
</html>