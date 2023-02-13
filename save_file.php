<?php
if(!empty($_POST['data'])){
$data = $_POST['data'];
$path_archivo = $_POST['path_archivo'];
$pdf_decoded = base64_decode ($data);
//Write data back to pdf file
$pdf = fopen ($path_archivo,'w');
fwrite ($pdf,$pdf_decoded);
//close output file
fclose ($pdf);
}
?>