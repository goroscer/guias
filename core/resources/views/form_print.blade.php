

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="IntelSGO">
      <title>Guía Electrónica - Formulario</title>

    <style>

@page { margin-bottom:0px; }


.divTable{
	display: table;
	width: 45%;
    position:absolute;top:45;right: 170;
}
.divTableRow {
	display: table-row;
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	border: 1px solid #999999;
	display: table-cell;

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
  
.box-title {
	margin-bottom: 5px;
}


    </style>

   </head>
   <body class="fix-sidebar">

  
    <p style="text-align:center; z-index:1">GUÍA ELECTRÓNICA DE PRODUCTOS EN TRÁNSITO<br><strong>Tipo de Operación: </strong>{{ $form->tipo }}</p>


                  <h4 class="page-title">
                     <img style="max-width: 155px; " src="http://www.dgrsantiago.gov.ar/wp-content/uploads/2017/12/cropped-logodgr.jpg">
                  </h4>


                <div class="divTable" >
                    <div class="divTableBody">
                    <div class="divTableRow">
                    <div class="divTableCell">GUÍA ELECTRÓNICA N.º :</div>
                    <div class="divTableCell">{{ $form->id+6000 }}</div>
                    </div>
                    <div class="divTableRow">
                    <div class="divTableCell">GENERADA:</div>
                    <div class="divTableCell">{{ $generada }}</div>
                    </div>
                    <div class="divTableRow">
                    <div class="divTableCell">VENCIMIENTO:</div>
                    <div class="divTableCell">{{ $vencimiento }}</div>
                    </div>
                    <div class="divTableRow">
                    <div class="divTableCell">CUIT GENERADOR:</div>
                    <div class="divTableCell">{{ $form->cuit }}</div>
                    </div>
                    </div>
                </div>

                    <img style="position:absolute;top:20;float: right; z-index:0" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(180)->generate(Request::url())) }}">

                    


<br>
    <label class="control-label col-md-3" style="font-size: 14px; color: red; margin-left: 4px; text-align: center; z-index:0; ">ESTA GUÍA SOLO ES VÁLIDA SI ES ACOMPAÑADA POR LA CONSTANCIA DE PAGO</label>



                                 <h3 style="background-color: #787878;  color: white; z-index:1">| Datos del Productor - Vendedor</h3>
                                 

                                          <strong>CUIT: </strong>{{ $form->cuit1 }} - <strong>Apellido y Nombre/ Razón Social:</strong> {{ $form->rs1 }}



                                 </div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Localidad: </strong>{{ $form->l1 }} - <strong>C.P.: </strong>{{ $form->cp1 }}
                                       </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><strong>Domicilio Fiscal: </strong>{{ $form->df1 }}
                                        </div>
                                     </div>
                                    <!--/span-->
                                 </div>




























                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878;  color: white;">| Datos del Intermediario</h3>
                                 

                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Existe Intermediario: </strong>{{ $form->intermediario }}
                                       </div>
                                    </div>

                                 </div>
                        @if($form->intermediario != 'No')
                            <div id="inter">
                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>CUIT: </strong>{{ $form->cuit2 }} - <strong>Apellido y Nombre/ Razón Social: </strong>{{ $form->rs2 }}
                                       </div>
                                    </div>

                                 </div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Localidad: </strong>{{ $form->l2 }} - <strong>C.P.: </strong>{{ $form->cp2 }}
                                       </div>
                                    </div>

                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label class="control-label col-md-2"><strong>Domicilio Fiscal: </strong>{{ $form->df2 }}
                                       </div>
                                    </div>
                                    <!--/span-->
                                 </div>
                                 <div class="col-md-12">
                                  <div class="form-group">
                                    <strong>Comisión: </strong>$@if(!empty($form->comi) AND $form->comi >0) {{  number_format($form->comi, 2, ',', '.') }} @else 0.00 @endif
                                    
                                  </div>
                               </div>

                                 
                                </div>

                            @endif







                                 <div class="form-body">
                                        <h3 class="box-title" style="background-color: #787878;  color: white;">| Origen de la Operación</h3>
                                        
       
                                        <div class="row">
       
       
                                           <div class="col-md-6">
                                              <div class="form-group">
                                                 <strong>Nombre del Establecimiento: </strong>{{ $form->origen_estable }} - <strong>Localidad: </strong>{{ $form->origen_l }}
                                              </div>
                                           </div>
       

                                           <div class="col-md-6">
                                                <div class="form-group">
                                                   <strong>Domicilio: </strong>{{ $form->origen_domi }}
                                                </div>
                                            </div>



                                        </div>


                                    </div>

















                                    <div class="form-body">
                                            <h3 class="box-title" style="background-color: #787878;  color: white;">| Destino de la Operación</h3>
                                            
           
           
           
                                            <div class="row">
           
           
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <strong>Provincia: </strong>{{ $form->final_p }} - <strong>Localidad: </strong>{{ $form->final_l }}
                                                  </div>
                                               </div>

           
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                    <strong>Nombre del Establecimiento: </strong>{{ $form->final_estable }} - <strong>Domicilio: </strong>{{ $form->final_domi }}
                                                  </div>
                                               </div>


                                            </div>






















                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878;  color: white;">| Datos del Destinatario/Comprador</h3>
                                 
                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>CUIT: </strong>{{ $form->cuit3 }} - <strong>Apellido y Nombre/ Razón Social: </strong>{{ $form->rs3 }}
                                       </div>
                                    </div>

                                 </div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Localidad: </strong>{{ $form->l3 }} - <strong>C.P.: </strong>{{ $form->cp3 }}
                                       </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <label class="control-label col-md-2"><strong>Domicilio Fiscal: </strong>{{ $form->df3 }}
                                        </div>
                                     </div>

                                    <!--/span-->
                                 </div>
       





                                    

















                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878;  color: white;">| Datos del Transporte</h3>
                                 
                                 <div class="row">


                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>CUIT del Transportista: </strong>{{ $form->cuit4 }} - <strong>Razón Social: </strong>{{ $form->rs4 }}
                                       </div>
                                    </div>

                                 </div>
                                 <!--/row-->
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Dominio del Vehículo: </strong>{{ $form->d4 }}
                                       </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Dominio del Acoplado: </strong>{{ $form->p4 }}
                                       </div>
                                    </div>


                                    {{-- <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>CUIT/CUIL del Chofer: </strong>{{ $form->cuitc4 }} - <strong>Apellido y Nombre: </strong>{{ $form->nombre4 }}
                                       </div>
                                    </div> --}}


                                 </div>
                                 
                                 
                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878;  color: white;">| Documentación Fiscal para Circular </h3>
                                 

                               
                                          <div class="row">      

                               @foreach($proofs as $proof)
             

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <strong>Tipo de comprobante: </strong>{{ $proof->tipo }} - <strong>Nº: </strong>{{ $proof->nro }} - <strong>Fecha: </strong>{{ $proof->fecha }}

                                       </div>
                                    </div>

                                 </div>


                                @endforeach




                                    <h3 class="box-title" style="background-color: #787878;  color: white;">| Detalle de lo Transportado</h3>
                                    

                                                    @foreach($products as $product)
                                    
                     
                                    <strong>Categoría: </strong>{{ $product->c1 }} - <strong>Producto: </strong>{{ $product->c2 }}<br>


                                    <strong>Cantidad: </strong>@if(!empty($product->c6)){{ $product->c6 }}@else NO REGISTRA DATO. @endif - <strong>Unidad: </strong>@if(!empty($product->c3)){{ $product->c3 }}@else NO REGISTRA DATO. @endif<br>
                                    
                                    <strong>Valor Fiscal: </strong>@if(!empty($product->c4))${{ number_format($product->c4, 2, ',', '.') }}@else NO REGISTRA DATO. @endif - <strong>Valor Real de Venta: </strong>@if(!empty($product->c5))${{ number_format($product->c5, 2, ',', '.') }}@else NO REGISTRA DATO. @endif<br>


                                    {{-- <strong>Destino Fuera de la Provincia: </strong>@if(!empty($product->c9)){{ $product->c9 }}@else NO REGISTRA DATO. @endif<br> --}}


                                    <strong>Importe IIBB: </strong>@if(!empty($product->c10))${{ number_format($product->c10, 2, ',', '.') }}@else NO REGISTRA DATO. @endif - <strong>Importe TRS: </strong>@if(!empty($product->c11))${{ number_format($product->c11, 2, ',', '.') }}@else NO REGISTRA DATO. @endif - <strong>Total General: </strong>@if(!empty($product->c12))${{ number_format($product->c12, 2, ',', '.') }}@else NO REGISTRA DATO. @endif<br>



                                    

                                                    @endforeach
                                                
                                    



<h3 class="box-title" style="background-color: #787878;  color: white;">| Detalle Desglosado</h3>


<strong>Productor: </strong>$@if(!empty($form->r1) AND $form->r1 > 0) {{ number_format($form->r1, 2, ',', '.') }} @else 0,00 @endif - 

<!--<strong>Comprador: </strong>$@if(!empty($form->r2) AND $form->r2 > 0) {{ number_format($form->r2, 2, ',', '.') }} @else 0,00 @endif - -->

<strong>Intermediario: </strong>$@if(!empty($form->r3) AND $form->r3 > 0) {{ number_format($form->r3, 2, ',', '.') }} @else 0,00 @endif - 

<strong>Total de TRS: </strong>$@if(!empty($form->r4) AND $form->r4 > 0) {{ number_format($form->r4, 2, ',', '.') }} @else 0,00 @endif


                                 @if($form->r5 > 0)

                                      <div class="form-body">
                                            <h3 class="box-title" style="background-color: #787878;  color: white;">| Datos de Pago</h3>

           
           
                                            <div class="row">
           
                                                    
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                        <strong>Opciones: </strong>{{ $form->payment }}
                                                  </div>
                                               </div>
                                            </div>
                                        @if($form->payment == 'Pago En Receptoria')

                                           <!--/row-->
                                           <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                        <strong>Receptoría: </strong>{{ $receptoria }}


                                                   </div>
                                                </div>
 
                                             </div>




                                        @else

                                          
                                          <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group">

                                                      <strong>Nro de transacción de Pago de  TRS ($@if($form->r4 >0 ) {{  number_format($form->r4, 2, ',', '.') }} @else 0,00 @endif):</strong>
                                                      @if(!empty($form->nrot_trs)){{ $form->nrot_trs }}@else NO REGISTRA DATO. @endif
                                                      
                                                   </div>
                                                </div>

                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      
                                                      <strong>Nro de transacción de Pago de IIBB ($@if($form->r1+$form->r3 >0) {{  number_format($form->r1+$form->r3, 2, ',', '.') }} @else 0,00 @endif): </strong>
                                                      @if(!empty($form->nrot_iibb)){{ $form->nrot_iibb }}@else NO REGISTRA DATO. @endif

                                                   </div>
                                                </div>
                                             </div>

                                        @endif
                                       @endif

                                       
                                        <strong>Total a Pagar: </strong>$@if(!empty($form->r5) AND $form->r5 > 0) {{ number_format($form->r5, 2, ',', '.') }} @else 0,00 @endif









    
    </body>
</html>