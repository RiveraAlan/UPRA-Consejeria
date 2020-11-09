<?php
include_once 'dbconnect.php';
session_start();


$fields = array("date", "hour-chosen");
$areFieldsEmpty = array();
$isAFieldEmpty = false;
foreach($fields as $field) {
    if(empty($_POST[$field])){
        $areFieldsEmpty['is-'.$field.'-empty'] = 1;
        $isAFieldEmpty = TRUE;
    } else {
        $areFieldsEmpty['is-'.$field.'-empty'] = 0;
    }
  }

  $queryParams = "?is-date-empty=".$areFieldsEmpty["is-date-empty"];
  foreach($areFieldsEmpty as $field => $isEmpty) {
      if($field === 'is-date-empty'){
          continue;
      }

      $queryParams .="&".$field."=".$isEmpty;
  }
  
if($isAFieldEmpty){
  header('Location: ../consejeria.php'.$queryParams);
  exit();
}


// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name

$stmt = $conn->prepare("INSERT INTO appointment (stdnt_number, appt_date) VALUES (?, ?)");

// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to



$date =  explode('/', $_POST['date']);
$date = array_reverse($date);
$temp = $date[1];
$date[1] = $date[2];
$date[2] = $temp;
$date = implode('-', $date);
$meetingDate;

if($_POST['hour-chosen'] === '10:00am'){
    $meetingDate = $date . ' ' . '10:00:00';
} elseif($_POST['hour-chosen'] === '10:30am'){
    $meetingDate = $date . ' ' . '10:30:00';
} elseif($_POST['hour-chosen'] === '11:00am'){
   $meetingDate = $date . ' ' . '11:00:00';
} else {

}


echo $_SESSION['stdnt_number'];
echo $meetingDate;

$stmt->bind_param('is', $_SESSION['stdnt_number'], $meetingDate);





// Execute the query using the data we just defined
// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
if ($stmt->execute()) {
     header('Location: ../consejeria.php');
} else {
  echo "Unable to create record";
}

   

	$stmt->close();

?>