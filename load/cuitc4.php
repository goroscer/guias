<?php

  extract($_REQUEST);

  $ccuit = $_GET['id'];
  $cuit = str_replace("-", "", $ccuit);
  
  if(empty($cuit)){

    $cuit = 1;
 
    }

  $actual_link = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  $actual_link = explode("/", $actual_link);
  
  $c = count($actual_link);
  
  $d1 = $c-1;
  $d2 = $c-2;
  
  unset($actual_link[$d1]);
  unset($actual_link[$d2]);
  
  $data_link = $actual_link;
  
  if (isset($_SERVER['HTTPS'])){
  
      $actual_link = 'https://';
  
  }else{
  
      $actual_link = 'http://';
  
  }
  
  
  foreach($data_link as $link){
  
      $actual_link .= $link.'/';
  
  }
  
  $actual_link .= '/querycuit'.'/'.$cuit;
  
  
  $ch = curl_init();
 
  curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $actual_link);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

  $cont = curl_exec($ch);
  curl_close($ch);

  $datos = json_decode($cont);



?>

                                 <div class="row">

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label class="control-label col-md-3">Apellido y Nombre</label>
                                          <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="" name="nombre4" required value="<?=$datos->rs?>">
                                          </div>
                                       </div>
                                    </div>
                                    </div>

                                    <?php 
                                    if(strlen($cuit) < 11){

                                        echo '<center style="color:#FF0000;">Cuit ingresado incorrecto, vuelva a ingresarlo.</center>';

                                    }else{
                                        if($datos->rs == ''){

                                            echo '<center style="color:#FF0000;">Usted no se encuentra empadronado en la Dirección General de Rentas de Santiago del Estero. Complete los datos manualmente.<br></center>';
                                            
                                    ?>

                                            <!--<center><button type="button" onclick="window.open('http://alta.dgrsantiago.gob.ar','mywin','width=500,height=500');" class="btn btn-success" style="margin-bottom:20px; margin-bottom: 20px; background: #0C7AFF; height: 51px; font-size: 17px; border: none !important; height: 51px; font-size: 17px;">Clic aquí para iniciar empadronamiento.</button>-->



                                    <?php
                                        }
                                    }
                                    
                                    ?>