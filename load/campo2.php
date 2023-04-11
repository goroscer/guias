<?php

  extract($_REQUEST);

  $base = $_GET['id'];

  $array = explode("-", $base);

  $tipo = $array[0];


  $data = $array[1];


    if(strlen($data) == 2){
        $cn = $data[0];
        $id = $data[1];
    }
    if(strlen($data) == 3){
        $cn = $data[0];
        $id = $data[1].$data[2];
    }
    if(strlen($data) == 4){
        $cn = $data[0];
        $id = $data[1].$data[2].$data[3];
    }



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

    @include('productexp.php');


    $cate = $product->category_id;


    @include('products_list.php');
    $v = '';
    $v2 = '';

    $price = $product->price;
    $porc = ($product->price*1.5)/100;

    if($product->name == 'VAQUILLONA PARA SERVICIO' OR $product->name == 'TOROS (PP 300 KG) PARA SERVICIO'){

        $d = 'DISABLED';
        $price = '0.00';
        $porc = '0.00';
    }else{

        $d = '';
    }

    $soja = '';

    if($product->name == 'SOJA'){

        $soja = 'DISABLED';

    }


?>
<div id="<?=$cn?>campo2">

<table class="table" style="width:100%">
    <tbody>
                                              <tr>
                                                <td style="width:10%"><select class="form-control" name="pro<?=$cn?>c1" required onchange="from('<?=$tipo?>-'+<?=$cn?>+document.form.pro<?=$cn?>c1.value,'<?=$cn?>campo1','../load/campo1.php')" >
                                                    <option value="">Selecione una</option>

<?php
foreach($categories as $category){

    if($cate == $category->id){

        $v = 'SELECTED';
    }else{
        $v = '';
    }

    echo '<option '.$v.' value="'.$category->id.'">'.$category->name.'</option>';

}


?>

                                                </select></td>

                                                <td style="width:12%"><select id="productos" class="form-control" name="pro<?=$cn?>c2" required onchange="controlarProducto('<?=$tipo?>-'+<?=$cn?>+document.form.pro<?=$cn?>c2.value,document.form.pro<?=$cn?>c2.value,'<?=$cn?>campo2','../load/campo2.php')">
                                                    <option value="">Selecione uno</option>
                                                    <?php
                                                    
                                                    foreach($productlists as $productl){

                                                        if($product->id == $productl->id){

                                                            $v2 = 'SELECTED';
                                                        }else{
                                                            $v2 = '';
                                                        }

                                                        echo '<option '.$v2.' value="'.$productl->id.'">'.$productl->name.'</option>';

                                                    }
                                                    
                                                    ?>
                                                </select></td>

                                                <td style="width:10%"><input type="hidden" <?=$d?> class="form-control" name="pro<?=$cn?>c3" value="<?=$product->unit?>">
                                                <span style="strong" class="form-control" <?=$d?>><?=$product->unit?></span>
                                                </td>

                                                <td style="width:10%">
                                                <input type="hidden" <?=$d?> class="form-control" id="price<?=$cn?>" name="pro<?=$cn?>c4" <?php if($tipo != 'Remate Vendedor Fuera de la Provincia' AND $tipo != 'Remate Vendedor Local'){ ?> value="<?=number_format($price, 2, '.', '')?>" <?php }else{ ?> value="0.00" <?php } ?>>
                                                <span style="strong" class="form-control" <?=$d?>><?php if($tipo != 'Remate Vendedor Fuera de la Provincia' AND $tipo != 'Remate Vendedor Local'){ ?> <?='$'.number_format($price, 2, '.', '')?><?php }else{ ?> --- <?php } ?></span></td>

                                                <td style="width:10%"><div class="input-group"><span class="input-group-addon">$</span>
                                                        <input type="number" style="-webkit-appearance: none;" min="1" step="any" class="form-control" id="price_r<?=$cn?>" name="pro<?=$cn?>c5" onkeyup="formula_e();" <?php if($tipo != 'Remate'){ ?> required <?php } ?>></div></td>

                                                <td style="width:8%"><input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"  value="1" class="form-control" id="cantidad<?=$cn?>" name="pro<?=$cn?>c6" required onkeyup="formula_e();"></td>

<!--formatCurrency($(this))-->
                                                <!-- <td style="width:7%"><select class="form-control" name="pro<?=$cn?>c9" onchange="formula_e()"

                                                    <?php if($tipo == 'Faena'){ ?> style="-webkit-appearance: none;"  >
                                                        <option>No</option>
                                                        

                                                        <?php }else{ ?>>

                                                        <option>Si</option> 
                                                        <option>No</option>

                                                    <?php } ?>

                                                </select></td> -->

                                                <td style="width:7%"><input type="hidden" class="form-control trs"  name="pro<?=$cn?>c10" value="<?=number_format($porc, 2, '.', '')?>"><span style="strong" class="form-control" id="iibb<?=$cn?>" <?=$d?>>$<?=number_format($porc, 2, '.', '')?></span></td>
                                                
                                                <td style="width:7%">
                                                
                                                <input type="hidden" class="form-control trs"  name="rtrs<?=$cn?>" value="<?=number_format($product->trs, 2, '.', '')?>">

                                                <input type="hidden" class="form-control trs"  name="pro<?=$cn?>c11" value="<?=number_format($product->trs, 2, '.', '')?>">
                                                    <span style="strong" class="form-control" id="trs<?=$cn?>" <?=$d?>><?=number_format($product->trs, 2, '.', '')?></span>
                                                    </td>

                                                <td style="width:20%">
                                                    
                                                    <input type="hidden" class="form-control total_i" name="pro<?=$cn?>c12" value="<?=number_format($product->trs, 2, '.', '')?>" ><span id="total_i<?=$cn?>" class="form-control" style="strong" <?=$d?>><?=number_format($product->trs, 2, '.', '')?></span></td>
                                              </tr>


                                                  </tbody>
  </table>

</div>


<iframe style="display:none" onload="formula_e()" />
