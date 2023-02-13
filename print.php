<?php
$directorio = $_GET['directorio'];
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$directorio);
@readfile($directorio);

echo "<iframe src=\"".$directorio."\" width=\"100%\" style=\"height:100%\"></iframe>";

?>