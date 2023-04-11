<?php

  extract($_REQUEST);

  $idd = $_GET['id'];

  $id = $idd+1;



  $fecha = date('Y-m-d');
  $fecha = strtotime ('-12 month', strtotime($fecha));
  $mincomp = date('Y-m-d', $fecha);

?>


                              <div class="form-body">
                                 <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;">| DOCUMENTACION FISCAL PARA CIRCULAR </h3>
                                 <hr class="m-t-0 m-b-40">
                                <div id="tproof<?=$id?>">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">TIPO DE COMPROBANTE:</label>
                                          <div class="col-md-9">
                                                <select name="proof<?=$id?>c1" class="form-control typeproof" onchange="from(<?=$id?>+'-'+document.form.proof<?=$id?>c1.value,'tproof<?=$id?>','../load/typeproof.php')" >
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
                                                    <!--<option>CARTA DE PORTE</option>-->
                                                    <option>CARTA DE PORTE ELECTRONICA</option>
                                                    <option>OTROS</option>
                                                </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nº</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" id="proof<?=$id?>c2" name="proof<?=$id?>c2" placeholder="" autocomplete="off" required>
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
                                            <input type="date" name="proof<?=$id?>c3" class="form-control" required min="<?=$mincomp?>">
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


                                <div id="e<?=$id?>">
                                      <?php if($id != 9){ ?>
                                        <a onclick="from(<?=$id?>,'e<?=$id?>','../load/proof.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Agregar Comprobante</a>
                                      <?php } ?>
                                        <a onclick="from(<?=$idd?>,'e<?=$idd?>','../load/ebutton.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Quitar Comprobante</a>


                                </div>

 <iframe style="display:none" onload="typeproof()" />