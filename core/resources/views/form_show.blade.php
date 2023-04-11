<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="IntelSGO">
      <title>Guía 2.0 - Formulario</title>
      <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
      <link href="{{ asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('plugins/bower_components/custom-select/custom-select.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('plugins/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
      <link href="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('plugins/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('css/colors/purple.css') }}" id="theme" rel="stylesheet">
<style>


.divTable{
	display: table;
    width: 100%;
    vertical-align:bottom; 
    border-boottom:1px solid #e4e7ea; 

    color:white; 
    border-collapse:collapse;   
    font-family: Poppins,sans-serif;
}
.divTableRow {
	display: table-row;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	border: 1px solid  #e4e7ea;
	display: table-cell;
    text-align: left;
    line-height: 1.42857143; 
    padding:15px 8px;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}

</style>


   </head>
   <body class="fix-sidebar">
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <div id="wrapper">
      <div id="page-wrapper">
         <div class="container-fluid">
            <div class="row bg-title">
               <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                  <h4 class="page-title">
                     <img style="max-width: 155px; " src="http://www.dgrsantiago.gov.ar/wp-content/uploads/2017/12/cropped-logodgr.jpg">
                  </h4>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12" style="text-align: center; padding-top: 21px;">
                  <h4 class="page-title">F.600 - SOLICITUD DE EXENCIÓN A LA ACTIVIDAD PRIMARIA </h4>
               </div>
               <div class="col-lg-3 col-sm-8 col-md-3 col-xs-12">
                  <ol class="breadcrumb">
                     <img style="max-width: 62px;" src="{{ asset('images/provincia.png') }}">
                  </ol>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2"> </div>
               <div class="col-md-8 col-md-81">
                  <div class="panel panel-info">
                     <div class="panel-heading" style="text-align: center;"> Art. 210º inc. "ñ" y Art. 273 inc. "m' " del Código Fiscal vigente (Ley Nº 6792 y sus modif.) - Decreto Nº 2183/2015</div>
                     <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" action="{{ action('FormController@store') }}" class="form-horizontal" enctype="multipart/form-data">

                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Datos del Contribuyente - Productor</h3>
                                 <hr class="m-t-0 m-b-40">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido y Nombre / Razón Social</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="c1" value="{{ $form->name }}" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">CUIT</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="x-xxxxxxxx-x" name="c2" value="{{ $form->cuit }}" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                 </div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Localidad</label>
                                          <div class="col-md-9">
                                            {{ $form->localidad }}
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">C.P.</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="" name="c4" value="{{ $form->cp }}" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Teléfono</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="" name="c5" value="{{ $form->phone }}" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">E-mail</label>
                                          <div class="col-md-9">
                                             <input type="email" class="form-control" placeholder="" name="c6" value="{{ $form->email }}" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                 </div>
                                 <!--/row-->
                                 <h3 class="box-title" style="margin-top:50px;background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Datos Impositivos<span style="margin-left: 22px; color: white; padding: 8px; font-weight: 500;">  |   Solicita Exención Periodo  <span style="font-size: 17px; color: #9aca3c; margin-left: 4px;">2018</span></span></h3>
                                 <hr class="m-t-0 m-b-40">
                                 <!--/row-->
                                 <div class="row" style="margin-bottom: -10px">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                       <div class="form-group">

                                        <label for="out"> {{ $form->regimen }} </label>
                                    </div>
                                   
                                </div>
                                    </div>

                                    <div class="col-md-2"></div>
                                    <!--/span-->
                                    <!--/span-->
                                 </div>
                                 <div class="row">
                                    <div class="white-box" style="min-width: 100%;padding: 12px;">
                                       <p class="text-muted" style="margin-bottom: 19px; margin-top: 36px; font-size: 15px !important; font-weight: 400 !important;">Actividades: {{ $form->pa }}</p>
                                       <div class="tags-default" style="margin-bottom: 27px;">

                                       </div>
                                       <style type="text/css">.bootstrap-tagsinput input {  min-width: 398px; }</style>
                                       <!--/span-->
                                    </div>
                                    <!--/row-->
                                 </div>
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Otros Datos de Interes  | * Constancia de Inscripción como Productor Primario - Subsecretaría de la Producción </h3>
                                 <hr class="m-t-0 m-b-40">
                                 <div class="row">
                                    <!--/span-->
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Registro</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="Nº" name="c9" value="{{ $form->nr }}" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-1">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">   Validez:</label>
                                          <div class="col-md-9">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label class="control-label col-md-6">{{ $form->desde }}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="form-group">
                                          <label class="control-label col-md-6">{{ $form->hasta }}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Declaración Jurada</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="Nº" name="c12" value="{{ $form->ndj }}" disabled>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                                 <div class="col-lg-12">
                                    <div class="white-box">
   
                                       <div class="divTable" >
                                            <div class="divTableBody">
                                        <div class="divTableRow" style="background:#005478; ">
                                            <div class="divTableCell">Tipo</div>
                                            <div class="divTableCell">Cantidad</div>
                                            <div class="divTableCell">Unidad de Medida</div>
                                            <div class="divTableCell">Superficie Explotada</div>
                                        </div>
                                        @foreach($activities as $activity)

                                        <div class="divTableRow">
                                            <div class="divTableCell"><p style="color:black">{{ $activity->name }}</p></div>
                                            <div class="divTableCell"><p style="color:black">{{ $activity->type }}</p></div>
                                            <div class="divTableCell"><p style="color:black">{{ $activity->can }}</p></div>
                                            <div class="divTableCell"><p style="color:black">{{ $activity->uni }}</p></div>
                                            <div class="divTableCell"><p style="color:black">{{ $activity->sup }}</p></div>
                                        </div>

                                        @endforeach

                                            </div>
                                        </div>

                                       <input style="position: absolute; top: 150px; left: 624.5px; padding: 15px 8px; text-align: start; font-style: normal; font-variant: normal; font-weight: 300; font-stretch: normal; font-size: 14px; line-height: 20px; font-family: Poppins, sans-serif; border: 1px solid rgb(228, 231, 234); width: 411px; height: 51px; display: none;">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="white-box">
                                       <p class="text-muted">Datos del inmueble donde se explota la actividad </p>
                                       <table id="mainTable" class="table editable-table table-bordered table-striped m-b-0" style="cursor: pointer;">

                                            <div class="divTable" >
                                                    <div class="divTableBody">
                                                <div class="divTableRow" style="background:#005478; ">
                                                    <div class="divTableCell">Establecimiento</div>
                                                    <div class="divTableCell">Padrón Inmobiliario N°</div>
                                                    <div class="divTableCell">Identificación N°</div>
                                                    <div class="divTableCell">Dirección</div>
                                                    <div class="divTableCell">Localidad</div>
                                                    <div class="divTableCell">Código Postal</div>
                                                    <div class="divTableCell">Superficie Total</div>
                                                </div>

                                                @foreach($establishments as $establishment)

                                                <div class="divTableRow">
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->estable }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->p_n }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->i_n }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->address }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->local }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->c_postal }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $establishment->s_total }}</p></div>
                                                </div>
        
                                                @endforeach
                                    </div>
                                 </div>

                                    <div class="col-lg-12">
                                       <div class="white-box">

                                            <div class="divTable" >
                                                    <div class="divTableBody">
                                                <div class="divTableRow" style="background:#005478; ">
                                                    <div class="divTableCell">Tipo de Vinculo</div>
                                                    <div class="divTableCell">DOCUMENTACION FISCAL PARA CIRCULAR</div>
                                                    <div class="divTableCell">Nombre y apellido o razón social del titular del inmueble</div>
                                                    <div class="divTableCell">CUIT/CUIL del titular del inmueble</div>
                                                    <div class="divTableCell">Fecha inicio del contrato</div>
                                                    <div class="divTableCell">Fecha finalización del contrato</div>
                                                </div>

                                                @foreach($incumbents as $incumbent)

                                                <div class="divTableRow">
                                                    <div class="divTableCell"><p style="color:black">{{ $incumbent->t_vinculo }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $incumbent->d_r }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $incumbent->name }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $incumbent->cuit }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $incumbent->fecha_i }}</p></div>
                                                    <div class="divTableCell"><p style="color:black">{{ $incumbent->fecha_f }}</p></div>
                                                </div>
        
                                                @endforeach
                                              </div>
                                    </div>
                                 </div>
                                
                                    <hr class="m-t-0 m-b-40">
                                    <hr class="m-t-0 m-b-40" style="margin-top:63px !important">
                                    <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
                                        <div class="col-md-12" style="margin-top: -71px;">
                                           <p class="text-muted" style="font-size: 17px;"><i class="fa fa-money text-inverse m-r-10" style=""></i>Tasa Retributiva de Servicios: F600 $27  + $3 por folio adicional</p>
                                        </div>
                                        <div class="col-md-6">
                                        <p class="text-muted" style="font-size: 20px;    font-weight: 400;">GUÍA Nº <span style="font-size: 20px; color: #9aca3c; margin-left: 4px;">{{ $form->id+6000 }}</span></p>
                                        </div>
                                        <div class="col-md-6">
                                           <p class="text-muted" style="font-size: 20px;    font-weight: 400;">Santiago del Estero <span style="font-size: 20px; color: #9aca3c; margin-left: 4px;">{{ $form->created_at }}</span></p>
                                        </div>
                                     </div>
                                 </div>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2"> </div>
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
      <script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
      <script>
         jQuery(document).ready(function() {
             // Switchery
             var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
             $('.js-switch').each(function() {
                 new Switchery($(this)[0], $(this).data());
         
             });
             // For select 2
         
             $(".select2").select2();
             $('.selectpicker').selectpicker();
         
             //Bootstrap-TouchSpin
             $(".vertical-spin").TouchSpin({
                 verticalbuttons: true,
                 verticalupclass: 'ti-plus',
                 verticaldownclass: 'ti-minus'
             });
             var vspinTrue = $(".vertical-spin").TouchSpin({
                 verticalbuttons: true
             });
             if (vspinTrue) {
                 $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
             }
         
             $("input[name='tch1']").TouchSpin({
                 min: 0,
                 max: 100,
                 step: 0.1,
                 decimals: 2,
                 boostat: 5,
                 maxboostedstep: 10,
                 postfix: '%'
             });
             $("input[name='tch2']").TouchSpin({
                 min: -1000000000,
                 max: 1000000000,
                 stepinterval: 50,
                 maxboostedstep: 10000000,
                 prefix: '$'
             });
             $("input[name='tch3']").TouchSpin();
         
             $("input[name='tch3_22']").TouchSpin({
                 initval: 40
             });
         
             $("input[name='tch5']").TouchSpin({
                 prefix: "pre",
                 postfix: "post"
             });
         
             // For multiselect
         
             $('#pre-selected-options').multiSelect();
             $('#optgroup').multiSelect({
                 selectableOptgroup: true
             });
         
             $('#public-methods').multiSelect();
             $('#select-all').click(function() {
                 $('#public-methods').multiSelect('select_all');
                 return false;
             });
             $('#deselect-all').click(function() {
                 $('#public-methods').multiSelect('deselect_all');
                 return false;
             });
             $('#refresh').on('click', function() {
                 $('#public-methods').multiSelect('refresh');
                 return false;
             });
             $('#add-option').on('click', function() {
                 $('#public-methods').multiSelect('addOption', {
                     value: 42,
                     text: 'test 42',
                     index: 0
                 });
                 return false;
             });
             
         
         });
      </script>
      <!--Style Switcher -->
      <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
      <script src="{{ asset('js/ajax.js') }}"></script>
      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')


    </body>
</html>