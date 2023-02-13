<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "plugins/simple-html-dom/simple_html_dom.php";


$array_cookie = loginSII();
consultaSII($array_cookie);


function consultaSII($array_cookies_netscapes){



	if (!empty($array_cookies_netscapes)) {

		$cookie = "s_cc=true; ".$array_cookies_netscapes[0]."; ".$array_cookies_netscapes[1]."; ".$array_cookies_netscapes[2]."; ".
			  $array_cookies_netscapes[3]."; ".$array_cookies_netscapes[4]."; ".$array_cookies_netscapes[5]."; ".$array_cookies_netscapes[6]."; ".
			  $array_cookies_netscapes[7]."; ".$array_cookies_netscapes[8]."; ".$array_cookies_netscapes[9]."; ".$array_cookies_netscapes[10]."";


		$token = substr($array_cookies_netscapes[9],6);

		$url = 'https://www4.sii.cl/consdcvinternetui/services/data/facadeService/getResumen';  

		$curl = curl_init();
		
		$data_post = '{"metaData": {
        "namespace": "cl.sii.sdi.lob.diii.consdcv.data.api.interfaces.FacadeService/getResumen",
        "conversationId": "'.$token.'",
        "transactionId": "37bd8baf-cb5e-49d6-8c49-efb696aff736",
        "page": null
    },
    "data": {
        "rutEmisor": "76958430",
        "dvEmisor": "7",
        "ptributario": "202203",
        "estadoContab": "REGISTRO",
        "operacion": "COMPRA",
        "busquedaInicial": true
    }}';


		


		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  //CURLOPT_RETURNTRANSFER => true,
		  //CURLOPT_ENCODING => "",
		  //CURLOPT_MAXREDIRS => 10,
		  //CURLOPT_TIMEOUT => 30,
		  //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
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
		    "Cookie: ".$cookie,
		   
		  ),
		  
		));

		return $response = curl_exec($curl);
		$err = curl_error($curl);
		
	}

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


		//print_r($header);

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