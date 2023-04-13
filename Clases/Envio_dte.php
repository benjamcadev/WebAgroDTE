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
	case 'cargarSobresTabla':

		cargarSobresTabla();
		break;

	case 'cargarTipoEnvio':

		cargarTipoEnvio();
		break;

	case 'enviarSobre':
		$id_sobre = $_GET['id_sobre'];
		$rut_emisor = $_GET['rut_emisor'];
		$rut_empresa = $_GET['rut_empresa'];
		enviarSobre($id_sobre,$rut_emisor,$rut_empresa);
		break;
	case 'estadoSobre':
		$track_id = $_GET['track_id'];
		$servidor = $_GET['servidor'];
		estadoSobre($track_id,$servidor);
		break;

	case 'activarEnvioInmediato':

		$flag_envio = $_POST['flag_envio'];

		activarEnvioInmediato($flag_envio);
		break;

	default:
		// code...
		break;
}


}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}

function cargarTipoEnvio(){

	$conexion = new conexion();

	$sqlcargarestado = "SELECT estado_conexion_empresa FROM empresa WHERE id_empresa='1'";

	$datos = $conexion->obtenerDatos($sqlcargarestado);
	$datos_str = json_encode($datos);

	print_r($datos_str);

}

function activarEnvioInmediato($flag_envio){

	$conexion = new conexion();

	$sqlinmediato = "UPDATE empresa SET estado_conexion_empresa = 'Con Conexion' WHERE id_empresa='1'";
	$sqldesfasado = "UPDATE empresa SET estado_conexion_empresa = 'Sin Conexion' WHERE id_empresa='1'";

	if($flag_envio == "Inmediato" ){
		$conexion->ejecutarQuery($sqlinmediato);
		print_r("CambioInmediato");

	}else{
		$conexion->ejecutarQuery($sqldesfasado);
		print_r("CambioDesfasado");

	}


}


function cargarSobresTabla(){
	$conexion = new conexion();
	//$sql2 = "SELECT * FROM envio_dte ORDER BY id_envio_dte DESC LIMIT 1000";
	$sql_factura = "SELECT envio_dte.*,factura.folio_factura as folio FROM envio_dte INNER JOIN factura ON envio_dte.id_envio_dte = factura.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_factura = $conexion->obtenerDatos($sql_factura);

	$sql_factura_exenta = "SELECT envio_dte.*,factura_exenta.folio_factura_exenta as folio FROM envio_dte INNER JOIN factura_exenta ON envio_dte.id_envio_dte = factura_exenta.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_factura_exenta = $conexion->obtenerDatos($sql_factura_exenta);

	$sql_boleta = "SELECT envio_dte.*,boleta.folio_boleta as folio FROM envio_dte INNER JOIN boleta ON envio_dte.id_envio_dte = boleta.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_boleta = $conexion->obtenerDatos($sql_boleta);

	$sql_boleta_exenta = "SELECT envio_dte.*,boleta_exenta.folio_boleta_exenta as folio FROM envio_dte INNER JOIN boleta_exenta ON envio_dte.id_envio_dte = boleta_exenta.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_boleta_exenta = $conexion->obtenerDatos($sql_boleta_exenta);

	$sql_nota_credito = "SELECT envio_dte.*,nota_credito.folio_nota_credito as folio FROM envio_dte INNER JOIN nota_credito ON envio_dte.id_envio_dte = nota_credito.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_nota_credito = $conexion->obtenerDatos($sql_nota_credito);

	$sql_nota_debito = "SELECT envio_dte.*,nota_debito.folio_nota_debito as folio FROM envio_dte INNER JOIN nota_debito ON envio_dte.id_envio_dte = nota_debito.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_nota_debito = $conexion->obtenerDatos($sql_nota_debito);

	$sql_guia_despacho = "SELECT envio_dte.*,guia_despacho.folio_guia_despacho as folio FROM envio_dte INNER JOIN guia_despacho ON envio_dte.id_envio_dte = guia_despacho.id_envio_dte_fk ORDER BY id_envio_dte DESC LIMIT 200";
	$datos_guia_despacho = $conexion->obtenerDatos($sql_nota_debito);


	

	$datos_str = json_encode(array_merge($datos_factura,$datos_factura_exenta,$datos_boleta,$datos_boleta_exenta,$datos_nota_credito,$datos_nota_debito,$datos_guia_despacho));
	
	print_r($datos_str);
	//print_r(json_encode($datos));
}

function estadoSobre($track_id,$servidor){
	if (is_connected()) {

		$url = 'http://192.168.1.9:90/api_agrodte/api/dte/document/estadosobre';  
		$curl = curl_init();
		$data = "{\"trackid\": \"".$track_id."\",\"servidor\": \"".$servidor."\"}";

		

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
		print_r($response);
		//$decoded_response_object = json_decode($response);
		
		
		//print_r(json_encode($response));





	}else{

	print_r(json_encode("{\"Error\": \"No hay conexion a internet\"}"));
}
}
function enviarSobre($id,$rutEmisor,$rutEmpresa){

	if (is_connected()) {
		
	
	$conexion = new conexion();
	$sql = "SELECT rutaxml_envio_dte FROM envio_dte WHERE id_envio_dte = '$id'";
	$datos = $conexion->obtenerDatos($sql);
	$track_id = "";

	if (empty($datos)) {
     
     print_r(json_encode("{\"Error\": \"Sobre no existe\"}"));

	}
	else
	{

	$xml_sii = simplexml_load_file($datos[0]['rutaxml_envio_dte']);
	$TipoDTE = (string) $xml_sii->SetDTE->DTE->Documento->Encabezado->IdDoc->TipoDTE;
	
	if ($TipoDTE == '39' || $TipoDTE == '41') {

		$xml_boleta = simplexml_load_file($datos[0]['rutaxml_envio_dte']);
		$nombre_archivo_boleta = str_replace("\\","\\\\",$datos[0]['rutaxml_envio_dte']);
		
		
		
		$url = 'http://192.168.1.9:90/api_agrodte/api/dte/document/envioboleta';  
		$curl = curl_init();
		$data = json_encode("{\"path\": \"".$nombre_archivo_boleta."\",\"rut_emisor\": \"".$rutEmisor."\",\"rut_empresa\": \"".$rutEmpresa."\"}");

		

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
		//print_r($response);

		if (strpos($response, 'Error') !== false) {
		    //TRAE UN ERROR EL RESPONSE
		    $response = str_replace('"', '', $response);
		    //$response = str_replace('{', '', $response);
		    //$response = str_replace('}', '', $response);
		    print_r(json_encode("{\"respuesta\": \"error boleta\", \"detalle\": \"$response\" }"));
		}

		//print_r(json_encode($response));
		//$err = curl_error($curl);
		
		$decoded_response_object = json_decode($response);
		
		
		$track_id = $decoded_response_object->track_id;
		//	ACTUALIZAR BD
		$sql = "UPDATE envio_dte SET trackid_envio_dte = '$track_id',estado_envio_dte = 'Enviado' WHERE id_envio_dte = '$id'";
		$respuesta_update = $conexion->ejecutarQuery($sql);
		
		print_r(json_encode("{\"respuesta\": \"ok boleta\"}"));

		
	}else{

	$response_xml = file_get_contents('http://192.168.1.9:90/WebServiceEnvioDTE/EnvioSobreDTE.asmx/enviarSobreSII?archivo='.$datos[0]['rutaxml_envio_dte'].'&rutEmisor=6402678-k&rutEmpresa=76958430-7');
	$xml = new SimpleXMLElement($response_xml);
	$track_id = (string) $xml[0];

	

	if ($track_id != "") {
		//	ACTUALIZAR BD
	$sql = "UPDATE envio_dte SET trackid_envio_dte = '$track_id',estado_envio_dte = 'Enviado' WHERE id_envio_dte = '$id'";
	$respuesta_update = $conexion->ejecutarQuery($sql);

		print_r(json_encode("{\"respuesta\": \"ok\"}"));
	}else{
		print_r(json_encode("{\"Error\": \"hubo un error al enviar el sobre al cliente\"}"));
	}


	}
	

	



	//ENVIAMOS RESPUESTA AL CLIENTE----------------------------------------------

	

	// if ($TipoDTE == '33' || $TipoDTE == '34' || $TipoDTE == '61' || $TipoDTE == '52' || $TipoDTE == '56') {
	// 	//ENVIAR A CLIENTE XML
	// 	$nombre_archivo = substr($datos[0]['rutaxml_envio_dte'], 0, -4);
	// 	$nombre_archivo_cliente = $nombre_archivo."-cliente.xml";
	// 	$xml_cliente = simplexml_load_file($nombre_archivo_cliente);
	// 	$nombre_archivo_cliente = str_replace("\\","\\\\",$nombre_archivo_cliente);
	// 	$rut_cliente = (string) $xml_cliente->SetDTE->Caratula->RutReceptor;

	// 	$url = 'http://192.168.1.9:90/api_agrodte/api/dte/document/enviocliente';  
	// 		//$data = json_encode('{"rut": "'.$rut_cliente.'","path": "'.$nombre_archivo_cliente.'"}');
	// 	$curl = curl_init();
	// 	$data = json_encode("{\"path\": \"".$nombre_archivo_cliente."\",\"rut\": \"".$rut_cliente."\"}");

	// 	curl_setopt_array($curl, array(
	// 	  CURLOPT_URL => $url,
	// 	  CURLOPT_RETURNTRANSFER => true,
	// 	  CURLOPT_ENCODING => "",
	// 	  CURLOPT_MAXREDIRS => 10,
	// 	  CURLOPT_TIMEOUT => 30,
	// 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 	  CURLOPT_CUSTOMREQUEST => "POST",
	// 	  CURLOPT_POSTFIELDS => $data,
	// 	  CURLOPT_SSL_VERIFYPEER => false,
	// 	  CURLOPT_HTTPHEADER => array(
	// 	    "Accept: */*",
	// 	    "Cache-Control: no-cache",
	// 	    "Connection: keep-alive",
	// 	    "Content-Type: application/json",
	// 	  ),
	// 	));

	// 	$response = curl_exec($curl);

	// 	print_r(json_encode($response));
	// 	$err = curl_error($curl);
	// 	$decoded_response_object = json_decode($response);

	// }else{
	// 	print_r(json_encode("{\"respuesta\": \"ok boleta\"}"));
	// }
	
	}
	
}else{

	print_r(json_encode("{\"Error\": \"No hay conexion a internet\"}"));
}
}

function is_connected()
{
    $connected = @fsockopen("www.google.cl", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}



?>