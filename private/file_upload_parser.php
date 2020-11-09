<?php
$student_recordName = $_student_recordS["student_record1"]["name"]; // The student_record name
$student_recordTmpLoc = $_student_recordS["student_record1"]["tmp_name"]; // student_record in the PHP tmp folder
$student_recordType = $_student_recordS["student_record1"]["type"]; // The type of student_record it is
$student_recordSize = $_student_recordS["student_record1"]["size"]; // student_record size in bytes
$student_recordErrorMsg = $_student_recordS["student_record1"]["error"]; // 0 for false... and 1 for true
if (!$student_recordTmpLoc) { // if student_record not chosen
    echo "ERROR: Please browse for a student_record before clicking the upload button.";
    exit();
}
if(move_uploaded_student_record($student_recordTmpLoc, "../student_record.txt")){
    //echo "$student_recordName upload is complete";
    header('Location: ../read_exp_acad.php');
} else {
    echo "move_uploaded_student_record function failed";
}
