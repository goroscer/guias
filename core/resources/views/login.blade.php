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
            <form id="msform" method="POST" action="{{ action('LoginController@login') }}">
                    {{ csrf_field() }}
                  <fieldset>
                     <h2 class="fs-title">INGRESO ADMINISTRATIVO</h2>
                     <h3 class="fs-subtitle">Sistema de Guía electrónica de producción en transito</h3>
                     <input type="text" name="username" placeholder="Usuario Otorgado" required autofocus />
                     <input type="password" name="pass" placeholder="Contraseña" required/>
                     <!--<h3 class="fs-subtitle" style="color: #01c0c8; text-decoration: underline;"> <a href="#" style="color:  white;">Recuperar Contraseña</a></h3>-->
                     <input type="submit" class="panel-heading" value="Acceder" style="background-color:#0C7AFF !important; color:white; font-weight: bold;" />
                  </fieldset>
                  <fieldset>
                     <h2 class="fs-title">Social Profiles</h2>
                     <h3 class="fs-subtitle">Recuperar Contraseña</h3>
                     <input type="text" name="twitter" placeholder="Twitter" />
                     <input type="text" name="facebook" placeholder="Facebook" />
                     <input type="text" name="gplus" placeholder="Google Plus" />
                     <input type="button" name="previous" class="previous action-button" value="Previous" />
                     <input type="button" name="next" class="next action-button" value="Next" />
                  </fieldset>
                  <fieldset>
                     <h2 class="fs-title">Personal Details</h2>
                     <h3 class="fs-subtitle">We will never sell it</h3>
                     <input type="text" name="fname" placeholder="First Name" />
                     <input type="text" name="lname" placeholder="Last Name" />
                     <input type="text" name="phone" placeholder="Phone" />
                     <textarea name="address" placeholder="Address"></textarea>
                     <input type="button" name="previous" class="previous action-button" value="Previous" />
                     <input type="submit" name="submit" class="submit action-button" value="Submit" />
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


    </body>
</html>