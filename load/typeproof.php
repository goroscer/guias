<?php

extract($_REQUEST);

$data = $_GET['id'];

$array = explode("-", $data);

$id = $array[0];
$tipo = $array[1];


?>


                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">TIPO DE COMPROBANTE:</label>
                                          <div class="col-md-9">
                                                <select name="proof<?=$id?>c1" class="form-control typeproof" required onchange="from(<?=$id?>+'-'+document.form.proof<?=$id?>c1.value,'tproof<?=$id?>','../load/typeproof.php');"">
                                                    <option value="">Seleccione un tipo</option>
                                                    <option <?php if($tipo == 'FACTURA A'){ echo 'SELECTED'; } ?> >FACTURA A</option>
                                                    <option <?php if($tipo == 'FACTURA B'){ echo 'SELECTED'; } ?> >FACTURA B</option>
                                                    <option <?php if($tipo == 'FACTURA C'){ echo 'SELECTED'; } ?> >FACTURA C</option>
                                                    <option <?php if($tipo == 'REMITO'){ echo 'SELECTED'; } ?> >REMITO</option>
                                                    <option <?php if($tipo == 'DTA'){ echo 'SELECTED'; } ?> >DTA</option>
                                                    <option <?php if($tipo == 'DTE'){ echo 'SELECTED'; } ?> >DTE</option>
                                                    <option <?php if($tipo == 'DTV'){ echo 'SELECTED'; } ?> >DTV</option>
                                                    <option <?php if($tipo == 'GUIA MINERIA'){ echo 'SELECTED'; } ?> >GUIA MINERIA</option>
                                                    <option <?php if($tipo == 'GUIA BOSQUES C'){ echo 'SELECTED'; } ?>>GUIA BOSQUES C</option>
                                                    <option <?php if($tipo == 'GUIA BOSQUES D'){ echo 'SELECTED'; } ?>>GUIA BOSQUES D</option>
                                                    <!--<option < if($tipo == 'CARTA DE PORTE'){ echo 'SELECTED'; } ?> >CARTA DE PORTE</option>-->
                                                    <option <?php if($tipo == 'CARTA DE PORTE ELECTRONICA'){ echo 'SELECTED'; } ?> >CARTA DE PORTE ELECTRONICA</option>
                                                    <option <?php if($tipo == 'OTROS'){ echo 'SELECTED'; } ?> >OTROS</option>
                                                </select>
                                          </div>
                                       </div>
                                    </div>



                                    <?php if($tipo == 'OTROS'){ ?>
                                    
                                    
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nombre: </label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" name="proof<?=$id?>c4" placeholder="" autocomplete="off" >
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Adjuntar: </label>
                                          <div class="col-md-9">
                                            <input type="file" class="form-control" name="file[<?=$id?>]" required>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <?php } ?>

                                     
                               <?php if($tipo == 'CARTA DE PORTE ELECTRONICA'){ ?>
                                    
                                    
                                    

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Adjuntar: </label>
                                          <div class="col-md-9">
                                            <input type="file" class="form-control" name="file[<?=$id?>]" required>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <?php } ?>

                                    <?php if($tipo == 'DTE'){ ?>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Adjuntar: </label>
                                          <div class="col-md-9">
                                            <input type="file" class="form-control" name="file[<?=$id?>]" required>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <?php } ?>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Nº</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" id="proof<?=$id?>c2" name="proof<?=$id?>c2" placeholder="" autocomplete="off" required onfocusout="completeproof(<?=$id?> , '<?=$tipo?>')">
                                          </div>
                                       </div>
                                    </div>

                                 </div>

<iframe style="display:none" onload="format(<?=$id?> , '<?=$tipo?>')" />
