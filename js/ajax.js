function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();
//***************************************************************************************
function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la p�gina en el cach�...
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petici�n sea asincr�nica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }/*else
               {
			document.getElementById(ide).innerHTML="<img src='ima/loading.gif' title='cargando...' />";

                }*/
       }
       miPeticion.send(null);

}
//************************************************************************************************
function limpiar()
{
	document.form.reset();
	
}

//************************************************************************************************
        
function controlarProducto(id,valor,ide,url){
    
    if (valor=="178"){
        


        bootbox.alert({
    message: "<strong>Información Importante</strong><br>Para poder circular con el producto 'Semillas de algodón destinado para uso propio', deberá ingresar el Remito y la Nota de autorización, que respaldan su operación.\n\
<br/><strong>PASO 1:</strong> En 'TIPO DE COMPROBANTE', seleccionar 'REMITO' y consignar su correspondiente número y fecha. \n\
<br/><strong>PASO 2:</strong> Ir a la opción 'AGREGAR COMPROBANTE'.En 'TIPO DE COMPROBANTE', elegir 'OTROS'. El casillero 'Nombre' se debe completar como 'Nota de autorización', luego se debe adjuntar el archivo de la misma e indicar el número y la fecha.",
    size: 'large'
});
    }
    from(id,ide,url);
    
}     