<?php

  extract($_REQUEST);

  $idd = $_GET['id'];

  $id = $idd+1;

  $idm = $idd-1;

?>



                                        <button type="button" onclick="from(<?=$idd?>,'e<?=$idd?>','../load/proof.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Agregar otro Comprobante</button>

                                        <button type="button" onclick="from(<?=$idm?>,'e<?=$idm?>','../load/ebutton.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Quitar otro Comprobante</button>