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

//INSTANCIAMOS CONEXION CON LA BASE DE DATOS DE CLIENTES
require_once "Conexion_2.php";

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
		case 'cargarCaf':
		
				$estado_caf = $_POST['estado_caf'];
				$rango_minimo_caf = $_POST['rango_minimo_caf'];
				$rango_maximo_caf = $_POST['rango_maximo_caf'];
				$tipo_documento_caf = $_POST['tipo_documento_caf'];
				$fecha_caf = $_POST['fecha_caf'];
				$ruta_caf = $_POST['ruta_caf'];
				cargarCaf($estado_caf,$rango_minimo_caf,$rango_maximo_caf,$fecha_caf,$ruta_caf,$tipo_documento_caf);
				break;

		case 'cargarDatosReferencia':
			$tipo_dte_referencia = $_POST['tipo_dte_referencia'];
			$folio_referencia = $_POST['folio_referencia'];
			cargarDatosReferencia($tipo_dte_referencia,$folio_referencia);
			break;
		case 'cargarDatosNC':
				$folio_referencia = $_POST['folio_referencia'];
				cargarDatosNC($folio_referencia);
				break;
		
		case 'cargarDatosAcuses':
			$tipo_dte_acuses = $_POST['tipo_dte'];
			$folio_acuses = $_POST['folio'];
			cargarDatosAcuses($tipo_dte_acuses,$folio_acuses);
			break;

		case 'cargarDatosReferenciaEmitidos':
			$tipo_dte_referencia = $_POST['tipo_dte_referencia'];
			$folio_referencia = $_POST['folio_referencia'];
			$monto_referencia = $_POST['folio_referencia'];
			cargarDatosReferenciaEmitidos($tipo_dte_referencia,$folio_referencia,$monto_referencia);
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
		
		case 'cargarCAFTabla':
		
			cargarCAFTabla();
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

		case 'buscarXml':
			$tipo_dte_referencia = $_POST['tipo_dte_ref'];
			$folio_referencia = $_POST['folio_ref'];
			buscarXml($tipo_dte_referencia,$folio_referencia);
			break;

		case 'leerXML':
			$ubicacion_xml = $_POST['ubicacion_xml'];			
			leerXML($ubicacion_xml);
			break;
		
		default:
			// code...
			break;
	}


}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}

	function cargarCAFTabla(){
		$conexion = new conexion();
		$sqlCaf = "SELECT * FROM xml_caf ";
		$datosCaf = $conexion->obtenerDatos($sqlCaf);
		print_r(json_encode($datosCaf));

	}

	function cargarCaf($estado_caf,$rango_minimo_caf,$rango_maximo_caf,$fecha_caf,$ruta_caf,$tipo_documento_caf){
		

		$target_dir = "../../AgroDTE_Archivos/CAF_PRUEBA/";
		$target_file = $target_dir . basename($_FILES["file-0"]["name"]);

		if (move_uploaded_file($_FILES["file-0"]["tmp_name"], $target_file)) {
			//echo "The file ". htmlspecialchars( basename( $_FILES["file-0"]["name"])). " has been uploaded.";
			$conexion = new conexion();
			$sql_caf = "INSERT INTO xml_caf (estado_caf,rango_minimo_caf,rango_maximo_caf,tipo_documento_caf,fecha_caf,ruta_caf) VALUES ($estado_caf, $rango_minimo_caf,$rango_maximo_caf,$tipo_documento_caf,\"$fecha_caf\",\"$ruta_caf\")";
			$conexion->ejecutarQuery($sql_caf);
			print_r("ok");

		  } else {
			echo "Sorry, there was an error uploading your file.";
		  }


		

		


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

	//TRAER CORREO DESDE LA BD
	$conexion = new conexion();
	$sqlMail = "SELECT mail_intercambio_empresa,pass_intercambio_empresa FROM empresa WHERE id_empresa = 1";
	$datosMail = $conexion->obtenerDatos($sqlMail);

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
    $mail->Username   = $datosMail[0]['mail_intercambio_empresa'];                     //SMTP username
    $mail->Password   = $datosMail[0]['pass_intercambio_empresa'];                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($datosMail[0]['mail_intercambio_empresa'], 'AgroDTE');
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
		
		$decoded_response_object = json_encode($response);


		//REGISTRAR EN EL LOG
		session_start();
		$conexion = new conexion();
		$rut = $_SESSION["rut_usuario"];
		$ip_client = $_SERVER['REMOTE_ADDR'];
		$sql_log = "INSERT INTO log_event (mensaje_log_event,fecha_log_event,referencia_log_event,query_request_log_event) VALUES ('Emision DTE Web AgroDTE', NOW(),'Usuario: $rut ip: $ip_client','$json_request')";
		$conexion->ejecutarQuery($sql_log);

		print_r($decoded_response_object);
		//print_r($response);
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
	
	$conexion = new conexion2();
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

function cargarDatosAcuses($tipo_dte_acuses,$folio_acuses){
	
	$conexion = new conexion();
	$tabla = "";
	
	switch ($tipo_dte_acuses) {
		case '33':
			$tabla = "factura";
			break;
		case '61':
			$tabla = "nota_credito";
			break;
		case '56':
			$tabla = "nota_debito";
			break;
		case '52':
			$tabla = "guia_despacho";
			break;
		
		default:
			# code...
			break;
	}


	$sqlAcuses = "SELECT id_acuse_recibo_cliente_fk,id_acuse_recibo_comercial_cliente_fk,id_acuse_recibo_mercaderia_cliente_fk FROM $tabla WHERE folio_$tabla='$folio_acuses'";
	$datosAcuses = $conexion->obtenerDatos($sqlAcuses);

	//ARRAY DE RESPONSE
	$response = array();

	//ACUSE DE RECIBO DTE
	if (!$datosAcuses[0]['id_acuse_recibo_cliente_fk'] == "") {
		//HAY DATOS
		$id_acuse_recibo = $datosAcuses[0]['id_acuse_recibo_cliente_fk'];
		//INNER JOIN PARA TRAER LA DATA
		$sqlDataAcuses ="SELECT acuso_recibo_dte_cliente.estado_recep_acuse_recibo_cliente,
		acuso_recibo_dte_cliente.glosa_estado_acuse_recibo_cliente,
		 acuse_recibo_cliente.fecha_acuse_recibo_cliente,
		 acuse_recibo_cliente.hora_acuse_recibo_cliente
		 FROM acuse_recibo_cliente
		 INNER JOIN acuso_recibo_dte_cliente
		 ON acuse_recibo_cliente.id_acuse_recibo_cliente = acuso_recibo_dte_cliente.id_acuse_recibo_cliente_fk
		 WHERE acuse_recibo_cliente.id_acuse_recibo_cliente = $id_acuse_recibo";
		$datosAcusesRecibo = $conexion->obtenerDatos($sqlDataAcuses);
		$response[0] =  $datosAcusesRecibo;

	
	}else{
		$datosAcusesRecibo = array();
		$response[0] = $datosAcusesRecibo;
		
	}

	//ACUSE COMERCIAL
	if (!$datosAcuses[0]['id_acuse_recibo_comercial_cliente_fk'] == "") {
		//HAY DATOS
		$id_acuse_comercial = $datosAcuses[0]['id_acuse_recibo_comercial_cliente_fk'];
		//INNER JOIN PARA TRAER LA DATA
		$sqlDataAcuses ="SELECT acuse_recibo_comercial_dte_cliente.estado_dte_acuse_recibo_comercial_dte_cliente,
		acuse_recibo_comercial_dte_cliente.glosa_dte_acuse_recibo_comercial_dte_cliente,
		acuse_recibo_comercial_cliente.fecha_acuse_recibo_comercial_cliente,
		acuse_recibo_comercial_cliente.hora_acuse_recibo_comercial_cliente
		FROM acuse_recibo_comercial_cliente
		INNER JOIN acuse_recibo_comercial_dte_cliente
		ON acuse_recibo_comercial_cliente.id_acuse_recibo_comercial_cliente = acuse_recibo_comercial_dte_cliente.id_acuse_recibo_comercial_cliente_fk
		WHERE acuse_recibo_comercial_cliente.id_acuse_recibo_comercial_cliente = $id_acuse_comercial";
		$datosAcusesComercial = $conexion->obtenerDatos($sqlDataAcuses);
		$response[1] =  $datosAcusesComercial;

		
	}else{
		$datosAcusesComercial = array();
		$response[1] = $datosAcusesComercial;
		
	}
	
	//ACUSE MERCADERIAS
	if (!$datosAcuses[0]['id_acuse_recibo_mercaderia_cliente_fk'] == "") {
		//HAY DATOS
		$id_acuse_mercaderia = $datosAcuses[0]['id_acuse_recibo_mercaderia_cliente_fk'];
		//INNER JOIN PARA TRAER LA DATA
		$sqlDataAcuses ="SELECT acuso_recibo_dte_mercaderia_cliente.rutfirma_acuse_recibo_dte_mercaderia_cliente,
		acuso_recibo_dte_mercaderia_cliente.declaracion_acuse_recibo_dte_mercaderia_cliente,
		acuse_recibo_mercaderia_cliente.fecha_acuse_recibo_mercaderia_cliente,
		acuse_recibo_mercaderia_cliente.hora_acuse_recibo_mercaderia_cliente
		FROM acuse_recibo_mercaderia_cliente
		INNER JOIN acuso_recibo_dte_mercaderia_cliente
		ON acuse_recibo_mercaderia_cliente.id_acuse_recibo_mercaderia_cliente = acuso_recibo_dte_mercaderia_cliente.id_acuse_recibo_mercaderia_cliente_fk
		WHERE acuso_recibo_dte_mercaderia_cliente.id_acuse_recibo_mercaderia_cliente_fk = $id_acuse_mercaderia";
		$datosAcusesMercaderia = $conexion->obtenerDatos($sqlDataAcuses);
		$response[2] =  $datosAcusesMercaderia;

		
	}else{
		$datosAcusesMercaderia = array();
		$response[2] = $datosAcusesMercaderia;
		
	}
	print_r(json_encode($response));
	
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

function cargarDatosNC($folio_referencia){
	$conexion = new conexion();
	$sqlDatos_referencia = "SELECT folio_nota_credito as folio,mnttotal_nota_credito as monto FROM nota_credito WHERE folioref_nota_credito = '$folio_referencia'";
	$datosReferencia = $conexion->obtenerDatos($sqlDatos_referencia);
	
	print_r(json_encode($datosReferencia));
}

function cargarDatosReferenciaEmitidos($tipo_dte_referencia,$folio_referencia,$monto_referencia){

	$campo_tabla = ""; 
	$campo_fecha= ""; 
	$campo_folio_ref= "";
	$campo_tipo_dteref= "";
	$campo_folio= "";
	$campo_monto= "";
	
	if($tipo_dte_referencia == "33"){
		$campo_tabla = "factura";
		$campo_fecha = "fchemis_factura";
		$campo_folio_ref ="folioref_factura";
		$campo_tipo_dteref ="tipo_dteref_factura";
		$campo_folio= "folio_factura";
		$campo_monto= "mnttotal_factura";
	}
	if($tipo_dte_referencia == "34"){
		$campo_tabla = "factura_exenta";
		$campo_fecha = "fchemis_factura_exenta";
		$campo_folio_ref ="folioref_factura_exenta";
		$campo_tipo_dteref ="tipo_dteref_factura_exenta";
		$campo_folio= "folio_factura_exenta";
		$campo_monto= "mnttotal_factura_exenta";
	}
	if($tipo_dte_referencia == "39"){
		$campo_tabla = "boleta";
		$campo_fecha = "fechaemis_boleta";
		$campo_folio_ref ="folioref_boleta";
		$campo_tipo_dteref ="tipo_dteref_boleta";
		$campo_folio= "folio_boleta";
		$campo_monto= "mnttotal_boleta";
	}
	if($tipo_dte_referencia == "41"){
		$campo_tabla = "boleta_exenta";
		$campo_fecha = "fechaemis_boleta_exenta";
		$campo_folio_ref ="folioref_boleta_exenta";
		$campo_tipo_dteref ="tipo_dteref_boleta_exenta";
		$campo_folio= "folio_boleta_exenta";
		$campo_monto= "mnttotal_boleta_exenta";
	}	
	if($tipo_dte_referencia == "56"){
		$campo_tabla = "nota_debito";
		$campo_fecha = "fchemis_nota_debito";
		$campo_folio_ref ="folioref_nota_debito";
		$campo_tipo_dteref ="tipo_dteref_nota_debito";
		$campo_folio= "folio_nota_debito";
		$campo_monto= "mnttotal_nota_debito";
	}
	if($tipo_dte_referencia == "61"){
		$campo_tabla = "nota_credito";
		$campo_fecha = "fchemis_nota_credito";
		$campo_folio_ref ="folioref_nota_credito";
		$campo_tipo_dteref ="tipo_dteref_nota_credito";
		$campo_folio= "folio_nota_credito";
		$campo_monto= "mnttotal_nota_credito";
	}

	$conexion = new conexion();
	$sqlDatos_referencia = "SELECT ".$campo_fecha." AS fecha,".$campo_folio." AS folio,".$campo_monto." AS monto FROM ".$campo_tabla." WHERE ".$campo_folio_ref."='".$folio_referencia."'";
		
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

function buscarXml($tipo_dte_referencia,$folio_referencia){
	$campo_tabla = ""; 
	$campo_fecha= ""; 
	$campo_folio_ref= "";
	$campo_tipo_dteref= "";
	$campo_folio= "";
	
	
	if($tipo_dte_referencia == "33"){
		$campo_tabla = "factura";
		$campo_ubicacion = "ubicacion_factura";
		$campo_folio= "folio_factura";
	}
	if($tipo_dte_referencia == "34"){
		$campo_tabla = "factura_exenta";
		$campo_ubicacion = "ubicacion_factura_exenta";
		$campo_folio= "folio_factura_exenta";
	}
	if($tipo_dte_referencia == "39"){
		$campo_tabla = "boleta";
		$campo_ubicacion = "ubicacion_boleta";
		$campo_folio= "folio_boleta";
	}
	if($tipo_dte_referencia == "41"){
		$campo_tabla = "boleta_exenta";
		$campo_ubicacion = "ubicacion_boleta_exenta";
		$campo_folio= "folio_boleta_exenta";
	}	
	if($tipo_dte_referencia == "56"){
		$campo_tabla = "nota_debito";
		$campo_ubicacion = "ubicacion_nota_debito";
		$campo_folio= "folio_nota_debito";
	}
	if($tipo_dte_referencia == "61"){
		$campo_tabla = "nota_credito";
		$campo_ubicacion = "ubicacion_nota_credito";
		$campo_folio= "folio_nota_credito";
	}

	$conexion = new conexion();
	$sqlDatos_referencia = "SELECT ".$campo_ubicacion." AS ubicacion FROM ".$campo_tabla." WHERE ".$campo_folio."='".$folio_referencia."'";

	$datosReferencia = $conexion->obtenerDatos($sqlDatos_referencia);
	print_r(json_encode($datosReferencia));
}


function leerXML($ubicacion_xml){

	if (file_exists($ubicacion_xml)) {
		

		 //abrimos el archivo como solo permisos de lectura "r"
       //abrimos el archivo como solo permisos de lectura "r"
        $fp = fopen($ubicacion_xml,"r");

        // leemos el archivo hasta un tamaño maximo de 8192 bytes
        $data = fread($fp,8192);

        $xml = new SimpleXMLElement($data);

        //CHECHEAMOS LAS VARIABLES OPCIONALES

        $count_dirdest = 0;
        $count_cmnadest = 0;
        $count_nrolindr = 0;
        $count_tpomov = 0;
        $count_tpovalor = 0;
        $count_valordr = 0;
        $count_nrolinref = 0;
        $count_tpodocref = 0;
        $count_folioref = 0;
        $count_fchref = 0;
        $count_codref = 0;
        $count_razonref = 0;

        $count_tpotranventa = count($xml->Documento->Encabezado->IdDoc->TpoTranVenta);
        $count_tpotrancompra = count($xml->Documento->Encabezado->IdDoc->TpoTranCompra);
        $count_fmapago = count($xml->Documento->Encabezado->IdDoc->FmaPago);
        $count_tipodespacho = count($xml->Documento->Encabezado->IdDoc->TipoDespacho);
        $count_indtraslado = count($xml->Documento->Encabezado->IdDoc->IndTraslado);

        $count_ciudadorigen = count($xml->Documento->Encabezado->Emisor->CiudadOrigen);
        $count_telefono = count($xml->Documento->Encabezado->Emisor->Telefono);
        $count_cdgsiisucur = count($xml->Documento->Encabezado->Emisor->CdgSIISucur);
        $count_correoemisor = count($xml->Documento->Encabezado->Emisor->CorreoEmisor);

        $count_ciudadrecep = count($xml->Documento->Encabezado->Receptor->CiudadRecep);

        $count_transporte = count($xml->Documento->Encabezado->Transporte);

        if($count_transporte != 0){
            $count_dirdest = count($xml->Documento->Encabezado->Transporte->DirDest);
            $count_cmnadest = count($xml->Documento->Encabezado->Transporte->CmnaDest);
        }        

        $count_montoperiodo = count($xml->Documento->Encabezado->Totales->MontoPeriodo);
        $count_vlrpagar = count($xml->Documento->Encabezado->Totales->VlrPagar);
        $count_mntneto = count($xml->Documento->Encabezado->Totales->MntNeto);
        $count_mntexe = count($xml->Documento->Encabezado->Totales->MntExe);
        $count_iva = count($xml->Documento->Encabezado->Totales->IVA);
        $count_tasaiva = count($xml->Documento->Encabezado->Totales->TasaIVA);

        $count_dscrcgglobal = count($xml->Documento->DscRcgGlobal);

        if($count_dscrcgglobal != 0){           
            $count_nrolindr = count($xml->Documento->DscRcgGlobal->NroLinDR);
            $count_tpomov = count($xml->Documento->DscRcgGlobal->TpoMov);
            $count_tpovalor = count($xml->Documento->DscRcgGlobal->TpoValor);
            $count_valordr = count($xml->Documento->DscRcgGlobal->ValorDR); 
        }

        $count_referencia = count($xml->Documento->Referencia);

        if($count_referencia != 0){            
            $count_nrolinref = count($xml->Documento->Referencia->NroLinRef);
            $count_tpodocref = count($xml->Documento->Referencia->TpoDocRef);
            $count_folioref = count($xml->Documento->Referencia->FolioRef);
            $count_fchref = count($xml->Documento->Referencia->FchRef);
            $count_codref = count($xml->Documento->Referencia->CodRef);
            $count_razonref = count($xml->Documento->Referencia->RazonRef);
        }        

        //creamos y rellenamos las variables

        $tipodespacho_anular = "";
        $indtraslado_anular = "";
        $tpotranventa_anular = "";
        $tpotrancompra_anular = "";
        $fmapago_anular = "";
        $ciudadorigen_anular = "";
        $telefono_anular = "";
        $cdgsiisucur_anular = "";
        $correoemisor_anular = "";
        $ciudadrecep_anular = "";
        $montoperiodo_anular = "";
        $vlrpagar_anular = "";
        $nrolindr_anular = "";
        $tpomov_anular = "";
        $tpovalor_anular = "";
        $valordr_anular = "";
        $mntneto_anular = "";
        $mntexe_anular = "";
        $tasaiva_anular = "";        
        $nrolinref_anular = "";
        $tpodocref_anular = "";
        $folioref_anular = "";
        $fchref_anular = "";
        $codref_anular = "";
        $razonref_anular = "";
        $dirdest_anular = "";   
        $cmnadest_anular = "";
        $iva_anular = 0;    

        $folio_anular = $xml->Documento->Encabezado->IdDoc->Folio;
        $tipodte_anular = $xml->Documento->Encabezado->IdDoc->TipoDTE;
        $fchemis_anular = $xml->Documento->Encabezado->IdDoc->FchEmis;

        if($count_tpotranventa != 0){$tpotranventa_anular = $xml->Documento->Encabezado->IdDoc->TpoTranVenta;}
        if($count_tpotrancompra != 0){$tpotrancompra_anular = $xml->Documento->Encabezado->IdDoc->TpoTranCompra;}
        if($count_fmapago != 0){$fmapago_anular = $xml->Documento->Encabezado->IdDoc->FmaPago;}
        if($count_tipodespacho != 0){$tipodespacho_anular = $xml->Documento->Encabezado->IdDoc->TipoDespacho;}
        if($count_indtraslado != 0){$indtraslado_anular = $xml->Documento->Encabezado->IdDoc->IndTraslado;}

        $rutemisor_anular = $xml->Documento->Encabezado->Emisor->RUTEmisor;
        $rznsoc_anular = $xml->Documento->Encabezado->Emisor->RznSoc;
        $giroemis_anular = $xml->Documento->Encabezado->Emisor->GiroEmis;
        $acteco_anular = $xml->Documento->Encabezado->Emisor->Acteco;
        $dirorigen_anular = $xml->Documento->Encabezado->Emisor->DirOrigen;
        $cmnaorigen_anular = $xml->Documento->Encabezado->Emisor->CmnaOrigen;

        if($count_ciudadorigen != 0){$ciudadorigen_anular = $xml->Documento->Encabezado->Emisor->CiudadOrigen;}
        if($count_telefono != 0){$telefono_anular = $xml->Documento->Encabezado->Emisor->Telefono;}
        if($count_cdgsiisucur != 0){$cdgsiisucur_anular = $xml->Documento->Encabezado->Emisor->CdgSIISucur;}
        if($count_correoemisor != 0){$correoemisor_anular = $xml->Documento->Encabezado->Emisor->CorreoEmisor;}

        $rutrecep_anular = $xml->Documento->Encabezado->Receptor->RUTRecep;
        $rznsocrecep_anular = $xml->Documento->Encabezado->Receptor->RznSocRecep;
        $girorecep_anular = $xml->Documento->Encabezado->Receptor->GiroRecep;
        $dirrecep_anular = $xml->Documento->Encabezado->Receptor->DirRecep;
        $cmnarecep_anular = $xml->Documento->Encabezado->Receptor->CmnaRecep;

        if($count_dirdest != 0){$dirdest_anular = $xml->Documento->Encabezado->Transporte->DirDest;}
        if($count_cmnadest != 0){$cmnadest_anular = $xml->Documento->Encabezado->Transporte->CmnaDest;}

        if($count_mntexe != 0){$mntexe_anular = $xml->Documento->Encabezado->Totales->MntExe;}
        if($count_mntneto != 0){$mntneto_anular = $xml->Documento->Encabezado->Totales->MntNeto;}
        if($count_tasaiva != 0){$tasaiva_anular = $xml->Documento->Encabezado->Totales->TasaIVA;}    

        if($count_iva != 0){$iva_anular = $xml->Documento->Encabezado->Totales->IVA;}
        $mnttotal_anular = $xml->Documento->Encabezado->Totales->MntTotal;

        if($count_nrolindr != 0){$nrolindr_anular = $xml->Documento->DscRcgGlobal->NroLinDR;}
        if($count_tpomov != 0){$tpomov_anular = $xml->Documento->DscRcgGlobal->TpoMov;}
        if($count_tpovalor != 0){$tpovalor_anular = $xml->Documento->DscRcgGlobal->TpoValor;}
        if($count_valordr != 0){$valordr_anular = $xml->Documento->DscRcgGlobal->ValorDR;}

        if($count_nrolinref != 0){$nrolinref_anular = $xml->Documento->Referencia->NroLinRef;}
        if($count_tpodocref != 0){$tpodocref_anular = $xml->Documento->Referencia->TpoDocRef;}
        if($count_folioref != 0){$folioref_anular = $xml->Documento->Referencia->FolioRef;}
        if($count_fchref != 0){$fchref_anular = $xml->Documento->Referencia->FchRef;}
        if($count_codref != 0){$codref_anular = $xml->Documento->Referencia->CodRef;}
        if($count_razonref != 0){$razonref_anular = $xml->Documento->Referencia->RazonRef;}
      

        $count_detalle = count($xml->Documento->Detalle);

        $array_nrolindet = array();
        $array_cdgitem = array();
        $array_tpocodigo = array();
        $array_vlrcodigo = array();
        $array_nmbitem = array();
        $array_qtyitem = array();
        $array_prcitem = array();
        $array_montoitem = array();
        $array_descuentopct = array();
        $array_descuentomonto = array();
        $array_recargopct = array();
        $array_recargomonto = array();

        for ($i=0; $i < $count_detalle; $i++) { 

            $count_tpocodigo = 0;
            $count_vlrcodigo = 0;

            $count_cdgitem = count($xml->Documento->Detalle[$i]->CdgItem);

            if($count_cdgitem != 0){
                $count_tpocodigo = count($xml->Documento->Detalle[$i]->CdgItem->TpoCodigo);
                $count_vlrcodigo = count($xml->Documento->Detalle[$i]->CdgItem->VlrCodigo); 
            }

            $count_descuentopct = count($xml->Documento->Detalle[$i]->DescuentoPct);
            $count_descuentomonto = count($xml->Documento->Detalle[$i]->DescuentoMonto);
            $count_recargopct = count($xml->Documento->Detalle[$i]->RecargoPct);
            $count_recargomonto = count($xml->Documento->Detalle[$i]->RecargoMonto);

            if($count_cdgitem != 0){array_push($array_cdgitem, $xml->Documento->Detalle[$i]->CdgItem);}else{array_push($array_cdgitem,0);}          
            if($count_tpocodigo != 0){array_push($array_tpocodigo, $xml->Documento->Detalle[$i]->CdgItem->TpoCodigo);}else{array_push($array_tpocodigo,0);}
            if($count_vlrcodigo != 0){array_push($array_vlrcodigo, $xml->Documento->Detalle[$i]->CdgItem->VlrCodigo);}else{array_push($array_vlrcodigo,0);}
            if($count_descuentopct != 0){array_push($array_descuentopct, $xml->Documento->Detalle[$i]->DescuentoPct);}else{array_push($array_descuentopct,0);}
            if($count_descuentomonto != 0){array_push($array_descuentomonto, $xml->Documento->Detalle[$i]->DescuentoMonto);}else{array_push($array_descuentomonto,0);}
            if($count_recargopct != 0){array_push($array_recargopct, $xml->Documento->Detalle[$i]->RecargoPct);}else{array_push($array_recargopct,0);}
            if($count_recargomonto != 0){array_push($array_recargomonto, $xml->Documento->Detalle[$i]->RecargoMonto);}else{array_push($array_recargomonto,0);}
            
            array_push($array_nrolindet, $xml->Documento->Detalle[$i]->NroLinDet);
            array_push($array_nmbitem, $xml->Documento->Detalle[$i]->NmbItem);
            array_push($array_qtyitem, $xml->Documento->Detalle[$i]->QtyItem);
            array_push($array_prcitem, $xml->Documento->Detalle[$i]->PrcItem);
            array_push($array_montoitem, $xml->Documento->Detalle[$i]->MontoItem);
        }

        //-------------------------------------------------------------------------------------------------------------------------
        //--------------------------------------------------ARMAR REQUEST----------------------------------------------------------
        //-------------------------------------------------------------------------------------------------------------------------

        $tipoanulacion = "";
        $fechaActual = date('Y-m-d');

        if($tipodte_anular == "61"){$tipoanulacion = "56";}else{$tipoanulacion = "61";}

        $parametros ='{'.
     '        "response":["FOLIO"],'.
     '        "dte":{'.
     '            "Encabezado": {'.
     '                "IdDoc": {'.
     '                    "TipoDTE": "'.$tipoanulacion.'",'.
     '                    "Folio": "0",'.
     '                    "FchEmis": "'.$fechaActual.'",';// poner fecha actual

        if($tipodte_anular == "52"){
            if($count_tipodespacho != 0){ $parametros = $parametros . '"TipoDespacho": "' . $tipodespacho_anular . '",';}
            if($count_indtraslado != 0){ $parametros = $parametros . '"IndTraslado": "' . $indtraslado_anular . '",';}           
        }

        if($count_tpotrancompra != 0){$parametros = $parametros .'"TpoTranCompra": "'.$tpotrancompra_anular.'",';}
        if($count_tpotranventa != 0){$parametros = $parametros .'"TpoTranVenta": "'.$tpotranventa_anular.'",';}
        if($count_fmapago != 0){$parametros = $parametros .'"FmaPago": "'.$fmapago_anular.'",';}

        $parametros = substr($parametros, 0,-1);

        $parametros = $parametros .'},'.
     '                "Emisor": {'.
     '                    "RUTEmisor": "76958430-7",'.
     '                    "RznSoc": "IMP COMERCIALIZADORA Y DIST AGROPLASTIC",'.
     '                    "GiroEmis": "VENTA AL POR MAYOR NO ESPECIALIZADA",'.
     '                    "Acteco": "469000",'.
     '                    "DirOrigen": "VICENTE ZORRILLA 835",'.
     '                    "CmnaOrigen": "La Serena",'.
     '                    "CdgSIISucur": "74236823"'.
     '                },'.
     '                "Receptor": {';

     	if($tipodte_anular == "39"){
			$parametros = $parametros . 
     '                    "RUTRecep": "66666666-6",'.
     '                    "RznSocRecep": "Contacto Anonimo",'.
     '                    "GiroRecep": "Sin datos",'.
     '                    "DirRecep": "Sin datos",'.
     '                    "CmnaRecep": "Sin datos"';
     	}else{
     		$parametros = $parametros . 
     '                    "RUTRecep": "'.$rutrecep_anular.'",'.
     '                    "RznSocRecep": "'.$rznsocrecep_anular.'",'.
     '                    "GiroRecep": "'.$girorecep_anular.'",'.
     '                    "DirRecep": "'.$dirrecep_anular.'",'.
     '                    "CmnaRecep": "'.$cmnarecep_anular.'"';
		}

     	$parametros = $parametros.'},';
                       
        if($tipodte_anular == "52"){
            $parametros = $parametros . '"Transporte": {'.
            '"DirDest": "'. $dirdest_anular .'",'.
            '"CmnaDest": "'. $cmnadest_anular .'",'.
            '"CiudadDest": "'. $cmnadest_anular .'"},'; //posiblemente haya que cambiarlo a la ciudad correspondiente
        }              

        $parametros = $parametros . ' "Totales": {';

        //SI IVA SE ENCUENTRA CON MONTO 0, ENTONCES ES UN DTE EXENTO
        // SE CAMBIA MONTO NETO POR MONTO EXENTO
        $tipo_monto = "";
        $monto = "";

        if($count_mntneto != 0){        	
        	$tipo_monto = "MntNeto";
        	$monto = $mntneto_anular;
        }else{ 
        	$tipo_monto = "MntExe";
        	$monto = $mntexe_anular;
        	$iva_anular = 0;
        }       

        $parametros = $parametros . '"'. $tipo_monto .'": "'. $monto.'",';
        if($iva_anular != 0){ $parametros = $parametros . '"TasaIVA": 19,';}
        
        $parametros = $parametros . '"IVA": "'. $iva_anular.'",';
        $parametros = $parametros . '"MntTotal": "'. $mnttotal_anular.'"';
        $parametros = $parametros . '}},';

        //detalle

        if($count_detalle != 0){

            $parametros = $parametros . '"Detalle": [';

            //CICLO PARA RELLENAR EL DETALLE 
            for ($i = 0; $i < $count_detalle; $i++) {

                $parametros = $parametros.'{'.
     '                    "NroLinDet": "'.($i+1).'",';
     			if($tipodte_anular == "34"){
     				$parametros = $parametros.'"IndExe": "'.($i+1).'",';

     			}

                if($array_cdgitem[$i] != 0){
                    $parametros = $parametros . '"CdgItem":{'. 
      '                    "TpoCodigo":"INT1",'.
      '                    "VlrCodigo": "'. $array_vlrcodigo[$i] .'"},' ;
                }

                $parametros = $parametros .
     '                    "NmbItem": "' . $array_nmbitem[$i] . '",'.
     '                    "QtyItem": "' . $array_qtyitem[$i] . '",'.
     '                    "PrcItem": "' . $array_prcitem[$i] . '",';
               

                if($array_descuentomonto[$i] != 0){                    
                    if($array_descuentopct[$i] != 0){                        
                        $parametros = $parametros . '"DescuentoPct": "' . $array_descuentopct[$i] . '",';
                    }
                    if($array_descuentomonto[$i] != 0){
                        $parametros = $parametros . '"DescuentoMonto": "' . $array_descuentomonto[$i] . '",';
                    }
                }
                if($array_recargomonto != 0){
                    if($array_recargopct[$i] != 0){
                        $parametros = $parametros . '"RecargoPct": "' . $array_recargopct[$i] . '",';
                    }
                    if($array_recargomonto[$i] != 0){
                        $parametros = $parametros . '"RecargoMonto": "' . $array_recargomonto[$i] . '",';
                    }
                }
                
                       
                $parametros = $parametros .'"MontoItem": "' . $array_montoitem[$i] . '"},';            
            }
            // quitamos la coma del ultimo agregado
            $parametros = substr($parametros, 0,-1);
            $parametros = $parametros .'],';
        }

      // si hay referencia agregamos la seccion completa

        $parametros = $parametros .'"Referencia": {'.
                 '"NroLinRef": "1",'.
                 '"TpoDocRef": "'. $tipodte_anular .'",'.
                 '"FolioRef": "'. $folio_anular .'",'.
                 '"FchRef": "'. $fchemis_anular .'",'.        
                 '"CodRef": 1,'.
                 '"RazonRef": "Anula Documento de Referencia"},';        
        

     // si hay descuentos o recarggos globales
        if($count_dscrcgglobal != 0){          

            $parametros = $parametros .'"DscRcgGlobal": {'.
     '                "NroLinDR": "'.$nrolindr_anular.'",'.
     '                "TpoMov": "'. $tpomov_anular .'",'.
     '                "TpoValor": "'. $tpovalor_anular .'",'.
     '                "ValorDR": "'. $valordr_anular .'"},';

        }
        $parametros = substr($parametros, 0,-1);
        $parametros = $parametros .'}}';

        //console.log($parametros);
        //$parametros = json_encode($parametros);       

        $apikey = "928e15a2d14d4a6292345f04960f4cc3";
        crearDTE($parametros,$apikey);
        //print_r($parametros);

	}else{
		print_r(json_encode("Problemas para encontrar archivo"));
	}

}
?>