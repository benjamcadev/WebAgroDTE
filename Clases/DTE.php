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

//INSTANCIAMOS CONEXION CON LA BASE DE DATOS
require_once "ConexionPSQL.php";

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

		case 'cargarDatosReferencia':
			$tipo_dte_referencia = $_POST['tipo_dte_referencia'];
			$folio_referencia = $_POST['folio_referencia'];
			cargarDatosReferencia($tipo_dte_referencia,$folio_referencia);
			break;

		case 'enviarSobre':
			$id_sobre = $_GET['id_sobre'];
			$rut_emisor = $_GET['rut_emisor'];
			$rut_empresa = $_GET['rut_empresa'];
			enviarSobre($id_sobre,$rut_emisor,$rut_empresa);
			break;	

		case 'cargarEmitidosTabla':
			
			cargarEmitidosTabla();
			break;

		case 'busquedaAvanzada':
			$caso = $_POST['caso'];
			$valor= $_POST['valor'];
			busquedaAvanzada($caso,$valor);
		break;

		case 'crearPDF':
			$folio = $_POST['folio'];
			$tipo_dte = $_POST['tipo_dte'];
			crearPDF($folio,$tipo_dte);
		break;	

		case 'emitirDTE':
			 $json_request_dte = json_encode($_POST);
			 //print_r($json_request_dte);
			 crearDTE($json_request_dte,$apikey);
			
		break;	
		case 'enviarCorreo':

			 enviarCorreo($_POST['xml_base64'],$_POST['pdf_base64'],$_POST['folio'],$_POST['tipo_dte'],$_POST['email'],$_POST['email_cc']);
			
		break;

		case 'consultarProductoCodigoPSQL':
			$codigo = $_POST['codigo'];
			consultarProductoCodigoPSQL($codigo);
		break;
		case 'consultarProductoDescripcionPSQL':
			$descripcion = $_POST['descripcion'];
			consultarProductoDescripcionPSQL($descripcion);
		break;		
		
		default:
			// code...
			break;
	}


}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}

	function consultarProductoCodigoPSQL($codigo){
	$conexion = new conexionPSQL();
    $datos = $conexion->obtenerDatos("SELECT description  FROM \"public\".\"wh_product\" WHERE alias_name = '$codigo'");
    print_r(json_encode($datos));

	}

	function consultarProductoDescripcionPSQL($descripcion){
    $conexion = new conexionPSQL();
    $datos = $conexion->obtenerDatos("SELECT description  FROM \"public\".\"wh_product\" WHERE description::text LIKE '%$descripcion%'");
    print_r(json_encode($datos));

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
		//$url = 'https://localhost:44324/api/dte/document';  

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


		//REGISTRAR EN EL LOG
		$conexion = new conexion();
		$rut = $_SESSION["rut_usuario"];
		$ip_client = $_SERVER['REMOTE_ADDR'];
		$sql_log = "INSERT INTO log_event (mensaje_log_event,fecha_log_event,referencia_log_event,query_request_log_event) VALUES ('Emision DTE Web AgroDTE', NOW(),'Usuario: $rut ip: $ip_client','$json_request')";
		$conexion->ejecutarQuery($sql_log);

		print_r($response);
	}

function crearPDF($folio,$tipo_dte){
	//Identificar tipo de dte
	$tipo_dte_tabla = "";
	if ($tipo_dte == "33") {$tipo_dte_tabla = "factura";}
	if ($tipo_dte == "34") {$tipo_dte_tabla = "factura_exenta";}
	if ($tipo_dte == "61") {$tipo_dte_tabla = "nota_credito";}
	if ($tipo_dte == "56") {$tipo_dte_tabla = "nota_debito";}
	if ($tipo_dte == "52") {$tipo_dte_tabla = "guia_despacho";}
	if ($tipo_dte == "39") {$tipo_dte_tabla = "boleta";}
	if ($tipo_dte == "41") {$tipo_dte_tabla = "boleta_exenta";}


	//necesito rescatar el sobre xml del dte
	$conexion = new conexion();
	$sql = "SELECT id_envio_dte_fk FROM ".$tipo_dte_tabla." WHERE folio_".$tipo_dte_tabla." = '$folio'";
	$datos_id_sobre = $conexion->obtenerDatos($sql);
	$id_sobre = $datos_id_sobre[0]['id_envio_dte_fk'];

	
	

	if (count($datos_id_sobre) === 0) {
     // list is empty.
		print_r("error");

	}else{
		//rescatamos el path del sobre
		 $sql2 = "SELECT rutaxml_envio_dte FROM envio_dte WHERE id_envio_dte = '$id_sobre'";

		$path_sobre = $conexion->obtenerDatos($sql2);
		$ruta_sobre = $path_sobre[0]['rutaxml_envio_dte'];

		//agregamos el prefijo cliente.xml en caso que no sea boleta
		if ($tipo_dte == "39" || $tipo_dte == "41") {
			
		}else{
			$ruta_sobre = substr($ruta_sobre, 0, -4);
			$ruta_sobre = $ruta_sobre."-cliente.xml";
		}

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

function cargarEmitidosTabla(){
	$conexion = new conexion();

	$sql = "SELECT factura.folio_factura AS folio,factura.rznsocrecep_factura AS razon_social,factura.mnttotal_factura AS monto_total,envio_dte.fecha_envio_dte AS fecha, ubicacion_factura AS ubicacion FROM factura INNER JOIN envio_dte ON factura.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_factura = $conexion->obtenerDatos($sql);

	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_factura); $i++) { 
	    $datos_factura[$i]["tipo_dte"] = "33";
	}

	$sql2 = "SELECT factura_exenta.folio_factura_exenta AS folio,factura_exenta.rznsocrecep_factura_exenta AS razon_social,factura_exenta.mnttotal_factura_exenta AS monto_total,envio_dte.fecha_envio_dte AS fecha, factura_exenta.ubicacion_factura_exenta AS ubicacion FROM factura_exenta INNER JOIN envio_dte ON factura_exenta.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_factura_exenta = $conexion->obtenerDatos($sql2);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_factura_exenta); $i++) { 
	    $datos_factura_exenta[$i]["tipo_dte"] = "34";
	}

	$sql3 = "SELECT nota_credito.folio_nota_credito AS folio,nota_credito.rznsocrecep_nota_credito AS razon_social,nota_credito.mnttotal_nota_credito AS monto_total,envio_dte.fecha_envio_dte AS fecha, nota_credito.ubicacion_nota_credito AS ubicacion FROM nota_credito INNER JOIN envio_dte ON nota_credito.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_nota_credito = $conexion->obtenerDatos($sql3);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_nota_credito); $i++) { 
	    $datos_nota_credito[$i]["tipo_dte"] = "61";
	}

	$sql4 = "SELECT nota_debito.folio_nota_debito AS folio,nota_debito.rznsocrecep_nota_debito AS razon_social,nota_debito.mnttotal_nota_debito AS monto_total,envio_dte.fecha_envio_dte AS fecha, nota_debito.ubicacion_nota_debito AS ubicacion FROM nota_debito INNER JOIN envio_dte ON nota_debito.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_nota_debito = $conexion->obtenerDatos($sql4);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_nota_debito); $i++) { 
	    $datos_nota_debito[$i]["tipo_dte"] = "56";
	}

	$sql5 = "SELECT guia_despacho.folio_guia_despacho AS folio,guia_despacho.rznsocrecep_guia_despacho AS razon_social,guia_despacho.mnttotal_guia_despacho AS monto_total,envio_dte.fecha_envio_dte AS fecha, guia_despacho.ubicacion_guia_despacho AS ubicacion FROM guia_despacho INNER JOIN envio_dte ON guia_despacho.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_guia_despacho = $conexion->obtenerDatos($sql5);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_guia_despacho); $i++) { 
	    $datos_guia_despacho[$i]["tipo_dte"] = "52";
	}

	$sql6 = "SELECT boleta.folio_boleta AS folio, boleta.folio_boleta AS razon_social,boleta.mnttotal_boleta AS monto_total,envio_dte.fecha_envio_dte AS fecha, boleta.ubicacion_boleta AS ubicacion FROM boleta INNER JOIN envio_dte ON boleta.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_boleta = $conexion->obtenerDatos($sql6);
	//AGREGAR EL TIPO DE DTE AL ARRAY
	for ($i=0; $i < count($datos_boleta); $i++) { 
	    $datos_boleta[$i]["tipo_dte"] = "39";
	}

	$sql7 = "SELECT boleta_exenta.folio_boleta_exenta AS folio,boleta_exenta.folio_boleta_exenta AS razon_social,boleta_exenta.mnttotal_boleta_exenta AS monto_total,fechaemis_boleta_exenta AS fecha, boleta_exenta.ubicacion_boleta_exenta AS ubicacion FROM boleta_exenta INNER JOIN envio_dte ON boleta_exenta.id_envio_dte_fk = envio_dte.id_envio_dte ORDER BY envio_dte.fecha_envio_dte DESC LIMIT 500";
	$datos_boleta_exenta = $conexion->obtenerDatos($sql7);
	for ($i=0; $i < count($datos_boleta_exenta); $i++) { 
	    $datos_boleta_exenta[$i]["tipo_dte"] = "41";
	}

	$array_data = array_merge($datos_boleta,$datos_factura_exenta,$datos_nota_credito,$datos_nota_debito,$datos_guia_despacho,$datos_factura,$datos_boleta_exenta);


	

	usort($array_data, function($a, $b) {
  			return ($b['fecha'] < $a['fecha']) ? -1 : 1;
		});
	//usort($array_data, "sortFunction");


 	//print_r($array_data);

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

function cargarDatosReferencia($tipo_dte_referencia,$folio_referencia){

	$campo_tabla = ""; 
	$campo_fecha= ""; 
	$campo_folio_ref= "";
	$campo_tipo_dteref= "";
	$campo_folio= "";
	
	if($tipo_dte_referencia == "33"){
		$campo_tabla = "factura";
		$campo_fecha = "fchemis_factura";
		$campo_folio_ref ="folioref_factura";
		$campo_tipo_dteref ="tipo_dteref_factura";
		$campo_folio= "folio_factura";
	}
	if($tipo_dte_referencia == "34"){
		$campo_tabla = "factura_exenta";
		$campo_fecha = "fchemis_factura_exenta";
		$campo_folio_ref ="folioref_factura_exenta";
		$campo_tipo_dteref ="tipo_dteref_factura_exenta";
		$campo_folio= "folio_factura_exenta";
	}
	if($tipo_dte_referencia == "39"){
		$campo_tabla = "boleta";
		$campo_fecha = "fechaemis_boleta";
		$campo_folio_ref ="folioref_boleta";
		$campo_tipo_dteref ="tipo_dteref_boleta";
		$campo_folio= "folio_boleta";
	}
	if($tipo_dte_referencia == "41"){
		$campo_tabla = "boleta_exenta";
		$campo_fecha = "fechaemis_boleta_exenta";
		$campo_folio_ref ="folioref_boleta_exenta";
		$campo_tipo_dteref ="tipo_dteref_boleta_exenta";
		$campo_folio= "folio_boleta_exenta";
	}	
	if($tipo_dte_referencia == "56"){
		$campo_tabla = "nota_debito";
		$campo_fecha = "fchemis_nota_debito";
		$campo_folio_ref ="folioref_nota_debito";
		$campo_tipo_dteref ="tipo_dteref_nota_debito";
		$campo_folio= "folio_nota_debito";
	}
	if($tipo_dte_referencia == "61"){
		$campo_tabla = "nota_credito";
		$campo_fecha = "fchemis_nota_credito";
		$campo_folio_ref ="folioref_nota_credito";
		$campo_tipo_dteref ="tipo_dteref_nota_credito";
		$campo_folio= "folio_nota_credito";
	}

	$conexion = new conexion();
	$sqlDatos_referencia = "SELECT ".$campo_fecha." AS fecha,".$campo_folio_ref." AS folio,".$campo_tipo_dteref." AS tipo FROM ".$campo_tabla." WHERE ".$campo_folio."='".$folio_referencia."'";
		
	//print_r($sqlDatos_referencia);
	$datosReferencia = $conexion->obtenerDatos($sqlDatos_referencia);
	//print_r($sqlDatos_referencia);

	print_r(json_encode($datosReferencia));
	//print_r(json_encode($datos));
}

function busquedaAvanzada($caso,$valor){
$conexion = new conexion();
$tipo_dte_flag = false;
//QURYS GENERALES
		$sql = "SELECT folio_factura AS folio,rznsocrecep_factura AS razon_social,mnttotal_factura AS monto_total,fchemis_factura AS fecha,ubicacion_factura AS ubicacion FROM factura";
		
		$sql2 = "SELECT folio_factura_exenta AS folio,rznsocrecep_factura_exenta AS razon_social,mnttotal_factura_exenta AS monto_total,fchemis_factura_exenta AS fecha, ubicacion_factura_exenta AS ubicacion FROM factura_exenta";


		$sql3 = "SELECT folio_nota_credito AS folio,rznsocrecep_nota_credito AS razon_social,mnttotal_nota_credito AS monto_total,fchemis_nota_credito AS fecha, ubicacion_nota_credito AS ubicacion FROM nota_credito";
		
		$sql4 = "SELECT folio_nota_debito AS folio,rznsocrecep_nota_debito AS razon_social,mnttotal_nota_debito AS monto_total,fchemis_nota_debito AS fecha, ubicacion_nota_debito AS ubicacion FROM nota_debito";
		

		$sql5 = "SELECT folio_guia_despacho AS folio,rznsocrecep_guia_despacho AS razon_social,mnttotal_guia_despacho AS monto_total,fchemis_guia_despacho AS fecha, ubicacion_guia_despacho AS ubicacion FROM guia_despacho";
		

		$sql6 = "SELECT folio_boleta AS folio,folio_boleta AS razon_social,mnttotal_boleta AS monto_total,fechaemis_boleta AS fecha, ubicacion_boleta AS ubicacion FROM boleta";
		

		$sql7 = "SELECT folio_boleta_exenta AS folio,folio_boleta_exenta AS razon_social,mnttotal_boleta_exenta AS monto_total,fechaemis_boleta_exenta AS fecha, ubicacion_boleta_exenta AS ubicacion FROM boleta_exenta";
		


switch ($caso) {

	case 'busqueda_folio':

		$sql = $sql." WHERE folio_factura = '$valor' ORDER BY folio_factura";
		$sql2 = $sql2. " WHERE folio_factura_exenta = '$valor' ORDER BY folio_factura_exenta";
		$sql3 = $sql3. " WHERE folio_nota_credito = '$valor'  ORDER BY folio_nota_credito"; 
		$sql4 = $sql4. " WHERE folio_nota_debito = '$valor' ORDER BY folio_nota_debito";
		$sql5 = $sql5. " WHERE folio_guia_despacho = '$valor' ORDER BY folio_guia_despacho";
		$sql6 = $sql6. " WHERE folio_boleta = '$valor' ORDER BY folio_boleta";
		$sql7 = $sql7. " WHERE folio_boleta_exenta = '$valor' ORDER BY folio_boleta_exenta";

		break;

	case 'busqueda_rut':

	$sql = $sql." WHERE rutrecep_factura = '$valor' ORDER BY folio_factura";
	$sql2 = $sql2. " WHERE rutrecep_factura_exenta = '$valor' ORDER BY folio_factura_exenta";
	$sql3 = $sql3. " WHERE rutrecep_nota_credito = '$valor'  ORDER BY folio_nota_credito"; 
	$sql4 = $sql4. " WHERE rutrecep_nota_debito = '$valor' ORDER BY folio_nota_debito";
	$sql5 = $sql5. " WHERE rutrecep_guia_despacho = '$valor' ORDER BY folio_guia_despacho";
	$sql6 = "";
	$sql7 = "";

	break;

	case 'busqueda_fecha':

		$sql = $sql." WHERE fchemis_factura = '$valor' ORDER BY folio_factura";
		$sql2 = $sql2. " WHERE fchemis_factura_exenta = '$valor' ORDER BY folio_factura_exenta";
		$sql3 = $sql3. " WHERE fchemis_nota_credito = '$valor'  ORDER BY folio_nota_credito"; 
		$sql4 = $sql4. " WHERE fchemis_nota_debito = '$valor' ORDER BY folio_nota_debito";
		$sql5 = $sql5. " WHERE fchemis_guia_despacho = '$valor' ORDER BY folio_guia_despacho";
		$sql6 = $sql6. " WHERE fechaemis_boleta = '$valor' ORDER BY folio_boleta";
		$sql7 = $sql7. " WHERE fechaemis_boleta_exenta = '$valor' ORDER BY folio_boleta_exenta";

		break;

	case 'busqueda_monto':

		$sql = $sql." WHERE mnttotal_factura = '$valor' ORDER BY folio_factura";
		$sql2 = $sql2. " WHERE mnttotal_factura_exenta = '$valor' ORDER BY folio_factura_exenta";
		$sql3 = $sql3. " WHERE mnttotal_nota_credito = '$valor'  ORDER BY folio_nota_credito"; 
		$sql4 = $sql4. " WHERE mnttotal_nota_debito = '$valor' ORDER BY folio_nota_debito";
		$sql5 = $sql5. " WHERE mnttotal_guia_despacho = '$valor' ORDER BY folio_guia_despacho";
		$sql6 = $sql6. " WHERE mnttotal_boleta = '$valor' ORDER BY folio_boleta";
		$sql7 = $sql7. " WHERE mnttotal_boleta_exenta = '$valor' ORDER BY folio_boleta_exenta";

		break;
	case 'busqueda_detalle':

		$sql = $sql." WHERE detalle_factura LIKE '%$valor%' ORDER BY folio_factura";
		$sql2 = $sql2. " WHERE detalle_factura_exenta LIKE '%$valor%' ORDER BY folio_factura_exenta";
		$sql3 = $sql3. " WHERE detalle_nota_credito LIKE '%$valor%'  ORDER BY folio_nota_credito"; 
		$sql4 = $sql4. " WHERE detalle_nota_debito LIKE '%$valor%' ORDER BY folio_nota_debito";
		$sql5 = $sql5. " WHERE detalle_guia_despacho LIKE '%$valor%' ORDER BY folio_guia_despacho";
		$sql6 = $sql6. " WHERE detalle_boleta LIKE '%$valor%' ORDER BY folio_boleta";
		$sql7 = $sql7. " WHERE detalle_boleta_exenta LIKE '%$valor%' ORDER BY folio_boleta_exenta";

		break;
	case 'busqueda_tipo':

	$tipo_dte_flag = true;
		if ($valor == "select_factura") {
			$sql = $sql." ORDER BY folio_factura DESC LIMIT 100";
		}
		if ($valor == "select_factura_exenta") {
			$sql2 = $sql2." ORDER BY folio_factura_exenta DESC LIMIT 100";
			$sql = $sql2;
		}
		if ($valor == "select_nota_credito") {
			$sql3 = $sql3." ORDER BY folio_nota_credito DESC LIMIT 100";
			$sql = $sql3;
		}
		if ($valor == "select_nota_debito") {
			$sql4 = $sql4." ORDER BY folio_nota_debito DESC LIMIT 100";
			$sql = $sql4;
		}
		if ($valor == "select_guia_despacho") {
			$sql5 = $sql5." ORDER BY folio_guia_despacho DESC LIMIT 100";
			$sql = $sql5;
		}
		if ($valor == "select_boleta") {
			$sql6 = $sql6." ORDER BY folio_boleta DESC LIMIT 100";
			$sql = $sql6;
		}
		if ($valor == "select_boleta_exenta") {
			$sql7 = $sql7." ORDER BY folio_boleta_exenta DESC LIMIT 100";
			$sql = $sql7;
		}
		

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
		    if ($valor == "select_boleta") {$datos_factura[$i]["tipo_dte"] = "39";}
		    if ($valor == "select_boleta_exenta") {$datos_factura[$i]["tipo_dte"] = "41";}
		}

	
		$datos_factura_exenta = array();	
		$datos_nota_credito = array();
		$datos_nota_debito = array();
		$datos_guia_despacho = array();
		$datos_boleta = array();
		$datos_boleta_exenta = array();
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
			$datos_boleta = array();
			$datos_boleta_exenta = array();
		}else{

			$datos_boleta = $conexion->obtenerDatos($sql6);
			//AGREGAR EL TIPO DE DTE AL ARRAY
			for ($i=0; $i < count($datos_boleta); $i++) { 
			    $datos_boleta[$i]["tipo_dte"] = "39";
			}

			$datos_boleta_exenta = $conexion->obtenerDatos($sql7);
			for ($i=0; $i < count($datos_boleta_exenta); $i++) { 
		    $datos_boleta_exenta[$i]["tipo_dte"] = "41";
		}

	}	

}
		
	
	

	$array_data = array_merge($datos_factura,$datos_factura_exenta,$datos_nota_credito,$datos_nota_debito,$datos_guia_despacho,$datos_boleta,$datos_boleta_exenta);
	$datos_str = json_encode($array_data);
	print_r($datos_str);

}

?>