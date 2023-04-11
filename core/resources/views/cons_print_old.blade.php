<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Constancia de exención</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>


  body {
    font-family: Arial, Helvetica, sans-serif;
  }
<!-- 
body { background:#ffffff;}
a:link {text-decoration: none; color: blue}
a:visited {text-decoration: none; color: purple}
a:active {text-decoration: none; color: red}
a:hover {text-decoration: none; color:red}
-->
</style>
<script type="text/javascript"> 
<!-- hide 
function deserrs()
{ 
return true; 
} 
window.onerror = deserrs; 
// --> 
</script>
</head>
<body style = "background-image:url(bgimg/backImg.jpg);">
<script type="text/javascript">
var currentpos,timer; 
function initialize() 
{ 
timer=setInterval("scrollwindow()",10);
} 
function sc(){
clearInterval(timer); 
}
function scrollwindow() 
{ 
currentpos=document.body.scrollTop; 
window.scroll(0,++currentpos); 
if (currentpos != document.body.scrollTop) 
sc();
} 
document.onmousedown = sc;
document.ondblclick = initialize;
var tmp = "<div style=\"position:absolute; top:" + parent.offsetY + "; left:" + parent.offsetX + ";height:842px; width:592px\">";
document.writeln(tmp);
</script>
<table border="5" >
<tr><td>
<div style="position:absolute; top:-20; left:-22;"><img height="1020" width="790"src="{{ asset('images/bg00001.jpg') }}"/></div>
<p style="position:absolute; top:-2.181; left:-4.000" id="bm000001"></p>



<div style="position:absolute;top:85.608;left:286.299;"><nobr>
<span style="font-size:11.986;font-weight:bold;color: #151616;">Formulario</span>
<span style="font-size:11.986;font-weight:bold;color: #151616;">N° &nbsp;&nbsp;{{ $form->id+6000 }}</span>
</nobr></div>
<div style="position:absolute;top:115.638;left:100.981;"><nobr>
<span style="font-size:15.981;font-weight:bold;color: #151616;">Constancia</span>
<span style="font-size:15.981;font-weight:bold;color: #151616;">de</span>
<span style="font-size:15.981;font-weight:bold;color: #151616;">exención</span>
<span style="font-size:15.981;font-weight:bold;color: #151616;">a</span>
<span style="font-size:15.981;font-weight:bold;color: #151616;">la</span>
<span style="font-size:15.981;font-weight:bold;color: #151616;">Actividad</span>
<span style="font-size:15.981;font-weight:bold;color: #151616;">Primaria</span>
</nobr></div>

<div style="position:absolute;top:148.653;left:22.644;"><nobr>
<span style="font-size:13.984;font-weight:bold;text-decoration:underline;color: #151616;">Constancia N° </span><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $form->id+6000 }}</span>
</nobr></div>


<div style="height: 170px;width: 700px; position:absolute;top:200.152;left:10.745;text-align: justify;font-size:13">

    La Dirección General de Rentas de la Provincia de Santiago del Estero, deja constancia que el contribuyente {{ $form->name }} CUIT Nº {{ $form->cuit }} con domicilio fiscal en Calle {{ $calle }}  N° {{ $nro }} , Barrio: {{ $barrio }}  Localidad: {{ $form->localidad }}, mediante Resolución  Nº {{ $form->resolucion }} se encuentra comprendido en la exención impositiva que prevé el Decreto Nro. 2183/2015 Código Fiscal en sus Art. 210 inc ñ) en el Impuesto sobre los Ingresos Brutos y Art. 273 Inc m ́) en el Impuesto a los Sellos, referida a las actividades que se detallada a continuación:


</div>


<div style="position:absolute;top:339.948;left:60.591;"><nobr>
<span style="font-size:10.987;color: #151616;">CODIGO</span>
</nobr></div>
<div style="position:absolute;top:339.948;left:304.491;"><nobr>
<span style="font-size:10.987;color: #151616;">ACTIVIDAD</span>
</nobr></div>

@php

    $activities = explode(";", $form->pa);
    $x = 355;

@endphp

@foreach($activities as $activity)

    <div style="position:absolute;top:{{ $x }}.723;left:62.945;"><nobr>
        <span style="font-size:13.984;color: #151616;">{{ $activity }}</span>
    </nobr></div>

@php
    $x = $x+12;
    
@endphp
@endforeach



<div style="position:absolute;top:462.516;left:10.444;"><nobr>
<span style="font-size:13.984;">Vigencia</span>
<span style="font-size:13.984;">desde &nbsp;&nbsp;&nbsp;&nbsp;{{ $form->desde }}</span>
</nobr></div>
<div style="position:absolute;top:462.516;left:210.444;"><nobr>
<span style="font-size:13.984;color: #151616;">Hasta &nbsp;&nbsp;&nbsp;&nbsp;{{ $form->hasta }}</span>
</nobr></div>


<div style="height: 170px;width: 700px; position:absolute;top:522.286;left:10.745;text-align: justify;font-size:13">

 La presente constancia no sustiuye la Resolución Interna de Exención, quedando a su disposición en nuestro Organismo para su notificación.


</div>




<div style="position:absolute;top:648.848;left:311.450;"><nobr>
<span style="font-size:11.986;color: #151616;">FIRMA</span>
</nobr></div>
<!--<div style="position:absolute;top:648.773;left:290.945;"><nobr>
<span style="font-size:11.986;color: #151616;">CODIGO</span>
<span style="font-size:11.986;color: #151616;">CUR &nbsp;&nbsp;&nbsp;123123</span>
</nobr></div>-->
</td></tr>
</table>
</div>
<script type="text/javascript">
var currentZoom = parent.toolbarWin.currentZoom;
if(currentZoom != undefined)
document.body.style.zoom=currentZoom/100;
</script>
</body>
</html>
