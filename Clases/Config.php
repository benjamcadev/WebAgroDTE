<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//INSTANCIAMOS CONEXION CON LA BASE DE DATOS
require_once "Conexion.php";

//CAPTURAMSO HEADERS
$apikey = "";
foreach (getallheaders() as $nombre => $valor) {

    if ($nombre == "Apikey") {
        $apikey = $valor;
    }  
}

if ($apikey == "928e15a2d14d4a6292345f04960f4cc3") {
    $funcion = $_GET['funcion'];

    switch ($funcion) {
        case 'cargarUsuariosTabla':
    
            cargarUsuariosTabla();
            break;

        case 'registrarUsuario':
            $rut = $_POST['rut_usuario_modal'];
            $nombre = $_POST['nombre_usuario_modal'];
            $apellido = $_POST['apellido_usuario_modal'];
            $pass = $_POST['pass_usuario_modal'];
            $correo = $_POST['email_usuario_modal'];
            $rol = $_POST['rol_usuario_modal'];
            registrarUsuario($rut,$nombre,$apellido,$pass,$correo,$rol);
            break;

        case 'eliminarUsuario':
            $rut = $_POST['rut_usuario'];
            eliminarUsuario($rut);
            break;

        default:
            // code...
            break;
        }
        
       
}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}

function cargarUsuariosTabla(){

	$conexion = new conexion();
	$sqlUsuarios = "SELECT rut_usuario,nombre_usuario,apellido_usuario,correo_usuario,rol_usuario,ultimo_login_usuario FROM usuario ";
	$datos = $conexion->obtenerDatos($sqlUsuarios);
	$datos_str = json_encode($datos);

	print_r($datos_str);

}

function eliminarUsuario($rut){
    $conexion = new conexion();
	$sqlEliminar = "DELETE FROM usuario WHERE rut_usuario='".$rut."'";
    $response = $conexion->ejecutarQuery($sqlEliminar);
    if ($response == 1) {
        //EXITO
        print_r("ok");
      }else{
      print_r("Error");
      }

}

function registrarUsuario($rut,$nombre,$apellido,$pass,$correo,$rol){
    $conexion = new conexion();
	$sqlRegistrar = "INSERT INTO usuario (rut_usuario, nombre_usuario, apellido_usuario, pass_usuario, correo_usuario, rol_usuario, ultimo_login_usuario) VALUES ('".$rut."', '".$nombre."', '".$apellido."', '".$pass."', '".$correo."', '".$rol."', NOW()) ";
    $response = $conexion->ejecutarQuery($sqlRegistrar);
    
    if ($response == 1) {
      //EXITO
      print_r("ok");
    }else{
    print_r("Error");
    }
    

}

?>