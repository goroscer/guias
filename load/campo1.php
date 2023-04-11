<?php

  extract($_REQUEST);

    $base = $_GET['id'];

    $array = explode("-", $base);

    $tipo = $array[0];


    $data = $array[1];

    if(strlen($data) == 2){
        $cn = $data[0];
        $cate = $data[1];
    }
    if(strlen($data) == 3){
        $cn = $data[0];
        $cate = $data[1].$data[2];
    }
    if(strlen($data) == 4){
        $cn = $data[0];
        $cate = $data[1].$data[2].$data[3];
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




    @include('products_list.php');
    $v = '';
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
                                                    
                                                    foreach($productlists as $product){

                                                        echo '<option value="'.$product->id.'">'.$product->name.'</option>';

                                                    }
                                                    
                                                    ?>
                                                </select></td>

                                                <td style="width:10%"><select class="form-control" name="pro<?=$cn?>c3" required disabled>
                                                        <option value="">Selecione uno</option>
                                                        
                                                </select></td>
                                                <td style="width:10%"><select class="form-control" name="pro<?=$cn?>c4" required disabled>
                                                        <option value="">Selecione uno</option>
                                                        
                                                    </select></td>

                                                <td style="width:8%"><select class="form-control" name="pro<?=$cn?>c6" required disabled>
                                                    <option value="">Selecione uno</option>
                                                    
                                                </select></td>


                                                <!-- <td style="width:7%"><input type="number" class="form-control" name="pro<?=$cn?>c9" required disabled></td> -->
                                                <td style="width:7%"><input type="number" class="form-control" name="pro<?=$cn?>c10" required disabled></td>
                                                <td style="width:7%"><input type="number" class="form-control" name="pro<?=$cn?>c11" required disabled></td>
                                                <td style="width:20%"><input type="number" class="form-control" name="pro<?=$cn?>c12" required disabled></td>
                                              </tr>


                                                  </tbody>
  </table>

</div>


<iframe style="display:none" onload="formula_e()" />

