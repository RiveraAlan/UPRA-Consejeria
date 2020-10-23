<?php
// TRY TO REARRANGE ELECTIVES DUE TO SITUATION NELSON HAD WITH HIS ELECTIVES.
echo '<h1>Rearrange Electives:</h1>';
echo 'Solution: Copy the part you need, modify it and replace it in the file';

$myfile = fopen("expediente_formatted.txt", "r+") or die("Unable to open file!");
//fwrite($myfile, $txt);

$delete = FALSE;
while(!feof($myfile)) {
    $line = fgets($myfile);

    if($delete){
        $contents = file_get_contents('expediente_formatted.txt');
        $contents = str_replace($line, '', $contents);
        file_put_contents('expediente_formatted.txt', $contents);
    }
    if(trim($line) === '- - - - - - - - - - - -  ELECTIVAS DIRIGIDAS CCOM - - - - - - - - - - - - -'){
        $delete = TRUE;
    }

  }

fclose($myfile);

