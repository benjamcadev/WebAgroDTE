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

	case 'enviarSobre':
		$id_sobre = $_GET['id_sobre'];
		$rut_emisor = $_GET['rut_emisor'];
		$rut_empresa = $_GET['rut_empresa'];
		enviarSobre($id_sobre,$rut_emisor,$rut_empresa);
		break;	
	
	default:
		// code...
		break;
}


}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}


function cargarSobresTabla(){
	$conexion = new conexion();
	$sql2 = "SELECT * FROM envio_dte ORDER BY id_envio_dte DESC LIMIT 1000";
	$datos = $conexion->obtenerDatos($sql2);
	$datos_str = json_encode($datos);
	
	print_r($datos_str);
	//print_r(json_encode($datos));
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