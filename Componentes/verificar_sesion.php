<?php
session_start();


if (verificarSesion()) {
	echo "existe sesion";
	//header("Location: login.html");
}else{
	header("Location: login.html");
	session_destroy();
	die();
}


function verificarSesion() {
    if(isset($_SESSION['rut_usuario'])){
        return true;
    }else{
    	return false;
    }

    
}
?>