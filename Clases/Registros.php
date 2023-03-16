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
		
		case 'consultarComprasSII':
			$ptributario = $_POST['ptributario'];
			$dvEmisor = $_POST['dvEmisor'];
			$rutEmisor = $_POST['rutEmisor'];
			$estadoContab = $_POST['estadoContab'];
			$operacion = $_POST['operacion'];
			consultarComprasSII($ptributario,$dvEmisor,$rutEmisor,$estadoContab,$operacion);
			break;

		case 'consultarVentasRegistro':
			
			$dvEmisor = $_POST['dvEmisor'];
			$rutEmisor = $_POST['rutEmisor'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			consultarVentasRegistro($dvEmisor,$rutEmisor,$month,$year);
			break;

		case 'busquedaRegistroBoletas':
			
			$dvEmisor = $_POST['dvEmisor'];
			$rutEmisor = $_POST['rutEmisor'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			busquedaRegistroBoletas($dvEmisor,$rutEmisor,$month,$year);
			break;

		case 'cargarFechasRegistro':
			$tipo = $_POST['tipo'];
			cargarFechasRegistro($tipo);
			break;

		default:
			// code...
			break;
	}


}else{
	$mensaje = "apikey incorrecta";
	print_r($mensaje);
}

function cargarFechasRegistro($tipo){
	$conexion = new conexion();
	$fechas=array();

	if ($tipo == "venta") {
			$sql_factura = "SELECT MIN(fchemis_factura) as fecha_factura FROM factura";
			$sql_boleta = "SELECT MIN(fechaemis_boleta) as fecha_boleta FROM boleta";
			$sql_boleta_exenta = "SELECT MIN(fechaemis_boleta_exenta) as fecha_boleta_exenta FROM boleta_exenta";
			$sql_factura_exenta = "SELECT MIN(fchemis_factura_exenta) as fecha_factura_exenta FROM factura_exenta";
			$sql_guia_despacho = "SELECT MIN(fchemis_guia_despacho) as fecha_guia_despacho FROM  guia_despacho";
			$sql_nota_credito = "SELECT MIN(fchemis_nota_credito) as fecha_nota_credito FROM nota_credito";
			$sql_nota_debito = "SELECT MIN(fchemis_nota_debito) as fecha_nota_debito FROM nota_debito";

			$datos_factura = $conexion->obtenerDatos($sql_factura);
			$datos_boleta = $conexion->obtenerDatos($sql_boleta);
			$datos_boleta_exenta = $conexion->obtenerDatos($sql_boleta_exenta);
			$datos_factura_exenta = $conexion->obtenerDatos($sql_factura_exenta);
			$datos_guia_despacho = $conexion->obtenerDatos($sql_guia_despacho);
			$datos_nota_credito = $conexion->obtenerDatos($sql_nota_credito);
			$datos_nota_debito = $conexion->obtenerDatos($sql_nota_debito);

			
			array_push($fechas,$datos_factura[0]["fecha_factura"],$datos_boleta[0]["fecha_boleta"],$datos_boleta_exenta[0]["fecha_boleta_exenta"],
			$datos_factura_exenta[0]["fecha_factura_exenta"],$datos_guia_despacho[0]["fecha_guia_despacho"],$datos_nota_credito[0]["fecha_nota_credito"],
			$datos_nota_debito[0]["fecha_nota_debito"]);

	}elseif ($tipo == "compra") {
		$sql_factura_compra = "SELECT MIN(fchemis_factura_compra) as fecha_factura FROM factura_compra";
		$sql_guia_despacho_compra = "SELECT MIN(fchemis_guia_despacho_compra) as fecha_guia_despacho FROM guia_despacho_compra";
		$sql_factura_exenta_compra = "SELECT MIN(fchemis_factura_exenta_compra) as fecha_factura_exenta FROM factura_exenta_compra";
		$sql_nota_credito_compra = "SELECT MIN(fchemis_nota_credito_compra) as fecha_nota_credito FROM nota_credito_compra";
		$sql_nota_debito_compra = "SELECT MIN(fchemis_nota_debito_compra) as fecha_nota_debito FROM nota_debito_compra";

		$datos_factura_compra = $conexion->obtenerDatos($sql_factura_compra);
		$datos_guia_despacho_compra = $conexion->obtenerDatos($sql_guia_despacho_compra);
		$datos_factura_exenta_compra = $conexion->obtenerDatos($sql_factura_exenta_compra);
		$datos_nota_credito_compra = $conexion->obtenerDatos($sql_nota_credito_compra);
		$datos_nota_debito_compra = $conexion->obtenerDatos($sql_nota_debito_compra);

		array_push($fechas,$datos_factura_compra[0]["fecha_factura"],
			$datos_factura_exenta_compra[0]["fecha_factura_exenta"],$datos_guia_despacho_compra[0]["fecha_guia_despacho"],$datos_nota_credito_compra[0]["fecha_nota_credito"],
			$datos_nota_debito_compra[0]["fecha_nota_debito"]);

	}
	
	array_multisort(array_map('strtotime', $fechas), $fechas);

	$fechas = remove_empty($fechas);

	print_r(json_encode($fechas));
	
}



function remove_empty($array) {
  return array_filter($array, '_remove_empty_internal');
}

function _remove_empty_internal($value) {
	return !empty($value) || $value === 0;
  }

function busquedaRegistroBoletas($dvEmisor,$rutEmisor,$month,$year){

	$month_ingles = "";

	if ($month == "01") {$month_ingles = "January";}
	if ($month == "02") {$month_ingles = "February";}
	if ($month == "03") {$month_ingles = "March";}
	if ($month == "04") {$month_ingles = "April";}
	if ($month == "05") {$month_ingles = "May";}
	if ($month == "06") {$month_ingles = "June";}
	if ($month == "07") {$month_ingles = "July";}
	if ($month == "08") {$month_ingles = "August";}
	if ($month == "09") {$month_ingles = "September";}
	if ($month == "10") {$month_ingles = "October";}
	if ($month == "11") {$month_ingles = "November";}
	if ($month == "12") {$month_ingles = "December";}

	$first_day = date('d',strtotime('first day of '.$month_ingles.' '.$year, time()));
	$last_day = date('d',strtotime('last day of '.$month_ingles.' '.$year, time()));

	$conexion = new conexion();

	$sql = "SELECT * FROM consumo_folios WHERE fecha_inicio >= '".$year."-".$month."-".$first_day."' AND fecha_final <= '".$year."-".$month."-".$last_day."' ORDER BY id_envio_dte_fk DESC LIMIT 500";

	$datos = $conexion->obtenerDatos($sql);

	print_r(json_encode($datos));



}


function consultarVentasRegistro($dvEmisor,$rutEmisor,$month,$year){

	$month_ingles = "";

	if ($month == "01") {$month_ingles = "January";}
	if ($month == "02") {$month_ingles = "February";}
	if ($month == "03") {$month_ingles = "March";}
	if ($month == "04") {$month_ingles = "April";}
	if ($month == "05") {$month_ingles = "May";}
	if ($month == "06") {$month_ingles = "June";}
	if ($month == "07") {$month_ingles = "July";}
	if ($month == "08") {$month_ingles = "August";}
	if ($month == "09") {$month_ingles = "September";}
	if ($month == "10") {$month_ingles = "October";}
	if ($month == "11") {$month_ingles = "November";}
	if ($month == "12") {$month_ingles = "December";}

	$first_day = date('d',strtotime('first day of '.$month_ingles.' '.$year, time()));
	$last_day = date('d',strtotime('last day of '.$month_ingles.' '.$year, time()));

	$conexion = new conexion();

	$tipos_dte = array("33","34","61","52","56","39","41");

	$respuestas_dte_array = array();

	for ($i=0; $i <  count($tipos_dte); $i++) { 

		$tabla_dte = "";
		$fecha_dte = "";
		$nombre_dte = "";

		if ($tipos_dte[$i] == "33") {$tabla_dte = "factura"; $fecha_dte = "fchemis_";$nombre_dte = "Factura Electronica";};
        if ($tipos_dte[$i] == "34") {$tabla_dte = "factura_exenta"; $fecha_dte = "fchemis_";$nombre_dte = "Factura Exenta";};
        if ($tipos_dte[$i] == "39") {$tabla_dte = "boleta"; $fecha_dte = "fechaemis_";$nombre_dte = "Boleta Electronica";};
        if ($tipos_dte[$i] == "41") {$tabla_dte = "boleta_exenta"; $fecha_dte = "fechaemis_";$nombre_dte = "Boleta Exenta Electronica";};
        if ($tipos_dte[$i] == "61") {$tabla_dte = "nota_credito"; $fecha_dte = "fchemis_";$nombre_dte = "Nota Credito Electronica";};
        if ($tipos_dte[$i] == "56") {$tabla_dte = "nota_debito"; $fecha_dte = "fchemis_";$nombre_dte = "Nota Debito Electronica";};
        if ($tipos_dte[$i] == "52") {$tabla_dte = "guia_despacho"; $fecha_dte = "fchemis_";$nombre_dte = "Guia Despacho Electronica";};


		$sql = "SELECT COUNT(*) AS cantidad, SUM(mnttotal_".$tabla_dte.") AS monto_total FROM ".$tabla_dte." WHERE ".$fecha_dte.$tabla_dte." BETWEEN '".$year."-".$month."-".$first_day."' AND '".$year."-".$month."-".$last_day."'";

		
		$datos = $conexion->obtenerDatos($sql);

		

		

		$monto_neto = 0;
		$monto_exento = 0;
		$iva = 0;

		if ($datos[0]["monto_total"] == null) {
			$datos[0]["monto_total"] = 0;
		}


		//Calcular IVA y Neto
		if ($tipos_dte[$i] == "34" || $tipos_dte[$i] == "41") {
		$monto_exento = $datos[0]["monto_total"];
		$monto_neto = 0;
		$iva = 0;

		}else{
		$monto_neto = ($datos[0]["monto_total"] * 100) / 119;
		$iva = $datos[0]["monto_total"] - $monto_neto;
		$monto_exento = 0;
		}

		$respuesta = '{"dcvNombreTipoDoc": "'.$nombre_dte.'","rsmnTotDoc": '.$datos[0]["cantidad"].', "rsmnMntTotal": '.$datos[0]["monto_total"].', "rsmnMntNeto": '.$monto_neto.', "rsmnMntIVA": '.$iva.', "rsmnMntExe": '.$monto_exento.'}';

		array_push($respuestas_dte_array, $respuesta);
		

	}

	$respuesta_final = '{"data":[';

	for ($i=0; $i < count($respuestas_dte_array); $i++) { 

		/*if (count($respuestas_dte_array) - 1 = $i) {
			// code...
		}*/
		$respuesta_final = $respuesta_final.$respuestas_dte_array[$i].',';
	}

	$respuesta_final = rtrim($respuesta_final, ", ");
	$respuesta_final = $respuesta_final.'] }';


	print_r(json_encode($respuesta_final));

}
	


function consultarComprasSII($ptributario,$dvEmisor,$rutEmisor,$estadoContab,$operacion){

	//VERIFICAR COOKIE ACTIVA BD PARA LOGEO EN EL SII

	$conexion = new conexion();
	$sql = "SELECT fecha_ultimo_uso_token,id_token,digitos_token FROM token WHERE estado_token = '1' AND servidor_token = 'zeusr.sii.cl'";
	$datos_token = $conexion->obtenerDatos($sql);

	$cookies_str = "";
	$token = "";

	if (count($datos_token) === 0) {
		//NO EXISTE TOKEN ACTIVO, SE PIDE UNO
		$array_cookies_netscapes = loginSII();
		$cookie_str = "s_cc=true; ".$array_cookies_netscapes[0]."; ".$array_cookies_netscapes[1]."; ".$array_cookies_netscapes[2]."; ".
			  $array_cookies_netscapes[3]."; ".$array_cookies_netscapes[4]."; ".$array_cookies_netscapes[5]."; ".$array_cookies_netscapes[6]."; ".
			  $array_cookies_netscapes[7]."; ".$array_cookies_netscapes[8]."; ".$array_cookies_netscapes[9]."; ".$array_cookies_netscapes[10]."";


		$token = substr($array_cookies_netscapes[9],6);

		//GUARDAR EN LA BD EL TOKEN NUEVO
		$sql2 = "INSERT INTO token (digitos_token,fecha_solicitud_token,fecha_ultimo_uso_token,estado_token,servidor_token) VALUES ('".$cookie_str."',NOW(),NOW(),1,'zeusr.sii.cl')";
		$conexion->ejecutarQuery($sql2);
			


	}else{
		//EXISTE TOKEN ACTIVO
		$cookie_str = $datos_token[0]['digitos_token'];
		$array_cookies = explode(";",$cookie_str);
		 for ($i=0; $i < count($array_cookies); $i++) { 
		 	$posicion_inicial_token = stripos($array_cookies[$i], 'TOKEN=');

		 	if (!empty($posicion_inicial_token)) {
			   	 	$cookie_netscape = substr($array_cookies[$i],$posicion_inicial_token);
			   	 	$token = substr($cookie_netscape,6);
			   }


		 }

		 //UPDATEAR ULTIMA VEZ QUE SE OCUPO EL TOKEN
		 $sql3 = "UPDATE token SET fecha_ultimo_uso_token= NOW() WHERE digitos_token= '".$cookie_str."'";
		 $conexion->ejecutarQuery($sql3);
	}

	//CONSULTAMOS AL SII
	$url = 'https://www4.sii.cl/consdcvinternetui/services/data/facadeService/getResumen';  

		$curl = curl_init();
		
		$data_post = '{"metaData": {
        "namespace": "cl.sii.sdi.lob.diii.consdcv.data.api.interfaces.FacadeService/getResumen",
        "conversationId": "'.$token.'",
        "transactionId": "37bd8baf-cb5e-49d6-8c49-efb696aff736",
        "page": null
    },
    "data": {
        "rutEmisor": "'.$rutEmisor.'",
        "dvEmisor": "'.$dvEmisor.'",
        "ptributario": "'.$ptributario.'",
        "estadoContab": "'.$estadoContab.'",
        "operacion": "'.$operacion.'",
        "busquedaInicial": true
    }}';


		


		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $data_post,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTPHEADER => array(
		    "Accept: application/json, text/plain, */*",
		    "Host: www4.sii.cl",
		    "Connection: keep-alive",
		    "sec-ch-ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"",
		    "sec-ch-ua-mobile: ?0",
		    "sec-ch-ua-platform: \"Windows\"",
		    "Content-Type: application/json",
		    "Origin: https://www4.sii.cl",
		    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36",
		    "Sec-Fetch-Site: same-origin",
		    "Sec-Fetch-Mode: cors",
		    "Sec-Fetch-Dest: empty",
		    "Referer: https://www4.sii.cl/consdcvinternetui/",
		    "Accept-Encoding: gzip, deflate, br",
		    "Accept-Language: es-ES,es;q=0.9,en;q=0.8",
		    "Cookie: ".$cookie_str,
		   
		  ),
		  
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		print_r($response);

}

function loginSII(){



		$url = 'https://zeusr.sii.cl/cgi_AUT2000/CAutInicio.cgi';  

		$curl = curl_init();
		
		$data_post = array(
			"rut" => "6402678",
			"dv" => "K",
			"referencia" => "https://misiir.sii.cl/cgi_misii/siihome.cgi",
			"411" => "",
			"rutcntr" => "6.402.678-K",
			"clave" => "RUBEN2020"
		);

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HEADER => true,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => http_build_query($data_post),
		  CURLOPT_HTTPHEADER => array(
		    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
		    "Host: zeusr.sii.cl",
		    "Connection: keep-alive",
		    "sec-ch-ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"",
		    "sec-ch-ua-mobile: ?0",
		    "sec-ch-ua-platform: \"Windows\"",
		    "Upgrade-Insecure-Requests: 1",
		    "Origin: https://zeusr.sii.cl",
		    "Content-Type: application/x-www-form-urlencoded",
		    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36",
		    "Sec-Fetch-Site: same-origin",
		    "Sec-Fetch-Mode: navigate",
		    "Sec-Fetch-User: ?1",
		    "Sec-Fetch-Dest: document",
		    "Referer: https://zeusr.sii.cl//AUT2000/InicioAutenticacion/IngresoRutClave.html?https://misiir.sii.cl/cgi_misii/siihome.cgi",
		    "Accept-Encoding: gzip, deflate, br",
		    "Accept-Language: es-ES,es;q=0.9,en;q=0.8",
		    "Cookie: s_cc=true",
		   
		  )
		  
		  
		 
		  
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);


		

		curl_close($curl);

		
		$array_cookies_netscapes = array();
		

		if (str_contains($header, 'Set-Cookie')) { 
			    $posicion_inicial = stripos($header, 'Set-Cookie');
			    $posicion_final = strrpos($header, 'set-Cookie');
			    $header_cortado = substr($header,$posicion_inicial,$posicion_final);

			    $array_cookies = array();
			    

			    $array_cookies = explode(";",$header_cortado);

			   for ($i=0; $i < count($array_cookies); $i++) { 
			   	 $posicion_inicial = stripos($array_cookies[$i], 'NETSCAPE_LIVEWIRE');
			   	 $posicion_inicial_token = stripos($array_cookies[$i], 'TOKEN=');
			   	 $posicion_inicial_session = stripos($array_cookies[$i], 'CSESSIONID=');

			   	
			   	 if (!empty($posicion_inicial) ) 
			   	 {
			   	 	 $cookie_netscape = substr($array_cookies[$i],$posicion_inicial);
			   	 	array_push($array_cookies_netscapes, $cookie_netscape);
			   	 }

			   	 if (!empty($posicion_inicial_token)) {
			   	 	 $cookie_netscape = substr($array_cookies[$i],$posicion_inicial_token);
			   	 	array_push($array_cookies_netscapes, $cookie_netscape);
			   	 }

			   	 if (!empty($posicion_inicial_session)) {
			   	 	 $cookie_netscape = substr($array_cookies[$i],$posicion_inicial_session);
			   	 	array_push($array_cookies_netscapes, $cookie_netscape);
			   	 }
			   	
			   }
			   
				
				/*ARMAR LA COOKIE PARA PODER LOGERSE EN LOS SERVICIOS DEL SII
		EJEMPLO: Cookie: s_cc=true; NETSCAPE_LIVEWIRE.rut=6402678; NETSCAPE_LIVEWIRE.rutm=6402678; NETSCAPE_LIVEWIRE.dv=K; NETSCAPE_LIVEWIRE.dvm=K; NETSCAPE_LIVEWIRE.clave=SInzJatFBmUNsSIOLBhD2M3bJw; NETSCAPE_LIVEWIRE.mac=0766hlk58b0eiif5qgdhle2rin; NETSCAPE_LIVEWIRE.exp=20220601150805; NETSCAPE_LIVEWIRE.sec=0000; NETSCAPE_LIVEWIRE.lms=120; TOKEN=JM28M9MCOBX7H; CSESSIONID=JM28M9MCOBX7H
		*/
			  





			}
		

		

		return $array_cookies_netscapes;

}




?>