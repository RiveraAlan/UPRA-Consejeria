<?php
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
 
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    echo "false";
    return;
}
 
if (!file_exists('Downloads')) {
    mkdir('Downloads', 0777);
}
 
move_uploaded_file($_FILES['file']['tmp_name'], 'Downloads/' . time() . '_' . $_FILES['file']['name']);
 
echo "Documento cargado exitosamente.";