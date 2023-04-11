<?php

extract($_REQUEST);

$id = $_GET['id'];

$data = $array = explode("-", $id);

$tipo = $data[0];

$id = $data[1];

$idm = $id-1;

?>




                                        <button type="button" onclick="from('<?=$tipo?>-<?=$id?>','t<?=$id?>','../load/product.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Agregar</button>

                                        <button type="button" onclick="from('<?=$tipo?>-<?=$idm?>','t<?=$idm?>','../load/button.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Quitar</button>


<iframe style="display:none" onload="formula_e()" />