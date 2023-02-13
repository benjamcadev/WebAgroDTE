<?php
ini_set('max_execution_time', '3000');
set_time_limit(3000);
include 'Clases/conexion.php';

for ($i=3663808; $i < 3806563 ; $i++) { 
	
	//$query = "UPDATE contribuyentes_direccion SET rut = ''"

	$query = "SELECT rut,dv FROM contribuyentes_acteco WHERE id='".$i."'";
	$resultado = $mysqli->query($query);
	$row = $resultado->fetch_assoc();
	$rut_completo = $row["rut"]."-".$row["dv"];

	$query_update = "UPDATE contribuyentes_acteco SET rut = '".$rut_completo."' WHERE rut = '".$row["rut"]."' AND id='".$i."'";
	$resultado2 = $mysqli->query($query_update);

}

echo "listo wewew";

?>