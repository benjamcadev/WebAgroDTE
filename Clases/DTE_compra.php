<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../plugins/PHPMailer/src/Exception.php';
require '../plugins/PHPMailer/src/PHPMailer.php';
require '../plugins/PHPMailer/src/SMTP.php';



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
		case 'cargarDatosReceptor':
			$rut_receptor = $_POST['rut_receptor'];

			cargarDatosReceptor($rut_receptor);
			break;

		case 'enviarSobre':
			$id_sobre = $_GET['id_sobre'];
			$rut_emisor = $_GET['rut_emisor'];
			$rut_empresa = $_GET['rut_empresa'];
			enviarSobre($id_sobre,$rut_emisor,$rut_empresa);
			break;	

		case 'cargarEmitidosTabla':
			
			cargarRecibidosTabla();
			break;

		case 'busquedaAvanzada':
			$caso = $_POST['caso'];
			$valor= $_POST['valor'];
			busquedaAvanzada($caso,$valor);
		break;

		case 'crearPDF':
			$folio = $_POST['folio'];
			$tipo_dte = $_POST['tipo_dte'];
			$rut = $_POST['rut'];
			crearPDF($folio,$tipo_dte,$rut);
		break;	

		case 'emitirDTE':
			 $json_request_dte = json_encode($_POST);
			 crearDTE($json_request_dte,$apikey);
			
		break;	
		case 'enviarCorreo':

			 enviarCorreo($_POST['xml_base64'],$_POST['pdf_base64'],$_POST['folio'],$_POST['tipo_dte'],$_POST['email'],$_POST['email_cc']);
			
		break;
		
		default:
			// code...
			break;
	}


}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}
	function enviarCorreo($xml_Base64,$pdf_Base64,$folio,$tipo_dte,$email,$email_cc){

	//Preparamos la imagen logo que ira en el correo
	$image = '../images/logo_sin_piramides_AgroDTE.png';
	$imageData = base64_encode(file_get_contents($image));
	$src = 'data:image/png;base64,'.$imageData;
	$imagen_html_agrodte = '<img width="230" height="100" src="' . $src . '">';

	$image_agroplastic = '../images/logofactura.png';
	$imageData_agroplastic = base64_encode(file_get_contents($image_agroplastic));
	$src_agroplastic = 'data:image/png;base64,'.$imageData_agroplastic;
	$imagen_html_agroplastic = '<img width="230" height="100" src="' . $src_agroplastic . '">';

	$mensaje_html = '<h1>Hola ! </h1> <p>Hemos adjuntado tu DTE en formato XML y PDF</p> <p>Que tengas un buen dia ! Te saluda</p>';
		
	$mail = new PHPMailer(true);
		try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.agroplastic.cl';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'intercambiodte@agroplastic.cl';                     //SMTP username
    $mail->Password   = 'agr0835$1069';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('intercambiodte@agroplastic.cl', 'AgroDTE');
    $mail->addAddress($email);     //Add a recipient
    //$mail->addAddress('benjamca@hotmail.com');               //Name is optional
    //$mail->addReplyTo('mriquelme@agroplastic.cl', 'Information');
    if ($email_cc != "") {
    	$mail->addCC($email_cc);
    }
    
    $mail->addBCC('agrodte@agroplastic.cl');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $pdf_data_base64="data:application/pdf;base64,".$pdf_Base64;
	$data_pdf = substr($pdf_data_base64, strpos($pdf_data_base64, ","));
    $mail->AddStringAttachment(base64_decode($data_pdf), 'DTE_'.$tipo_dte.'_'.$folio.'.pdf', 'base64', 'application/pdf');

    $xml_data_base64="data:application/xml;base64,".$xml_Base64;
	$data_xml = substr($xml_data_base64, strpos($xml_data_base64, ","));
    $mail->AddStringAttachment(base64_decode($data_xml), 'DTE_'.$tipo_dte.'_'.$folio.'.xml', 'base64', 'application/xml');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Envio DTE Folio:'.$folio;
    $mail->Body    = $mensaje_html."<br>".$imagen_html_agrodte." ".$imagen_html_agroplastic;
    $mail->AltBody = 'Hemos adjuntado tu DTE en formato XML y PDF, Que tengas un buen dia ! Te saluda Agroplastic LTDA.';

    $mail->send();
    print_r(json_encode('{"mensaje": "ok"}'));
    //echo 'Message has been sent';
    
} catch (Exception $e) {
	print_r(json_encode('{"mensaje": "Message could not be sent. Mailer Error: '.$mail->ErrorInfo.'"}'));
   
}

	}

	function crearDTE($json_request,$apikey){

		$url = 'http://192.168.1.9:90/api_agrodte/api/dte/document';  

		$curl = curl_init();
		$data = $json_request;

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $data,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Type: application/json",
		    "apikey: ".$apikey."",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		//$decoded_response_object = json_decode($response);

		print_r($response);
	}

function crearPDF($folio,$tipo_dte,$rut){
	//Identificar tipo de dte
	$tipo_dte_tabla = "";
	if ($tipo_dte == "33") {$tipo_dte_tabla = "factura_compra";}
	if ($tipo_dte == "34") {$tipo_dte_tabla = "factura_exenta_compra";}
	if ($tipo_dte == "61") {$tipo_dte_tabla = "nota_credito_compra";}
	if ($tipo_dte == "56") {$tipo_dte_tabla = "nota_debito_compra";}
	if ($tipo_dte == "52") {$tipo_dte_tabla = "guia_despacho_compra";}
	

	//rescatamos la ruta
	$conexion = new conexion();
	$sql = "SELECT ubicacion_".$tipo_dte_tabla." FROM ".$tipo_dte_tabla." WHERE rutemis_".$tipo_dte_tabla." = '".$rut."' AND folio_".$tipo_dte_tabla." = '".$folio."'";

	

	$datos_path = $conexion->obtenerDatos($sql);
	

	if (count($datos_path) === 0) {
     // list is empty.
		print_r("error");

	}else{
		$ruta_sobre = $datos_path[0]['ubicacion_'.$tipo_dte_tabla];
		$ruta_sobre = str_replace("\\","\\\\",$ruta_sobre);
		
		$url = 'http://192.168.1.9:90/api_agrodte/api/dte/document/crearPDF';  

		$curl = curl_init();
		$data = json_encode("{\"path\": \"".$ruta_sobre."\",\"tipo_dte\": \"".$tipo_dte."\"}");

		

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $data,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTPHEADER => array(
		    "Accept: */*",
		    "Cache-Control: no-cache",
		    "Connection: keep-alive",
		    "Content-Type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		//convertimos el sobre xml en base64
		$type = pathinfo($ruta_sobre, PATHINFO_EXTENSION);
		$data = file_get_contents($ruta_sobre);
		$base64_xml=base64_encode($data);

		$response = substr($response, 0, -1);

		//agregamos el sobre en base64
		$response = $response.', "xml_base64": "'.$base64_xml.'"}';

		//$decoded_response_object = json_decode($response);

		print_r($response);
	}


	
}

function cargarRecibidosTabla(){
	$conexion = new conexion();

	$sql = "SELECT folio_factura_compra AS folio,rznsocemis_factura_compra AS razon_social,mnttotal_factura_compra AS monto_total,fchemis_factura_compra AS fecha,ubicacion_factura_compra AS ubicacion,rutemis_factura_compra AS rut FROM factura_compra ORDER BY fchemis_factura_compra DESC LIMIT 500";
	$datos_factura = $conexion->obtenerDatos($sql);

	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_factura); $i++) { 
	    $datos_factura[$i]["tipo_dte"] = "33";
	}

	$sql2 = "SELECT folio_factura_exenta_compra AS folio,rznsocemis_factura_exenta_compra AS razon_social,mnttotal_factura_exenta_compra AS monto_total,fchemis_factura_exenta_compra AS fecha, ubicacion_factura_exenta_compra AS ubicacion,rutemis_factura_exenta_compra AS rut FROM factura_exenta_compra ORDER BY fchemis_factura_exenta_compra DESC LIMIT 500";

	$datos_factura_exenta = $conexion->obtenerDatos($sql2);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_factura_exenta); $i++) { 
	    $datos_factura_exenta[$i]["tipo_dte"] = "34";
	}

	$sql3 = "SELECT folio_nota_credito_compra AS folio,rznsocemis_nota_credito_compra AS razon_social,mnttotal_nota_credito_compra AS monto_total,fchemis_nota_credito_compra AS fecha, ubicacion_nota_credito_compra AS ubicacion,rutemis_nota_credito_compra AS rut FROM nota_credito_compra ORDER BY fchemis_nota_credito_compra DESC LIMIT 500";
	$datos_nota_credito = $conexion->obtenerDatos($sql3);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_nota_credito); $i++) { 
	    $datos_nota_credito[$i]["tipo_dte"] = "61";
	}

	$sql4 = "SELECT folio_nota_debito_compra AS folio,rznsocemis_nota_debito_compra AS razon_social,mnttotal_nota_debito_compra AS monto_total,fchemis_nota_debito_compra AS fecha, ubicacion_nota_debito_compra AS ubicacion,rutemis_nota_debito_compra AS rut FROM nota_debito_compra ORDER BY fchemis_nota_debito_compra DESC LIMIT 500";
	$datos_nota_debito = $conexion->obtenerDatos($sql4);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_nota_debito); $i++) { 
	    $datos_nota_debito[$i]["tipo_dte"] = "56";
	}

	$sql5 = "SELECT folio_guia_despacho_compra AS folio,rznsocemis_guia_despacho_compra AS razon_social,mnttotal_guia_despacho_compra AS monto_total,fchemis_guia_despacho_compra AS fecha, ubicacion_guia_despacho_compra AS ubicacion,rutemis_guia_despacho_compra AS rut FROM guia_despacho_compra ORDER BY fchemis_guia_despacho_compra DESC LIMIT 500";
	$datos_guia_despacho = $conexion->obtenerDatos($sql5);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_guia_despacho); $i++) { 
	    $datos_guia_despacho[$i]["tipo_dte"] = "52";
	}

	/*$sql6 = "SELECT folio_boleta AS folio,folio_boleta AS razon_social,mnttotal_boleta AS monto_total,fechaemis_boleta AS fecha, ubicacion_boleta AS ubicacion FROM boleta ORDER BY folio_boleta DESC LIMIT 500";
	$datos_boleta = $conexion->obtenerDatos($sql6);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_boleta); $i++) { 
	    $datos_boleta[$i]["tipo_dte"] = "39";
	}

	$sql7 = "SELECT folio_boleta_exenta AS folio,folio_boleta_exenta AS razon_social,mnttotal_boleta_exenta AS monto_total,fechaemis_boleta_exenta AS fecha, ubicacion_boleta_exenta AS ubicacion FROM boleta_exenta ORDER BY folio_boleta_exenta DESC LIMIT 500";
	$datos_boleta_exenta = $conexion->obtenerDatos($sql7);
	for ($i=0; $i < count($datos_boleta_exenta); $i++) { 
	    $datos_boleta_exenta[$i]["tipo_dte"] = "41";
	}*/

	$array_data = array_merge($datos_factura,$datos_factura_exenta,$datos_nota_credito,$datos_nota_debito,$datos_guia_despacho);


	/*function sortFunction( $a, $b ) {
    return strtotime($a["fchemis_factura"]) - strtotime($b["fchemis_factura"]);
	}
usort($datos, "sortFunction");*/
	$datos_str = json_encode($array_data);
	print_r($datos_str);
	

}
function cargarDatosReceptor($rutReceptor){
	
	$conexion = new conexion();
	$sqlActeco = "SELECT razon_social,des_actividad_economica FROM contribuyentes_acteco WHERE rut='$rutReceptor'";
	$sqlDireccion = "SELECT calle,numero,ciudad,comuna FROM contribuyentes_direccion WHERE rut='$rutReceptor' AND vigencia='S'";
	$datosActeco = $conexion->obtenerDatos($sqlActeco);
	$datosDireccion = $conexion->obtenerDatos($sqlDireccion);
	$datos_str = json_encode($datosActeco);
	$array_datos = array();
	$array_datos["acteco"] = $datosActeco;
	$array_datos["direccion"] = $datosDireccion;

	print_r(json_encode($array_datos));
	//print_r(json_encode($datos));
}

function busquedaAvanzada($caso,$valor){
$conexion = new conexion();
$tipo_dte_flag = false;
//QURYS GENERALES
		$sql = "SELECT folio_factura_compra AS folio,rznsocemis_factura_compra AS razon_social,mnttotal_factura_compra AS monto_total,fchemis_factura_compra AS fecha,ubicacion_factura_compra AS ubicacion,rutemis_factura_compra AS rut FROM factura_compra";
		
		$sql2 = "SELECT folio_factura_exenta_compra AS folio,rznsocemis_factura_exenta_compra AS razon_social,mnttotal_factura_exenta_compra AS monto_total,fchemis_factura_exenta_compra AS fecha, ubicacion_factura_exenta_compra AS ubicacion,rutemis_factura_exenta_compra AS rut FROM factura_exenta_compra";


		$sql3 = "SELECT folio_nota_credito_compra AS folio,rznsocemis_nota_credito_compra AS razon_social,mnttotal_nota_credito_compra AS monto_total,fchemis_nota_credito_compra AS fecha, ubicacion_nota_credito_compra AS ubicacion,rutemis_nota_credito_compra AS rut FROM nota_credito_compra";
		
		$sql4 = "SELECT folio_nota_debito_compra AS folio,rznsocemis_nota_debito_compra AS razon_social,mnttotal_nota_debito_compra AS monto_total,fchemis_nota_debito_compra AS fecha, ubicacion_nota_debito_compra AS ubicacion,rutemis_nota_debito_compra AS rut FROM nota_debito_compra";
		

		$sql5 = "SELECT folio_guia_despacho_compra AS folio,rznsocemis_guia_despacho_compra AS razon_social,mnttotal_guia_despacho_compra AS monto_total,fchemis_guia_despacho_compra AS fecha, ubicacion_guia_despacho_compra AS ubicacion,rutemis_guia_despacho_compra AS rut FROM guia_despacho_compra";
		

		/*$sql6 = "SELECT folio_boleta AS folio,folio_boleta AS razon_social,mnttotal_boleta AS monto_total,fechaemis_boleta AS fecha, ubicacion_boleta AS ubicacion FROM boleta";
		

		$sql7 = "SELECT folio_boleta_exenta AS folio,folio_boleta_exenta AS razon_social,mnttotal_boleta_exenta AS monto_total,fechaemis_boleta_exenta AS fecha, ubicacion_boleta_exenta AS ubicacion FROM boleta_exenta";*/
		


switch ($caso) {

	case 'busqueda_folio':

		$sql = $sql." WHERE folio_factura_compra= '$valor' ORDER BY folio_factura_compra";
		$sql2 = $sql2. " WHERE folio_factura_exenta_compra = '$valor' ORDER BY folio_factura_exenta_compra";
		$sql3 = $sql3. " WHERE folio_nota_credito_compra = '$valor'  ORDER BY folio_nota_credito_compra"; 
		$sql4 = $sql4. " WHERE folio_nota_debito_compra = '$valor' ORDER BY folio_nota_debito_compra";
		$sql5 = $sql5. " WHERE folio_guia_despacho_compra = '$valor' ORDER BY folio_guia_despacho_compra";
		//$sql6 = $sql6. " WHERE folio_boleta = '$valor' ORDER BY folio_boleta";
		//$sql7 = $sql7. " WHERE folio_boleta_exenta = '$valor' ORDER BY folio_boleta_exenta";

		break;

	case 'busqueda_rut':

	$sql = $sql." WHERE rutemis_factura_compra = '$valor' ORDER BY folio_factura_compra";
	$sql2 = $sql2. " WHERE rutemis_factura_exenta_compra = '$valor' ORDER BY folio_factura_exenta_compra";
	$sql3 = $sql3. " WHERE rutemis_nota_credito_compra = '$valor'  ORDER BY folio_nota_credito_compra"; 
	$sql4 = $sql4. " WHERE rutemis_nota_debito_compra = '$valor' ORDER BY folio_nota_debito_compra";
	$sql5 = $sql5. " WHERE rutemis_guia_despacho_compra = '$valor' ORDER BY folio_guia_despacho_compra";
	//$sql6 = "";
	//$sql7 = "";

	break;

	case 'busqueda_fecha':

		$sql = $sql." WHERE fchemis_factura_compra = '$valor' ORDER BY folio_factura_compra";
		$sql2 = $sql2. " WHERE fchemis_factura_exenta_compra = '$valor' ORDER BY folio_factura_exenta_compra";
		$sql3 = $sql3. " WHERE fchemis_nota_credito_compra = '$valor'  ORDER BY folio_nota_credito_compra"; 
		$sql4 = $sql4. " WHERE fchemis_nota_debito_compra = '$valor' ORDER BY folio_nota_debito_compra";
		$sql5 = $sql5. " WHERE fchemis_guia_despacho_compra = '$valor' ORDER BY folio_guia_despacho_compra";
		//$sql6 = $sql6. " WHERE fechaemis_boleta = '$valor' ORDER BY folio_boleta";
		//$sql7 = $sql7. " WHERE fechaemis_boleta_exenta = '$valor' ORDER BY folio_boleta_exenta";

		break;

	case 'busqueda_monto':

		$sql = $sql." WHERE mnttotal_factura_compra = '$valor' ORDER BY folio_factura_compra";
		$sql2 = $sql2. " WHERE mnttotal_factura_exenta_compra = '$valor' ORDER BY folio_factura_exenta_compra";
		$sql3 = $sql3. " WHERE mnttotal_nota_credito_compra = '$valor'  ORDER BY folio_nota_credito_compra"; 
		$sql4 = $sql4. " WHERE mnttotal_nota_debito_compra = '$valor' ORDER BY folio_nota_debito_compra";
		$sql5 = $sql5. " WHERE mnttotal_guia_despacho_compra = '$valor' ORDER BY folio_guia_despacho_compra";
		//$sql6 = $sql6. " WHERE mnttotal_boleta = '$valor' ORDER BY folio_boleta";
		//$sql7 = $sql7. " WHERE mnttotal_boleta_exenta = '$valor' ORDER BY folio_boleta_exenta";

		break;
	case 'busqueda_detalle':

		$sql = $sql." WHERE detalle_factura_compra LIKE '%$valor%' ORDER BY folio_factura_compra";
		$sql2 = $sql2. " WHERE detalle_factura_exenta_compra LIKE '%$valor%' ORDER BY folio_factura_exenta_compra";
		$sql3 = $sql3. " WHERE detalle_nota_credito_compra LIKE '%$valor%'  ORDER BY folio_nota_credito_compra"; 
		$sql4 = $sql4. " WHERE detalle_nota_debito_compra LIKE '%$valor%' ORDER BY folio_nota_debito_compra";
		$sql5 = $sql5. " WHERE detalle_guia_despacho_compra LIKE '%$valor%' ORDER BY folio_guia_despacho_compra";
		//$sql6 = $sql6. " WHERE detalle_boleta LIKE '%$valor%' ORDER BY folio_boleta";
		//$sql7 = $sql7. " WHERE detalle_boleta_exenta LIKE '%$valor%' ORDER BY folio_boleta_exenta";

		break;
	case 'busqueda_tipo':

	$tipo_dte_flag = true;
		if ($valor == "select_factura") {
			$sql = $sql." ORDER BY folio_factura_compra DESC LIMIT 100";
		}
		if ($valor == "select_factura_exenta") {
			$sql2 = $sql2." ORDER BY folio_factura_exenta_compra DESC LIMIT 100";
			$sql = $sql2;
		}
		if ($valor == "select_nota_credito") {
			$sql3 = $sql3." ORDER BY folio_nota_credito_compra DESC LIMIT 100";
			$sql = $sql3;
		}
		if ($valor == "select_nota_debito") {
			$sql4 = $sql4." ORDER BY folio_nota_debito_compra DESC LIMIT 100";
			$sql = $sql4;
		}
		if ($valor == "select_guia_despacho") {
			$sql5 = $sql5." ORDER BY folio_guia_despacho_compra DESC LIMIT 100";
			$sql = $sql5;
		}
		/*if ($valor == "select_boleta") {
			$sql6 = $sql6." ORDER BY folio_boleta DESC LIMIT 100";
			$sql = $sql6;
		}
		if ($valor == "select_boleta_exenta") {
			$sql7 = $sql7." ORDER BY folio_boleta_exenta DESC LIMIT 100";
			$sql = $sql7;
		}*/
		

		break;				
	
	default:
		// code...
		break;
	}

	if ($tipo_dte_flag) {
	$datos_factura = $conexion->obtenerDatos($sql);
	//AGREGAR EL TIPO DE DTE AL ARRAY
		for ($i=0; $i < count($datos_factura); $i++) { 
			if ($valor == "select_factura") {$datos_factura[$i]["tipo_dte"] = "33";}
			if ($valor == "select_factura_exenta") {$datos_factura[$i]["tipo_dte"] = "34";}
		    if ($valor == "select_nota_credito") {$datos_factura[$i]["tipo_dte"] = "61";}
		    if ($valor == "select_nota_debito") {$datos_factura[$i]["tipo_dte"] = "56";}
		    if ($valor == "select_guia_despacho") {$datos_factura[$i]["tipo_dte"] = "52";}
		    //if ($valor == "select_boleta") {$datos_factura[$i]["tipo_dte"] = "39";}
		    //if ($valor == "select_boleta_exenta") {$datos_factura[$i]["tipo_dte"] = "41";}
		}

	
		$datos_factura_exenta = array();	
		$datos_nota_credito = array();
		$datos_nota_debito = array();
		$datos_guia_despacho = array();
		//$datos_boleta = array();
		//$datos_boleta_exenta = array();
	}else{

	$datos_factura = $conexion->obtenerDatos($sql);
		//AGREGAR EL TIPO DE DTE AL ARRAY
		for ($i=0; $i < count($datos_factura); $i++) { 
		    $datos_factura[$i]["tipo_dte"] = "33";
		}
	$datos_factura_exenta = $conexion->obtenerDatos($sql2);
		//AGREGAR EL TIPO DE DTE AL ARRAY
		for ($i=0; $i < count($datos_factura_exenta); $i++) { 
		    $datos_factura_exenta[$i]["tipo_dte"] = "34";
		}
	$datos_nota_credito = $conexion->obtenerDatos($sql3);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_nota_credito); $i++) { 
	    $datos_nota_credito[$i]["tipo_dte"] = "61";
	}
	$datos_nota_debito = $conexion->obtenerDatos($sql4);
		//AGREGAR EL TIPO DE DTE AL ARRAY
		for ($i=0; $i < count($datos_nota_debito); $i++) { 
		    $datos_nota_debito[$i]["tipo_dte"] = "56";
	}
	$datos_guia_despacho = $conexion->obtenerDatos($sql5);
		//AGREGAR EL TIPO DE DTE AL ARRAY
		for ($i=0; $i < count($datos_guia_despacho); $i++) { 
		    $datos_guia_despacho[$i]["tipo_dte"] = "52";
		}
	if ($caso == "busqueda_rut") {
			//$datos_boleta = array();
			//$datos_boleta_exenta = array();
		}else{

			/*$datos_boleta = $conexion->obtenerDatos($sql6);
			//AGREGAR EL TIPO DE DTE AL ARRAY
			for ($i=0; $i < count($datos_boleta); $i++) { 
			    $datos_boleta[$i]["tipo_dte"] = "39";
			}

			$datos_boleta_exenta = $conexion->obtenerDatos($sql7);
			for ($i=0; $i < count($datos_boleta_exenta); $i++) { 
		    $datos_boleta_exenta[$i]["tipo_dte"] = "41";
		    }*/

	}	

}
		
	
	

	$array_data = array_merge($datos_factura,$datos_factura_exenta,$datos_nota_credito,$datos_nota_debito,$datos_guia_despacho);
	$datos_str = json_encode($array_data);
	print_r($datos_str);

}

?>