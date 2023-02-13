<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//INSTANCIAMOS CONEXION CON LA BASE DE DATOS
require_once "Conexion.php";


$funcion = $_POST['funcion'];
$ip_client = $_SERVER['REMOTE_ADDR'];
$array_post = array();
foreach ($_POST as $key => $value) {
    array_push($array_post,$value);
}
$array_post_string = implode('|',$array_post);

switch ($funcion) {

	case 'iniciarSesion':
	$rut = $_POST['rut'];
	$pass = $_POST["pass"];
	iniciarSesion($rut,$pass,$ip_client,$array_post_string);
		break;

	case 'cerrarSesion':
	session_start();
	session_destroy();
	print_r(json_encode('{"mensaje": "ok"}'));

		break;	

	case 'buscarUsuario':
	$rut = $_POST['rut'];
	buscarUsuario($rut);
	break;

	default:
		// code...
		break;
}


function buscarUsuario($rut){
	$conexion = new conexion();
	$sql2 = "SELECT nombre_usuario FROM usuario WHERE rut_usuario = '$rut'";
	$datos = $conexion->obtenerDatos($sql2);
	print_r(json_encode($datos));
	
	
	
}

function iniciarSesion($rut,$pass,$ip_client,$array_post_string){
  	$conexion = new conexion();
	$sql2 = "SELECT rut_usuario,nombre_usuario,apellido_usuario,correo_usuario,rol_usuario FROM usuario WHERE rut_usuario = '$rut' AND pass_usuario = '$pass'";
	$datos = $conexion->obtenerDatos($sql2);

	if (count($datos) != 0) {
		session_start();
	$_SESSION["rut_usuario"]=$datos[0]["rut_usuario"];
	$_SESSION["nombre_usuario"]=$datos[0]["nombre_usuario"];
	$_SESSION["apellido_usuario"]=$datos[0]["apellido_usuario"];
	$_SESSION["correo_usuario"]=$datos[0]["correo_usuario"];
	$_SESSION["rol_usuario"]=$datos[0]["rol_usuario"];

	$sql = "UPDATE usuario SET ultimo_login_usuario = now() WHERE  rut_usuario = '$rut'";
	$conexion->ejecutarQuery($sql);

	$sql_log = "INSERT INTO log_event (mensaje_log_event,fecha_log_event,referencia_log_event,query_request_log_event) VALUES ('Inicio Sesion Login AgroDTE', NOW(),'Usuario: $rut ip: $ip_client','$array_post_string')";
	$conexion->ejecutarQuery($sql_log);


	}
	
	print_r(json_encode($datos));

	


}

?>