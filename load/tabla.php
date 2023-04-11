<?php

  extract($_REQUEST);

  $tipo = $_GET['id'];

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


      <h3 class="box-title" style="background-color: #787878; padding: 5px 15px 6px 5px; color: white;"> DETALLE DE LO TRANSPORTADO</h3>



<table class="table" style="width:100%">
    <thead>
      <tr>
        <th scope="col" style="width:10%">Categoría</th>
        <th scope="col" style="width:12%">Producto</th>
        <th scope="col" style="width:10%">Unidad de medida</th>
        <th scope="col" style="width:10%">Valor fiscal Unitario</th>
        <th scope="col" style="width:10%">Valor Real de Venta Unitario</th>
        <th scope="col" style="width:7%">Cantidad S/ Un. de Medida <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Recuerde que deberá ingresar la cantidad según la unidad de medida, expresada la columna 3."></span> </th>

        <!-- <th scope="col" style="width:7%">Destino Fuera de la Provincia</th> -->
        <th scope="col" style="width:7%">Importe IIBB</th>
        <th scope="col" style="width:7%">Importe TRS</th>
        <th scope="col" style="width:20%">Total General</th>

      </tr>
    </thead>
</table>
<div id="1campo1">
<div id="tact11">
<table class="table" style="width:100%">
    <tbody>


      <tr>
        <td style="width:10%"><select class="form-control" name="pro1c1" required onchange="from('<?=$tipo?>-'+1+document.form.pro1c1.value,'1campo1','../load/campo1.php')">

            <option value="">Selecione una</option>
<?php
foreach($categories as $category){

    echo '<option value="'.$category->id.'">'.$category->name.'</option>';

}


?>


        </select></td>

        <td style="width:12%"><select class="form-control" name="pro1c2" required disabled>
            <option value="">Selecione uno</option>
            
        </select></td>

        <td style="width:10%"><select class="form-control" name="pro1c3" required disabled>
                <option value="">Selecione uno</option>
                
        </select></td>
        <td style="width:10%"><select class="form-control" name="pro1c4" required disabled>
                <option value="">Selecione uno</option>
                
            </select></td>

        <td style="width:8%"><input type="number" class="form-control" placeholder="" name="pro1c6" disabled></td>



        <!-- <td style="width:7%"><input type="number" class="form-control" name="pro1c9" required disabled></td> -->
        <td style="width:7%" disabled><input type="number" class="form-control" name="pro1c10" required disabled></td>
        <td style="width:7%"><input type="number" class="form-control" name="pro1c11" required disabled></td>
        <td style="width:20%"><input type="number" class="form-control" name="pro1c12" required disabled></td>
      </tr>


    </tbody>
  </table>
  </div>
</div>
<div id="t1">

    <a type="button" id="add1" onclick="from('<?=$tipo?>-1','t1','../load/product.php');" class="btn btn-default" style="width: 100%; height: 51px; font-size: 17px; color:black; pointer-events: none;" >Agregar</a>

</div>

</div>
<br><br>

<iframe style="display:none" onload="typeproof()" />
<iframe style="display:none" onload="formula_e()" />
<iframe style="display:none" onload="tt()" />