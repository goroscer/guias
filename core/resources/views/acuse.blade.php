<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="IntelSGO">
      <title>Guía 2.0 - Acuse</title>



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
                    <img style="width: 50px; height: 50px; visibility:hidden" src="{{ asset('images/logo-sge.png') }}">
                  
               </div>
               <div class="col-lg-3 col-sm-8 col-md-3 col-xs-12">
                  <ol class="breadcrumb">
                     
                  </ol>
               </div>
            </div>

            <img style="position:absolute;top:10;float: right; z-index:0" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(180)->generate(Request::url())) }}">


            <div class="row">
               <div class="col-md-2"> </div>
               <div class="col-md-8 col-md-81">
                  <div class="panel panel-info">
                     <div class="panel-heading" style="text-align: center;"></div>
                     <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">



                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| ACUSE DE RECIBO</h3>


                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3"><strong>CUIT GENERADOR: </strong></label>{{ $form->cuit }}
                                       </div>
                                    </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3"><strong>GUÍA N°: </strong></label>{{ $form->id+6000 }}
                                       </div>
                                    </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3"><strong>IMPORTE A PAGAR: </strong></label>${{ $form->r5 }}
                                       </div>
                                    </div>


                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3"><strong>RECEPTORÍA: </strong></label>{{ $receptoria }}
                                       </div>
                                    </div>


                                 </div>


                                 <p class="text-muted" style="font-size: 20px;    font-weight: 400; text-align:center;">Estimado contribuyente, deberá dirigirse a la receptoría seleccionada para abonar y retirar su Guía Electrónica y comprobante de pago.</p>

                                 <!--/row-->
 

                                    
                                    <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">

                                       <div class="col-md-6">
                                          <p class="text-muted" style="font-size: 20px;    font-weight: 400; text-align:right;">Fecha de vencimiento de la guía: <span style="font-size: 20px; color: blue; margin-left: 4px;">{{ $venci }}</span></p>
                                       </div>

                                       <div class="col-md-6">
                                          <p class="text-muted" style="font-size: 20px;    font-weight: 400; text-align:right;">Acuse impreso vía web en fecha : <span style="font-size: 20px; color: blue; margin-left: 4px;">{{ $date }}</span></p>
                                       </div>
                                    </div>


                                 </div>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
            </div>

         </div>
      </div>





    
    </body>
</html>