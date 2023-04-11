<?php

  $actual_link = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  $actual_link = explode("/", $actual_link);
  
  $c = count($actual_link);
  
  $d1 = $c-1;
  $d2 = $c-2;
  
  unset($actual_link[$d1]);
  unset($actual_link[$d2]);
  
  $data_link = $actual_link;
  
  if (isset($_SERVER['HTTPS'])){
  
      $actual_link = 'https://';
  
  }else{
  
      $actual_link = 'http://';
  
  }
  
  
  foreach($data_link as $link){
  
      $actual_link .= $link.'/';
  
  }
  
  $actual_link .= '/load/receptorias';
  
  
  $ch = curl_init();
 
  curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $actual_link);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

  $cont = curl_exec($ch);
  curl_close($ch);

  $receptorias = json_decode($cont);

  ?>