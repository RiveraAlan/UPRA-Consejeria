<?php

$regex = array(
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

 student_record_put_contents('student_record_formatted.txt',
    preg_replace(
        '~[\r\n]+~',
        "\r\n",
        trim(student_record_get_contents('student_record.txt'))
    )
);

$student_recordArr = student_record('student_record_formatted.txt');
$courses = array();
$i = 0;
$j = 0;

while($i < count($student_recordArr)){
  
  if(array_key_exists(trim($student_recordArr[$i]), $regex)){
    //echo $student_recordArr[$i] . "\n";
    $j = $i + 1;
    while($i < $j AND $j < count($student_recordArr)){
      if(preg_match("/^[A-Z]{4} \d{4}/", trim($student_recordArr[$j]))){
       // $student_recordArr[$j] .= $regex[trim($student_recordArr[$i])];
       $course = trim($student_recordArr[$j]) . ' ' . $regex[trim($student_recordArr[$i])];
       array_push($courses, $course);
        //echo $student_recordArr[$j];
      }

      if(array_key_exists(trim($student_recordArr[$j]), $regex)){
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

