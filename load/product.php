

<?php

  extract($_REQUEST);

  $base = $_GET['id'];



  $data = $array = explode("-", $base);

  $tipo = $data[0];

  $id = $data[1]+1;

  $idd = $id-1;

  @include('categories.php');

  if($tipo == 'Engorde, Pastoreo o Invernada' OR $tipo == 'Traslado a Remate' OR $tipo == 'Remate' OR $tipo == 'Faena'){
    $x = 0;
    foreach($categories as $category){
  
      if($category->name != 'PRODUCTOS GANADEROS'){
  
        unset($categories[$x]);
  
      }
  
      $x++;
    }
  
}




?>
<div id="<?=$id?>campo1">
                                        <table class="table" style="width:100%">
                                            <tbody>
                                              <tr>
                                                <td style="width:10%"><select class="form-control" name="pro<?=$id?>c1" required onchange="from('<?=$tipo?>-'+<?=$id?>+document.form.pro<?=$id?>c1.value,'<?=$id?>campo1','../load/campo1.php')">
                                                    <option value="">Selecione una</option>
                                                    
                                                    <?php
foreach($categories as $category){

  if($tipo == $category->name){



  }

    echo '<option value="'.$category->id.'">'.$category->name.'</option>';

}


?>
                                                </select></td>

                                                <td style="width:12%"><select class="form-control" name="pro<?=$id?>c2" disabled>
                                                    <option value="">Selecione uno</option>
                                                    
                                                </select></td>

                                                <td style="width:10%"><select class="form-control" name="pro<?=$id?>c3" disabled>
                                                        <option value="">Selecione uno</option>
                                                        
                                                </select></td>
                                                <td style="width:10%"><select class="form-control" name="pro<?=$id?>c4" disabled>
                                                        <option value="">Selecione uno</option>
                                                        
                                                    </select></td>
                                                <td style="width:7%"><input type="number" class="form-control" placeholder="" name="pro<?=$id?>c6" disabled></td>


                                                <td style="width:7%"><input type="number" class="form-control" placeholder="" name="pro<?=$id?>c7" disabled></td>

                                                <td style="width:7%"><select class="form-control" name="pro<?=$id?>c8" disabled>
                                                    <option value="">Selecione uno</option>

                                                </select></td>

                                                <td style="width:7%"><input type="number" class="form-control" name="pro<?=$id?>c9" disabled></td>

                                                <td style="width:7%"><input type="number" class="form-control" name="pro<?=$id?>c11" disabled></td>
                                                <td style="width:20%"><input type="number" class="form-control" name="pro<?=$id?>c12" disabled></td>
                                              </tr>


                                            </tbody>
                                          </table>
                                        </div>


                                <div id="t<?=$id?>">
                                      <?php if($id != 9){ ?>
                                        <a onclick="from('<?=$tipo?>-<?=$id?>','t<?=$id?>','../load/product.php');" id="add<?=$id?>" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black; pointer-events: none;" >Agregar</a>
                                      <?php } ?>
                                        <a onclick="from('<?=$tipo?>-<?=$idd?>','t<?=$idd?>','../load/button.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black" >Quitar</a>


                                </div>


<iframe style="display:none" onload="formula_e()" />