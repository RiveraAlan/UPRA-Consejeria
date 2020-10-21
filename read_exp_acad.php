<?php

$regex = array('- - - - - - - - - - - - -  REQUISITOS GENERALES - - - - - - - - - - - - - -' => 1,
               '- - - - - - - - - - - - - - - Espanol Basico  - - - - - - - - - - - - - - -' => 2,
               '- - - - - - - - - REQUISITOS GENERALES REDACCION ESPANOL  - - - - - - - - -' => 3,
               '- - - - - - - - - - - - - - Ingles Intermedio - - - - - - - - - - - - - - -' => 4, 
               '- - - - - - - - - - - - -  MATE3171 Y MATE3172  - - - - - - - - - - - - - -' => 5,
               '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CISO - - - - - - - - - - - - -' => 6, 
               '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS HUMA - - - - - - - - - - - - -' => 7, 
               '- - - - - - - - - - - -  REQUISITOS CONCENTRACION - - - - - - - - - - - - -' => 8,
               '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -' => 9,
                '- - - - - - - - - - - - - -  ELECTIVAS LIBRES - - - - - - - - - - - - - - -' => 10,
                ''
);

 file_put_contents('exp_alan_format.txt',
    preg_replace(
        '~[\r\n]+~',
        "\r\n",
        trim(file_get_contents('exp_alan.txt'))
    )
);

$fileArr = file('exp_alan_format.txt');
$courses = array();
$i = 0;
$j = 0;

while($i < count($fileArr)){
  
  if(array_key_exists(trim($fileArr[$i]), $regex)){
    //echo $fileArr[$i] . "\n";
    $j = $i + 1;
    while($i < $j AND $j < count($fileArr)){
      if(preg_match("/^[A-Z]{4} \d{4}/", trim($fileArr[$j]))){
       // $fileArr[$j] .= $regex[trim($fileArr[$i])];
       $course = trim($fileArr[$j]) . ' ' . $regex[trim($fileArr[$i])];
       array_push($courses, $course);
        //echo $fileArr[$j];
      }

      if(array_key_exists(trim($fileArr[$j]), $regex)){
        break;
      }

      $j++;
    }
     $i = $j;
  } else {
     $i++;
  }
  
}


print_r($courses);


?>

