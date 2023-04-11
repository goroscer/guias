<?php

    $type = "data";
    $cuit = "20086003733";

    switch($type) {
        case 'data':
            $wsdl = "http://dgronline.dgrsantiago.gob.ar/dgronline/aprocedurewsgenexus.aspx?wsdl";
            $params = array("Cuit"=>$cuit,"Usuariosistemas"=>"rentasDomicilios","Passsistemas"=>"er&12$().4$32%&");
            $type = 'CONTRIBUYENTEDOMICILIOS';
            break;
        case 'presentation':
            $wsdl = "http://dgronline.dgrsantiago.gob.ar/dgronline/aprocedurewsgenexus.aspx?wsdl";
            $params = array("Cuit"=>$cuit,"Usuariosistemas"=>"sistemas","Passsistemas"=>"dwed#%344&·2/(4$", "Anio" => date('Y')-1);
            $type = 'PRESENTACIONDECLARACIONJURADA';
            break;
        case 'token':
            $wsdl = "http://dfe.dgrsantiago.gob.ar:8084/webservicesrentasaa/wsaa?wsdl";
            $params = array("usuario" => "areasistemas", "pass" => "d.AB3-4#las6$.1d", "user" => $cuit);
            $type = 'solicitoToken';
            break;
        default:
            // code block
    }


        $cliente= new SoapClient($wsdl);
        
        $response = $cliente->__soapCall($type, array($type=>$params));
        echo json_encode($response);
?>
