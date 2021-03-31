<?php
$file = fopen("Expediente_Alan.txt", "r") or die("Unable to open file!");

$i = 0;
$data ; 
while(! feof($file))
  {
  echo fgets($file). "<br />";
    
    $i++; 
    
    $data = fgets($file). "<br />";
    
    
    $codigo[$i] = preg_filter("/[A-Z]{4}[A-Z0-9]{4}/", '($0)', $data);
    
    echo  "esto $codigo[$i]" ; 
  }
fclose($file);
?>