<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content=""><meta http-equiv="Cache-Control" content="no-store" />
      <meta name="author" content="Direccion General de Rentas">
      <title>Guía Electrónica - Formulario</title>
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

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }

</style>


   </head>
   <body class="fix-sidebar" onload="from({{$datos['cuit']}},'cuit1','{{ asset('load/cuit1.php') }}')">






 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" >
   <div class="modal-dialog modal-dialog-centered" role="document" style="margin: 0;
   position: absolute;
   top: 50%;
   left: 50%;
   -ms-transform: translate(-50%, -50%);
   transform: translate(-50%, -50%);">
     <div class="modal-content">
       <div class="modal-header">
         
       </div>
       <div class="modal-body">
         <img class="img-responsive center-block" style="width: 260px; height: 220px" src="{{ asset('images/load.gif') }}">
       </div>

     </div>
   </div>
 </div>




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
                    <img style="width: 250px; height: 150px;" src="{{ asset('images/logo-sge.png') }}">
                  
               </div>
               <div class="col-lg-3 col-sm-8 col-md-3 col-xs-12">
                  <ol class="breadcrumb">
                     <img style="max-width: 62px;" src="{{ asset('images/provincia.png') }}">
                  </ol>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2"> </div>
               <div class="col-md-12 col-md-100">
                  <div class="panel panel-info">
                     <div class="panel-heading" style="background-color:#0C7AFF !important"> Guía electrónica de productos en tránsito <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Por consultas sobre el uso del sistema llamemos al (0385) 4214314 o (0385) 4213766 interno 217."></span>
                     </div>
                     <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form name="form" method="POST" action="{{ action('FormController@store') }}" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}

                                <div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                              <label class="control-label col-md-3">Tipo de Operación</label>
                                              <div class="col-md-9">
                                                    <select name="tipo" id="tipo" class="form-control input-delimiter" onchange="from(document.form.tipo.value,'tabla','{{ asset('load/tabla.php') }}')" required disabled>
                                                        
                                                        
                                                        <option SELECTED value="">Seleccione un tipo de operación</option>
                                                        <option>Venta</option>
                                                        <option>Solo Traslado</option>
                                                        <option>Faena</option>
                                                        <option>Traslado a Remate</option>
                                                        <option>Engorde, Pastoreo o Invernada</option>
                                                        <option>Remate</option>


                                                    </select>
                                              </div>
                                              
                                           </div>
                                        </div>


                                </div>

                                    

                                
                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Datos del Productor - Vendedor</h3>
                                 <hr class="m-t-0 m-b-40">




                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">CUIT</label>
                                          <div class="col-md-7">
                                             <input type="text" class="form-control input-delimiter" maxlength="13" placeholder="xx-xxxxxxxx-x" name="c" required onfocusout="from(document.form.c.value,'cuit1','{{ asset('load/cuit1.php') }}')" value="{{ $datos['cuitgion'] }}" disabled>

                                             <input type="hidden" class="form-control input-delimiter" maxlength="13" placeholder="xx-xxxxxxxx-x" name="cuit1" onfocusout="from(document.form.cuit1.value,'cuit1','{{ asset('load/cuit1.php') }}')" value="{{ $datos['cuitgion'] }}">
                                             
                                          </div>
                                          <div class="col-md-2">

                                            <a onclick="from(document.form.c.value,'cuit1','{{ asset('load/cuit1.php') }}')" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
                                         </div>
                                       </div>
                                    </div>
                                 </div>





                            <div id="cuit1">
                                 <div class="row">

                                  <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido y Nombre / Razón Social</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" name="rs1" placeholder="" required disabled>
                                          </div>
                                       </div>
                                    </div>


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Localidad</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="l1" required disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">C.P.</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="xxxxxxxxxxx" name="cp1" required disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <label class="control-label col-md-3">Domicilio Fiscal</label>
                                           <div class="col-md-9">
                                              <input type="text" class="form-control" placeholder="" name="df1" required disabled>
                                           </div>
                                        </div>
                                     </div>

                                    </div>
                                 </div>




























                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Datos del Intermediario</h3>
                                 <hr class="m-t-0 m-b-40">

                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">¿Existe Intermediario?</label>
                                          <div class="col-md-9">
                                            <select name="intermediario" class="form-control input-delimiter" onchange="showinter(form.intermediario.value);" disabled>
                                                <option value="Si">Si</option>
                                                <option selected value="No">No</option>
                                            </select>
                                          </div>
                                       </div>
                                    </div>

                                 </div>

                            <div id="inter" style="display:none">

                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">CUIT</label>
                                          <div class="col-md-7">
                                             <input type="text" class="form-control input-delimiter cuit" maxlength="13" placeholder="xx-xxxxxxxx-x" name="cuit2" onfocusout="from(document.form.cuit2.value,'cuit2','{{ asset('load/cuit2.php') }}')">
                                          </div>
                                          <div class="col-md-2">

                                                <a onclick="from(document.form.cuit2.value,'cuit2','{{ asset('load/cuit2.php') }}')" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
                                            </div>
                                       </div>
                                    </div>
                                </div>


                                <div id="cuit2">
                                 <div class="row">

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido y Nombre / Razón Social</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" name="rs2" placeholder="" disabled>
                                          </div>
                                       </div>
                                    </div>


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Localidad</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="l2" disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">C.P.</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="" name="cp2" disabled>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Domicilio Fiscal</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="" name="df2" disabled>
                                          </div>
                                       </div>
                                    </div>


                                    
                                    <!--/span-->
                                 </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="control-label col-md-3">Comisión</label>
                                       <div class="col-md-9">
                                            <div class="input-group"> 
                                                <span class="input-group-addon">$</span>
                                                <input type="text" class="form-control" name="comi" id="currency-field" data-type="currency" placeholder="1.000,00" onkeyup="formula_e();">
                                            </div>
                                       </div>
                                    </div>
                                 </div>
                                </div>


                            </div>








                                 <div class="form-body">
                                        <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Origen de la operación</h3>
                                        <hr class="m-t-0 m-b-40">
       
                                        <div class="row">
       
       
                                           <div class="col-md-6">
                                              <div class="form-group">
                                                 <label class="control-label col-md-3">Nombre del Establecimiento</label>
                                                 <div class="col-md-9">
                                                   <input type="text" name="origen_estable" class="form-control input-delimiter" required>
                                                 </div>
                                              </div>
                                           </div>
       

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label col-md-3">Domicilio</label>
                                                   <div class="col-md-9">
                                                     <input type="text" name="origen_domi" class="form-control input-delimiter" required>
                                                   </div>
                                                </div>
                                            </div>



                                        </div>


                                        <div class="row">
       
       
                                           <div class="col-md-6">
                                              <div class="form-group">
                                                 <label class="control-label col-md-3">Localidad</label>
                                                 <div class="col-md-9">
                                            <select name="origen_l" class="js-example-basic-single form-control"  onchange="local(document.form.origen_l.value)" required>

                                                <option>Otra Localidad</option>                                              
                                                
                                                @foreach($locations_se as $location_se)
                                                    <option>{{ $location_se->name }}</option>
                                                @endforeach
                                           </select>

                                                 </div>
                                              </div>
                                           </div>
       


                                           <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label col-md-3">Para localidades no listadas</label>
                                                   <div class="col-md-9">
                                                     <input type="text" name="origen_l_text" required class="form-control input-delimiter">
                                                   </div>
                                                </div>
                                            </div>



                                        </div>


                                    </div>

















                                    <div class="form-body">
                                            <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| DESTINO DE LA OPERACIÓN</h3>
                                            <hr class="m-t-0 m-b-40">
           
           
           
                                            <div class="row">
           
           
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Provincia</label>
                                                     <div class="col-md-9">
                                                        <select name="final_p" class="js-example-basic-single form-control" required onchange="formula_e()">
                                                            @foreach($locations as $location)
                                                                <option>{{ $location->name }}</option>
                                                            @endforeach
        
                                                        </select>

                                                     </div>
                                                  </div>
                                               </div>
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Localidad</label>
                                                     <div class="col-md-9">
                                                        <input type="text" name="final_l" class="form-control input-delimiter" required>

                                                     </div>
                                                  </div>
                                               </div>
           
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Domicilio</label>
                                                     <div class="col-md-9">
                                                       <input type="text" class="form-control" placeholder="" name="final_domi" required>
                                                     </div>
                                                  </div>
                                               </div>
                                               <!--/span-->
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Nombre del Establecimiento</label>
                                                     <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="" name="final_estable" required>
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>






















                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| DATOS DEL DESTINATARIO/COMPRADOR</h3>
                                 <hr class="m-t-0 m-b-40">


                                 <div class="row">

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">CUIT</label>
                                          <div class="col-md-7">
                                             <input type="text" class="form-control input-delimiter cuit" maxlength="13" placeholder="xx-xxxxxxxx-x" name="cuit3" required onfocusout="from(document.form.cuit3.value,'cuit3','{{ asset('load/cuit3.php') }}')">
                                          </div>
                                          <div class="col-md-2">

                                                <a onclick="from(document.form.cuit3.value,'cuit3','{{ asset('load/cuit3.php') }}')" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
                                            </div>
                                       </div>
                                    </div>


                                 </div>

                                <div id="cuit3">
                                 <div class="row">

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido y Nombre / Razón Social</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" name="rs3" placeholder="" required disabled>
                                          </div>
                                       </div>
                                    </div>



                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Localidad</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="l3" required disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">C.P.</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="" name="cp3" required disabled>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                           <label class="control-label col-md-3">Domicilio Fiscal</label>
                                           <div class="col-md-9">
                                              <input type="text" class="form-control" placeholder="" name="df3" required disabled>
                                           </div>
                                        </div>
                                     </div>
                                    <!--/span-->
                                 </div>
                                </div>





                                    

















                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Datos del Transporte</h3>
                                 <hr class="m-t-0 m-b-40">

                                 <div class="row">

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">CUIT del Transportista</label>
                                          <div class="col-md-7">
                                             <input type="text" class="form-control input-delimiter cuit" maxlength="13" placeholder="xx-xxxxxxxx-x" name="cuit4" required onfocusout="from(document.form.cuit4.value,'cuit4','{{ asset('load/cuit4.php') }}')">
                                          </div>
                                          <div class="col-md-2">

                                                <a onclick="from(document.form.cuit4.value,'cuit4','{{ asset('load/cuit4.php') }}')" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                                <div id="cuit4">
                                <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Razón Social</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" name="rs4" placeholder="" required disabled>
                                          </div>
                                       </div>
                                    </div>
                                    </div>
                                 </div></div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Dominio del Vehículo</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="d4" required>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Dominio del Acoplado</label>
                                          <div class="col-md-9">
                                             <input type="text" class="form-control" placeholder="" name="p4" required>
                                          </div>
                                       </div>
                                    </div>
                                </div>
{{-- 
                            <div class="row" class="col-md-6">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">CUIT/CUIL del Chofer</label>
                                          <div class="col-md-7">
                                            <input type="text" class="form-control cuit" maxlength="13" placeholder="xx-xxxxxxxx-x" name="cuitc4" required onfocusout="from(document.form.cuitc4.value,'cuitc4','{{ asset('load/cuitc4.php') }}')">
                                          </div>
                                          <div class="col-md-2">

                                                <a onclick="from(document.form.cuitc4.value,'cuitc4','{{ asset('load/cuitc4.php') }}')" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
                                            </div>
                                       </div>
                                    </div>
                            </div>
                                <div id="cuitc4">
                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido y Nombre</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="nombre4" required disabled>
                                          </div>
                                       </div>
                                    </div>
                                    </div>
                                 </div>



     


        --}}
                                           
       
       
       
       
       
       


                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| DOCUMENTACIÓN FISCAL PARA CIRCULAR</h3>
                                 <center style="color:#FF0000;"> Ud. deberá ingresar todos los comprobantes necesarios que respalden su operación.<br></center>
                                 <hr class="m-t-0 m-b-40">
                                <div id="tproof1">

                                    
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">TIPO DE COMPROBANTE:</label>
                                          <div class="col-md-9">
                                                <select name="proof1c1" class="form-control typeproof" required onchange="from(1+'-'+document.form.proof1c1.value,'tproof1','{{ asset('load/typeproof.php') }}')">
                                                    <option value="">Seleccione un tipo</option>
                                                    <option>FACTURA A</option>
                                                    <option>FACTURA B</option>
                                                    <option>FACTURA C</option>
                                                    <option>REMITO</option>
                                                    <option>DTA</option>
                                                    <option>DTE</option>
                                                    <option>DTV</option>
                                                    <option>GUIA MINERIA</option>
                                                    <option>GUIA BOSQUES C</option>
                                                    <option>GUIA BOSQUES D</option>
                                                   <!-- <option>CARTA DE PORTE</option>-->  <option>CARTA DE PORTE ELECTRONICA</option>
                                                    <option>OTROS</option>
                                                </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nº</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" id="proof1c2" name="proof1c2" placeholder="" autocomplete="off" required>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                </div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Fecha</label>
                                          <div class="col-md-9">
                                            <input type="date" name="proof1c3" class="form-control" required min="{{ $mincomp }}">
                                          </div>
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3"></label>
                                          <div class="col-md-9">

                                          </div>
                                       </div>
                                    </div>
                                 </div>


                                <div id="e1">

                                        <button type="button" onclick="from(1,'e1','{{ asset('load/proof.php') }}');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Agregar Comprobante</button>
                
                                </div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif





                                <div>

                                <div id="tabla">
                                    <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;"> DETALLE DE LO TRANSPORTADO</h3>

                                        <table class="table" style="width:100%">
                                            <thead>
                                              <tr>
                                                <th scope="col" style="width:10%">Categoría</th>
                                                <th scope="col" style="width:12%">Producto</th>
                                                <th scope="col" style="width:10%">Unidad de medida</th>
                                                <th scope="col" style="width:10%">Valor fiscal Unitario</th>
                                                <th scope="col" style="width:10%">Valor Real de Venta Unitario <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Para separar decimales ingrese '.' (punto)"></span> </th>
                                                <th scope="col" style="width:7%">Cantidad S/ Un. de Medida <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Recuerde que deberá ingresar la cantidad según la unidad de medida, expresada la columna 3."></span> </th>

                                                {{-- <th scope="col" style="width:7%">Destino Fuera de la Provincia</th> --}}
                                                <th scope="col" style="width:7%">Importe IIBB</th>
                                                <th scope="col" style="width:7%">Importe TRS</th>
                                                <th scope="col" style="width:20%">Total General</th>

                                              </tr>
                                            </thead>
                                        </table>

                                    <div id="tact11">
                                        <table class="table" style="width:100%">
                                            <tbody>
                                            <div id="campo1">
                                              <tr>

                                                <td style="width:12%"><select class="form-control" name="pro1c2" required disabled>
                                                    <option value="">Selecione uno</option>
                                                    
                                                </select></td>

                                                <td style="width:10%"><select class="form-control" name="pro1c3" required disabled>
                                                        <option value="">Selecione uno</option>
                                                        
                                                </select></td>
                                                <td style="width:10%"><select class="form-control" name="pro1c4" required disabled>
                                                        <option value="">Selecione uno</option>
                                                        
                                                    </select></td>

                                                <td style="width:8%"><input type="number" class="form-control" placeholder="" name="pro1c6" disabled></td>

                                                {{-- <td style="width:7%"><input type="number" class="form-control" name="pro1c9" required disabled></td> --}}
                                                <td style="width:7%"><input type="number" class="form-control" name="pro1c10" required disabled></td>
                                                <td style="width:7%"><input type="number" class="form-control" name="pro1c11" required disabled></td>
                                                <td style="width:20%"><input type="number" class="form-control" name="pro1c12" required disabled></td>
                                              </tr>
                                            </div>

                                            </tbody>
                                          </table>
                                    </div>
                                        <div id="t1">

                                            <button type="button" onclick="from('1','t1','{{ asset('load/product.php') }}');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" disabled>Agregar</button>
                    
                                        </div>

                                 </div>


                                        <table class="table" style="width:100%">
                                            <tbody>

                                              <tr>
                                                <td style="width:10%"></td>
                                                <td style="width:12%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:8%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%">Productor</td>
                                                <td style="width:20%"><input type="hidden" class="form-control" name="total_p" value="0.00"><span class="form-control" id="total_p" style="strong">$0,00</span></td>
                                              </tr>
                                              <!--<tr>
                                                <td style="width:10%"></td>
                                                <td style="width:12%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:8%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%">Comprador</td>
                                                <td style="width:20%"><input type="hidden" class="form-control" name="total_c" value="0.00"><span class="form-control" id="total_c" style="strong">$0,00</span></td>
                                              </tr>-->
                                              <tr>
                                                <td style="width:10%"></td>
                                                <td style="width:12%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:8%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%">Intermediario</td>
                                                <td style="width:20%"><input type="hidden" class="form-control" name="total_i" value="0.00"><span class="form-control" id="total_i" style="strong">$0,00</span></td>
                                              </tr>
                                              <tr>
                                                <td style="width:10%"></td>
                                                <td style="width:12%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:8%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%">Importe Total de TRS</td>
                                                <td style="width:20%"><input type="hidden" class="form-control" name="totaltrs" value="0.00"><span class="form-control" id="totaltrs" style="strong">$0,00</span></td>
                                              </tr>
                                              <tr>
                                                <td style="width:10%"></td>
                                                <td style="width:12%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:10%"></td>
                                                <td style="width:8%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%"></td>
                                                <td style="width:7%">Total a Pagar</td>
                                                <td style="width:20%"><input type="hidden" name="total" value="0.00"><span class="form-control" id="total" style="strong">$0,00</span></td>
                                              </tr>
                                            </tbody>
                                          </table>




</div>



                                 <div id="paymentdata" style="display:none">
                                    <div class="form-body">
                                            <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| Datos de Pago</h3>
                                            <hr class="m-t-0 m-b-40">
           
           
           
                                            <div class="row">
                                                
                                                    
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Opciones</label>
                                                     <div class="col-md-9">
                                                        <select name="payment" class="form-control input-delimiter" required onchange="formula_e();from({{ $id+6000 }}+'-'+document.form.payment.value+'-'+document.form.totaltrs.value+'-'+document.form.total_p.value+'-'+0+'-'+document.form.total_i.value+'-{{$url}}'+'-{{ $datos['cuit'] }}','payment','{{ asset('load/payment.php') }}')">
                                                            <option value="">Seleccione una opción</option>
                                                            <option>Pago En Receptoria</option>
                                                            <option value="Pago Electronico">Pago Electrónico – Red LINK</option>
                                                        </select>

                                                     </div>
                                                  </div>
                                               </div>
                                            </div>
                                        <div id="payment">
                                            
                                        </div>
                                 </div>       
                              </div>









                                    <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
                                       <div class="col-md-12" style="margin-top: -71px;">

                                       </div>
                                       <div class="col-md-6">
                                       {{-- <p class="text-muted" style="font-size: 20px;    font-weight: 400;">GUÍA Nº <span style="font-size: 20px; color: #0C7AFF; margin-left: 4px;">{{ $id+6000 }}</span></p> --}}
                                       <input type="hidden" name="id" value="{{ $id }}" >
                                       <input type="hidden" name="tokennro" value="{{ $tokennro }}" >
                                       </div>
                                       <div class="col-md-6">
                                          <p class="text-muted" style="font-size: 20px;    font-weight: 400;">Santiago del Estero <span style="font-size: 20px; color: #0C7AFF; margin-left: 4px;">{{ $date }}</span></p>
                                       </div>
                                    </div>


                                    <input type="hidden" name="cuit" value="{{ $datos['cuit'] }}">
                                    <input type="hidden" name="rs" value="{{ $datos['rs'] }}">

                                    <p class="text-muted" style="font-size: 20px;    font-weight: 400;">Guía generada por: <span style="font-size: 20px; color: #0C7AFF; margin-left: 4px;">{{ $datos['rs'] }} </span></p><p class="text-muted" style="font-size: 20px;    font-weight: 400;"> Cuit: <span style="font-size: 20px; color: #0C7AFF; margin-left: 4px;">{{ $datos['cuit'] }} </span></p>



                                    <hr class="m-t-0 m-b-40">
                                    <hr class="m-t-0 m-b-40" style="margin-top:63px !important">
                                    <div class="form-actions">
                                       <div class="row" style="margin-top: 70px">
                                          <div class="col-md-12">
                                             <div class="row">
                                                <div class="col-md-offset-12 col-md-6">
                                                   <button type="button" onClick="window.location.reload()" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px;">Limpiar Guía</button>
                                                </div>
                                                <div class="col-md-offset-12 col-md-6">
                                                   <button type="submit" id="send" class="btn btn-success" style="width: 100%; margin-bottom:20px;width: 100%; margin-bottom: 20px; background: #0C7AFF; height: 51px; font-size: 17px; border: none !important; height: 51px; font-size: 17px;" disabled>Generar Guía</button>
                                                </div>
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
                  <div class="col-md-2"> </div>
               </div>
            </div>

            <p style="text-align: center; color: white; margin-top: 56px;font-size: 12px;"><a href="http://www.intelsantiago.com.ar" style="    text-decoration: none;"> Desarrollado por INTELSGO </a></p>
         </div>
      </div>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="{{ asset('bootstrap/dist/js/tether.min.js') }}"></script>
      <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
      <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
      <script src="{{ asset('js/waves.js') }}"></script>
      <script src="{{ asset('js/custom.min.js?v2') }}"></script>
      <script src="{{ asset('plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/custom-select/custom-select.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
      <script src="{{ asset('plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="{{ asset('plugins/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
      <script>
         $("#exampleModal").modal()
         
         </script>
      

      <script>

        // For select 2
         $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
         
        function actselec() {

            $('#selectact').select2();


        }

      </script>
      <!--Style Switcher -->
      <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
      <script src="{{ asset('js/ajax.js') }}"></script>

      <script src="{{ asset('js/cleave.min.js') }}"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

      <script src="{{ asset('js/sweetalert.min.js?v=2') }}"></script>

      @include('sweet::alert')

    <script>
   
   function typeproof() {
      type = $('#tipo').val();
      if(type == 'Engorde, Pastoreo o Invernada'){
         $('.typeproof').html('<option>DTE</option>');
         id = 1;
         $(".typeproof").each(function() {

            format(id , 'DTE');
            field = 'proof'+id+'c1';
            from(id+'-'+document.form[field].value,'tproof'+id,'../load/typeproof.php');
            id++;
         });
         setTimeout(function(){  $('.typeproof').html('<option>DTE</option>'); }, 1000);
         setTimeout(function(){  $('.typeproof').html('<option>DTE</option>'); }, 2000);
         setTimeout(function(){  $('.typeproof').html('<option>DTE</option>'); }, 5000);
         
      }else{

         $('.typeproof').html('<option value="">Seleccione un tipo</option><option>FACTURA A</option><option>FACTURA B</option><option>FACTURA C</option><option>REMITO</option><option>DTA</option><option>DTE</option><option>DTV</option><option>GUIA MINERIA</option><option>GUIA BOSQUES C</option><option>GUIA BOSQUES D</option><option>CARTA DE PORTE ELECTRONICA</option><option>OTROS</option>');
//         $('.typeproof').html('<option value="">Seleccione un tipo</option><option>FACTURA A</option><option>FACTURA B</option><option>FACTURA C</option><option>REMITO</option><option>DTA</option><option>DTE</option><option>DTV</option><option>GUIA MINERIA</option><option>GUIA BOSQUES C</option><option>GUIA BOSQUES D</option><option>CARTA DE PORTE</option><option>CARTA DE PORTE ELECTRONICA</option><option>OTROS</option>');
         
      }

   }


   $("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {

  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}


function formatCurrency(input, blur) {

  var input_val = input.val();

  if (input_val === "") { return; }

  var original_len = input_val.length;

  var caret_pos = input.prop("selectionStart");

  if (input_val.indexOf(",") >= 0) {

    var decimal_pos = input_val.indexOf(",");

    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    left_side = formatNumber(left_side);

    right_side = formatNumber(right_side);
    
    if (blur === "blur") {
      right_side += "00";
    }

    right_side = right_side.substring(0, 2);

    input_val = left_side + "," + right_side;

  } else {

    input_val = formatNumber(input_val);
    input_val = input_val;

    if (blur === "blur") {
      input_val += ",00";
    }
  }

  input.val(input_val);

  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


      
        $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-control').addClass("selected").html(fileName);
       }); 
       
       
       function controlCeros(){
		   
		   var x=1;
		   var band=false;
		   
		    $(".total_i").each(function() {
				
				    price_2 = document.getElementsByName("pro"+x+"c5")[0].value;
				    if (price_2==0 || price_2==""){
							band=true;
							//break;
					}
				x++;
		    });
		   
		   
		   return band;
		}

       function formula_e() {

        var x = 1;
        var total_p = 0;
        var total_c = 0;
        var total = 0;
        var totaltrs = 0;


        document.getElementById('paymentdata').style.display = "none";
        document.getElementsByName("payment")[0].required = false;
        document.getElementById('send').disabled = false;


        tipo = document.getElementsByName("tipo")[0].value;


         if(tipo == 'Remate'){

            document.getElementsByName("c")[0].disabled = false;
            document.getElementsByName("rs")[0].disabled = false;
            document.getElementsByName("l")[0].disabled = false;
            document.getElementsByName("cp")[0].disabled = false;
            document.getElementsByName("df")[0].disabled = false;

         }else{
            
            document.getElementsByName("c")[0].value = '{{ $datos['cuit'] }}';
            document.getElementsByName("cuit1")[0].value = '{{ $datos['cuit'] }}';

            document.getElementsByName("rs")[0].value = '{{ $datos['rs'] }}';
            document.getElementsByName("rs1")[0].value = '{{ $datos['rs'] }}';

            document.getElementsByName("l")[0].value = '{{ $datos['localidad'] }}';
            document.getElementsByName("l1")[0].value = '{{ $datos['localidad'] }}';

            document.getElementsByName("cp")[0].value = '{{ $datos['codigopostal'] }}';
            document.getElementsByName("cp1")[0].value = '{{ $datos['codigopostal'] }}';

            document.getElementsByName("df")[0].value = '{{ $datos['df'] }}';
            document.getElementsByName("df1")[0].value = '{{ $datos['df'] }}';

            var cleave = new Cleave('input[name="c"]', {
                  blocks: [2, 8, 1],
                  delimiter: '-',
                  numericOnly: true,
                  uppercase: true
            });


            document.getElementsByName("c")[0].disabled = true;
            document.getElementsByName("rs")[0].disabled = true;
            document.getElementsByName("l")[0].disabled = true;
            document.getElementsByName("cp")[0].disabled = true;
            document.getElementsByName("df")[0].disabled = true;

         }
         document.getElementsByName("tipo")[0].disabled = false;
         document.getElementsByName("intermediario")[0].disabled = false;
         $("#exampleModal").modal("hide");
         
        $(".total_i").each(function() {


            trs = 0;
            price = 0;
            porc = 0;
            

            cantidad = document.getElementById("cantidad"+x).value;

            if(cantidad === ""){

                cantidad = 1;
            }
            if(cantidad == 0){

                cantidad = 1;
                document.getElementById("cantidad"+x).value = 1;
            }
            

         product = document.getElementsByName("pro"+x+"c2")[0].value;

         price_1 = document.getElementsByName("pro"+x+"c4")[0].value;
         price_2 = document.getElementsByName("pro"+x+"c5")[0].value;
         
        


            if(price_2 === ""){

                price_2 = 0;

            }else{

               price_2 = price_2.replace(".", ".");
               price_2 = price_2.replace(",", ".");
               price_2 = parseFloat(price_2).toFixed( 2 );

            }
            
           //  console.log("price_2: "+price_2);

        trs = document.getElementsByName("rtrs"+x)[0].value;

        trs = parseFloat(trs)*parseInt(cantidad);


        if(parseFloat(price_1) > parseFloat(price_2)){

            price = price_1*cantidad;
            porc = parseFloat(price)*parseFloat('1.5')/parseInt(100);

        }else{

            price = price_2*cantidad;
            porc = parseFloat(price)*parseFloat('1.5')/parseInt(100);
        }

  //console.log("price: "+price);
       /* if(tipo == 'Remate'){

            price = price_2*cantidad;
            porc = parseFloat(price)*parseFloat('1.5')/parseInt(100);
        }*/






        if(document.getElementById('add'+x)){


        document.getElementById('add'+x).style['pointer-events'] = 'auto';
        }


        if(document.getElementsByName("final_p")[0].value != 'Santiago del Estero'){

         provincia = 'Si';
        }else{

         provincia = 'No';
        }

           


            if(provincia == 'Si'){



                if(tipo == 'Faena'){
                        porc = Math.floor(price*parseFloat(0.75))/100;


                        total_p += porc;


                        document.getElementById('iibb'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(porc).toFixed( 2 ));
                        document.getElementsByName("pro"+x+"c10")[0].value = parseFloat(porc).toFixed( 2 );

                }



                if(tipo == 'Venta' || tipo == 'Traslado a Remate' || tipo == 'Solo Traslado' ||  tipo == 'Remate' || tipo == 'Engorde, Pastoreo o Invernada'){


                        porc = Math.floor(price*parseFloat(0.75))/100;


                        total_p += porc;


                        document.getElementById('iibb'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(porc).toFixed( 2 ));
                        document.getElementsByName("pro"+x+"c10")[0].value = parseFloat(porc).toFixed( 2 );


                }




            }if(provincia == 'No'){
                


                if(tipo == 'Faena'){
                        porc = Math.floor(price*parseFloat(0.75))/100;;


                        total_p += porc;


                        document.getElementById('iibb'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(porc).toFixed( 2 ));
                        document.getElementsByName("pro"+x+"c10")[0].value = parseFloat(porc).toFixed( 2 );


                }
                
                
                if(tipo == 'Venta' || tipo == 'Solo Traslado' || tipo == 'Remate'){



                        porc = Math.floor(price*parseFloat(0.75))/100;;


                        total_p += porc;

                        document.getElementById('iibb'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(porc).toFixed( 2 ));
                        document.getElementsByName("pro"+x+"c10")[0].value = parseFloat(porc).toFixed( 2 );


                }


                if(tipo == 'Traslado a Remate' || tipo == 'Engorde, Pastoreo o Invernada'){


                        porc = 0;

                        total_p += porc;


                        document.getElementById('iibb'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(porc).toFixed( 2 ));
                        document.getElementsByName("pro"+x+"c10")[0].value = parseFloat(porc).toFixed( 2 );


                }


            }



                  if(product == 2 || product == 6){
                     total_p -= porc;
                     document.getElementById('iibb'+x).innerHTML = '$0,00';
                     document.getElementsByName("pro"+x+"c10")[0].value = '0.00';
                  }


                iibb = document.getElementsByName("pro"+x+"c10")[0].value;

                total_individual = parseFloat(iibb)+parseFloat(trs);

                document.getElementsByName("pro"+x+"c12")[0].value = parseFloat(total_individual).toFixed( 2 );
                document.getElementById('total_i'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(total_individual).toFixed( 2 ));

                document.getElementsByName("pro"+x+"c11")[0].value = parseFloat(trs).toFixed( 2 );
                document.getElementById('trs'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(trs).toFixed( 2 ));

                totaltrs += parseFloat(trs);
          x++;







        });


        total_i = 0;
        comi = parseFloat(0).toFixed( 2 );
        inter = document.getElementsByName("intermediario")[0].value;
        comi = document.getElementsByName("comi")[0].value;
        comi = comi.replace(".", "");
        comi = comi.replace(",", ".");
        comi = parseFloat(comi).toFixed( 2 );
        
        if(inter == 'Si'){

            total_i = comi;
            porc = parseFloat(total_i*5/100);
            total_i = porc;

            document.getElementById('total_i').innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(total_i).toFixed( 2 ));
        }else{


            document.getElementById('total_i').innerHTML = '$'+'0,00';

        }



        document.getElementById('total_p').innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(total_p).toFixed( 2 ));


        document.getElementById('totaltrs').innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(totaltrs).toFixed( 2 ));

        document.getElementsByName("total_p")[0].value = parseFloat(total_p).toFixed( 2 );
        document.getElementsByName("total_i")[0].value = parseFloat(total_i).toFixed( 2 );
        document.getElementsByName("totaltrs")[0].value = parseFloat(totaltrs).toFixed( 2 );

        

         if (document.getElementsByName("payment")) {
       
            if(document.getElementsByName("payment")[0].value == 'Pago Electronico'){
               total = parseFloat(total_p)+parseFloat(total_i)+parseFloat(totaltrs);
            }else{
               total = Math.round(parseFloat(total_p)+parseFloat(total_i)+parseFloat(totaltrs));
            }

         }else{
            total = Math.round(parseFloat(total_p)+parseFloat(total_i)+parseFloat(totaltrs));
         }




        document.getElementById('total').innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(total).toFixed( 2 ));

        document.getElementsByName("total")[0].value = parseFloat(total).toFixed( 2 );
        
            $(document.getElementsByName("nrot_trs")).each(function() {

                nrot_iibb = parseFloat(total_p);
                document.getElementById('snrot_trs').innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(totaltrs).toFixed( 2 ));
                document.getElementById('snrot_iibb').innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(nrot_iibb).toFixed( 2 ));



                if(parseFloat(totaltrs).toFixed( 2 ) > 0){

                    document.getElementsByName("nrot_trs")[0].disabled = false;
                    document.getElementsByName("nrot_trs")[0].required = true;


                }else{

                    document.getElementsByName("nrot_trs")[0].disabled = true;
                    document.getElementsByName("nrot_trs")[0].required = false;

                }


                if(parseFloat(nrot_iibb).toFixed( 2 ) > 0){


                    document.getElementsByName("nrot_iibb")[0].disabled = false;
                    document.getElementsByName("nrot_iibb")[0].required = true;

                }else{
                    document.getElementsByName("nrot_iibb")[0].disabled = true;
                    document.getElementsByName("nrot_iibb")[0].required = false;


                }


            });



            from('{{ $id+6000 }}'+'-'+document.form.payment.value+'-'+document.form.totaltrs.value+'-'+document.form.total_p.value+'-'+0+'-'+document.form.total_i.value+'-{{$url}}'+'-{{ $datos['cuit'] }}','payment','{{ asset('load/payment.php') }}')


         var total_elementos = document.getElementsByClassName("total_i").length;


         if(total > 0){

             document.getElementById('paymentdata').style.display = "block";
             document.getElementsByName("payment")[0].required = true;
             document.getElementById('send').disabled = true;
         
         }else{

            if(total_elementos > 0){
               document.getElementById('paymentdata').style.display = "none";
               document.getElementsByName("payment")[0].required = false;
               document.getElementsByName("payment")[0].value = '';
               document.getElementById('send').disabled = false;


            }else{


             document.getElementById('send').disabled = true;

            }

         
         }




        }








       function multiplicar_i(x) {

        if(document.getElementById("price_r"+x).value === ""){
            price = document.getElementById("price"+x).value;

        }else{

            price = document.getElementById("price_r"+x).value;
        }


        cantidad = document.getElementById("cantidad"+x).value;

        total = parseFloat(price) * parseInt(cantidad);


        document.getElementsByName("pro"+x+"c12")[0].value = parseFloat(total).toFixed( 2 );
        document.getElementById('total_i'+x).innerHTML = '$'+new Intl.NumberFormat("de-DE").format(parseFloat(total).toFixed( 2 ));
        }






       function sumar() {


        var total = 0;
        var x = 1;

        $(".monto").each(function() {

            value = document.getElementById("cantidad"+x).value;

          if (isNaN(parseFloat($(this).val())) * parseInt(value)) {
        
            total += 0;
        
          } else {
        
            total += parseFloat($(this).val() * parseInt(value));
        
          }
          x++;
        });


        document.getElementById('total').innerHTML = parseFloat(total).toFixed( 2 );

        }
    




        function local(value){

            if(value == 'Otra Localidad'){

                document.getElementsByName("origen_l_text")[0].disabled = false;
                document.getElementsByName("origen_l_text")[0].required = true;
            }else{

                document.getElementsByName("origen_l_text")[0].disabled = true;
                document.getElementsByName("origen_l_text")[0].required = false;
            }


        }

        function sendbutton(){
			
			var	ceros=controlCeros();
			
			if (ceros){
				
						     bootbox.alert({
    message: "Existen valores nulos en la columna Valor Real de Venta Unitario",
    size: 'large'
});
    }
			
			
				
			//	console.log("ceros " + ceros);
			//	console.log("payment " + document.getElementsByName("payment")[0].value);
				//console.log("receptoria " + document.getElementsByName("receptoria")[0].value);
            
            if(document.getElementsByName("payment")[0].value === '' && ceros){

                document.getElementById('send').disabled = true;

            }else{

                if(document.getElementsByName("payment")[0].value == 'Pago Electronico' && !ceros){
                  document.getElementById('send').disabled = false;

                }else{
					
					 if(document.getElementsByName("payment")[0].value == 'Pago Electronico' && ceros){
							document.getElementById('send').disabled = true;
					}else{
					
						if (document.getElementsByName("payment")[0].value=='Pago En Receptoria' && ceros ){
						
						  document.getElementById('send').disabled = true;
					}else{
						
							 if(document.getElementsByName("receptoria")[0].value != '' && !ceros){

									document.getElementById('send').disabled = false;

							}
					}
					
					
					}
					
				

                   

                   
                }
                


            }


        }


        function showinter(value){
            

            if(document.getElementsByName("intermediario")[0].value == 'Si'){
            
                document.getElementById("inter").style.display = "block";
                document.getElementsByName("comi")[0].required = true;

            }else{

                document.getElementById("inter").style.display = "none";
                document.getElementsByName("comi")[0].required = false;
                document.getElementsByName("comi")[0].value = '';
                formula_e();
            }





        }





        function tt(){

            $('[data-toggle="tooltip"]').tooltip();  

        }




    </script>


    <script>


        var cleave = new Cleave('input[name="c"]', {
            blocks: [2, 8, 1],
            delimiter: '-',
            numericOnly: true,
            uppercase: true
        });
        var cleave = new Cleave('input[name="cuit1"]', {
            blocks: [2, 8, 1],
            delimiter: '-',
            numericOnly: true,
            uppercase: true
        });
        var cleave = new Cleave('input[name="cuit2"]', {
            blocks: [2, 8, 1],
            delimiter: '-',
            numericOnly: true,
            uppercase: true
        });
        var cleave = new Cleave('input[name="cuit3"]', {
            blocks: [2, 8, 1],
            delimiter: '-',
            numericOnly: true,
            uppercase: true
        });
        var cleave = new Cleave('input[name="cuit4"]', {
            blocks: [2, 8, 1],
            delimiter: '-',
            numericOnly: true,
            uppercase: true
        });
/*         var cleave = new Cleave('input[name="cuitc4"]', {
            blocks: [2, 8, 1],
            delimiter: '-',
            numericOnly: true,
            uppercase: true
        }); */





        function format(x , value){



            if(value == 'FACTURA A' || value == 'FACTURA B' || value == 'FACTURA C' || value == 'REMITO'){

                var cleave = new Cleave('#proof'+x+'c2', {
                    blocks: [5, 8],
                    delimiter: '-',
                    numericOnly: true,
                    uppercase: true
                });

                
            }

            if(value == 'DTA' || value == 'DTE'){

                var cleave = new Cleave('#proof'+x+'c2', {
                    blocks: [9, 1],
                    delimiter: '-',
                    numericOnly: true,
                    uppercase: true
                });


            }


            if(value == 'DTV'){

                var cleave = new Cleave('#proof'+x+'c2', {
                    blocks: [8, 1],
                    delimiter: '-',
                    numericOnly: true,
                    uppercase: true
                });


            }

            if(value == 'GUIA MINERIA'){

                var cleave = new Cleave('#proof'+x+'c2', {
                    blocks: [3, 5, 4],
                    delimiter: '/',
                    numericOnly: true,
                    uppercase: true
                });

            }

            if(value == 'GUIA BOSQUES C' || value == 'GUIA BOSQUES D'){

                var cleave = new Cleave('#proof'+x+'c2', {
                    blocks: [8],
                    numericOnly: true,
                    uppercase: true
                });


            }

//            if(value == 'CARTA DE PORTE'){
//
//                var cleave = new Cleave('#proof'+x+'c2', {
//                    blocks: [14, 1],
//                    delimiter: '-',
//                    numericOnly: true,
//                    uppercase: true
//                });
//
//
//            }
            if(value == 'CARTA DE PORTE ELECTRONICA'){

                var cleave = new Cleave('#proof'+x+'c2', {
                    blocks: [5, 8],
                    delimiter: '-',
                    numericOnly: true,
                    uppercase: true
                });


            }
            if(value == 'OTROS'){


                var cleave = new Cleave('#proof'+x+'c2', {
                     numericOnly: true,
                     uppercase: true
                });


            }


        }



      function completeproof(x, value){


            if(value == 'FACTURA A' || value == 'FACTURA B' || value == 'FACTURA C' || value == 'REMITO'){

               valor = document.getElementsByName('proof'+x+'c2')[0].value;
               valor = valor.replace('-','');

               t = valor.length;
               

               while(t <= 12){

                  valor = 0+valor;
                  t = t+1;
               }
               valor = valor[0]+valor[1]+valor[2]+valor[3]+valor[4]+'-'+valor[5]+valor[6]+valor[7]+valor[8]+valor[9]+valor[10]+valor[11]+valor[12];


               document.getElementsByName('proof'+x+'c2')[0].value = valor;


                
            }

            if(value == 'DTA' || value == 'DTE'){

               valor = document.getElementsByName('proof'+x+'c2')[0].value;
               valor = valor.replace('-','');

               t = valor.length;
               

               while(t < 10){

                  valor = 0+valor;
                  t = t+1;
               }
               valor = valor[0]+valor[1]+valor[2]+valor[3]+valor[4]+valor[5]+valor[6]+valor[7]+valor[8]+'-'+valor[9];


               document.getElementsByName('proof'+x+'c2')[0].value = valor;



            }


            if(value == 'DTV'){


               valor = document.getElementsByName('proof'+x+'c2')[0].value;
               valor = valor.replace('-','');

               t = valor.length;
               


               while(t < 9){

                  valor = 0+valor;
                  t = t+1;
               }
               valor = valor[0]+valor[1]+valor[2]+valor[3]+valor[4]+valor[5]+valor[6]+valor[7]+'-'+valor[8];


               document.getElementsByName('proof'+x+'c2')[0].value = valor;



            }

            if(value == 'GUIA MINERIA'){


               valor = document.getElementsByName('proof'+x+'c2')[0].value;

               valor = valor.replace('/','');
               valor = valor.replace('/','');

               t = valor.length;

               while(t < 12){

                  valor = 0+valor;
                  t = t+1;
               }
               valor = valor[0]+valor[1]+valor[2]+'/'+valor[3]+valor[4]+valor[5]+valor[6]+valor[7]+'/'+valor[8]+valor[9]+valor[10]+valor[11];


               document.getElementsByName('proof'+x+'c2')[0].value = valor;


            }


            if(value == 'GUIA BOSQUES C' || value == 'GUIA BOSQUES D'){

               valor = document.getElementsByName('proof'+x+'c2')[0].value;

               t = valor.length;

               while(t < 8){

                  valor = 0+valor;
                  t = t+1;
               }


               document.getElementsByName('proof'+x+'c2')[0].value = valor;

            }


//            if(value == 'CARTA DE PORTE'){
//
//               valor = document.getElementsByName('proof'+x+'c2')[0].value;
//               valor = valor.replace('-','');
//
//               t = valor.length;
//
//               while(t < 15){
//
//                  valor = 0+valor;
//                  t = t+1;
//               }
//
//
//               valor = valor[0]+valor[1]+valor[2]+valor[3]+valor[4]+valor[5]+valor[6]+valor[7]+valor[8]+valor[9]+valor[10]+valor[11]+valor[12]+valor[13]+'-'+valor[14];
//
//
//               document.getElementsByName('proof'+x+'c2')[0].value = valor;
//
//
//            }
            if(value == 'CARTA DE PORTE ELECTRONICA'){

               valor = document.getElementsByName('proof'+x+'c2')[0].value;
               valor = valor.replace('-','');

               t = valor.length;

               while(t < 13){

                  valor = 0+valor;
                  t = t+1;
               }


               valor = valor[0]+valor[1]+valor[2]+valor[3]+valor[4]+'-'+valor[5]+valor[6]+valor[7]+valor[8]+valor[9]+valor[10]+valor[11]+valor[12];


               document.getElementsByName('proof'+x+'c2')[0].value = valor;


            }



      }



    </script>


    <script type="text/javascript">
    
      function reverseNumber(input) {
       return [].map.call(input, function(x) {
          return x;
        }).reverse().join(''); 
      }
      
      function plainNumber(number) {
         return number.split('.').join('');
      }
      
      function splitInDots(input) {

         var letras="abcdefghyjklmnñopqrstuvwxyz";
         value = input.value;
         value= value.toLowerCase();
         for(i=0; i<value.length; i++){
            if (letras.indexOf(value.charAt(i),0)!=-1){
               l = value.charAt(i);
               input.value = value.replace(l, "");
            }
         }
        var value = input.value,
            value = value.replace(/[^\d\,]/g,""),
            value = value.replace('.',""),
            value = value.replace(',',".0"); 

            normal = new Intl.NumberFormat("de-DE").format(value)

        /*  var value = input.value,
            value = value.replace(/\D/g,""),
            plain = plainNumber(value),
            reversed = reverseNumber(plain),
            reversedWithDots = reversed.match(/.{1,3}/g).join('.'),
            normal = reverseNumber(reversedWithDots); */


        input.value = normal;
      }
      
      function oneDot(input) {
        var value = input.value,
            value = plainNumber(value);
        
        if (value.length > 3) {
          value = value.substring(0, value.length - 3) + '.' + value.substring(value.length - 3, value.length);
        }

        input.value = value;
      }



      var perfEntries = performance.getEntriesByType("navigation");

      if (perfEntries[0].type === "back_forward") {

         location.reload(true);
         
      }



    </script>



<script src="{{ asset('bootbox/bootbox.js') }}" ></script>
    </body>
</html>
