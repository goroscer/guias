<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $wsdl="http://dgronline.dgrsantiago.gob.ar/dgronline/aprocedurewsgenexus.aspx?wsdl"; // Aqui iria la Url donde esta Alojada el Ws
        $cliente= new SoapClient($wsdl);
        
        // ---------------Parametros ENTRADA -------------------------
        // Cuit: Cuit del Contribuyente del cual se desea hacer la consulta
        // Usuariosistemas: Usuario para poder consumir el Ws
        // Passsistemas: Contraseña del Usuario para poder consumir el Ws
        //---------------Parametros Salida------------------------------
        // Devuelve un array de Objetos con Domicilios de los contribuyentes
        // cuit del contribuyente
        // denominacion  del contribuyente
        // fechainicioactividad del contribuyente
        // domicilioCont del contribuyente
        // nrocalledomicilio del contribuyente
        // barrioCont del contribuyente
        // Provincia del contribuyente
        // Localidad del contribuyente
        // Departamento del contribuyente
        // tipodomicilio (1 Legal, 2 Comercial, 3 Particular )
        
        
        $parametros=array("Cuit"=>$_GET["cuit"],"Usuariosistemas"=>"rentasDomicilios","Passsistemas"=>"er&12$().4$32%&");
        $res=$cliente->__soapCall("CONTRIBUYENTEDOMICILIOS", array("CONTRIBUYENTEDOMICILIOS"=>$parametros ));
        print_r($res);

        //$domicilios=$res->Colecciondomicilios->SdtDomiciliosContribuyentes;
        
        //foreach ($domicilios as $key => $value) {
        //     print_r($value);
        //     echo "<br>";
             
        //}
       
        ?>
    </body>
</html>
