<!doctype html>
<html>
<head>
<title>Our Funky HTML Page</title>
<meta name="description" content="Our first page">
<meta name="keywords" content="html tutorial template">
</head>
<body>
	<?php
session_start();


if (verificarSesion()) {
	echo "existe sesion";
	header("Location: dte_emitidos.php");
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

</body>
</html>