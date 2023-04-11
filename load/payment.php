

<?php

extract($_REQUEST);

$data = $_GET['id'];

$array = explode("-", $data);

$guia = $array[0];
$tipo = $array[1];
$trs = $array[2];
$iibb = number_format($array[3]+$array[4]+$array[5], 2, '.', '');
$url = $array[6].'/payment';
$cuit = $array[7];


if($trs == 0){

    $option1 = 'disabled';
}else{

    $option1 = 'required';

}

if($iibb == 0){

    $option2 = 'disabled';
}else{

    $option2 = 'required';

}


@include('receptorias.php');

//echo $url;
//var_dump($receptorias);
?>


<?php if($tipo == 'Pago En Receptoria'){ ?>
                                            <!--/row-->
                                            <div class="row">
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Receptoría</label>
                                                     <div class="col-md-9">
                                                        <select id="selectact" name="receptoria" onchange="sendbutton();" class="form-control input-delimiter" required>

                                                            <option value="">Seleccione una receptoría</option>

                                                            <?php foreach($receptorias as $receptoria){ ?>

                                                            <option value="<?=$receptoria->id?>"><?=$receptoria->localidad.' - '.$receptoria->n?></option>
                                                            <?php } ?>
                                                        </select>
                                                     </div>
                                                  </div>
                                               </div>

                                            </div>

<iframe style="display:none" onload="actselec()" />

<?php }

if($tipo == 'Pago Electronico'){ ?>
<iframe style="display:none" onload="sendbutton()" />

<!--                                            
                                            <div class="row">
                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Nro de transacción de Pago de  TRS <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="El número de transacción de pago lo obtendrás del comprobante emitido por la entidad bancaria una vez que hayas efectuado el pago"></span>:</label>
                                                     <div class="col-md-9">
                                                        <div class="input-group"> 
                                                            
                                                        <input type="text" onkeyup="sendbutton()" class="form-control" placeholder="" name="nrot_trs" <?=$option1?>>
                                                            <span class="input-group-addon" id="snrot_trs">$<?=$trs?></span>

                                                        </div>

                                                        
                                                     </div>
                                                  </div>
                                               </div>

                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                    <button type="button" onclick="window.open('<?=$url?>/<?=$guia?>/<?=$cuit?>/<?=$trs?>/<?=$iibb?>','mywin','width=600,height=850');" class="btn btn-success" style="width: 100%; margin-bottom:20px;width: 100%; margin-bottom: 20px; background: #0C7AFF; height: 51px; font-size: 17px; border: none !important; height: 51px; font-size: 17px;"><span class="glyphicon glyphicon-credit-card"></span> Clic Aquí Para Generar VEP</button>

                                                  </div>
                                               </div>

                                               
                                            </div>
                                              
                                            <div class="row">

                                               <div class="col-md-6">
                                                  <div class="form-group">
                                                     <label class="control-label col-md-3">Nro de transacción de Pago de IIBB <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="El número de transacción de pago lo obtendrás del comprobante emitido por la entidad bancaria una vez que hayas efectuado el pago"></span>: </label>
                                                     <div class="col-md-9">
                                                        <div class="input-group"> 
                                                            
                                                            <input type="text" onkeyup="sendbutton()" class="form-control" placeholder="" name="nrot_iibb" <?=$option2?>>
                                                            <span class="input-group-addon" id="snrot_iibb">$<?=$iibb?></span>

                                                        </div>
                                                        
                                                     </div>
                                                  </div>
                                               </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">

                                                     <label class="control-label col-md-3"><span class="glyphicon glyphicon-warning-sign"></span></label>
                                                     <div class="col-md-9">
                                                       IMPORTANTE: Generado el Vep, deberán ingresar al home banking de su cuenta bancaria para efectivizar el pago. Una vez realizado el pago debe completar los datos en este formulario para generar la guía electrónica.
                                                       

                                                       
                                                       <!-- RECUERDE QUE EN EL NRO DE REFERENCIA DE PAGO A INGRESAR DEBE SER EL DE LA GUÍA
                                                        <br><br>SU NRO DE GUÍA ES: <?= $guia ?>-->
                                                     </div>
                                                  </div>
                                               </div>
                                            </div>

-->



<?php } ?>

<iframe style="display:none" onload="tt()" />
<iframe style="display:none" onload="sendbutton()" />
